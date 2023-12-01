<?php

use Illuminate\Support\Facades\Route;
use Modules\Invoice\app\Http\Controllers\InvoiceController;

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

Route::group([], function () {
    Route::get('invoice/create2', [InvoiceController::class, 'create2'])->name('invoice.create2')->middleware('auth');

    Route::resource('invoice', InvoiceController::class)->names('invoice')->middleware('auth');
});
