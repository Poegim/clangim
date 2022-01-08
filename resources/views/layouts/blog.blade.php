<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @foreach ($posts as $post)
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
            <div
            class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

                <span class="block lg:inline ">
                    <img class="h-8 w-8 mr-2 rounded-full object-cover inline"
                    src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"
                    />
                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                </span>
                <span class="mt-2 block lg:inline text-xs italic">
                    {{ $post->createdAt() }}, by {{ $post->user->name }}
                </span>
            </div>

            <div class="px-6 sm:px-12 text-gray-500 pt-6">

                @if ($post->image)
                <div>
                    <img src="{{ asset($post->image) }}" class="object-cover h-96 w-full md:w-96 rounded-lg float-left mr-6 mb-4">
                </div>
                @endif

                <div>
                    {!! $post->body() !!}
                </div>

            </div>

            <div class="px-6 sm:px-12 pb-4 pt-4 clear-both">

                <div class="flex justify-between">
                    
                    <div>
                        <a href="{{ route('post.show', $post->slug) }}" 
                            class="text-sm font-semibold text-indigo-700"
                            >
                            Comments ({{$post->postComments->count()}})
                        </a>
                    </div>

                    @can('update', $post)     
                    <div class="px-6 sm:px-12 pb-4 pt-4 clear-both flex justify-end gap-2">
                        <a href="{{ route('post.edit', $post->slug) }}" 
                        class="text-sm font-semibold text-indigo-500 focus:text-indigo-700 hover:text-indigo-700">
                            <x-clarity-note-edit-line class="w-5 h-5"/>
                        </a>
                        
                        @can('delete', $post)
                        <livewire:post.delete :post="$post" :key="$post->id">
                        @endcan
    
                    </div>
                    @endcan

                </div>

            </div>
        </div>
        @endforeach

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-8 p-4">

            {{$posts->links()}}

        </div>

    </div>
</div>
