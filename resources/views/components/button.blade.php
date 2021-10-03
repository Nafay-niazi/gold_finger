<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gold-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gold-600 active:bg-gold-800 focus:outline-none focus:border-gold-800 focus:ring ring-gold-300 disabled:opacity-25 transition ease-in-out duration-150 h-10']) }}>
    {{ $slot }}
</button>
