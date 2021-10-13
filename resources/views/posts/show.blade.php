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

    <x-alert type="success" class="bg-green-700 text-green-100 p-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 border-b border-gray-200">

                    <div class="w-full flex justify-center">
                            <img src="{{asset($post->image)}}" class="rounded-2xl overflow-hidden w-full" alt="{{$post->image}}">
                    </div>

                    <div class="mt-4 border rounded-t-xl overflow-hidden">

                        <div class="bg-gray-200 text-gray-600 p-2 flex justify-between">
                            <div>
                                <img class="h-8 w-8 rounded-full object-cover inline"
                                src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" />
                                {{$post->user->name}}, {{$post->createdAt()}}
                            </div>
                            <div>
                                @can('delete', $post)                    

                                <livewire:post.delete :post="$post" :key="$post->id()">

                                @endcan
                                @can('update', $post)                    

                                <a href="{{route('posts.edit', $post)}}">
                                    <x-zondicon-edit-pencil class="w-6 h-6 inline ml-4 text-gray-500 hover:text-gray-700 focus:text-gray-700"/>
                                </a>
                                @endcan
                            </div>

                        </div>
                        <div class="p-2">
                            {!! $post->body() !!}
                            @if ($post->edited_by)
                                <span class="block text-xs text-gray-400 italic mt-3">
                                    Edited by: {{ $post->lastEditor->name}}, at {{$post->updated_at}}.
                                </span>
                            @endif
                        </div>
                    </div>

                    @foreach ($postComments as $postComment)
                        <div class="mt-4 border rounded-t-xl overflow-hidden">
                            <div class="p-2 bg-gray-200 text-gray-500 flex justify-between">
                                <div>
                                    <img class="h-8 w-8 rounded-full object-cover inline"
                                    src="{{ $postComment->user->profile_photo_url }}" alt="{{ $postComment->user->name }}" />
                                    {{$postComment->user->name}}, {{$postComment->createdAt()}}
                                </div>

                                <div>
                                    @can('delete', $postComment)                    
                                    <livewire:postComment.delete :postComment="$postComment" :key="$postComment->id()">

                                    @endcan
                                    @can('update', $postComment)        
                                    <a href="{{ route('postComments.edit', $postComment)}}">
                                        <x-zondicon-edit-pencil class="w-6 h-6 inline ml-4 text-gray-500 hover:text-gray-700 focus:text-gray-700"/>
                                    </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="mt-2 p-2">
                                {!! $postComment->body() !!}
                                @if ($postComment->edited_by)
                                <span class="block text-xs text-gray-400 italic mt-3">
                                    Edited by: {{ $postComment->lastEditor->name}}, at {{$postComment->updated_at}}.
                                </span>
                            @endif
                            </div>

                        </div>
                    @endforeach

                    <div class="mt-4 p-2">
                        {{ $postComments->links() }}
                    </div>

                    <div class="mt-4 p-2">
                        <form action="{{route('postComments.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
                            <x-trix name="body" />
                            <x-jet-input-error for="body" class="mt-2 mb-2" />

                            <x-jet-button class="mt-2 px-8" type="submit">Save</x-jet-button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
