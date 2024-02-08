<?php

use App\Filament\Pages\Auth\RegisterNotice;
use App\Http\Controllers\RegisterNoticeController;
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

Route::view('/', 'welcome')->name('home');
Route::get('/user/register/notice', RegisterNoticeController::class)->name('register-notice')
->middleware('guest');


