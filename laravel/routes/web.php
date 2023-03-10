<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/home', function () {
    return view('client.layouts.app');
});

Route::get('/dashboard', function () {
    return view('admin.layouts.app');
})->name('dashboard');

Auth::routes();

Route::resource('roles', RoleController::class);

Route::resource('users', UserController::class);
