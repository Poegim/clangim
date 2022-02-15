<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-400">
            <a href="{{route('categories.show', $thisCategory->slug)}}" class="hover:text-blue-500 focus:text-blue-500">
                {{$thisCategory->name}}
            </a> / {{ __('Create Thread') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-clangim.window :item="NULL">

                <form action="{{ route('threads.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div>
                            <x-jet-label for="title" value="{{ __('Title:') }}" />
                            <x-jet-input id="title" class="block mt-2 mb-2 w-full" type="text" name="title"
                                :value="old('title')" placeholder="What are you thinking about?" required autofocus />
                            <x-jet-input-error for="title" class="mt-2 mb-2" />

                            <x-jet-label for="image" value="{{ __('Upload image') }}" />
                            <input name="image" id="image" type="file"
                                class="p-1 shadow border hover:border-indigo-300 rounded">
                            <x-jet-input-error for="image" class="mt-2 mb-2" />

                            <x-jet-label for="category" value="{{ __('Category:') }}" />
                            <select name="category" id="category" class="rounded dark:text-gray-700">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                    {{ $category->id == $thisCategory->id ? 'selected' : null }}>{{$category->name}}
                                </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="category" class="mt-2 mb-2" />


                            <x-trix name="body" class="mt-4" value="{{old('body')}}" />
                            <x-jet-input-error for="body" class="mt-2 mb-2" />
                        </div>


                        <div>
                            <x-jet-button class="mt-2" type="submit">Save</x-jet-button>
                            <x-clangim.red-button-link href="{{url()->previous()}}">Cancel</x-clangim.red-button-link>
                        </div>

                    </div>
                </form>
            </x-clangim.window>
        </div>
    </div>
</x-app-layout>
