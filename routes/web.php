<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\Category\NewslaterController;
use App\Http\Controllers\Admin\Product\ProductController;

Route::get('/', function () {return view('pages/index');});
//auth & user
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

// admin 
// categories 

Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@StoreCategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@DeleteCategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@EditCategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@UpdateCategory');
// brands 
Route::get('admin/brands', 'Admin\Category\BrandController@brands')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@StoreBrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@DeleteBrand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@EditBrand');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@UpdateBrand');

// sub_category
Route::get('admin/sub/category', 'Admin\Category\SubCategoryController@SubCategory')->name('sub.category');
Route::post('admin/store/subcategory', 'Admin\Category\SubCategoryController@StoreSubCategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\SubCategoryController@DeleteSubCategory');
Route::get('edit/subcategory/{id}', 'Admin\Category\SubCategoryController@EditSubCategory');
Route::post('update/subcategory/{id}', 'Admin\Category\SubCategoryController@UpdateSubCategory');




// COUPONS 
Route::get('admin/sub/coupon', 'Admin\Category\CouponController@Coupon')->name('coupons');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@StoreCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\Category\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}', 'Admin\Category\CouponController@EditCoupon');
Route::post('update/coupon/{id}', 'Admin\Category\CouponController@UpdateCoupon');

// newslater 
Route::get('admin/newslater', 'Admin\Category\NewslaterController@Newslater')->name('newslater');
Route::get('delete/newslater/{id}', 'Admin\Category\NewslaterController@DeleteNewslater');
// show sub category in product page 
Route::get('get/subcategory/{category_id} ', 'Admin\Product\ProductController@GetSubCat');
// products  
Route::get('admin/product/all', 'Admin\Product\ProductController@index')->name('all.product');
Route::get('admin/product/create', 'Admin\Product\ProductController@Create')->name('create.product');
Route::post('admin/store/product', 'Admin\Product\ProductController@StoreProduct')->name('store.product');
Route::get('inactive/product/{id}', 'Admin\Product\ProductController@InactiveProduct');
Route::get('active/product/{id} ', 'Admin\Product\ProductController@ActiveProduct');
Route::get('delete/product/{id}',  'Admin\Product\ProductController@DeleteProduct');
Route::get('edit/product/{id}', 'Admin\Product\ProductController@EditProduct');
Route::get('show/product/{id}', 'Admin\Product\ProductController@ShowProduct');
Route::get('edit/product/{id}', 'Admin\Product\ProductController@EditProduct');
Route::post('update/product/withoutimg/{id}', 'Admin\Product\ProductController@UpdateProductWithoutimg');
Route::post('update/product/img/{id}', 'Admin\Product\ProductController@UpdateProductimg');

// Blog Section 
Route::get('admin/post/category', 'Admin\PostController@PostCat')->name('blog.category');
Route::get('admin/post/list', 'Admin\PostController@PostList')->name('post.list');
Route::get('admin/blog/post', 'Admin\PostController@BlogPost')->name('add.post');
Route::post('admin/add/post', 'Admin\PostController@AddPost')->name('store.blogpost');
Route::post('admin/store/post/category', 'Admin\PostController@StorePostCategory')->name('store.post_category');
Route::get('delete/post/category/{id}',  'Admin\PostController@DeletePostCategory');
Route::get('edit/post/category/{id}',  'Admin\PostController@EditPostCategory');
Route::post('update/post/category/{id}',  'Admin\PostController@UpdatePostCategory');
Route::get('edit/postlist/{id}',  'Admin\PostController@EditPostList');
Route::get('delete/blog/post/{id}',  'Admin\PostController@DeletePostBlog');
Route::post('update/blog/post/{id}', 'Admin\PostController@UpdateBlogPost');



// FrontEnd All Routes 
Route::post('store/newslater', 'Frontend\FrontController@StoreNewslater')->name('store.newslater');
// wishlist 
Route::get('add/wishlist/{id} ', 'WishlistController@AddWishlist');
Route::get('show/wishlist', 'WishlistController@ShowWishlist')->name('show.wishlist');
// Add to cart 
Route::get('add/cart/{id} ', 'CartController@addtocart');
Route::get('check', 'CartController@check');
Route::get('remove/cart/{rowId}', 'CartController@RemoveCart');
Route::get('show/cart', 'CartController@ShowCart')->name('show.cart');
Route::post('update/cart', 'CartController@UpdateCart')->name('update.cart');
Route::post('insert/into/cart', 'CartController@insertintocart')->name('insert.into.cart');
Route::get('cart/checkout', 'CartController@CheckOut')->name('checkout.cart');
Route::get('/cart/product/view/{id} ', 'CartController@ViewProduct');
Route::get('remove/coupon ', 'CartController@RemoveCoupon');
Route::post('user/apply/coupon', 'CartController@ApplyCoupon')->name('apply.coupon');


// product details 
Route::get('product/details/{id}/{product_name}', 'ProductController@ProductDetail');
Route::post('add/tocart/product/{id}', 'ProductController@AddCart');
Route::get('products/{id}', 'ProductController@SubProduct');
Route::get('cat/products/{id}', 'ProductController@CatProduct');

// blog post 
Route::get('blog/en-un/post', 'BlogController@postsBlog')->name('blog.post'); 
Route::get('blog/post/en', 'BlogController@English')->name('lang.english'); 
Route::get('blog/post/ur', 'BlogController@Urdu')->name('lang.urdu'); 
Route::get('blog/single/{id}', 'BlogController@BlogSingle'); 


// payment.method
Route::get('blog/post/ur', 'CartController@PaymentPage')->name('payment.page'); 
Route::post('payment/process', 'PaymentController@PaymentProcess')->name('payment.process'); 
// Route::get('checkout','PaymentController@checkout');
Route::post('stripe/payment','PaymentController@stripePyament')->name('stripe.charge');
// Route::post('stripe/payment', [PaymentController::class,'stripePyament'])->name("stripe.post");

// order admin panel 
Route::get('admin/new/orders', 'Admin\orderController@neworder')->name('order.neworder'); 
Route::get('admin/view/order/{id}', 'Admin\orderController@Vieworder'); 
// Route::get('admin/view/order_details/{id}', 'Admin\orderController@ViewDetails'); 
Route::get('admin/payment/accept/{id}', 'Admin\orderController@AcceptPayment'); 
Route::get('admin/payment/cancel/{id}', 'Admin\orderController@CancelPayment'); 
Route::get('admin/orders/pending-payment', 'Admin\orderController@neworder')->name('pending.payment'); 
Route::get('admin/orders/accepted-payment', 'Admin\orderController@acceptedPay')->name('accepted.payment'); 
Route::get('admin/orders/progress-payment', 'Admin\orderController@progressPay')->name('progress.payment'); 
Route::get('admin/orders/delivered-order', 'Admin\orderController@deliveredOr')->name('delivered.order'); 
Route::get('admin/orders/cancel-order', 'Admin\orderController@cancelOr')->name('cancel.order'); 
Route::get('admin/order/delivery/{id}', 'Admin\orderController@processDel'); 
Route::get('admin/order/delivery/done/{id}', 'Admin\orderController@deliverDone'); 

// Reports 
Route::get('admin/reports/today-report', 'Admin\ReportController@TodayReport')->name('today.order'); 
Route::get('admin/reports/month-report', 'Admin\ReportController@MonthReport')->name('month.order'); 
Route::get('admin/reports/deliverd-orders', 'Admin\ReportController@Deliverd')->name('deliverd.order'); 


// admin user role 
Route::get('admin/user-role', 'Admin\UserRoleController@UserRole')->name('user.role'); 
Route::get('admin/new/user-role', 'Admin\UserRoleController@NewUserRole')->name('new.user'); 
Route::post('admin/add/new/user-role', 'Admin\UserRoleController@AddUser')->name('store.user'); 
Route::get('delete/admin/{id}', 'Admin\UserRoleController@DeleteUser'); 
Route::get('edit/admin/{id}', 'Admin\UserRoleController@EditUser'); 
Route::post('admin/update/user-role', 'Admin\UserRoleController@UpdateUser')->name('update.user'); 


// Return orders 

Route::get('return/order', 'HomeController@ReturnOrder')->name('success.orderlist');
Route::get('return/order/{id}', 'HomeController@RequestReturn');
Route::get('admin/return/request', 'Admin\ReturnController@ReturnRequest')->name('return.request'); 
Route::get('admin/all_return/request', 'Admin\ReturnController@AllReturn')->name('all.return'); 
Route::get('admin/accept/return_request/{id}', 'Admin\ReturnController@AcceptRequest'); 

// stock
Route::get('admin/product/stock', 'Admin\UserRoleController@Stock')->name('stock');


// contact page
Route::get('contact/page', 'ContactController@ContactPage')->name('contact.page');
Route::post('contact/form', 'ContactController@ContactForm')->name('contact.form');
Route::get('admin/contact/message', 'ContactController@ContactMessage')->name('all.message');

// serch product 
Route::post('search/product/', 'ProductController@SearchProduct')->name('search.product');


// Socialite 

Route::get('auth/redirect/{provider}', 'GoogleController@redirect');
 Route::get('/callback/{provider}', 'GoogleController@callback');


 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
