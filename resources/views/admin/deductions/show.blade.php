<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Deduction Details</h2>
            <a href="{{ route('admin.deductions.index') }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-gray-600 to-gray-700 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:from-gray-700 hover:to-gray-800 transition-all duration-150 shadow-md hover:shadow-lg">
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
                <div class="bg-gradient-to-r from-red-500 to-rose-600 px-8 py-5">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg">Deduction Details</h3>
                            <p class="text-red-100 text-sm">#{{ $deduction->deduction_id }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-5 border border-gray-100">
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Member</p>
                            <p class="text-xl font-bold text-gray-800">{{ $deduction->employee->name }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-5 border border-gray-100">
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Type</p>
                            <p class="text-xl font-bold text-gray-800">{{ $deduction->type ?? 'General' }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-red-50 to-rose-50 rounded-xl p-5 border border-red-100">
                            <p class="text-xs font-medium text-red-600 uppercase tracking-wider mb-1">Amount</p>
                            <p class="text-xl font-bold text-red-700">-${{ number_format($deduction->amount, 2) }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-5 border border-gray-100">
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date</p>
                            <p class="text-xl font-bold text-gray-800">{{ optional($deduction->date)->format('F d, Y') ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
