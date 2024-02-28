<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontendController@index');
Route::get('san-pham', 'FrontendController@san_pham');
Route::get('san-pham-noi-bat', 'FrontendController@san_pham_noi_bat');
Route::get('san-pham/{slug}', 'FrontendController@san_pham');
Route::get('tim-kiem-san-pham', 'FrontendController@tim_kiem_san_pham');
Route::post('tim-kiem-san-pham', 'FrontendController@tim_kiem_san_pham');
Route::get('chi-tiet-san-pham/{slug}', 'FrontendController@chi_tiet_san_pham');
Route::get('tin-tuc-su-kien', 'FrontendController@category');
Route::get('tin-tuc-su-kien/{slug}', 'FrontendController@category');
Route::get('chi-tiet-tin-tuc', 'FrontendController@article');
Route::get('chi-tiet-tin-tuc/{slug}', 'FrontendController@article');
Route::get('doanh-nghiep', 'FrontendController@sellers');
Route::get('doanh-nghiep/{slug}', 'FrontendController@seller_products');
Route::get('doanh-nghiep/gioi-thieu/{slug}', 'FrontendController@seller_intro');
Route::get('lien-he', 'FrontendController@lien_he');
Route::get('dang-nhap', 'FrontendController@login');
Route::post('dang-nhap', 'FrontendController@login_submit');
Route::get('dang-xuat', 'CustomerController@logout');
Route::get('tai-khoan', 'FrontendController@account');
Route::post('dang-ky-tai-khoan', 'CustomerController@create');
Route::get('gio-hang', 'FrontendController@cart');
Route::get('thanh-toan', 'FrontendController@cart');
Route::post('thanh-toan', 'FrontendController@checkout');
Route::get('xem-don-hang', 'FrontendController@orders');
Route::get('xem-don-hang/{id}', 'FrontendController@order');
Route::get('gia-ca-thi-truong','FrontendController@gia_ca_thi_truong');
Route::get('gia-ca-thi-truong/download/{id}','FrontendController@gia_ca_thi_truong_download');
Route::get('gia-ca-thi-truong/view/{id}','FrontendController@gia_ca_thi_truong_view');
Route::post('mail-list/register', 'MailListController@register');
Route::get('logistic','FrontendController@logistic');
Route::get('logistic-detail/{id}','FrontendController@logistic_detail');
Route::get('logistic-download/{id}/{key}','FrontendController@logistic_download');
Route::get('diem-mua-sam-dat-chuan/{slug}','FrontendController@shopping_detail');
Route::get('diem-mua-sam-dat-chuan','FrontendController@shopping');

Route::get('flash-sale', 'FrontendController@flash_sale');
Route::get('flash-sale-soon', 'FrontendController@flash_sale_soon');
//page
Route::get('gioi-thieu', 'PageController@quy_che_hoat_dong');
Route::get('huong-dan-mua-hang', 'PageController@quy_che_hoat_dong');
Route::get('quy-che-hoat-dong', 'PageController@quy_che_hoat_dong');
Route::get('chinh-sach-bao-hanh', 'PageController@chinh_sach_bao_hanh');
Route::get('quy-trinh-thanh-toan', 'PageController@quy_trinh_thanh_toan');
Route::get('chinh-sach-bao-mat-thong-tin', 'PageController@chinh_sach_bao_mat_thong_tin');
Route::get('quy-trinh-xu-ly-tranh-chap', 'PageController@quy_trinh_xu_ly_tranh_chap');
Route::get('chinh-sach-giao-nhan-van-chuyen', 'PageController@chinh_sach_giao_nhan_van_chuyen');

Route::post('cart/update', 'FrontendController@update_cart');
Route::get('cart/add/{id_product}/{quantity}', 'FrontendController@add_cart');
Route::get('cart/remove/{id_product}', 'FrontendController@remove_cart');

Route::get('auth/login', 'AuthController@getLogin');
Route::get('auth/logout', 'AuthController@logout');
Route::post('auth/login', 'AuthController@authenticate');
Route::get('auth/not-permis', 'AuthController@notPermis');
Route::post('image/uploads', 'ImageController@uploads');
Route::get('image/delete/{filename}', 'ImageController@delete');
Route::post('file/uploads', 'FileController@uploads');
Route::post('file/uploads-minh-chung', 'FileController@uploads_minh_chung');
Route::post('file/uploads/report', 'FileController@uploads_report');
Route::get('file/delete/{filename}', 'FileController@delete');
Route::get('file/download/{filename}', 'FileController@download');
Route::get('address/get/{id}', 'AddressController@getOptions');
Route::get('address/get/{id}/{id1}', 'AddressController@getOptions1');
Route::get('slug/{str}', 'ObjectController@getSlug');

Route::group(['prefix' => 'admin',  'middleware' => 'checkauth'], function(){
	Route::get('/', 'AuthController@admin')->middleware('role:Admin,Manager,Seller');
    Route::get('dashboard', 'ReportController@dashboard')->middleware('role:Admin,Manager,Seller');
    Route::get('mail-list', 'MailListController@mail_list')->middleware('role:Admin,Manager,Seller');
    Route::get('mail-list/delete/{id}', 'MailListController@delete')->middleware('role:Admin,Manager,Seller');
    Route::get('product-category', 'ProductCategoryController@list')->middleware('role:Admin');
    Route::get('product-category/edit/{id}', 'ProductCategoryController@edit')->middleware('role:Admin');
    Route::get('product-category/edit/{id}/{id_parent}/{level}', 'ProductCategoryController@edit')->middleware('role:Admin');
    Route::get('product-category/delete/{id}', 'ProductCategoryController@delete')->middleware('role:Admin');
    Route::get('product-category/delete/{id}/{id_parent}/{level}', 'ProductCategoryController@delete')->middleware('role:Admin');
    Route::get('product-category/{id_parent}/{level}', 'ProductCategoryController@list')->middleware('role:Admin');
    Route::get('product-category/add', 'ProductCategoryController@add')->middleware('role:Admin');
    Route::get('product-category/add/{id_parent}/{level}', 'ProductCategoryController@add');
    Route::post('product-category/create', 'ProductCategoryController@create')->middleware('role:Admin');
    Route::post('product-category/update', 'ProductCategoryController@update')->middleware('role:Admin');

    Route::get('product', 'ProductController@list')->middleware('role:Admin,Seller,Manager');
    Route::get('product/add', 'ProductController@add')->middleware('role:Admin,Seller,Manager');
    Route::post('product/create', 'ProductController@create')->middleware('role:Admin,Seller,Manager');
    Route::get('product/edit/{id}', 'ProductController@edit')->middleware('role:Admin,Seller,Manager');
    Route::post('product/update', 'ProductController@update')->middleware('role:Admin,Seller,Manager');
    Route::get('product/delete/{id}', 'ProductController@delete')->middleware('role:Admin,Seller,Manager');
    Route::get('product/update-status/{id}', 'ProductController@update_status')->middleware('role:Admin,Seller,Manager');
    Route::get('product/{id}', 'ProductController@list')->middleware('role:Admin,Seller,Manager');

    Route::get('customer', 'CustomerController@list')->middleware('role:Admin,Seller,Manager');
    Route::get('customer/add', 'CustomerController@add')->middleware('role:Admin,Seller,Manager');
    Route::post('customer/create', 'CustomerController@create')->middleware('role:Admin,Seller,Manager');
    Route::get('customer/edit/{id}', 'CustomerController@edit')->middleware('role:Admin,Seller,Manager');
    Route::post('customer/update', 'CustomerController@update')->middleware('role:Admin,Seller,Manager');
    Route::get('customer/delete/{id}', 'CustomerController@delete')->middleware('role:Admin,Seller,Manager');
    Route::get('customer/update-status/{id}', 'CustomerController@update_status')->middleware('role:Admin,Seller,Manager');
    Route::get('customer/{status}', 'CustomerController@list')->middleware('role:Admin,Seller,Manager');

    Route::get('seller', 'SellerController@list')->middleware('role:Admin,Seller,Manager');
    Route::get('seller/add', 'SellerController@add')->middleware('role:Admin,Seller,Manager');
    Route::post('seller/create', 'SellerController@create')->middleware('role:Admin,Seller,Manager');
    Route::get('seller/edit/{id}', 'SellerController@edit')->middleware('role:Admin,Seller,Manager');
    Route::post('seller/update', 'SellerController@update')->middleware('role:Admin,Seller,Manager');
    Route::get('seller/delete/{id}', 'SellerController@delete')->middleware('role:Admin,Seller,Manager');
    Route::get('seller/update-status/{id}', 'SellerController@update_status')->middleware('role:Admin,Seller,Manager');
    Route::get('seller/{status}', 'SellerController@list')->middleware('role:Admin,Seller,Manager');

    Route::get('order', 'OrderController@list')->middleware('role:Admin,Seller,Manager');
    Route::get('order/{status}', 'OrderController@list_status')->middleware('role:Admin,Seller,Manager');
    Route::get('order/detail/{id}', 'OrderController@detail')->middleware('role:Admin,Seller,Manager');
    Route::post('order/update-status', 'OrderController@update_status')->middleware('role:Admin,Seller,Manager');
    Route::get('order/invoice/{id}', 'OrderController@invoice')->middleware('role:Admin,Seller,Manager');
    Route::get('order/delete/{id}', 'OrderController@delete')->middleware('role:Admin,Seller,Manager');

	Route::get('user', 'UserController@list')->middleware('role:Admin');
    Route::get('user/change-password', 'UserController@change_password')->middleware('checkauth');
    Route::post('user/update-password', 'UserController@update_password')->middleware('checkauth');
    Route::get('user/add', 'UserController@add')->middleware('role:Admin');
    Route::post('user/create', 'UserController@create')->middleware('role:Admin');
    Route::get('user/edit/{id}', 'UserController@edit')->middleware('role:Admin');
    Route::post('user/update', 'UserController@update')->middleware('role:Admin');
    Route::get('user/delete/{id}', 'UserController@delete')->middleware('role:Admin');

    Route::get('address', 'AddressController@list')->middleware('role:Admin');
    Route::get('address/{id}', 'AddressController@list')->middleware('role:Admin');
    Route::get('address/add', 'AddressController@add')->middleware('role:Admin');
    Route::post('address/create', 'AddressController@create')->middleware('role:Admin');
    Route::get('address/edit', 'AddressController@edit')->middleware('role:Admin');
    Route::post('address/update', 'AddressController@update')->middleware('role:Admin');

    Route::get('category', 'CategoryController@index')->middleware('role:Admin');
    Route::get('category/add', 'CategoryController@add')->middleware('role:Admin');
    Route::get('category/edit/{id}', 'CategoryController@edit')->middleware('role:Admin');
    Route::post('category/create', 'CategoryController@create')->middleware('role:Admin');
    Route::post('category/update', 'CategoryController@update')->middleware('role:Admin');
    Route::get('category/delete/{id}', 'CategoryController@delete')->middleware('role:Admin');
    Route::get('category/{slug}', 'CategoryController@list')->middleware('checkauth');

    Route::get('article', 'ArticleController@index')->middleware('role:Admin');
    Route::get('article/add', 'ArticleController@add')->middleware('role:Admin');
    Route::get('article/edit/{id}', 'ArticleController@edit')->middleware('role:Admin');
    Route::post('article/create', 'ArticleController@create')->middleware('role:Admin');
    Route::post('article/update', 'ArticleController@update')->middleware('role:Admin');
    Route::get('article/delete/{id}', 'ArticleController@delete')->middleware('role:Admin');
    Route::get('article/{slug}', 'ArticleController@detail')->middleware('checkauth');
    Route::get('article/download/{id}/{key}', 'ArticleController@download')->middleware('checkauth');
    Route::get('promotion', 'PromotionController@index')->middleware('role:Seller,Manager,Admin');
    Route::get('promotion/add', 'PromotionController@add')->middleware('role:Seller,Manager,Admin');
    Route::get('promotion/edit/{id}', 'PromotionController@edit')->middleware('role:Seller,Manager,Admin');
    Route::post('promotion/create', 'PromotionController@create')->middleware('role:Seller,Manager,Admin');
    Route::post('promotion/update', 'PromotionController@update')->middleware('role:Seller,Manager,Admin');
    Route::get('promotion/delete/{id}', 'PromotionController@delete')->middleware('role:Seller,Manager,Admin');
    Route::get('market-price', 'MarketPriceController@index')->middleware('role:Manager,Admin');
    Route::get('market-price/add', 'MarketPriceController@add')->middleware('role:Manager,Admin');
    Route::post('market-price/create', 'MarketPriceController@create')->middleware('role:Manager,Admin');
    Route::get('market-price/delete/{id}', 'MarketPriceController@delete')->middleware('role:Manager,Admin');
    Route::post('market-price/update', 'MarketPriceController@update')->middleware('role:Manager,Admin');
    Route::get('market-price/edit/{id}', 'MarketPriceController@edit')->middleware('role:Manager,Admin');

    Route::get('logistic', 'LogisticController@index')->middleware('role:Manager,Admin');
    Route::get('logistic/add', 'LogisticController@add')->middleware('role:Manager,Admin');
    Route::post('logistic/create', 'LogisticController@create')->middleware('role:Manager,Admin');
    Route::get('logistic/delete/{id}', 'LogisticController@delete')->middleware('role:Manager,Admin');
    Route::post('logistic/update', 'LogisticController@update')->middleware('role:Manager,Admin');
    Route::get('logistic/edit/{id}', 'LogisticController@edit')->middleware('role:Manager,Admin');

    Route::get('shopping', 'ShoppingController@index')->middleware('role:Manager,Admin');
    Route::get('shopping/add', 'ShoppingController@add')->middleware('role:Manager,Admin');
    Route::post('shopping/create', 'ShoppingController@create')->middleware('role:Manager,Admin');
    Route::get('shopping/delete/{id}', 'ShoppingController@delete')->middleware('role:Manager,Admin');
    Route::post('shopping/update', 'ShoppingController@update')->middleware('role:Manager,Admin');
    Route::get('shopping/edit/{id}', 'ShoppingController@edit')->middleware('role:Manager,Admin');

    Route::get('logs', 'LogController@index')->middleware('role:Admin');
    Route::get('logs/datatable', 'LogController@datatable')->middleware('role:Admin');
});