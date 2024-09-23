<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{

    // ------------------ home page

    public function CustomerIndex()
    {

        $categories = Category::with('products')->get();


        return view('layouts.pages.home', compact('categories'));
    }


    public function CustomerCategoryProduct($id)
    {
        $category = Category::with('products')->findOrFail($id);
        $categories = Category::with('products')->get();
        $products = $category->products;

        // Debugging: Log the fetched data
        \Log::info('Category: ' . $category);
        \Log::info('Products: ' . $products);

        return view('layouts.pages.categoryproductlist', compact('category', 'products', 'categories'));
    }



    // ----------------- product page


    public function CustomerProduct()
    {
        $categories = Category::with('products')->get();
        $products = Product::with('category')->get();
        return view('layouts.pages.product', compact('categories', 'products'));
    }


    // ------------------ customer products details


    public function CustomerProductDetials($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::with('products')->get();
        return view('layouts.pages.product_details', compact('categories', 'product'));
    }

    // ------------------ about page

    public function CustomerAbout()
    {
        $categories = Category::with('products')->get();
        return view('layouts.pages.about', compact('categories'));
    }

    // ------------------- contact page

    public function CustomerContact()
    {
        $categories = Category::with('products')->get();
        return view('layouts.pages.contact', compact('categories'));
    }


    public function CustomerWishList()
    {

        $categories = Category::with('products')->get();
        return view('layouts.pages.wishlist', compact('categories'));
    }


    // ------------------ cart page

    public function CustomerCart()
    {

        $categories = Category::with('products')->get();
        return view('layouts.pages.cart', compact('categories'));
    }

    // ------------------ checkout page

    public function CustomerCheckout()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $addresses = Address::where('user_id', Auth::id())->with('user')->get();
        $categories = Category::with('products')->get();
        return view('layouts.pages.checkout', compact('categories', 'profileData', 'addresses'));
    }

    public function OrderStore(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $validated['user_id'],
                'address_id' => $validated['address_id'],
                'total_price' => $validated['total_price'],
                'payment_method' => $validated['payment_method'],
                'status' => Order::STATUS_PENDING,
                'payment_status' => Order::PAYMENT_PENDING,
            ]);

            foreach ($validated['items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['unit_price'] * $item['quantity'],
                ]);
            }

            DB::commit();

            if ($validated['payment_method'] === 'sslcommerz') {
                return app(SslCommerzPaymentController::class)->index($request);
            }

            return response()->json(['success' => true, 'redirect' => route('customer.index')]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating order: ' . $e->getMessage(), [
                'user_id' => $validated['user_id'],
                'address_id' => $validated['address_id'],
                'total_price' => $validated['total_price'],
                'payment_method' => $validated['payment_method'],
                'items' => $validated['items']
            ]);
            return response()->json(['success' => false, 'message' => 'Failed to create order. Please try again.']);
        }
    }

    public function addAddress(Request $request)
    {
        $request->validate([
            'division' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'road_no' => 'required|string|max:255',
            'house_no' => 'required|string|max:255',
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'division' => $request->division,
            'city' => $request->city,
            'road_no' => $request->road_no,
            'house_no' => $request->house_no,
        ]);

        return redirect()->back()->with('success', 'Address added successfully');
    }

    public function editAddress(Request $request, $id)
    {
        $request->validate([
            'division' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'road_no' => 'required|string|max:255',
            'house_no' => 'required|string|max:255',
        ]);

        $address = Address::findOrFail($id);
        $address->update([
            'division' => $request->division,
            'city' => $request->city,
            'road_no' => $request->road_no,
            'house_no' => $request->house_no,
        ]);

        return redirect()->back()->with('success', 'Address updated successfully');
    }

    public function deleteAddress($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return response()->json(['success' => true]);
    }

    // ------------------------- invoice page

    public function CustomerInvoice()
    {
        $categories = Category::with('products')->get();
        return view('layouts.pages.invoice', compact('categories'));
    }


    // ----------------------- customer account page  


    public function CustomerMyaccount()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $categories = Category::with('products')->get();
        $shippingAddress = Address::where('user_id', $id)->first();

        // Provide default values if the address is not found
        if (!$shippingAddress) {
            $shippingAddress = (object) [
                'division' => 'N/A',
                'city' => 'N/A',
                'road_no' => 'N/A',
                'house_no' => 'N/A'
            ];
        }

        $orders = Order::where('user_id', $id)->with('items.product')->get();

        // Calculate order stats
        $totalOrders = $orders->count();
        $ordersProcessing = $orders->where('status', 'processing')->count();
        $ordersDelivered = $orders->where('status', 'delivered')->count();
        $pendingOrders = $orders->where('status', 'pending')->count();

        return view('layouts.pages.myaccount', compact('categories', 'profileData', 'shippingAddress', 'orders', 'totalOrders', 'ordersProcessing', 'ordersDelivered', 'pendingOrders'));
    }










    // -------------------------- customer update profile

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->birthday = $request->birthday;
        $data->username = $request->username;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alter-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }

    // --------------------- customer change account password

    public function changePassword(Request $request)
    {
        // Validation rules for changing password
        $rules = [
            'email' => 'required|string|email|max:255',
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ];

        $request->validate($rules);

        // Check if current password matches
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The provided current password does not match your password']);
        }

        // Change user's password
        Auth::user()->update(['password' => Hash::make($request->new_password)]);

        $notification = array(
            'message' => 'Password changed successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }









}
