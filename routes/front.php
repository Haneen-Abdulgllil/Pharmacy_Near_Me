<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\interfacesController;

// auth for wafaa
use App\Http\Controllers\Front\authController;

// admin for haneen
use App\Http\Controllers\Front\adminController;

//pharmacy profile for haneen
use App\Http\Controllers\Front\pharmacyController;

/*
|--------------------------------------------------------------------------
| front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register front routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "front" middleware group. Now create something great!
|
*/

Route::get('/front', function () {
    return view('front.index');
});

//  Front Route
Route::namespace('Front')->group(function () {

    // Front Pages ROUTES
    Route::get('/index', [interfacesController::class, 'index'])->name('index');
    Route::get('/pharmacies', [interfacesController::class, 'pharmacy'])->name('pharmacies');
    Route::get('/ads', [interfacesController::class, 'ads'])->name('ads');
    Route::get('/about', [interfacesController::class, 'about'])->name('about');
    Route::get('/contact', [interfacesController::class, 'contact'])->name('contact');
    Route::get('/confirm', [interfacesController::class, 'confirm'])->name('confirm');
});

//Views Auth
Route::namespace('Auth')->group(function () {
    Route::get('/adminLogin', [authController::class, 'adminLogin'])->name('adminLogin');
    Route::get('/userLogin', [authController::class, 'userLogin'])->name('userLogin');
    Route::get('/pharmasticLogin', [authController::class, 'pharmasticLogin'])->name('pharmasticLogin');
    Route::get('/userSignup', [authController::class, 'userSignup'])->name('userSignup');

    Route::get('/pharmasticSignup', [authController::class, 'pharmasticSignup'])->name('pharmasticSignup');
    Route::get('/adminReset_password', [authController::class, 'adminReset_password'])->name('adminReset_password');
    Route::get('/userReset_password', [authController::class, 'userReset_password'])->name('userReset_password');
    Route::get('/pharmasticReset_password', [authController::class, 'pharmasticReset_password'])->name('pharmasticReset_password');

    Route::get('/adminForget_password', [authController::class, 'adminForget_password'])->name('adminForget_password');
    Route::get('/userForget_password', [authController::class, 'userForget_password'])->name('userForget_password');
    Route::get('/pharmasticForget_password', [authController::class, 'pharmasticForget_password'])->name('pharmasticForget_password');
});

// Views Admin haneen Write Her

Route::namespace('Admin')->group(function () {

    Route::get('/admin_dashboard', [adminController::class, 'Show_index'])->name('Show_index');
    Route::get('/phar', [adminController::class, 'Show_phar'])->name('Show_phar');
    Route::get('/ads', [adminController::class, 'Show_ads'])->name('Show_ads');
    Route::get('/user', [adminController::class, 'Show_user'])->name('Show_user');
    Route::get('/complaints', [adminController::class, 'Show_complaints'])->name('Show_complaints');
    Route::get('/notifications', [adminController::class, 'Show_notifications'])->name('Show_notifications');
    Route::get('/cities', [adminController::class, 'Show_cities'])->name('Show_cities');
    Route::get('/zone', [adminController::class, 'Show_zone'])->name('Show_zone');

});

Route::namespace('Phar')->group(function () {

    Route::get('/phar_profile', [pharmacyController::class, 'Show_index'])->name('Show_index');

    Route::get('/chat', [pharmacyController::class, 'Show_chat'])->name('Show_chat');
});
