<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Threads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 border-b border-gray-200">
                    <div class="grid grid-cols-6">
                        @foreach ($categories as $category)
                        <div class="col-span-4 border-b-2">{{ $category->name }}</div>
                        <div class="border-b-2">posts</div>
                        <div class="border-b-2">date</div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
