<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{ __('Dashboard') }}
            </a>
            / {{ $post->title}}
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
                <div
                class="py-4 px-6 sm:px-12 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">
    
                <div class="relative">

                    <div class="inline absolute z-20">
                        <img class="h-8 w-8 rounded-full object-cover inline"
                        src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"
                        />
                        
                    </div>
                    
                    <div class="inline  left-5 z-10 absolute">
                        <img class="h-8 w-8 rounded-full object-cover inline"
                        src="{{ $post->user->countryFlagURL() }}" alt="{{ $post->user->country }}"
                        />
                    </div>
                    <a href="{{ route('post.show', $post->slug) }}" class="ml-14">{{ $post->title }}</a>

                </div>

                    
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

                        
                        <div class="text-xs text-gray-500 italic">
                            @if($post->edited_by != null)
                            Edited: {{ $post->updatedAt() }}, by {{ $post->user->name }}.
                            @endif
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
        </div>
    </div>

    <span id="comments"></span>

    @include('post-comments.show');

    @can( 'create', App\Models\Forum\PostComment::class)
    <form action="{{ route('postComment.store') }}" method="post">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6 p-12">

                <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="hidden" name="post_slug" value="{{$post->slug}}">

                <x-trix name="body" class="mt-4" value="{{old('body')}}"/>
                <x-jet-input-error for="body" class="mt-2 mb-2" />

                <x-jet-button class="mt-2">Save Comment</x-jet-button>

            </div>
        </div>
    </form>
    @endcan

</x-app-layout>
