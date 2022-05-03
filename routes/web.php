<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;//to import MainController class

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

//To create save route(in relationship with register route)
Route::post('/auth/save', [MainController::class, 'save'])->name('auth.save');


//To create a check route(in relationship with login route)
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');


//To create the logout route
Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');


//Move all the routes that need to be protected by the AuthCheck middleware inside
Route::group(['middleware' => ['AuthCheck']], function(){
    //To create login route
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
    
    //To create register route
    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
    
    //To create the admin dashboard route
    Route::get('/admin/dashboard', [MainController::class, 'dashboard']);
    Route::get('/admin/settings', [MainController::class, 'settings']);
    Route::get('/admin/profile', [MainController::class, 'profile']);
    Route::get('/admin/staff', [MainController::class, 'staff']);
});