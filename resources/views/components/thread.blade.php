<article class="p-5 bg-white shadow">

    <div class="grid grid-cols-8 gap-3 relative">

        {{-- Avatar --}}
        <div class="col-span-1 grid text-center">
            <x-user.avatar :user="$thread->author()"/>
        </div>

        {{-- Content --}}
        <div class="col-span-6 space-y-4">

            <a href="{{ route('threads.show', [$thread->category->slug(), $thread->slug()]) }}" class="space-y-2">
                <h2 class="text-xl tracking-wide hover:text-green-400">{{ $thread->title() }}</h2>
                <p class="text-gray-500">{{ $thread->excerpt() }}</p>
            </a>

            {{-- Indicators --}}
            <div class="flex space-x-6">
                {{-- Comments Count --}}
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span class="text-xs text-gray-500">20</span>
                </div>

                {{-- Views Count --}}
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span class="text-xs text-gray-500">125</span>
                </div>

                {{-- Post Date --}}
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-xs text-gray-500">{{ $thread->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>

        {{-- Tags --}}
        <div class="absolute right-2">
            <div class="flex space-x-2">
                @foreach ($thread->tags() as $tag)
                    <a href="{{ route('threads.tags.index', $tag->slug()) }}" class="px-3 py-1 text-sm text-white bg-green-400 rounded">
                        {{ $tag->name() }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="absolute right-2 bottom-1">
            <div class="flex space-x-2">
                {{-- Edit --}}
                @can(App\Policies\ThreadPolicy::UPDATE, $thread)
                    <x-links.secondary href="{{ route('threads.edit', $thread->slug()) }}">Edit</x-links.secondary>
                @endcan
                {{-- Delete --}}
                @can(App\Policies\ThreadPolicy::DELETE, $thread)
                    <livewire:thread.delete :thread="$thread" :key="$thread->id()" />
                @endcan
            </div>
        </div>
    </div>
</article>
