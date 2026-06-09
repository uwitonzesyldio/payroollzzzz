<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Member Profile</h2>
            <a href="{{ route('admin.employees.index') }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-gray-600 to-gray-700 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:from-gray-700 hover:to-gray-800 transition-all duration-150 shadow-md hover:shadow-lg">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Header Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-8 py-8">
                    <div class="flex items-center space-x-5">
                        <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-white text-2xl font-bold">
                            {{ strtoupper(substr($employee->name, 0, 2)) }}
                        </div>
                        <div class="text-white">
                            <h3 class="text-2xl font-bold">{{ $employee->name }}</h3>
                            <p class="text-emerald-100 text-sm mt-1">Member #{{ $employee->emp_id }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-5 border border-gray-100">
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Base Salary</p>
                            <p class="text-2xl font-bold text-emerald-600">${{ number_format($employee->salary, 2) }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-5 border border-gray-100">
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Total Deductions</p>
                            <p class="text-2xl font-bold text-red-500">${{ number_format($employee->deductions->sum('amount'), 2) }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-xl p-5 border border-emerald-100">
                            <p class="text-xs font-medium text-emerald-600 uppercase tracking-wider mb-1">Net Salary</p>
                            <p class="text-2xl font-bold text-emerald-700">${{ number_format($employee->net_salary, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Payment History -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Payment History</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-100">
                            <thead class="bg-gray-50/50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($employee->payments as $payment)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">${{ number_format($payment->amount, 2) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $payment->date->format('M d, Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-10 text-center text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-8 h-8 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <span>No payment records</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Deductions -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Deductions</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-100">
                            <thead class="bg-gray-50/50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($employee->deductions as $deduction)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $deduction->type ?? 'General' }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-red-600">-${{ number_format($deduction->amount, 2) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ optional($deduction->date)->format('M d, Y') ?? 'N/A' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-10 text-center text-gray-400">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-8 h-8 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <span>No deductions</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
