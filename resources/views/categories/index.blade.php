<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @can('create', App\Models\Category::class)
            <div class="flex justify-between mt-12 px-2 sm:px-0">
                <span>
                    <x-clarity-talk-bubbles-line class="w-16 h-16 text-blue-700 inline dark:text-gray-200" />
                </span>

                <x-clangim.dark-button-link href="{{ route('categories.create') }}">Add category
                </x-clangim.dark-button-link>
            </div>
            @endcan

            @foreach ($categories as $category)
            @can('view', $category)
            <x-clangim.window :item="$category">
                <div class="grid grid-cols-4 md:grid-cols-6 md:text-lg text-sm">


                    <div
                        class="col-span-4 md:col-span-6 mt-2 italic mb-3 text-gray-500 text-xs md:text-sm pl-2 border-b-2 dark:text-blue-300">
                        {{ $category->description }}
                        <span class="ml-4 text-xs text-gray-500 italic mt-2 dark:text-blue-300">
                            {{ $category->threads->count()}} - threads.
                        </span>
                    </div>

                    @foreach ($category->threadsLimited as $thread)
                    @if ($thread->category_id == $category->id)
                    <div class="col-span-2 md:col-span-4 pl-8 text-sm">
                        <a href="{{route('threads.show', [$thread->slug])}}"
                            class="inline-flex focus:text-blue-600 hover:text-blue-600">
                            {{ $thread->title }}
                        </a>
                        <span class="block md:inline text-xs text-gray-400 italic md:ml-3">
                            by {{ $thread->user->name }}, {{ $thread->createdAt() }}
                        </span>
                    </div>

                    <div class="text-center text-sm text-gray-400 col-span-1">

                        @if ($thread->replies != NULL)
                        {{$thread->replies->count()}} replies
                        @else
                        0 replies
                        @endif

                    </div>
                    <div class="text-center text-sm text-gray-400 col-span-1">
                        @if ($thread->replies->count() == 0)
                        {{ $thread->createdAt()}}, by {{ $thread->user->name}}
                        @else
                        {{ $thread->lastReply->createdAt()}}, by {{ $thread->lastReply->user->name}}
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>
            </x-clangim.window>
            @endcan
            @endforeach

        </div>
    </div>
</x-app-layout>
