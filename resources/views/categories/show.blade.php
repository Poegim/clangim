<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Back to <x-zondicon-arrow-thin-right class="w-6 h-6 pb-1 my-5 inline"/> 
            <a href="{{route('categories.index')}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{ __('Categories') }}
             </a>
        </h2>
    </x-slot>
    <x-alert type="success" class="bg-green-700 text-green-100 p-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" />


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 border-b border-gray-200">
                    @can('create', App\Models\Thread::class)                    
                    <div class="flex justify-end">
                        <x-clangim.green-button-link href="{{ route('threads.create', $category->slug) }}">Add thread</x-clangim.green-button-link>
                    </div>
                    @endcan

                    <div class="grid grid-cols-4 md:grid-cols-6 mt-4 md:text-lg text-sm">

                        <div class="col-span-1 md:col-span-3 mb-4 text-white bg-blue-900 rounded-tl pt-1 pl-2">Title</div>
                        <div class="mb-4 text-white bg-blue-900 p-1 text-center" title="Threads/Replies">Replies</div>
                        <div class="mb-4 text-white bg-blue-900 p-1 text-center">Last activity</div>
                        <div class="mb-4 text-white bg-blue-900 p-1 text-center rounded-tr">Last by</div>

                        @foreach ($category->threads as $thread)

                        <div class="col-span-1 md:col-span-3 pt-1 pl-2">
                            <a href="{{route('threads.show', $thread->slug)}}"
                                class="focus:text-blue-500 hover:text-blue-500"
                            >{{ $thread->title }}</a>
                        </div>
                        <div class="text-center pt-1">
                            {{$thread->replies->count()}}
                        </div>
                        <div class="text-center pt-1">
                            @if ($thread->lastReply != NULL)
                                {{$thread->lastReply->createdAt()}}
                            @else
                                {{ $thread->createdAt() }}
                            @endif
                            
                        </div>
                        <div class="text-center pt-1 rounded-tr">
                            @if ($thread->lastReply != NULL)
                                {{$thread->lastReply->user->name}}
                            @else
                                {{$thread->user->name}}
                            @endif
                        </div>
                        <div class="col-span-4 md:col-span-6 pl-2 text-sm text-gray-500 italic border-b-2">
                            By {{$thread->user->name}}, {{$thread->createdAt()}}
                        </div>

                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
