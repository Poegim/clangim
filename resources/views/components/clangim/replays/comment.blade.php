<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
    <div
    class="py-4 px-6 sm:px-20 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

        <span class="block lg:inline ">
            <img class="h-8 w-8 mr-2 rounded-full object-cover inline"
            src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}"
            />
            <span><a href="{{route('replays.show', $comment->replay->id)}}">{{ $comment->user->name }}</a></span>
        </span>
        <span class="mt-2 block lg:inline text-xs italic">
            {{ $comment->createdAt() }}
        </span>
    </div>

    <div class="px-6 sm:px-20 text-gray-500 py-6 grid grid-cols-2">

        {!! $comment->body !!}

    </div>

    <div class="px-6 sm:px-20 pb-4 pt-4 clear-both">

        <div class="flex justify-between py-4">

            <div class="text-xs text-gray-500 italic mt-1">
                @if($comment->edited_by != null)
                Edited: {{ $comment->updatedAt() }}, by {{ $comment->editedBy->name }}.
                @endif
            </div>

            @can('update', $comment)     
            <div class="flex justify-end gap-2">
                <a href="{{ route('replayComment.edit', $comment->id) }}" 
                class="text-sm font-semibold text-indigo-500 focus:text-indigo-700 hover:text-indigo-700">
                    <x-zondicon-edit-pencil class="w-5 h-5"/>
                </a>
                
                @can('delete', $comment)
                <livewire:post-comment.delete :comment="$comment" :key="$comment->id">
                @endcan

            </div>
            @endcan

        </div>

    </div>

</div>