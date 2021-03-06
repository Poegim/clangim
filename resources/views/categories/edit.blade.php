<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            {{ __('Edit category') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <x-clangim.window :item="$category">
                    <div class="px-2 sm:px-0">
                        <form action="{{ route('categories.update', $category->slug) }}" method="POST">
                            @csrf
                            <div>
                                <x-jet-label for="name" value="{{ __('Name') }}" />
                                <x-jet-input id="name" class="block mt-1" type="text" name="name"
                                    :value="$category->name ? $category->name : old('name')" required autofocus />
                                <x-jet-input-error for="name" class="mt-2" />

                                <x-jet-label for="description" value="{{ __('Short description') }}" />
                                <x-jet-input id="description" class="block mt-1" type="text" name="description"
                                    :value="$category->description ? $category->description : old('description')"
                                    autofocus />
                                <x-jet-input-error for="description" class="mt-2" />

                                <div class="mt-2 mb-2">

                                    <div>
                                        <label>
                                            <input type="radio" name="hidden" value="0" checked>
                                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-200">
                                                {{ __('Visible for all.') }}
                                            </span>
                                        </label>
                                    </div>

                                    <div>
                                        <label>
                                            <input type="radio" name="hidden" value="1">
                                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-200">
                                                {{ __('Only for Captains / Admins.') }}
                                            </span>
                                        </label>
                                    </div>

                                    <x-jet-input-error for="hidden" class="mt-2" />

                                </div>

                                <x-jet-button class="mt-2" type="submit">Save</x-jet-button>
                                <x-clangim.red-button-link href="{{url()->previous()}}">Cancel
                                </x-clangim.red-button-link>

                            </div>
                        </form>
                    </div>

                </x-clangim.window>

        </div>
    </div>
</x-app-layout>
