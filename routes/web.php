<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InventoryController;

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // Pemesanan oleh Pelanggan
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrdersController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');
    Route::put('/orders/{id}', [OrdersController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [OrdersController::class, 'delete'])->name('orders.delete');

    // Transaksi Penjualan
    Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions.index');
    Route::post('/transactions', [TransactionsController::class, 'store'])->name('transactions.store');

    // Informasi Stok Barang
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/{id}', [InventoryController::class, 'show'])->name('inventory.show');
    Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');

    // Laporan Penjualan Berkala
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('/reports/sales/daily', [ReportController::class, 'daily'])->name('reports.sales.daily');
    Route::get('/reports/sales/weekly', [ReportController::class, 'weekly'])->name('reports.sales.weekly');
    Route::get('/reports/sales/monthly', [ReportController::class, 'monthly'])->name('reports.sales.monthly');
});
