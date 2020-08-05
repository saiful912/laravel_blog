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
//    return view('welcome');
//});


Route::get('/','frontend\HomeController@home')->name('home');

Route::get('/products','frontend\HomeController@product')->name('products');
Route::get('/products/show/{id}','frontend\HomeController@products_show')->name('products.show');
Route::get('/categories/{id}','frontend\HomeController@category_show')->name('categories.show');
//carts route
Route::get('/carts','frontend\CartsController@index')->name('carts');
Route::post('/carts/store','frontend\CartsController@store')->name('carts.store');
Route::post('/carts/update/{id}','frontend\CartsController@update')->name('carts.update');
Route::post('/carts/delete/{id}','frontend\CartsController@destroy')->name('carts.delete');


//checkout
Route::get('/checkout','frontend\HomeController@checkout')->name('checkouts');
Route::post('/checkout/store','frontend\HomeController@checkout_store')->name('checkouts.store');
//register route

Route::get('/register','frontend\AuthController@showRegistrationFrom')->name('register');
Route::post('/register','frontend\AuthController@showprocessRegistration');

Route::get('/profile','frontend\AuthController@profile')->name('profile');
//login route
Route::get('/login','frontend\AuthController@login')->name('login');
Route::post('/login','frontend\AuthController@process_login');


//admin routes
Route::get('/admin','backend\AdminController@dashboard')->name('admin');
//categories route
Route::get('/admin/categories','backend\AdminCategoriesController@index')->name('admin.categories');
Route::get('/admin/categories/create','backend\AdminCategoriesController@create')->name('admin.categories.create');
Route::post('/admin/category/create','backend\AdminCategoriesController@store')->name('admin.categories.store');
Route::get('/admin/category/edit/{id}','backend\AdminCategoriesController@categories_edit')->name('admin.categories.edit');
Route::post('/admin/category/update/{id}','backend\AdminCategoriesController@category_update')->name('admin.categories.update');
Route::post('/admin/category/delete/{id}','backend\AdminCategoriesController@category_delete')->name('admin.categories.delete');

//products route
Route::get('/admin/products','backend\AdminProductsController@index')->name('admin.products');
Route::get('/admin/products/create','backend\AdminProductsController@create')->name('admin.products.create');
Route::post('/admin/product/create','backend\AdminProductsController@store')->name('admin.products.store');
Route::get('/admin/product/edit/{id}','backend\AdminProductsController@products_edit')->name('admin.products.edit');
Route::post('/admin/product/update/{id}','backend\AdminProductsController@product_update')->name('admin.products.update');
Route::post('/admin/products/delete/{id}','backend\AdminProductsController@product_delete')->name('admin.products.delete');
