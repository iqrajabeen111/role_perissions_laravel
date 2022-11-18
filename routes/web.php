<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
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
////users/////
Route::get('/', [UserController::class, 'index']);  
Route::resource('users', UserController::class);
////roles/////
Route::resource('roles', RoleController::class);
////Permission/////
Route::resource('permissions', PermissionController::class);