<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('replays.index')}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{ __('Replays') }}
             </a> / {{ __('Add Replay') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="p-6 sm:px-12 border-b border-gray-200 bg-white">

                    <form action="{{ route('replays.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div>
                                <x-jet-label for="title" value="{{ __('Title:') }}" />
                                <x-jet-input
                                    id="title"
                                    class="block mt-2 mb-2 w-full"
                                    type="text"
                                    name="title"
                                    :value="old('title')"
                                    placeholder="Fight fire with fire."
                                    required autofocus
                                />
                                <x-jet-input-error for="title" class="mt-2 mb-2" />

                                <x-jet-label for="file" value="{{ __('Upload Replay') }}" />
                                <input name="file" id="file" type="file" accept=".rep" class="p-1 shadow border hover:border-indigo-300 rounded">
                                <x-jet-input-error for="file" class="mt-2 mb-2" />

                            </div>


                            <div class="mt-4">
                                <x-jet-button class="mt-2" type="submit">Save</x-jet-button>
                                <x-clangim.red-button-link href="{{route('replays.index')}}">Cancel</x-clangim.red-button-link>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
