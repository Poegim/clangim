<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-400">
            <a href="{{route('categories.index')}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{ __('Categories') }}
             </a>
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            @can('create', App\Models\Forum\Thread::class)
            <div class="flex justify-between mt-12">
                <span>
                    <x-clarity-talk-bubbles-line class="w-16 h-16 text-blue-700 inline dark:text-gray-200" />
                </span>

                <div class="flex justify-end">
                    <x-clangim.dark-button-link href="{{ route('threads.create', $category->slug) }}">Add thread</x-clangim.dark-button-link>
                </div>
            </div>
            @endcan


            <x-clangim.window :item="$category">
                <div class="grid grid-cols-4 md:grid-cols-6 mt-4 md:text-lg text-sm">

                    <div class="col-span-1 md:col-span-3 text-gray-600 bg-gray-200 rounded-tl pt-1 pl-2">Title</div>
                    <div class="text-gray-600 bg-gray-200 p-1 text-center" title="Threads/Replies">Replies</div>
                    <div class="text-gray-600 bg-gray-200 p-1 text-center">Last activity</div>
                    <div class="text-gray-600 bg-gray-200 p-1 text-center rounded-tr">Last by</div>

                    @foreach ($category->threads as $thread)

                    <div class="col-span-1 md:col-span-3 pt-1 pl-2">
                        <a href="{{route('threads.show', $thread->slug)}}"
                            class="focus:text-blue-500 hover:text-blue-500"
                        >{{ $thread->title }}</a>
                    </div>
                    <div class="text-center pt-1">
                        {{$thread->replies->count()}}
                    </div>
                    <div class="text-center pt-1">

                        @if ($thread->lastReply != NULL)
                            {{$thread->lastReply->createdAt()}}
                        @else
                            {{ $thread->createdAt() }}
                        @endif

                    </div>
                    <div class="text-center pt-1 rounded-tr">

                        @if ($thread->lastReply != NULL)
                            {{$thread->lastReply->user->name}}
                        @else
                            {{$thread->user->name}}
                        @endif

                    </div>
                    <div class="col-span-4 md:col-span-6 pl-2 text-sm text-gray-400 italic border-b-2">
                        By {{$thread->user->name}}, {{$thread->createdAt()}}
                    </div>

                    @endforeach

                </div>
            </x-clangim.window>

        </div>
    </div>
</x-app-layout>
