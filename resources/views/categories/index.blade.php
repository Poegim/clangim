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
                <div class="grid grid-cols-4 md:grid-cols-6 mt-4 md:text-lg text-sm">

                    <div
                        class="col-span-4 md:col-span-6 italic mb-3 text-gray-500 text-xs md:text-sm pl-2 dark:text-blue-300 flex justify-end">
                        <span class="text-sm text-gray-500 italic mt-2 pr-2 dark:text-blue-300">
                            {{ $category->threads_count}} threads
                        </span>
                    </div>

                    <div class="md:block col-span-3 text-gray-600 dark:text-gray-400 bg-gray-200 {{config('settings.color1')}} md:rounded-tl pt-1 pl-2">Title</div>
                    <div class="md:block text-gray-600 dark:text-gray-400 bg-gray-200 {{config('settings.color1')}} p-1 text-center" title="Threads/Replies">Replies</div>
                    <div class="hidden md:block text-gray-600 dark:text-gray-400 bg-gray-200 {{config('settings.color1')}} p-1 text-center col-span-2 md:col-span-1">Last activity</div>
                    <div class="hidden md:block text-gray-600 dark:text-gray-400 bg-gray-200 {{config('settings.color1')}} p-1 text-center md:rounded-tr">Last by</div>

                    @foreach ($category->threadsLimited as $thread)
                    @if ($thread->category_id == $category->id)
                    <div class="col-span-3 p-1 pl-2">
                        <a href="{{route('threads.show', $thread->slug)}}"
                            class="focus:text-blue-500 hover:text-blue-500 text-lg dark:text-white font-semibold"
                        >{{ $thread->title }}</a>
                    </div>

                    <div class="text-center pt-2 sm:pt-1">
                        {{$thread->replies_count}}
                    </div>
                    <div class="md:text-center pl-2 md:pl-0 pt-1 col-span-4 md:col-span-1">
                        <span class="inline md:hidden text-gray-400">Last on:</span>
                        @if ($thread->lastReply != NULL)
                            {{$thread->lastReply->createdAt()}}
                        @else
                            {{ $thread->createdAt() }}
                        @endif

                    </div>

                    <div class="md:text-center pl-2 md:pl-0 pt-1 rounded-tr col-span-4 md:col-span-1">
                        <span class="inline md:hidden text-gray-400">Last by:</span>
                        @if ($thread->lastReply != NULL)
                            {{$thread->lastReply->user->name}}
                        @else
                            {{$thread->user->name}}
                        @endif

                    </div>

                    <div class="col-span-4 md:col-span-6 pl-2 pb-1 sm:pb-0 text-sm border-b-2">
                        <span class="text-gray-400">
                            Created by
                        </span>
                        {{$thread->user->name}}, {{$thread->createdAt()}}
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
