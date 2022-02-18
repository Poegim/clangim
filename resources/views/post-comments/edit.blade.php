<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            <a href="{{route('dashboard')}}" class="hover:text-blue-500 focus:text-blue-500">
                {{ __('Dashboard') }}
            </a> / {{$postComment->post->title}} / {{ __('Edit Comment') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-clangim.window :item="NULL">

                <form action="{{route('postComment.update', $postComment->id)}}" method="POST">
                    @csrf
                    <div>
                        <div>

                            <x-trix name="body" class="mt-4">
                                {{old('body') ? old('body') : $postComment->body}}
                            </x-trix>
                            <x-jet-input-error for="body" class="mt-2 mb-2" />

                            <input type="hidden" name="post_slug" value="{{$postComment->post->slug}}">

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
