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


Route::get('/','frontend\Homecontroller@home')->name('home');

Route::get('/products','frontend\Homecontroller@product')->name('products');
//register route

Route::get('/register','frontend\AuthController@showRegistrationFrom')->name('register');
Route::post('/register','frontend\AuthController@showprocessRegistration');

Route::get('/profile','frontend\AuthController@profile')->name('profile');
//login route
Route::get('/login','frontend\AuthController@login')->name('login');
Route::post('/login','frontend\AuthController@process_login');
