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


                                <x-jet-label for="one_vs_one" value="{{ __('One vs One games:') }}" class="mt-8"/>
                                <x-jet-input 
                                    id="one_vs_one" 
                                    class="block mt-1" 
                                    type="number" 
                                    name="one_vs_one" 
                                    min="0" 
                                    :value="old('one_vs_one') ? old('one_vs_one') : 0"                                    
                                />
                                <x-jet-input-error for="one_vs_one" class="mt-2" />

                                <x-jet-label for="two_vs_two" value="{{ __('Two vs Two games:') }}" class="mt-2"/>
                                <x-jet-input 
                                    id="two_vs_two" 
                                    class="block mt-1" 
                                    type="number" 
                                    name="two_vs_two" 
                                    min="0" 
                                    :value="old('two_vs_two') ? old('two_vs_two') : 0"                                    
                                />
                                <x-jet-input-error for="two_vs_two" class="mt-2" />

                                <x-jet-label for="three_vs_three" value="{{ __('Three vs Three games:') }}" class="mt-2"/>
                                <x-jet-input 
                                    id="three_vs_three" 
                                    class="block mt-1" 
                                    type="number" 
                                    name="three_vs_three" 
                                    min="0" 
                                    :value="old('three_vs_three') ? old('three_vs_three') : 0"                                    
                                />
                                <x-jet-input-error for="three_vs_three" class="mt-2" />

                                <x-jet-label for="four_vs_four" value="{{ __('Four vs Four games:') }}" class="mt-2"/>
                                <x-jet-input 
                                    id="four_vs_four" 
                                    class="block mt-1" 
                                    type="number" 
                                    name="four_vs_four" 
                                    min="0" 
                                    :value="old('four_vs_four') ? old('four_vs_four') : 0"                                    
                                />
                                <x-jet-input-error for="four_vs_four" class="mt-2" />


                                <x-jet-label for="date" value="{{ __('Date') }}" class="mt-8"/>
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
