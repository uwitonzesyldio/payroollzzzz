<nav x-data="{ open: false }" class="bg-white/90 backdrop-blur-md border-b border-gray-200/60 shadow-sm sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-gray-800">TeamCompass</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex sm:items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.employees.index')" :active="request()->routeIs('admin.employees.*')">
                        {{ __('Team') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.payments.index')" :active="request()->routeIs('admin.payments.*')">
                        {{ __('Payments') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.deductions.index')" :active="request()->routeIs('admin.deductions.*')">
                        {{ __('Deductions') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.reports.payslips')" :active="request()->routeIs('admin.reports.*')">
                        {{ __('Reports') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                    <button @click="open = ! open" class="inline-flex items-center px-4 py-2 border-2 border-gray-200 text-sm leading-4 font-medium rounded-xl text-gray-600 bg-white hover:border-emerald-300 hover:text-emerald-700 focus:outline-none transition-all duration-200 shadow-sm hover:shadow-md">
                        <div class="w-6 h-6 rounded-lg bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white text-xs font-bold mr-2">
                            {{ strtoupper(substr(Auth::user()->username, 0, 2)) }}
                        </div>
                        <div>{{ Auth::user()->username }}</div>
                        <div class="ms-1.5">
                            <svg class="fill-current h-4 w-4 transition-transform duration-200" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-48 rounded-xl bg-white shadow-xl border border-gray-100 ring-1 ring-black ring-opacity-5 overflow-hidden" style="display: none;">
                        <div class="px-4 py-3 bg-gradient-to-r from-gray-50 to-white border-b border-gray-100">
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Account</p>
                            <p class="text-sm font-medium text-gray-800 mt-0.5">{{ Auth::user()->username }}</p>
                        </div>
                        <div class="py-1">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left block px-4 py-2.5 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 transition-colors flex items-center">
                                    <svg class="w-4 h-4 mr-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 px-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.employees.index')" :active="request()->routeIs('admin.employees.*')">
                {{ __('Team') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.payments.index')" :active="request()->routeIs('admin.payments.*')">
                {{ __('Payments') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.deductions.index')" :active="request()->routeIs('admin.deductions.*')">
                {{ __('Deductions') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.reports.payslips')" :active="request()->routeIs('admin.reports.*')">
                {{ __('Reports') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-2 border-t border-gray-200">
            <div class="px-4 pb-3">
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white text-xs font-bold mr-3">
                        {{ strtoupper(substr(Auth::user()->username, 0, 2)) }}
                    </div>
                    <div>
                        <div class="font-medium text-sm text-gray-800">{{ Auth::user()->username }}</div>
                        <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="space-y-1 px-3">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
