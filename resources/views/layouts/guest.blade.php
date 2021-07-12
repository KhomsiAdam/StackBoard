<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-partials.head />
</head>

<body class="bg-gray-100 flex flex-col h-screen">

    {{-- Header --}}
    <header class="relative flex items-center justify-center py-20 h-40 bg-green-700">
        <h2 class="z-50 text-4xl font-bold text-gray-200">STACKBOARD</h2>
    </header>

    {{-- Navbar --}}
    <x-partials.nav />

    {{-- Slot --}}
    <div class="mb-8 font-sans flex-grow antialiased text-gray-900">
        {{ $slot }}
    </div>

    {{-- Footer --}}
    <x-partials.footer />

    <livewire:scripts />
    @bukScripts(true)
</body>

</html>
