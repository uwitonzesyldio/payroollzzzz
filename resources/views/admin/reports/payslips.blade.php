<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Payslips & Reports</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($employees as $employee)
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white font-bold text-lg shadow-md">
                                {{ strtoupper(substr($employee->name, 0, 2)) }}
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $employee->name }}</h3>
                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">ID: #{{ $employee->emp_id }}</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-100 pt-4 space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Base Salary:</span>
                                <span class="font-medium text-gray-800">${{ number_format($employee->salary, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Deductions:</span>
                                <span class="font-medium text-red-500">-${{ number_format($employee->deductions->sum('amount'), 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm font-semibold border-t border-gray-100 pt-2 mt-2">
                                <span class="text-gray-700">Net Salary:</span>
                                <span class="text-emerald-600">${{ number_format($employee->net_salary, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100/50 border-t border-gray-100">
                        <a href="{{ route('admin.reports.payslips.show', $employee) }}" class="block w-full text-center px-4 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white text-sm font-semibold rounded-xl hover:from-emerald-600 hover:to-teal-700 transition-all duration-200 shadow-md hover:shadow-lg">
                            <span class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                View Full Payslip
                            </span>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-16 text-gray-500">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 rounded-full bg-emerald-100 flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <p class="text-lg font-medium">No employees found.</p>
                        <p class="text-sm text-gray-400 mt-1">Add employees first to generate payslips.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
