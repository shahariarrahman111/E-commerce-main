<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use PDF;


class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    } 

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }  // end method

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }  // end method


    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }  // end method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alter-type' => 'success'
        );


        return redirect()->back()->with($notification);
    } // end method



    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    } //  end method

    public function adminCustomerList()
    {
        return view('admin.customer.admin_customer_list');
    }

    // Admin Category......

    public function adminCategoryList()
    {
        $categories = Category::all();
        return view('admin.category.admin_category_list', compact('categories'));
    }


    public function addCategory()
    {
        return view('admin.category.admin_add_category');
    }

    public function storeCategory(Request $request)
    {
        $validatedInput = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,web|max:2048',
            'category_name' => 'required|string|max:255',
        ]);

            // Handel Photo Upload

            if($request->hasFile('photo')){

        
                $photo = $request->file('photo');
                $photoName = date('YmdHi') . $photo->getClientOriginalName();
                $photo->move(public_path('upload/admin_images'), $photoName);
                $validatedInput['photo'] = $photoName;

            }

            Category::create($validatedInput);

            $notification = array(
                'message' => 'Product Category added sucessfuly.',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.category.list')->with($notification);

    }

    
 

    public function editCaregory($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.admin_edit_category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $validatedInput = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,web|max:2048',
            'category_name' => 'required|string|max:255',
        ]);

        // Handel Photo Upload

        if($request->hasFile('photo')){

        
            $photo = $request->file('photo');
            $photoName = date('YmdHi') . $photo->getClientOriginalName();
            $photo->move(public_path('upload/admin_images'), $photoName);
            $validatedInput['photo'] = $photoName;

        }

        $category = Category::findOrFail($id);
        $category->update($validatedInput);

     
       
        return redirect()->route('admin.category.list')->with([
            'message' => 'Product Category updated successfully.',
            'alert-type' => 'success',
        ]);

        

    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.list')->with([
            'message' => 'Product Category deleted successfully.',
            'alert-type' => 'success',
        ]);
    }

   
   
   
        // Product Controller


    
    public function adminProductList()
    {   

        $categories = Category::all();
        $products = Product::all();
        return view('admin.product.admin_product_list', compact('products', ('categories')));

    }    


        
    public function addProduct()
    {
        $categories =Category::all();
        return view('admin.product.admin_add_product', compact('categories'));
    }

    public function storeProduct(Request $request)
    {

        // dd($request->all());


        $validatedInput = $request->validate([
            'photo' => 'nullable|image|mimes:png,jpg,jpeg,gif,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'discription' => 'required|string|max:65535',
        ]);

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photoName = date('YmdHi') . $photo->getClientOriginalName();
            $photo->move(public_path('upload/admin_images'), $photoName);
            $validatedInput['photo'] = $photoName;
        }

        Product::create($validatedInput);

        return redirect()->route('admin.product.list')->with([
            'message' => 'Product Added Successfully.',
            'alert-type' => 'success',
        ]);
    }

    public function viewProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.admin_product_single', compact('product'));
    }
    

  public function editProduct($id)
  {
    $categories = Category::all();
    $product = Product::all();
    return view('admin.product.admin_edit_product', compact('product', 'categories'));
  }
  
  public function updateProduct(Request $request, $id)
  {
    $validatedInput = $request->validate([
        'photo' => 'nullable|image|mimes:png,jpg,jpeg,gif,webp|max:2048',
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'stock' => 'required|integer|min:0',
        'discription' => 'required|string|max:65535',
    ]);

    if($request->hasFile('photo')){
        $photo = $request->file('photo');
        $photoName = date('YmdHi') . $photo->getClientOriginalName();
        $photo->move(public_path('upload/admin_images'), $photoName);
        $validatedInput['photo'] = $photoName;
    }

    $product = Product::findOrFail($id);
    $product = update($validatedInput);

    return redirect()->back()->with([
        'message' => 'Product Updated Successfully',
        'alert-type' => 'success',

    ]);
  }

  public function deleteProduct($id)
  {
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('admin.product.list')->with([
        'message' => 'Product Deleted Successfully.',
        'alert-type' => 'success',
    ]);
  }


  public function AdminOrder()
  {
      $orders = Order::with(['user', 'items.product', 'address'])->get();
      return view('admin.order.admin_order', compact('orders'));
  }


  public function AdminOrderView($order)
  {
      $order = Order::with('user', 'address', 'items.product')->findOrFail($order);
      return view('admin.order.admin_order_view', compact('order'));
  }
  
  
  public function updateStatus(Request $request, Order $order)
  {
      $request->validate([
          'status' => 'required|string|in:pending,processing,shipped,delivered,cancelled,returned',
      ]);

      $order->status = $request->status;
      $order->save();

      return redirect()->route('admin.order.view', $order->id)->with('success', 'Order status updated successfully.');
  }

  public function updatePaymentStatus(Request $request, Order $order)
  {
      $request->validate([
          'payment_status' => 'required|string|in:pending_payment,payment_due,paid,payment_failed,refunded',
      ]);

      $order->payment_status = $request->payment_status;
      $order->save();

      return redirect()->route('admin.order.view', $order->id)->with('success', 'Payment status updated successfully.');
  }


  public function CustomerReport(Request $request)
  {
      $query = User::has('orders')->withCount('orders')->with([
          'orders' => function ($q) use ($request) {
              if ($request->filled('order_number')) {
                  $q->where('order_number', $request->order_number);
              }
              if ($request->filled('date')) {
                  $q->whereDate('created_at', $request->date);
              }
          }
      ]);

      
      if ($request->filled('customer_name')) {
        $query->where(function ($q) use ($request) {
            $q->where('firstname', 'like', '%' . $request->customer_name . '%')
                ->orWhere('lastname', 'like', '%' . $request->customer_name . '%');
        });
    }

    $customers = $query->paginate(10);

    return view('admin.report.customer_report', compact('customers'));
}


public function CustomerAllOrders(Request $request, $customerId)
{
    $customer = User::findOrFail($customerId);

    $query = Order::with('user', 'address', 'items.product')->where('user_id', $customerId);

    if ($request->filled('order_number')) {
        $query->where('order_number', $request->order_number);
    }

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    if ($request->filled('month')) {
        $query->whereMonth('created_at', $request->month);
    }

    $orders = $query->get();

    return view('admin.report.customer_orders_report_view', compact('customer', 'orders'));
}


public function CustomerReportOrderView($order)
{
    $order = Order::with('user', 'address', 'items.product')->findOrFail($order);
    return view('admin.report.customer_report_single_order_view', compact('order'));
}

public function downloadCustomerOrdersPDF(Request $request, $customerId)
{
    $customer = User::with('address')->findOrFail($customerId);

    $query = Order::with(['items.product', 'address'])->where('user_id', $customerId);

    if ($request->filled('order_number')) {
        $query->where('order_number', $request->order_number);
    }

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    if ($request->filled('month')) {
        $query->whereMonth('created_at', $request->month);
    }

    $orders = $query->get();

    $pdf = PDF::loadView('admin.report.pdf', compact('customer', 'orders'));

    return $pdf->download('customer_orders_report.pdf');
}












    // ------------------------------------    API For Flutter    -------------------------


    public function GetCategories()
    {
        \Log::info('GetCategories method hit');

        $categories = Category::all();
        return response()->json($categories);
    }


    public function GetProducts()
    {
        \Log::info('GetProducts method hit');

        $products = Product::all();
        return response()->json($products);
    }


    

}