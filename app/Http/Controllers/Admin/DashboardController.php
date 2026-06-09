<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\Employee;
use App\Models\Payment;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalEmployees = Employee::count();
        $totalPayments = Payment::sum('amount');
        $totalDeductions = Deduction::sum('amount');
        $recentPayments = Payment::with('employee')->latest()->take(5)->get();
        $recentEmployees = Employee::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalEmployees',
            'totalPayments',
            'totalDeductions',
            'recentPayments',
            'recentEmployees'
        ));
    }
}
