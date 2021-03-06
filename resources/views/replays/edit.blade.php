<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            <a href="{{route('replays.index')}}" class="hover:text-blue-500 focus:text-blue-500">
                {{ __('Replays') }}
            </a> / {{ __('Edit Replay') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-clangim.window :item="NULL">
                <form action="{{ route('replays.update', $replay) }}" method="POST">
                    @csrf
                    <div>
                        <div>
                            <x-jet-label for="title" value="{{ __('Title:') }}"/>
                            <x-jet-input id="title" class="block mt-2 mb-2 w-full" type="text" name="title"
                                :value="old('title') ? old('title') : $replay->title"
                                placeholder="Fight fire with fire." required autofocus />
                            <x-jet-input-error for="title" class="mt-2 mb-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-button class="mt-2" type="submit">Save</x-jet-button>
                            <x-clangim.red-button-link href="{{route('replays.index')}}">Cancel
                            </x-clangim.red-button-link>
                        </div>

                    </div>
                </form>
            </x-clangim.window>
        </div>
    </div>
</x-app-layout>
