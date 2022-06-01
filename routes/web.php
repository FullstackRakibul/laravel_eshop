<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('basePage');
//});


// frontend URLs......................

Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('about/','App\Http\Controllers\AboutController@about');
Route::get('contact/','App\Http\Controllers\ContactController@about');
Route::get('product-details/{product_id}','App\Http\Controllers\ProductDetailsController@product_details');

Route::get('shop/','App\Http\Controllers\ShopController@shop');
Route::get('checkout/','App\Http\Controllers\CheckoutController@checkout');

Route::get('login/','App\Http\Controllers\CustomerController@log_in');
Route::post('signin/','App\Http\Controllers\CustomerController@sign_in');

Route::get('logout-customer/','App\Http\Controllers\CustomerController@logout');

Route::get('registration/','App\Http\Controllers\CustomerController@registrations');
Route::post('signup/','App\Http\Controllers\CustomerController@signup');




Route::get('gmap/','App\Http\Controllers\HomeController@gmap');



// category products ....................
Route::get('category-product/{category_id}','App\Http\Controllers\HomeController@category_product');

// brand products ....................
Route::get('brand-product/{brand_id}','App\Http\Controllers\HomeController@brand_product');


// Add to cart ..................................
Route::post('add-to-cart/','App\Http\Controllers\CartController@add_to_cart');
Route::get('show-cart/','App\Http\Controllers\CartController@show_cart');
Route::get('remove-from-cart/{rowID}','App\Http\Controllers\CartController@remove_from_cart');
Route::post('update-cart/','App\Http\Controllers\CartController@update_cart');


// shipping.....................................
Route::post('save-shipping/','App\Http\Controllers\CartController@save_shipping');


//  Payment...................................
Route::get('payment/','App\Http\Controllers\CartController@payment');


//  Order .............................
Route::post('order-place/','App\Http\Controllers\CartController@order_place');




Route::get('thankyou/','App\Http\Controllers\CartController@thankyou');












// backend URLs......................

Route::get('dashboard/','App\Http\Controllers\SuperAdminController@dashboard');
Route::get('panel/','App\Http\Controllers\PanelController@panel');
Route::get('logout/','App\Http\Controllers\SuperAdminController@logout');
Route::post('panel_dashboard/','App\Http\Controllers\PanelController@panel_dashboard');

// categories .....................

Route::get('add-category/','App\Http\Controllers\CategoryController@add_category');
Route::get('all-category/','App\Http\Controllers\CategoryController@all_category');
Route::post('save-category/','App\Http\Controllers\CategoryController@save_category');
Route::get('inactive-category/{category_id}','App\Http\Controllers\CategoryController@inactive_category');
Route::get('active-category/{category_id}','App\Http\Controllers\CategoryController@active_category');
Route::get('edit-category/{category_id}','App\Http\Controllers\CategoryController@edit_category');
Route::post('update-category/{category_id}','App\Http\Controllers\CategoryController@update_category');
Route::get('delete-category/{category_id}','App\Http\Controllers\CategoryController@delete_category');


// Brands .....................

Route::get('add-brand/','App\Http\Controllers\BrandController@add_brand');
Route::get('all-brand/','App\Http\Controllers\BrandController@all_brand');
Route::post('save-brand/','App\Http\Controllers\BrandController@save_brand');
Route::get('inactive-brand/{brand_id}','App\Http\Controllers\BrandController@inactive_brand');
Route::get('active-brand/{brand_id}','App\Http\Controllers\BrandController@active_brand');
Route::get('edit-brand/{brand_id}','App\Http\Controllers\BrandController@edit_brand');
Route::post('update-brand/{brand_id}','App\Http\Controllers\BrandController@update_brand');
Route::get('delete-brand/{brand_id}','App\Http\Controllers\BrandController@delete_brand');


// products ...........................

Route::get('add-product/','App\Http\Controllers\ProductController@add_product');
Route::post('save-product/','App\Http\Controllers\ProductController@save_product');
Route::get('all-product/','App\Http\Controllers\ProductController@all_product');
Route::get('inactive-product/{product_id}','App\Http\Controllers\ProductController@inactive_product');
Route::get('active-product/{product_id}','App\Http\Controllers\ProductController@active_product');
Route::get('edit-product/{product_id}','App\Http\Controllers\ProductController@edit_product');
Route::post('update-product/{product_id}','App\Http\Controllers\ProductController@update_product');
Route::get('delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');


// Slider ....................................

Route::get('add-slider/','App\Http\Controllers\SliderController@add_slider');
Route::get('all-slider/','App\Http\Controllers\SliderController@all_slider');
Route::post('save-slider/','App\Http\Controllers\SliderController@save_slider');
Route::get('inactive-slider/{slider_id}','App\Http\Controllers\SliderController@inactive_slider');
Route::get('active-slider/{slider_id}','App\Http\Controllers\SliderController@active_slider');
Route::get('delete-slider/{slider_id}','App\Http\Controllers\SliderController@delete_slider');


// Manage order.................
Route::get('manage-order/','App\Http\Controllers\OrderManagerController@manage_order');
Route::get('order-details/{order_id}','App\Http\Controllers\OrderManagerController@order_details');


