<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-1 bg-green-600 border border-transparent rounded text-sm text-white tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
