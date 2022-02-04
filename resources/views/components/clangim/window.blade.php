<div class="bg-white overflow-hidden shadow-xl rounded-lg mt-12">
    <div
    class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

        <div class="block lg:inline">

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

            @if ($item->slug)
                <a href="{{ route('post.show', $item->slug) }}" class="ml-14">{{ $item->title }}</a>
            @endif

        </div>
        <span class="mt-2 block lg:inline text-xs italic">
            {{ $item->createdAt() }}, by {{ $item->user->name }}
        </span>
    </div>

    <div class="px-6 sm:px-12 text-gray-500 pt-6">

        @if ($item->image)
        <div>
            <img src="{{ asset($item->image) }}" class="object-cover h-96 w-full md:w-96 rounded-lg float-left mr-6 mb-4">
        </div>
        @endif

        <div>
            {{$slot}}

        </div>

    </div>

    <div class="px-6 sm:px-12 pb-4 pt-4 clear-both">

        <div class="flex justify-between">

            <div class="text-xs text-gray-500 italic mt-1">
                @if($item->edited_by != null)
                Edited: {{ $item->updatedAt() }}, by {{ $item->user->name }}.
                @endif
            </div>

            @can('update', $item)
            <div class="pb-4 clear-both flex justify-end gap-2">

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

                    @default

                @endswitch

                @can('delete', $item)
                    <livewire:delete.delete :item="$item" :key="$item->id">
                @endcan

            </div>
            @endcan

        </div>

    </div>
    {{ dump(get_class($item)) }}

</div>
