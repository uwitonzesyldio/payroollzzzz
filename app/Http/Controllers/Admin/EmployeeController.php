<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::with('payments', 'deductions')->latest()->paginate(10);
        return view('admin.employees.index', compact('employees'));
    }

    public function create(): View
    {
        return view('admin.employees.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        Employee::create($validated);

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee): View
    {
        $employee->load('payments', 'deductions');
        return view('admin.employees.show', compact('employee'));
    }

    public function edit(Employee $employee): View
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
        ]);

        $employee->update($validated);

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
