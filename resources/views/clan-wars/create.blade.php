<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('clan-wars.index')}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{ __('Clan Wars') }}
             </a> / {{ __('Create Clan War') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="p-6 sm:px-20 border-b border-gray-200 bg-white">

                    <div>
                        <form action="{{ route('clanWars.store') }}" method="post">
                            @csrf
                            <div>

                                <x-jet-label for="title" value="{{ __('Title') }}" />
                                <x-jet-input id="title" class="block mt-1" type="text" name="title" 
                                    :value="old('title')" 
                                    placeholder="Is it critical?"
                                    required autofocus 
                                />
                                <x-jet-input-error for="title" class="mt-2" />

                                <x-jet-label for="date" value="{{ __('Date') }}" class="mt-4"/>
                                <x-jet-input id="date" class="block mt-1" type="date" name="date" :value="old('date')" />
                                <x-jet-input-error for="date" class="mt-" />


                                <x-jet-button class="mt-4" type="submit">Save</x-jet-button>
                                <x-clangim.red-button-link href="{{url()->previous()}}">Cancel</x-clangim.red-button-link>

                            </div>
                            
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
