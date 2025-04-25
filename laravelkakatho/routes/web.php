<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;

Route::get('/', function () {
    return redirect()->route('invoices.index');
});

Route::resource('invoices', InvoiceController::class);
Route::post('invoices/{invoice}/details', [InvoiceDetailController::class, 'store'])->name('invoice.details.store');
Route::put('invoice-details/{detail}', [InvoiceDetailController::class, 'update'])->name('invoice.details.update');
Route::delete('invoice-details/{detail}', [InvoiceDetailController::class, 'destroy'])->name('invoice.details.destroy');