<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <section class="flex flex-col col-span-4 gap-y-4">
            <small class="text-sm text-gray-400"><a class="text-sm text-gray-400"><a class="inline-flex items-center border-b-2 border-transparent font-medium leading-5 text-gray-500 hover:text-green-500 hover:border-green-400 focus:outline-none focus:text-green-500 focus:border-green-400 transition" href="{{ route('threads.index') }}">Threads</a> > create</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Create --}}
                    <div class="col-span-8 space-y-6">
                        <x-form action="{{ route('threads.store') }}">
                            <div class="space-y-8">
                                {{-- Title --}}
                                <div>
                                    <x-form.label for="title" value="{{ __('Title') }}" />
                                    <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" autofocus />
                                    <x-form.error for="title" />
                                </div>

                                {{-- Category --}}
                                <div>
                                    <x-form.label for="category" value="{{ __('Category') }}" />
                                    <select name="category" id="category" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id() }}">{{ $category->name() }}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="category" />
                                </div>

                                {{-- Tag --}}
                                <div>
                                    <x-form.label for="tags" value="{{ __('Tag') }}" />
                                    <select name="tags[]" id="tags" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50" multiple x-data="{}" x-init="function () { choices($el) }">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id() }}">{{ $tag->name() }}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="tags" />
                                </div>

                                {{-- Body --}}
                                <div>
                                    <x-form.label for="body" value="{{ __('Description') }}" />
                                    <x-trix name="body" styling="shadow-inner bg-gray-100" />
                                    <x-form.error for="body" />
                                </div>

                                {{-- Button --}}
                                <x-buttons.primary>
                                    {{ __('Create') }}
                                </x-buttons.primary>
                        </x-form>
                    </div>
                </div>
            </article>
        </section>
    </main>
</x-guest-layout>
