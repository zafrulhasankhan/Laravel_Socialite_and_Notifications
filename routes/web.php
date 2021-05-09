<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\productController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// google Login
Route::get('login/google',[LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[LoginController::class,'handleGoogleCallback']);

// Facebook Login
Route::get('login/facebook',[LoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback',[LoginController::class,'handleFacebookCallback']);

// Github Login
Route::get('login/github',[LoginController::class,'redirectToGithub'])->name('login.github');
Route::get('login/github/callback',[LoginController::class,'handleGithubCallback']);


//notofication routes
Route::get('/notification', function () {
    // $user = Auth::user();
    $user1 = User::all();
    //dd($user);
    return view('notification',compact('user1'));
});
Route::post('/notify', [productController::class, 'store'])->name('notify');