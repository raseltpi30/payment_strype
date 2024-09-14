<?php

use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/payment', [TestController::class, 'store'])->name('payment.store');
Route::get('/success', [TestController::class, 'success'])->name('payment.success');
Route::get('/cancel', [TestController::class, 'cancel'])->name('payment.cancel');
