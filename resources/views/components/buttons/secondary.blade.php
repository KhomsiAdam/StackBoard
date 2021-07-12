<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-1 bg-white border border-gray-300 rounded text-sm text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-green-300 focus:ring focus:ring-green-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
