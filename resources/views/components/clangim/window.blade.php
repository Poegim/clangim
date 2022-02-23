<div class="bg-white overflow-hidden shadow-xl rounded-lg mt-12 {{config('settings.color2')}} dark:text-white">
    @if($item != NULL)

    <div
    class="py-4 px-2 sm:px-10 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold {{config('settings.color1')}} dark:text-gray-300 dark:border-gray-700">

        <div class="block lg:inline">

            @if (($item != NULL) && ($item->user))
            <div class="relative">

                <div class="inline absolute z-20">
                    <img class="h-8 w-8 rounded-full object-cover inline"
                    src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}"
                    />

                </div>

                <div class="inline  left-5 z-10 absolute">
                    <img class="h-8 w-8 rounded-full object-cover inline"
                    src="{{ $item->user->countryFlagURL() }}" alt="{{ $item->user->country }}"
                    />
                </div>

            </div>
            @endif

            @if ($item->post)
                <span class="ml-14">{{ $item->user->name }}</span>
            @endif

            @if ($item->replay)
                <span class="ml-14">{{ $item->user->name }}</span>
            @endif

            @if ($item->postComments)
                <a href="{{ route('post.show', $item->slug) }}" class="ml-14">{{ $item->title }}</a>
            @endif

            @if ($item->thread)
                <span class="ml-14">{{ $item->user->name }}</span>
            @endif

            @if($item->replies)
            <a href="{{ route('threads.show', $item->slug) }}" class="ml-14">{{ $item->title }}</a>
            @endif

            @if (($item != NULL) && ($item->name))
            <a href="{{route('categories.show', $item->slug)}}"
                class="">
                {{ $item->name }}
            </a>
            @endif

        </div>

        @if (!$item->name)
        <span class="mt-2 block lg:inline text-xs italic">
            {{ $item->createdAt() }} @if($item->user), by {{ $item->user->name }}@endif
        </span>
        @endif

    </div>
    @endif

    <div class="px-0 sm:px-10 text-gray-500 py-10">

        @if (($item != NULL) && ($item->image))
        <div>
            <img src="{{ asset($item->image) }}" class="object-cover h-96 w-full md:w-96 rounded-lg float-left mr-6 mb-10">
        </div>
        @endif

        <div class="dark:text-gray-300 px-2 sm:px-0">
            {{$slot}}
        </div>

    </div>

    @if($item != NULL)
    <div class="clear-both">

        <div class="flex justify-between">

            <div class="text-xs text-gray-500 italic mb-1 px-2 sm:px-10 pb-6">
            @if($item->postComments)
            <a href="{{route('post.show', $item->slug)}}#comments"
                class="text-sm font-semibold text-indigo-500 hover:text-indigo-700 focus:text-indigo-700 dark:text-indigo-200 dark:hover:text-indigo-400"
                >
                <x-clarity-block-quote-line class="inline w-5 h-5"/> Comments
                ({{$item->postComments->count()}})
            </a>
            @endif

            @if(($item != NULL) && ($item->edited_by != null))
                <span class="ml-4 dark:text-gray-400">
                    Edited: {{ $item->updatedAt() }}, by {{ $item->user->name }}.
                </span>
            @endif

            @if($item->postComments)

            @endif

            </div>

            @can('update', $item)
            <div class="clear-both flex justify-end gap-2 px-2 sm:px-10 pb-6">

                @switch(get_class($item))

                    @case('App\Models\Posts\Post')
                        <a href="{{ route('post.edit', $item->slug) }}"
                        class="edit-link">
                            <x-clarity-note-edit-line class="w-5 h-5"/>
                        </a>
                        @break

                    @case('App\Models\Posts\PostComment')
                        <a href="{{ route('postComment.edit', $item->id) }}"
                        class="edit-link">
                            <x-clarity-note-edit-line class="w-5 h-5"/>
                        </a>
                        @break

                    @case('App\Models\Forum\Category')
                        <a href="{{ route('categories.edit', $item->slug) }}"
                            title="Edit"
                            class="edit-link"
                            >
                            <x-clarity-note-edit-line class="w-5 h-5"/>
                        </a>
                        @break

                    @case('App\Models\Forum\Thread')
                        <a href="{{ route('threads.edit', $item->slug) }}"
                            title="Edit"
                            class="edit-link"
                            >
                            <x-clarity-note-edit-line class="w-5 h-5"/>
                        </a>
                        @break

                    @case('App\Models\Forum\Reply')
                        <a href="{{ route('replies.edit', $item->id) }}"
                            title="Edit"
                            class="edit-link"
                            >
                            <x-clarity-note-edit-line class="w-5 h-5"/>
                        </a>
                        @break

                    @case('App\Models\Replays\ReplayComment')
                        <a href="{{ route('replayComment.edit', $item->id) }}"
                            title="Edit"
                            class="edit-link"
                            >
                            <x-clarity-note-edit-line class="w-5 h-5"/>
                        </a>
                        @break

                    @default

                @endswitch

                @can('delete', $item)
                    <livewire:delete.delete :item="$item" :key="$item->id">
                @endcan

            </div>
            @endcan

        </div>

    </div>
    @endif

</div>
