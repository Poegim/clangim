<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Back to <x-zondicon-arrow-thin-right class="w-6 h-6 pb-1 my-5 inline"/> 
            <a href="{{route('categories.show', $thread->category->slug)}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{$thread->category->name}}
            </a> 
            / {{ $thread->title}}
        </h2>
    </x-slot>

    <x-alert type="success" class="bg-green-700 text-green-100 p-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 border-b border-gray-200">

                    <div class="mt-4 border rounded-t-xl overflow-hidden">
                        <div class="bg-blue-900 text-white p-2 flex justify-between">
                            <div>
                                <img class="h-8 w-8 rounded-full object-cover inline"
                                src="{{ $thread->user->profile_photo_url }}" alt="{{ $thread->user->name }}" />
                                {{$thread->user->name}}, {{$thread->createdAt()}}
                            </div>
                            <div>
                                @can('delete', $thread)                    

                                <livewire:thread.delete :thread="$thread" :key="$thread->id()">

                                @endcan
                                @can('update', $thread)                    

                                <a href="{{route('threads.edit', $thread)}}">
                                    <x-zondicon-edit-pencil class="w-6 h-6 inline ml-4 hover:text-gray-300 focus:text-gray-300"/>
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
                            <div class="p-2 bg-blue-900 text-white flex justify-between">
                                <div>
                                    <img class="h-8 w-8 rounded-full object-cover inline"
                                    src="{{ $reply->user->profile_photo_url }}" alt="{{ $reply->user->name }}" />
                                    {{$reply->user->name}}, {{$reply->createdAt()}}
                                </div>

                                <div>
                                    @can('delete', $reply)                    
                                    <livewire:reply.delete :reply="$reply" :key="$reply->id()">

                                    @endcan
                                    @can('update', $reply)        
                                    <a href="">
                                        <x-zondicon-edit-pencil class="w-6 h-6 inline ml-4 hover:text-gray-300 focus:text-gray-300"/>
                                    </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="mt-2 p-2">
                                {!! $reply->body() !!}

                            </div>


                        </div>
                    @endforeach

                    <div class="mt-4 p-2">
                        {{ $replies->links() }}
                    </div>

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
