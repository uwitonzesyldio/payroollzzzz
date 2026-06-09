<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Payment</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-amber-500 to-orange-600 px-8 py-5">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-lg">Edit Payment</h3>
                            <p class="text-amber-100 text-sm">Update payment record details</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.payments.update', $payment) }}" method="POST" class="p-8">
                    @csrf @method('PATCH')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="emp_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Select Member
                                </span>
                            </label>
                            <select name="emp_id" id="emp_id" class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('emp_id') border-red-400 @enderror px-4 py-3 transition duration-150 bg-white">
                                @foreach($employees as $employee)
                                <option value="{{ $employee->emp_id }}" {{ old('emp_id', $payment->emp_id) == $employee->emp_id ? 'selected' : '' }}>{{ $employee->name }}</option>
                                @endforeach
                            </select>
                            @error('emp_id') <p class="mt-1.5 text-sm text-red-500 flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Amount
                                </span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-gray-400 font-medium">$</span>
                                </div>
                                <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('amount') border-red-400 @enderror px-4 py-3 pl-8 transition duration-150">
                            </div>
                            @error('amount') <p class="mt-1.5 text-sm text-red-500 flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Payment Date
                                </span>
                            </label>
                            <input type="date" name="date" id="date" value="{{ old('date', $payment->date->format('Y-m-d')) }}" class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('date') border-red-400 @enderror px-4 py-3 transition duration-150">
                            @error('date') <p class="mt-1.5 text-sm text-red-500 flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('admin.payments.index') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-amber-500 to-orange-600 text-white text-sm font-semibold rounded-xl hover:from-amber-600 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                            </svg>
                            Update Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
