<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:from-emerald-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-all duration-150 shadow-md']) }}>
    {{ $slot }}
</button>
