<?php

use App\Models\users;
use App\Models\todo_lists;

use App\Http\Controllers\UserLoginApiController;

use App\Http\Controllers\UsersApiController;
use App\Http\Controllers\TodoApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//user login
Route::post('/login', [UserLoginApiController::class, 'login']);

//user session
Route::get('/sess', [UserLoginApiController::class, 'set_sess']);

//user logout
Route::get('/logout', [UserLoginApiController::class, 'logout']);

Route::get('/logout', function() {
    Session::forget('user_id');
     if(!Session::has('user_id'))
      {
         return "login";
      }
    });

//users
Route::get('/users', [UsersApiController::class, 'index']);
Route::post('/users', [UsersApiController::class, 'store']);
Route::put('/users/{id}', [UsersApiController::class, 'update']);
Route::delete('/users/{id}', [UsersApiController::class, 'destroy']);


//todo_lists
Route::get('/todo', [TodoApiController::class, 'index']);
Route::post('/todo', [TodoApiController::class, 'store']);
Route::put('/todo/{id}', [TodoApiController::class, 'update']);
Route::delete('/todo/{id}', [TodoApiController::class, 'destroy']);
