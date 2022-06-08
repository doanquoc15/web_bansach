<?php

use Illuminate\Support\Facades\Route;

// front end
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');
Route::post('/tim-kiem','HomeController@search');

// back end
Route::get('/home-admin','AdminController@show_dashboard');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');

// account customer
Route::get('/all-customer','CustomerController@all_customer');

Route::get('/block-customer/{customer_id}','CustomerController@block_user');
Route::get('/active-customer/{customer_id}','CustomerController@active_user');
Route::get('/edit-customer/{customer_id}','CustomerController@edit_customer');
Route::post('/update-customer/{customer_id}','CustomerController@update_customer');

Route::get('/search-customer','CustomerController@search_customer');

// shipping account

Route::get('/all-shipping','ShipperController@all_shipping');
Route::post('/save-shipping','ShipperController@save_shipping');
Route::get('/add-shipping','ShipperController@add_shipping');

Route::get('/block-shipping/{shipping_id}','ShipperController@block_shipping');
Route::get('/active-shipping/{shipping_id}','ShipperController@active_shipping');
Route::get('/edit-shipping/{shipping_id}','ShipperController@edit_shipping');
Route::post('/update-shipping/{shipping_id}','ShipperController@update_shipping');

Route::get('/delete-shipping/{shipping_id}','ShipperController@delete_shipping');

Route::get('/search-shipping','ShipperController@search_shipping');

// Category product
Route::get('/add-category-product','CategoryController@add_category');
Route::get('/all-category-product','CategoryController@all_category');
Route::post('/save-category-product','CategoryController@save_category');
Route::get('/search-category','CategoryController@search_category');

Route::get('/unactive-category-product/{category_id}','CategoryController@unactive_category');
Route::get('/active-category-product/{category_id}','CategoryController@active_category');
Route::get('/edit-category-product/{category_id}','CategoryController@edit_category');
Route::post('/update-category-product/{category_id}','CategoryController@update_category');
Route::get('/delete-category-product/{category_id}','CategoryController@delete_category');

// Book Author product
Route::get('/add-book-author-product','BookAuthorController@add_book_author');
Route::get('/all-book-author-product','BookAuthorController@all_book_author');
Route::post('/save-book-author-product','BookAuthorController@save_book_author');
Route::get('/search-bookAuthor','BookAuthorController@search_bookAuthor');

Route::get('/unactive-book-author-product/{bookAuthor_id}','BookAuthorController@unactive_book_author');
Route::get('/active-book-author-product/{bookAuthor_id}','BookAuthorController@active_book_author');
Route::get('/edit-book-author-product/{bookAuthor_id}','BookAuthorController@edit_book_author');
Route::post('/update-book-author-product/{bookAuthor_id}','BookAuthorController@update_book_author');
Route::get('/delete-book-author-product/{bookAuthor_id}','BookAuthorController@delete_book_author');

// Product - Book
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/search-product','ProductController@search_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');

// manager order
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/edit-order/{order_id}','CheckoutController@edit_order');

Route::get('/details-order/{order_id}','CheckoutController@details_order');
Route::post('/update-order/{order_id}','CheckoutController@update_order');
Route::get('/delete-order/{order_id}','CheckoutController@delete_order');

// statistic over time
Route::get('/statistic-day','StatisticController@show_statistic_day');
Route::get('/statistic-by-the-time','StatisticController@show_statistic_time');

Route::get('/found-order-day','StatisticController@show_order_day');
Route::get('/found-order-time','StatisticController@show_order_time');

Route::get('/found-order-week','StatisticController@show_order_week');
Route::get('/found-order-month','StatisticController@show_order_month');
Route::get('/statistic-chart','StatisticController@statistic_chart');

Route::post('/export-day-statistic','StatisticController@export_day_statistic');
Route::post('/export-time-statistic','StatisticController@export_time_statistic');
Route::post('/export-time-statistic','StatisticController@export_time_statistic');



//Client

//Login facebook
Route::get('/loginCustomer-facebook','CheckoutController@login_facebook');
Route::get('/customer/callback','CheckoutController@callback_facebook');


//Product
Route::get('/danh-muc-san-pham/{slug_category_product}','CategoryController@show_category_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');


//BookAuthor
Route::get('/thuong-hieu-san-pham/{bookAuthor_slug}','BookAuthorController@show_brand_home');

//Cart
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');

//Checkout
Route::get('/loginCustomer-checkout','CheckoutController@login_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/loginCustomer-customer','CheckoutController@login_customer');
Route::get('/register-checkout','CheckoutController@change_register');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
Route::get('/taikhoan','CheckoutController@user_setting');
Route::get('/view-order-user/{orderId}','CheckoutController@view_order_user');
Route::get('/loginCustomer','CheckoutController@loginCustomer');

Route::get('/success','CheckoutController@success');

//
Route::get('/cap-nhat-user','HomeController@get_customer');
Route::post('/update-user','HomeController@update_user');

Route::get('/cap-nhat-pass','HomeController@show_update_pass');
Route::post('/update_pass_save','HomeController@update_pass_saver');


Route::post('/add-comment','CommentController@add_comment');
