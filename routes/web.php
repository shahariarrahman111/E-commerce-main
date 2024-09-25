<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [CustomerController::class, 'CustomerIndex'])->name('customer.index');
Route::get('/categories/{id}', [CustomerController::class, 'CustomerCategoryProduct'])->name('customer.category.product');
Route::get('/products', [CustomerController::class, 'CustomerProduct'])->name('customer.product');
Route::get('/product/{id}', [CustomerController::class, 'CustomerProductDetials'])->name('customer.product.details');
Route::get('/about-us', [CustomerController::class, 'CustomerAbout'])->name('customer.about');
Route::get('/contact', [CustomerController::class, 'CustomerContact'])->name('customer.contact');
Route::get('/wishlist', [CustomerController::class, 'CustomerWishList'])->name('customer.wishlist');
Route::get('/cart', [CustomerController::class, 'CustomerCart'])->name('customer.cart');

// SSLCOMMERZ Start
Route::get('/checkout1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/checkout2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

// Route::post('/success', [SslCommerzPaymentController::class, 'success']);
// Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
// Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

// Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
// //SSLCOMMERZ END


Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CustomerController::class, 'CustomerCheckout'])->name('customer.checkout');
    Route::get('/checkout/addresses', [CustomerController::class, 'showAddresses'])->name('myaccount.addresses');
    Route::post('/checkout/addresses/add', [CustomerController::class, 'addAddress'])->name('address.add');
    Route::post('/checkout/addresses/edit/{id}', [CustomerController::class, 'editAddress'])->name('address.edit');
    Route::post('/checkout/addresses/delete/{id}', [CustomerController::class, 'deleteAddress'])->name('address.delete');
    Route::post('/order', [CustomerController::class, 'OrderStore'])->name('order.store');
    Route::patch('/order/{order}/status', [CustomerController::class, 'updateStatus'])->name('order.updateStatus');
    Route::patch('/order/{order}/payment-status', [CustomerController::class, 'updatePaymentStatus'])->name('order.updatePaymentStatus');
    Route::get('/invoice', [CustomerController::class, 'CustomerInvoice'])->name('customer.invoice');
    Route::get('/myaccount', [CustomerController::class, 'CustomerMyaccount'])->name('customer.myaccount');
    Route::post('/update-profile', [CustomerController::class, 'updateProfile'])->name('update.profile');
    Route::post('/change-password', [CustomerController::class, 'changePassword'])->name('change.password');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});



// SSLCommerz routes
Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay.sslcommerz');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->name('pay.Via.ajax');
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


require __DIR__ . '/auth.php';



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/Profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/Profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // admin customer list

    Route::get('/customer-list', [AdminController::class, 'adminCustomerList'])->name('admin.customer.list');

    //  admin category  list

    Route::get('/category-list', [AdminController::class, 'adminCategoryList'])->name('admin.category.list');
    Route::get('/add-category', [AdminController::class, 'addCategory'])->name('admin.add.category');
    Route::post('/store-category', [AdminController::class, 'storeCategory'])->name('admin.store.category');
    // Route::get('/view-category', [AdminController::class, 'viewCategory'])->name('admin.view.category');
    Route::get('/edit-category/{id}', [AdminController::class, 'editCaregory'])->name('admin.edit.category');
    Route::put('/update-category/{id}', [AdminController::class, 'updateCategory'])->name('admin.update.category');
    Route::delete('/delete-category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.delete.category');

    

    // Admin Product List......

    Route::get('/product-list', [AdminController::class, 'adminProductList'])->name('admin.product.list');
    Route::get('/add-product', [AdminController::class, 'addProduct'])->name('admin.add.product');
    Route::post('/store-product', [AdminController::class, 'storeProduct'])->name('admin.store.product');
    Route::get('/view/product/{id}', [AdminController::class, 'viewProduct'])->name('admin.view.product');
    Route::get('/edit/product/{id}', [AdminController::class, 'editProduct'])->name('admin.edit.product');
    Route::put('/update/product/{id}', [AdminController::class, 'updateProduct'])->name('admin.update.product');
    Route::delete('/delete/product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.delete.product');


    Route::get('/admin/orders', [AdminController::class, 'AdminOrder'])->name('admin.order');
    Route::get('/admin/order/view/{order}', [AdminController::class, 'AdminOrderView'])->name('admin.order.view');

    Route::patch('/admin/orders/{order}/status', [AdminController::class, 'updateStatus'])->name('admin.order.updateStatus');
    Route::patch('/admin/orders/{order}/payment-status', [AdminController::class, 'updatePaymentStatus'])->name('admin.order.updatePaymentStatus');




    
    // Admin Report
    Route::get('/admin/report', [AdminController::class, 'CustomerReport'])->name('customer.report');
    Route::get('/admin/report/order/{order}', [AdminController::class, 'CustomerAllOrders'])->name('customer.report.all.orders');
    Route::get('/admin/report/{customer}', [AdminController::class, 'CustomerReportOrderView'])->name('customer.report.order.view');

    Route::get('admin/report/{customerId}/pdf', [AdminController::class, 'downloadCustomerOrdersPDF'])->name('customer.report.pdf');









});


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');