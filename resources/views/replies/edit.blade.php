<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            <a href="{{route('categories.show', $reply->thread->category->slug)}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{$reply->thread->category->name}}
            </a>
            /
            <a href="{{route('threads.show', $reply->thread->slug)}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{$reply->thread->title}}
             </a>
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-clangim.window :item="$reply">

                <form action="{{ route('replies.update', $reply->id) }}" method="POST">
                    @csrf
                    <div class="px-2 sm:px-0">
                        <div>
                            <x-trix name="body" class="mt-4" > {{old('body') ? old('body') : $reply->body}} </x-trix>
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
