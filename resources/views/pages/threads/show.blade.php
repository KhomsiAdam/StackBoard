<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <section class="flex flex-col col-span-4 gap-y-4 relative">
            <x-alerts.main />

            <small class="text-sm text-gray-400"><a
                    class="inline-flex items-center border-b-2 border-transparent font-medium leading-5 text-gray-500 hover:text-green-500 hover:border-green-400 focus:outline-none focus:text-green-500 focus:border-green-400 transition"
                    href="{{ route('threads.index') }}">Threads</a> > {{ $category->name() }} >
                {{ $thread->title() }}</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1 grid text-center">
                        <x-user.avatar :user="$thread->author()" />
                    </div>

                    {{-- Thread --}}
                    <div class="col-span-7 space-y-6">
                        <div class="space-y-3">
                            <h2 class="text-xl font-semibold tracking-wide text-green-400">{{ $thread->title() }}</h2>
                            <div class="text-gray-500">
                                {!! $thread->body() !!}
                            </div>
                        </div>

                        <div class="flex justify-between">

                            {{-- Likes --}}
                            <div class="flex space-x-5 text-gray-500">
                                <a href="" class="flex items-center space-x-2">
                                    <x-heroicon-o-heart class="w-5 h-5 text-green-300" />
                                    <span class="text-xs font-bold">148</span>
                                </a>
                            </div>

                            {{-- Date Posted --}}
                            <div class="flex items-center text-xs text-gray-500">
                                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                Posted: {{ $thread->created_at->diffForHumans() }}
                            </div>

                            {{-- Tags --}}
                            <div class="absolute right-0 top-0">
                                <div class="flex space-x-2">
                                    @foreach ($thread->tags() as $tag)
                                        <a href="{{ route('threads.tags.index', $tag->slug()) }}"
                                            class="px-3 py-1 text-sm text-white bg-green-400 rounded">
                                            {{ $tag->name() }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </article>

            <div class="flex justify-end my-3">
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
            {{-- Replies --}}
            <hr>
            <div class="space-y-5 relative">
                <h2 class="mb-0 text-sm font-bold">Replies:</h2>
                @foreach ($thread->replies() as $reply)
                
                    <div class="p-5 space-y-4 text-gray-500 bg-white border-l-4 border-green-400 shadow">
                        <div class="grid grid-cols-8">

                            {{-- Avatar --}}
                            <div class="col-span-1 grid text-center">
                                <x-user.avatar :user="$reply->author()" />
                            </div>

                            <div class="col-span-7 space-y-4">
                                <p>{!! $reply->body() !!}
                                </p>
                                <div class="flex justify-between">
                                    {{-- Likes --}}
                                    <div class="flex space-x-5 text-gray-500">
                                        <a href="" class="flex items-center space-x-2">
                                            <x-heroicon-o-heart class="w-5 h-5 text-green-300" />
                                            <span class="text-xs font-bold">30</span>
                                        </a>
                                    </div>

                                    {{-- Date Posted --}}
                                    <div class="flex items-center text-xs text-gray-500">
                                        <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                        Replied: {{ $reply->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end my-3 absolute right-5 top-10">
                        <div class="flex space-x-2">
                            {{-- Delete --}}
                            @can(App\Policies\ReplyPolicy::DELETE, $reply)
                                <livewire:reply.delete :reply="$reply" :key="$reply->id()" />
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>

            @auth
                <div class="p-5 space-y-4 bg-white shadow">
                    <h2 class="text-gray-500">Post a reply</h2>
                    <x-form action="{{ route('replies.store') }}">
                        <div>
                            <x-trix name="body" styling="bg-gray-100 shadow-inner h-40" />
                            <x-form.error for="body" />

                            <input type="hidden" name="replyable_id" value="{{ $thread->id() }}">
                            <input type="hidden" name="replyable_type" value="threads">
                        </div>

                        <div class="grid mt-4">
                            <x-buttons.primary class="justify-self-end">
                                {{ __('Post') }}
                            </x-buttons.primary>
                        </div>

                    </x-form>
                </div>
            @else
                <div class="bg-white p-4 text-gray-700 rounded flex justify-center">
                    <h2>Please <a
                            class="inline-flex items-center border-b-2 border-transparent font-medium leading-5 text-gray-500 hover:text-green-500 hover:border-green-400 focus:outline-none focus:text-green-500 focus:border-green-400 transition"
                            href="{{ route('login') }}">Login</a>
                        to reply.</h2>
                </div>
            @endauth
        </section>
    </main>
</x-guest-layout>
