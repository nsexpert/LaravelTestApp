<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'showLogin'])->name('show_login');
Route::post('login', [CustomAuthController::class, 'doLogin'])->name('login'); 
Route::get('register', [CustomAuthController::class, 'showRegister'])->name('show_register');
Route::post('register', [CustomAuthController::class, 'doRegister'])->name('register'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::resource('contacts', ContactController::class)->middleware('auth');
