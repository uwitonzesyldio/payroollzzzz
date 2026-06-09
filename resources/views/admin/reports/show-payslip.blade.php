<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Payslip - {{ $employee->name }}</h2>
            <a href="{{ route('admin.reports.payslips') }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-gray-600 to-gray-700 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:from-gray-700 hover:to-gray-800 transition-all duration-150 shadow-md hover:shadow-lg">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Reports
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-white">PAYSLIP</h3>
                            <p class="text-emerald-100 text-sm mt-1">Compensation Statement</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-emerald-200">Slip #{{ $employee->emp_id }}-{{ now()->format('Ym') }}</p>
                            <p class="text-sm text-emerald-200">Issued: {{ now()->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 py-6 border-b border-gray-100">
                    <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Employee Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Employee ID</p>
                            <p class="font-semibold text-gray-800 mt-1">#{{ $employee->emp_id }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Full Name</p>
                            <p class="font-semibold text-gray-800 mt-1">{{ $employee->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 py-6 border-b border-gray-100">
                    <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Earnings</h4>
                    <div class="flex justify-between py-3 px-4 bg-emerald-50 rounded-xl">
                        <span class="text-gray-700 font-medium">Base Salary</span>
                        <span class="font-bold text-emerald-700">${{ number_format($employee->salary, 2) }}</span>
                    </div>
                </div>

                <div class="px-8 py-6 border-b border-gray-100">
                    <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Deductions</h4>
                    @forelse($employee->deductions as $deduction)
                    <div class="flex justify-between py-3 px-4 bg-red-50 rounded-xl mb-2 last:mb-0">
                        <span class="text-gray-700">{{ $deduction->type ?? 'General Deduction' }}</span>
                        <span class="font-medium text-red-600">-${{ number_format($deduction->amount, 2) }}</span>
                    </div>
                    @empty
                    <div class="py-3 px-4 bg-gray-50 rounded-xl text-center">
                        <p class="text-gray-400 text-sm">No deductions for this employee.</p>
                    </div>
                    @endforelse
                </div>

                <div class="px-8 py-6 bg-gradient-to-r from-emerald-50 to-teal-50">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-800">Net Salary</span>
                        <span class="text-2xl font-bold text-emerald-600">${{ number_format($employee->net_salary, 2) }}</span>
                    </div>
                </div>

                <div class="px-8 py-4 text-center text-xs text-gray-400 border-t border-gray-100">
                    This is a computer-generated payslip. No signature is required.
                </div>
            </div>

            <div class="mt-6 text-center">
                <button onclick="window.print()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-semibold rounded-xl hover:from-emerald-600 hover:to-teal-700 transition-all duration-200 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Print Payslip
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
