<a
    {{ $attributes->merge([
        'class' => 'px-2 text-center py-2 rounded-lg inline-flex items-center 
                                    bg-indigo-500 border border-transparent rounded-md font-semibold text-xs
                                    text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700
                                    active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500
                                    focus:ring-offset-2 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</a>
