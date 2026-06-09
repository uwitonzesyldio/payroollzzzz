<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Payment Details</h2>
            <a href="{{ route('admin.payments.index') }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-gray-600 to-gray-700 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:from-gray-700 hover:to-gray-800 transition-all duration-150 shadow-md hover:shadow-lg">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-amber-500 to-orange-600 px-8 py-5">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg">Payment Details</h3>
                            <p class="text-amber-100 text-sm">#{{ $payment->payment_id }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-5 border border-gray-100">
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Member</p>
                            <p class="text-xl font-bold text-gray-800">{{ $payment->employee->name }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl p-5 border border-amber-100">
                            <p class="text-xs font-medium text-amber-600 uppercase tracking-wider mb-1">Amount</p>
                            <p class="text-xl font-bold text-amber-700">${{ number_format($payment->amount, 2) }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-5 border border-gray-100">
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date</p>
                            <p class="text-xl font-bold text-gray-800">{{ $payment->date->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
