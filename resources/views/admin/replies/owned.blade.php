<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="grid grid-cols-4 gap-8 mt-8">

        <div class="flex flex-col col-span-4 gap-y-4">
            {{-- Alerts --}}
            <x-alerts.main />
            @foreach ($replies as $reply)
                <x-replies :reply="$reply" />
            @endforeach

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $replies->render() }}
            </div>
        </div>

    </section>

</x-app-layout>