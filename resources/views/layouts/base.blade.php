<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-partials.head />
</head>

<body class="relative overflow-hidden bg-green-700">

    {{-- Slot --}}
    <div class="relative z-50 mb-8 font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    <livewire:scripts />
    @bukScripts(true)
</body>

</html>
