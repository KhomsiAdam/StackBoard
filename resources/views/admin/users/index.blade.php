<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-green-600">
                    <tr>
                        <x-table.head>Name</x-table.head>
                        <x-table.head>Email</x-table.head>
                        <x-table.head class="text-center">Role</x-table.head>
                        <x-table.head class="text-center">Joined Date</x-table.head>
                        @if (auth()->user()->isAdmin())
                            <x-table.head class="text-center">Action</x-table.head>
                        @endif
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($users as $user)
                        <tr>
                            <x-table.data>
                                <div>{{ $user->name() }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div>{{ $user->email() }}</div>
                            </x-table.data>
                            <x-table.data>
                                <div class="px-2 py-1 text-center text-gray-700 bg-green-200 rounded">
                                    {{ $user->role() }}
                                </div>
                            </x-table.data>
                            <x-table.data>
                                <div class="text-center">{{ $user->date() }}</div>
                            </x-table.data>
                            {{-- Delete --}}
                            @if (auth()->user()->isAdmin())
                                <x-table.data class="text-center">
                                    @can(App\Policies\UserPolicy::DELETE, $user)
                                        <livewire:user.delete :user="$user" :key="$user->id()" />
                                    @endcan
                                </x-table.data>
                            @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </section>


</x-app-layout>
