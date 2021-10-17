<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="p-6 sm:px-20 border-b border-gray-200 bg-white">

                    <div>
                        <form action="{{ route('categories.update', $category->slug) }}" method="POST">
                        @csrf
                            <div>
                                <x-jet-label for="name" value="{{ __('Name') }}" />
                                <x-jet-input
                                    id="name"
                                    class="block mt-1"
                                    type="text"
                                    name="name"
                                    :value="$category->name ? $category->name : old('name')"
                                    required autofocus
                                />
                                <x-jet-input-error for="name" class="mt-2" />

                                <x-jet-label for="description" value="{{ __('Short description') }}" />
                                <x-jet-input
                                    id="description"
                                    class="block mt-1"
                                    type="text"
                                    name="description"
                                    :value="$category->description ? $category->description : old('description')"
                                    autofocus
                                />
                                <x-jet-input-error for="description" class="mt-2" />

                                <div class="mt-2 mb-2">

                                    <div>
                                        <label>
                                            <input type="radio" name="hidden" value="0" checked>
                                            <span class="ml-2 text-sm text-gray-600">
                                                {{ __('Visible for all.') }}
                                            </span>
                                        </label>
                                    </div>

                                    <div>
                                        <label>
                                        <input type="radio" name="hidden" value="1">
                                        <span class="ml-2 text-sm text-gray-600">
                                            {{ __('Only for Captains / Admins.') }}
                                        </span>
                                    </label>
                                    </div>

                                    <x-jet-input-error for="hidden" class="mt-2" />

                                </div>


                                <x-jet-button class="mt-2" type="submit">Save</x-jet-button>
                                <x-clangim.red-button-link href="{{url()->previous()}}">Cancel</x-clangim.red-button-link>

                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
