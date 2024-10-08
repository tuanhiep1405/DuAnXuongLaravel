<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginOutController;
use App\Http\Controllers\TinTagController;
use App\Http\Controllers\TTLController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);
   


Route::get('/detail/{id}',[DetailController::class,'index']);
Route::post('/comment', [DetailController::class, 'store'])->name('comment.store');

Route::get('/category/{id}',[TTLController::class,'index']);

Route::get('/chuDe/{id}',[TinTagController::class,'index']);

Route::post('/login', [LoginOutController::class, 'login'])->name('login');
Route::get('/search', [HomeController::class, 'search'])->name('search');







// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
