<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('categories.show', $thread->category->slug)}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{$thread->category->name}}
            </a> 
            / {{ $thread->title}}
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="p-6 sm:px-12 border-b border-gray-200 bg-white">

                    <div class="w-full flex justify-center">
                            <img src="{{asset($thread->image)}}" class="rounded-2xl overflow-hidden w-full" alt="{{$thread->image}}">
                    </div>

                    <div class="mt-4 border rounded-t-xl overflow-hidden">

                        <div class="bg-gray-200 text-gray-600 p-2 flex justify-between">

                            <div class="relative h-8">

                                <div class="inline absolute z-20">
                                    <img class="h-8 w-8 rounded-full object-cover inline"
                                    src="{{ $thread->user->profile_photo_url }}" alt="{{ $thread->user->name }}"
                                    />
                                    
                                </div>
                                
                                <div class="inline left-5 z-10 absolute">
                                    <img class="h-8 w-8 rounded-full object-cover inline"
                                    src="{{ $thread->user->countryFlagURL() }}" alt="{{ $thread->user->country }}"
                                    />
                                </div>
                
                                <div class="ml-14 h-full mt-1">
                                    {{$thread->user->name}}
                                </div>
                            </div>

                            <div class="mt-1">
                                @can('delete', $thread)                    

                                <livewire:thread.delete :thread="$thread" :key="$thread->id()">

                                @endcan
                                @can('update', $thread)                    

                                <a href="{{route('threads.edit', $thread)}}">
                                    <x-clarity-note-edit-line class="w-6 h-6 inline mr-2 text-gray-500 hover:text-gray-700 focus:text-gray-700"/>
                                </a>
                                @endcan
                            </div>

                        </div>
                        <div class="p-2">
                            {!! $thread->body() !!}
                            @if ($thread->edited_by)
                                <span class="block text-xs text-gray-400 italic mt-3">
                                    Edited by: {{ $thread->lastEditor->name}}, at {{$thread->updated_at}}.
                                </span>
                            @endif
                        </div>
                    </div>

                    @foreach ($replies as $reply)
                        <div class="mt-4 border rounded-t-xl overflow-hidden">
                            <div class="p-2 bg-gray-200 text-gray-500 flex justify-between">

                                <div class="relative h-8">

                                    <div class="inline absolute z-20">
                                        <img class="h-8 w-8 rounded-full object-cover inline"
                                        src="{{ $reply->user->profile_photo_url }}" alt="{{ $reply->user->name }}"
                                        />
                                        
                                    </div>
                                    
                                    <div class="inline left-5 z-10 absolute">
                                        <img class="h-8 w-8 rounded-full object-cover inline"
                                        src="{{ $reply->user->countryFlagURL() }}" alt="{{ $reply->user->country }}"
                                        />
                                    </div>
                    
                                    <div class="ml-14 h-full mt-1">
                                        {{$reply->user->name}}
                                    </div>
                                </div>

                                <div class="mt-1">
                                    @can('delete', $reply)                    
                                    <livewire:reply.delete :reply="$reply" :key="$reply->id()">

                                    @endcan
                                    @can('update', $reply)        
                                    <a href="{{ route('replies.edit', $reply)}}">
                                        <x-clarity-note-edit-line class="w-6 h-6 inline mr-2 text-gray-500 hover:text-gray-700 focus:text-gray-700"/>
                                    </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="mt-2 p-2">
                                {!! $reply->body() !!}
                                @if ($reply->edited_by)
                                <span class="block text-xs text-gray-400 italic mt-3">
                                    Edited by: {{ $reply->lastEditor->name}}, at {{$reply->updated_at}}.
                                </span>
                            @endif
                            </div>

                        </div>
                    @endforeach

                    <div class="mt-4 p-2">
                        <form action="{{route('replies.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="thread_id" id="thread_id" value="{{$thread->id}}">
                            <x-trix name="body" />
                            <x-jet-input-error for="body" class="mt-2 mb-2" />

                            <x-jet-button class="mt-2 px-8" type="submit">Reply</x-jet-button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
