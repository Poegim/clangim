<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{ __('Dashboard') }}
             </a> / {{$post->title}} / {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="p-6 sm:px-12 border-b border-gray-200 bg-white">

                    <form action="{{ route('post.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div>
                                <x-jet-label for="title" value="{{ __('Title:') }}" />
                                <x-jet-input
                                    id="title"
                                    class="block mt-2 mb-2 w-full"
                                    type="text"
                                    name="title"
                                    :value="old('title') ? old('title') : $post->title"
                                    placeholder="Excited?"
                                    required autofocus
                                />
                                <x-jet-input-error for="title" class="mt-2 mb-2" />

                                <x-jet-label for="image" value="{{ __('Upload / remove image') }}" />
                                <input name="image" id="image" type="file">
                                <x-jet-input-error for="image" class="mt-2 mb-2" />

                                <div>
                                    <x-jet-label for="remove_image" value="{{ __('Remove Image') }}" class="mt-6 inline"/>
                                    <x-checkbox name="remove_image" class="mt-2 mb-2"/>
                                    <x-jet-input-error for="remove_image" class="mt-2 mb-2" />
                                </div>


                                <x-trix name="body" class="mt-4">
                                    {{old('body') ? old('body') : $post->body}}
                                </x-trix>
                                <x-jet-input-error for="body" class="mt-2 mb-2" />
                            </div>


                            <div>
                                <x-jet-button class="mt-2" type="submit">Save</x-jet-button>
                                <x-clangim.red-button-link href="{{url()->previous()}}">Cancel</x-clangim.red-button-link>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
