<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <x-alert type="success" class="bg-green-700 text-green-100 p-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" />


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="p-6 sm:px-20 border-b border-gray-200 bg-white">
                    @can('create', App\Models\Category::class)                    
                    <div class="flex justify-between">
                        <span>
                            <x-clarity-talk-bubbles-line class="w-16 h-16 text-blue-700 inline"/>
                        </span>

                        <x-clangim.dark-button-link href="{{ route('categories.create') }}">Add category
                        </x-clangim.dark-button-link>
                    </div>
                    @endcan

                    <div class="grid grid-cols-4 md:grid-cols-6 mt-4 md:text-lg text-sm">

                        @foreach ($categories as $category)
                        @can('view', $category)
                        <div class="col-span-5 md:col-span-6 py-2 pl-2 inline-flex justify-between bg-gray-50 shadow rounded-t-lg mt-2">
                            <div class="inline-flex">
                                <a href="{{route('categories.show', $category->slug)}}" class="text-xl text-gray-700 hover:text-blue-700 focus:text-blue-700">
                                    {{ $category->name }}
                                </a>

                            </div>
                            @can('update', $category)                    
                            <div class="inline-flex gap-2 pr-2">
                                <a href="{{ route('categories.edit', $category->slug) }}" title="Edit" class=""
                                    ><x-zondicon-edit-pencil class="w-5 h-5 md:w-4 md:h-4 mt-1 text-gray-500 hover:text-gray-700 focus:text-gray-900"/>
                                </a>
                                @can('delete', $category)                    

                                <livewire:category.delete :category="$category" :key="$category->id()">
                                    
                                @endcan
                            </div>
                            @endcan

                        </div>

                        <div class="col-span-4 md:col-span-6 mt-2 italic mb-3 text-gray-500 text-xs md:text-sm pl-2 border-b-2">
                            {{ $category->description }}
                            <span class="ml-4 text-xs text-gray-500 italic mt-2">
                                {{ $category->threads->count()}} - threads.
                            </span>
                        </div>

                            @foreach ($category->threadsLimited as $thread)
                            @if ($thread->category_id == $category->id)
                                <div class="col-span-2 md:col-span-4 pl-8 text-sm">
                                    <a href="{{route('threads.show', [$thread->slug])}}"
                                        class="inline-flex focus:text-blue-600 hover:text-blue-600">
                                         {{ $thread->title }}
                                    </a>
                                    <span class="block md:inline text-xs text-gray-400 italic md:ml-3">
                                        by {{ $thread->user->name }}, {{ $thread->createdAt() }}
                                    </span>
                                </div>

                                <div class="text-center text-sm text-gray-400 col-span-1">
                                    
                                    @if ($thread->replies != NULL)
                                        {{$thread->replies->count()}} replies
                                    @else
                                        0 replies
                                    @endif
                                    
                                </div>
                                <div class="text-center text-sm text-gray-400 col-span-1">
                                    @if ($thread->replies->count() == 0)
                                        {{ $thread->createdAt()}}, by {{ $thread->user->name}}
                                    @else
                                        {{ $thread->lastReply->createdAt()}}, by {{ $thread->lastReply->user->name}}
                                    @endif
                                </div>
                            @endif
                            @endforeach
                        @endcan
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
