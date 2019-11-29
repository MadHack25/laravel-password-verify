<?php

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

Auth::routes();
//Next
Auth::routes(['verify' => true]); 

/** Don`t Allow Users if they Are Authorised But Haven`t Changed Password */

Route::get('/', function(){
    return redirect()->route('home');
});
Route::get('/home', 'HomeController@home')->name('home');

/** Change Password After Email Activation */
Route::get('/change', 'PasswordController@changePass');
Route::post('/change', 'PasswordController@updatePass')->name('updatePass');
