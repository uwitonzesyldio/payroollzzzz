<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        $payments = Payment::with('employee')->latest()->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    public function create(): View
    {
        $employees = Employee::all();
        return view('admin.payments.create', compact('employees'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'emp_id' => 'required|exists:employees,emp_id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        Payment::create($validated);

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment recorded successfully.');
    }

    public function show(Payment $payment): View
    {
        $payment->load('employee');
        return view('admin.payments.show', compact('payment'));
    }

    public function edit(Payment $payment): View
    {
        $employees = Employee::all();
        return view('admin.payments.edit', compact('payment', 'employees'));
    }

    public function update(Request $request, Payment $payment): RedirectResponse
    {
        $validated = $request->validate([
            'emp_id' => 'required|exists:employees,emp_id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $payment->update($validated);

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment): RedirectResponse
    {
        $payment->delete();

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment deleted successfully.');
    }
}
