<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-400">
            <a href="{{route('categories.show', $thread->category->slug)}}"
                class="hover:text-blue-500 focus:text-blue-500">
                {{$thread->category->name}}
            </a>
            / {{ $thread->title}}
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-clangim.window :item="$thread">
                {!!$thread->body!!}
            </x-clangim.window>

            @foreach ($replies as $reply)
            <x-clangim.window :item="$reply">
                {!!$reply->body!!}
            </x-clangim.window>
            @endforeach

            <x-clangim.window :item="NULL">
                <form action="{{route('replies.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="thread_id" id="thread_id" value="{{$thread->id}}">
                    <x-trix name="body" />
                    <x-jet-input-error for="body" class="mt-2 mb-2" />

                    <x-jet-button class="mt-2 px-8" type="submit">Reply</x-jet-button>
                </form>
            </x-clangim.window>

        </div>
    </div>
</x-app-layout>
