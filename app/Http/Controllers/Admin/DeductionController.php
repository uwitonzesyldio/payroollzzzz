<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeductionController extends Controller
{
    public function index(): View
    {
        $deductions = Deduction::with('employee')->latest()->paginate(10);
        return view('admin.deductions.index', compact('deductions'));
    }

    public function create(): View
    {
        $employees = Employee::all();
        return view('admin.deductions.create', compact('employees'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'emp_id' => 'required|exists:employees,emp_id',
            'amount' => 'required|numeric|min:0',
            'type' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        Deduction::create($validated);

        return redirect()->route('admin.deductions.index')
            ->with('success', 'Deduction recorded successfully.');
    }

    public function show(Deduction $deduction): View
    {
        $deduction->load('employee');
        return view('admin.deductions.show', compact('deduction'));
    }

    public function edit(Deduction $deduction): View
    {
        $employees = Employee::all();
        return view('admin.deductions.edit', compact('deduction', 'employees'));
    }

    public function update(Request $request, Deduction $deduction): RedirectResponse
    {
        $validated = $request->validate([
            'emp_id' => 'required|exists:employees,emp_id',
            'amount' => 'required|numeric|min:0',
            'type' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        $deduction->update($validated);

        return redirect()->route('admin.deductions.index')
            ->with('success', 'Deduction updated successfully.');
    }

    public function destroy(Deduction $deduction): RedirectResponse
    {
        $deduction->delete();

        return redirect()->route('admin.deductions.index')
            ->with('success', 'Deduction deleted successfully.');
    }
}
