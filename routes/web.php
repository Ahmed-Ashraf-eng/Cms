<?php

use Illuminate\Support\Facades\Mail;
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


Route::get('/user/verify/{token}' , 'UserController@verify')->name('verify');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//For Admins
Route::middleware(['auth' , 'admin'])->group(function (){
    Route::Resource('admin/user' , 'AdminController')->except(['create' , 'show']);
    Route::get('admin/{user}/is_active' , 'AdminController@is_active')->name('user.is_active');
    Route::get('admin/dashboard' , 'AdminController@dashboardView')->name('admin.dashboard');
    Route::get('/search-name' , 'AdminController@search')->name('admin.search');
});

// For only authenticated users and has no payment plan yet
Route::middleware(['auth' , 'check-payment'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
});


//For authenticated users only
Route::middleware(['auth'])->group(function (){
    Route::post('subscribe' , 'PaymentController@subscribe');
    Route::get('/payment' , 'PaymentController@payment')->name('user.payment');

});



Route::get('auth/{proviedr}', 'AuthSocController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthSocController@handleProviderCallback');
