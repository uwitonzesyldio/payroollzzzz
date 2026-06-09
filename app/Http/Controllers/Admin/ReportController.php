<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\Employee;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function payslips(): View
    {
        $employees = Employee::with('payments', 'deductions')->get();
        return view('admin.reports.payslips', compact('employees'));
    }

    public function showPayslip(Employee $employee): View
    {
        $employee->load('payments', 'deductions');
        return view('admin.reports.show-payslip', compact('employee'));
    }
}
