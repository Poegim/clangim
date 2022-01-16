<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
    <div
    class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

    <div class="relative">

        <div class="inline absolute z-20">
            <img class="h-8 w-8 rounded-full object-cover inline"
            src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}"
            />
            
        </div>
        
        <div class="inline left-5 z-10 absolute">
            <img class="h-8 w-8 rounded-full object-cover inline"
            src="{{ $comment->user->countryFlagURL() }}" alt="{{ $comment->user->country }}"
            />
        </div>

        <div class="ml-14 h-full mt-1">
            {{$comment->user->name}}
        </div>
    </div>

        <span class="mt-2 block lg:inline text-xs italic">
            {{ $comment->createdAt() }}
        </span>
    </div>

    <div class="px-6 sm:px-12 text-gray-500 py-6 grid grid-cols-2">

        {!! $comment->body !!}

    </div>

    <div class="px-6 sm:px-12 pb-4 pt-4 clear-both">

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
                    <x-clarity-note-edit-line class="w-5 h-5"/>
                </a>
                
                @can('delete', $comment)
                    <livewire:replay-comment.delete :replayComment="$comment" :key="$comment->id">
                @endcan

            </div>
            @endcan

        </div>

    </div>

</div>