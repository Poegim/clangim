<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('categories.show', $thread->category->slug)}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{$thread->category->name}}
            </a>
            /
            <a href="{{route('threads.show', $thread->slug)}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{$thread->title}}
             </a>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="p-6 sm:px-12 border-b border-gray-200 bg-white">

                    <form action="{{ route('threads.update', $thread->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div>
                                <x-jet-label for="title" value="{{ __('Title:') }}" />
                                <x-jet-input 
                                    id="title" 
                                    class="block mt-2 mb-2 w-full" 
                                    type="text" 
                                    name="title" 
                                    :value="old('title') ? old('title') : $thread->title" 
                                    required autofocus 
                                />
                                <x-jet-input-error for="title" class="mt-2 mb-2" />

                                <x-jet-label for="image" value="{{ __('Upload image') }}" class="mt-2 mb-2"/>
                                <input name="image" id="image" type="file">
                                <x-jet-input-error for="image" class="mt-2 mb-2" />

                                <x-jet-label for="category" value="{{ __('Category:') }}" class="mt-2 mb-2"/>
                                <select name="category" id="category" class="rounded block mb-2">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $thread->category_id ? 'selected' : null }}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="category" class="mt-2 mb-2" />

                                <x-jet-label for="remove_image" value="{{ __('Remove Image') }}" class="inline mt-6"/>
                                <x-checkbox name="remove_image" class="inline-block mt-2 mb-2"/>
                                <x-jet-input-error for="remove_image" class="mt-2 mb-2" />

                                <x-trix name="body" class="mt-4" > {{ old('body') ? old('body') : $thread->body}}</x-trix>
                                <x-jet-input-error for="body" class="mt-2 mb-2" />
                            </div>


                            <div>
                                <x-jet-button class="mt-2" type="submit">Save</x-jet-button>
                                <x-clangim.red-button-link href="{{url()->previous()}}">Cancel</x-clangim.red-button-link>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
