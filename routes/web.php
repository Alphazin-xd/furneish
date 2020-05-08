<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index')->name('admin.home');
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


// Admin section -Categories
Route::get('admin/categories', 'Admin\Category\CategoryController@index')->name('categories.index');
Route::post('admin/category/store', 'Admin\Category\CategoryController@store')->name('category.store');
Route::get('admin/category/delete/{id}', 'Admin\Category\CategoryController@delete')->name('category.delete');
Route::get('admin/category/edit/{id}', 'Admin\Category\CategoryController@edit')->name('category.edit');
Route::put('admin/category/update/{id}', 'Admin\Category\CategoryController@update')->name('category.update');

// Admin section -Brands
Route::get('admin/brands', 'Admin\Category\BrandController@index')->name('brands.index');
Route::post('admin/brands/store', 'Admin\Category\BrandController@store')->name('brand.store');
Route::get('admin/brands/delete/{id}', 'Admin\Category\BrandController@delete')->name('brand.delete');
Route::get('admin/brands/edit/{id}', 'Admin\Category\BrandController@edit')->name('brand.edit');
Route::put('admin/brands/update/{id}', 'Admin\Category\BrandController@update')->name('brand.update');


// Admin section - Sub Categories
Route::get('admin/sub/category', 'Admin\Category\SubCategoryController@index')->name('sub.categories.index');
Route::post('admin/sub/category/store', 'Admin\Category\SubCategoryController@store')->name('sub.category.store');
Route::get('admin/sub/category/delete{id}', 'Admin\Category\SubCategoryController@delete')->name('sub.category.delete');
Route::get('admin/sub/category/edit/{id}', 'Admin\Category\SubCategoryController@edit')->name('sub.category.edit');
Route::put('admin/sub/category/update/{id}', 'Admin\Category\SubCategoryController@update')->name('sub.category.update');

// Admin section - Coupons
Route::get('admin/coupons', 'Admin\Category\CouponController@index')->name('admin.coupons.index');
Route::post('admin/coupon/store', 'Admin\Category\CouponController@store')->name('admin.coupon.store');
Route::get('admin/coupon/delete/{id}', 'Admin\Category\CouponController@delete')->name('admin.coupon.delete');
Route::get('admin/coupon/edit/{id}', 'Admin\Category\CouponController@edit')->name('admin.coupon.edit');
Route::put('admin/coupon/update/{id}', 'Admin\Category\CouponController@update')->name('admin.coupon.update');


















