<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Record Payment</h2>
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
                            <h3 class="text-white font-semibold text-lg">New Payment</h3>
                            <p class="text-amber-100 text-sm">Record a salary disbursement</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.payments.store') }}" method="POST" class="p-8">
                    @csrf

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
                                <option value="" class="text-gray-400">Choose a team member</option>
                                @foreach($employees as $employee)
                                <option value="{{ $employee->emp_id }}" {{ old('emp_id') == $employee->emp_id ? 'selected' : '' }}>{{ $employee->name }} (ID: #{{ $employee->emp_id }})</option>
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
                                <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount') }}" class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('amount') border-red-400 @enderror px-4 py-3 pl-8 transition duration-150" placeholder="0.00">
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
                            <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" class="w-full rounded-xl border-2 border-gray-200 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('date') border-red-400 @enderror px-4 py-3 transition duration-150">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Record Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
