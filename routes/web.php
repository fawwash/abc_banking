<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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

Route::any('/', [LoginController::class, 'signin'])->name('login');
Route::middleware('guest')->get('/login', [LoginController::class, 'index'])->name('signin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::any('/signup', [LoginController::class, 'signup'])->name('signup');
Route::post('/company_registration', [RegistrationController::class, 'storeRegistrationForm'])->name('company_registration');
Route::post('/check-email', [RegistrationController::class, 'checkEmail']);

Route::post('/availBalance', [HomeController::class, 'availBalance'])->name('availBalance')->middleware('auth');
Route::post('/amountDeposit', [HomeController::class, 'amountDeposit'])->name('amountDeposit')->middleware('auth');
Route::post('/amountWithdraw', [HomeController::class, 'amountWithdraw'])->name('amountWithdraw')->middleware('auth');
Route::post('/amountTransfer', [HomeController::class, 'amountTransfer'])->name('amountTransfer')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/deposit', [HomeController::class, 'deposit'])->name('deposit')->middleware('auth');
Route::get('/transfer', [HomeController::class, 'transfer'])->name('transfer')->middleware('auth');
Route::get('/withdraw', [HomeController::class, 'withdraw'])->name('withdraw')->middleware('auth');
Route::view('/statement', 'statement')->name('statement')->middleware('auth');
Route::post('/getTransactionData', [HomeController::class, 'getTransactionData'])->name('getTransactionData')->middleware('auth');