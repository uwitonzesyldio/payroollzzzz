<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeductionController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->middleware('role:super_admin,admin,accountant')->group(function () {
        Route::resource('employees', EmployeeController::class);
        Route::resource('payments', PaymentController::class);
        Route::resource('deductions', DeductionController::class);

        Route::get('reports/payslips', [ReportController::class, 'payslips'])->name('reports.payslips');
        Route::get('reports/payslips/{employee}', [ReportController::class, 'showPayslip'])->name('reports.payslips.show');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
