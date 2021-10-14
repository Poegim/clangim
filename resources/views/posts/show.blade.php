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

        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
                    <div
                    class="py-4 px-6 sm:px-20 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

                        <span class="block lg:inline ">
                            <img class="h-8 w-8 mr-2 rounded-full object-cover inline"
                            src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"
                            />
                            {{ $post->title }}
                        </span>
                        <span class="mt-2 block lg:inline text-xs italic">
                            {{ $post->createdAt() }}, by {{ $post->user->name }}
                        </span>
                    </div>

                    <div class="px-6 sm:px-20 text-gray-500 pt-6">

                        <div>
                            <img src="{{ asset($post->image) }}" class="object-cover h-96 w-full md:w-96 rounded-lg float-left mr-6 mb-4">
                        </div>

                        <div>
                            {!! $post->body() !!}
                        </div>

                    </div>

                    <div class="px-6 sm:px-20 pb-4 pt-4 clear-both">
                        <a href="https://laravel.com/docs">
                            <div class="text-sm font-semibold text-indigo-700">
                                    <div>Comments (6)</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
