@foreach ($post->postComments as $postComment)
    
<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
            <div
            class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

            <div class="relative">

                <div class="inline absolute z-20">
                    <img class="h-8 w-8 rounded-full object-cover inline"
                    src="{{ $postComment->user->profile_photo_url }}" alt="{{ $postComment->user->name }}"
                    />
                    
                </div>
                
                <div class="inline  left-5 z-10 absolute">
                    <img class="h-8 w-8 rounded-full object-cover inline"
                    src="{{ $postComment->user->countryFlagURL() }}" alt="{{ $postComment->user->country }}"
                    />
                </div>

                <span class="ml-14">
                    {{$postComment->user->name}}
                </span>
            </div>

                
                <span class="mt-2 block lg:inline text-xs italic">
                    {{ $postComment->created_at }}, by {{ $postComment->user->name }}
                </span>
            </div>

            <div class="px-6 sm:px-12 text-gray-500 pt-6">

                <div>
                    {!! $postComment->body() !!}
                </div>

            </div>

            <div class="px-6 sm:px-12 pb-4 pt-4 clear-both">

                <div class="flex justify-between">

                    <div class="text-xs text-gray-500 italic">
                        @if($postComment->edited_by != null)
                        Edited: {{ $postComment->updatedAt() }}, by {{ $postComment->editedBy->name }}.
                        @endif
                    </div>

                    @can('update', $postComment)     
                    <div class="px-6 sm:px-12 pb-4 pt-4 clear-both flex justify-end gap-2">
                        <a href="{{ route('postComment.edit', $postComment->id) }}" 
                        class="text-sm font-semibold text-indigo-500 focus:text-indigo-700 hover:text-indigo-700">
                            <x-clarity-note-edit-line class="w-5 h-5"/>
                        </a>
                        
                        @can('delete', $postComment)
                        <livewire:post-comment.delete :postComment="$postComment" :key="$postComment->id">
                        @endcan
    
                    </div>
                    @endcan

                </div>

            </div>
        </div>
    </div>
</div>

@endforeach
