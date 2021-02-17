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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', 'App\Http\Controllers\UsersController');
Route::resource('todo', 'App\Http\Controllers\Todo_listController');

Route::get('/login', 'App\Http\Controllers\Users_loginController@index');
// Route::post('/login/check', 'App\Http\Controllers\Users_loginController@checklogin');
// Route::get('login/success', 'App\Http\Controllers\Users_loginController@success');

// Route::get('users.edit/{id}', 'App\Http\Controllers\UsersController@edit');
// Route::get('users/create', 'App\Http\Controllers\UsersController@create');
// Route::get('users/store', 'App\Http\Controllers\UsersController@store');