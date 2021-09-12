<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 border-b border-gray-200">
                    <div class="flex justify-end">
                        <a href="" class="rounded bg-green-500 px-4 text-white font-extrabold py-1 hover:bg-green-800 mb-4">Add category</a>
                    </div>


                    <div class="grid grid-cols-6 gap-y-4 mt-4">

                        <div class="col-span-3 border-b-2 text-lg mb-4">Category name</div>
                        <div class="border-b-2 text-lg mb-4">Threads</div>
                        <div class="border-b-2 text-lg mb-4">Created at</div>
                        <div class="border-b-2 text-lg mb-4">Actions</div>


                        @foreach ($categories as $category)
                        <div class="col-span-3 border-b-2 py-2">{{ $category->name }}</div>
                        <div class="border-b-2 py-2">{{$category->threads()->count()}}</div>
                        <div class="border-b-2 py-2">{{$category->created_at}}</div>
                        <div class="border-b-2 py-2">

                            <a href="" class="rounded bg-blue-500 px-4 text-white font-extrabold py-1 hover:bg-blue-800 mr-2">Edit</a>
                            <a href="" class="rounded bg-red-500 px-4 text-white font-extrabold py-1 hover:bg-red-800">Delete</a>

                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
