<button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300']) }}>
            {{ $slot }}
</button>
