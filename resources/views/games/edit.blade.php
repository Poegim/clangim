<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit games of: ') }} {{ $clanWar->title }}.
        </h2>
    </x-slot>

    <x-alert type="success" class="bg-green-700 text-green-100 p-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="pt-6 pb-16 sm:px-20 border-b border-gray-200 bg-white">

                        <form action="{{ route('games.update', $clanWar->id) }}" method="POST">
                        @csrf
                        <div>
                            @foreach ($games as $game)

                                @switch($game->type())

                                    @case('1v1')

                                        <div class="text-gray-600 w-full bg-gray-100 sm:rounded-lg mt-8 shadow-md pt-2 overflow-hidden">

                                            <span class="ml-4"> 
                                                
                                                Game ID:{{ $game->id() }}, type: {{ $game->type() }}.
                                            </span> 
                                        
                                            <div class="py-4 mt-2 md:grid md:grid-cols-2 bg-white">
                                                
                                                <div class="mx-4">                                           

                                                    <x-jet-label for="home_player1[{{ $game->id() }}]" value="Home Player 1:" class=""/>
                                                    <x-jet-input 
                                                    id="home_player1[{{ $game->id() }}]" 
                                                    class="mt-1 w-full" 
                                                    type="text" 
                                                    name="home_player1[{{ $game->id() }}]" 
                                                    :value="old('home_player1[{{ $game->id() }}]')" 
                                                     autofocus 
                                                    />
                                                    <x-jet-input-error for="home_player1.{{ $game->id() }}" class="mt-2" />
                                                </div>

                                                {{ $errors }}

                                                
                                                <div class="mx-4 mt-4 md:mt-0 mb-2"> 
                                                    <x-jet-label for="enemy_player1[{{ $game->id() }}]" value="Enemy Player 1:" />
                                                    <x-jet-input 
                                                    id="enemy_player1[{{ $game->id() }}]" 
                                                    class="mt-1  w-full" 
                                                    type="text" 
                                                    name="enemy_player1[{{ $game->id() }}]" 
                                                    :value="old('enemy_player1[{{ $game->id() }}]')" 
                                                     autofocus 
                                                    />
                                                    <x-jet-input-error for="enemy_player1[{{ $game->id() }}]" class="mt-2" />
                                                </div>
                                            </div>

                                        </div>

                                        @break

                                    @case('2v2')
                                        
                                        <div class="text-gray-600 w-full bg-gray-100 sm:rounded-lg mt-8 shadow-md pt-2 overflow-hidden">

                                            <span class="ml-4"> 
                                                
                                                Game ID:{{ $game->id() }}, type: {{ $game->type() }}.
                                            </span> 
                                            
                                            <div class="py-4 mt-2 md:grid md:grid-cols-2 bg-white">
                                                
                                                <div class="mx-4">                                           

                                                    <x-jet-label for="home_player1[{{ $game->id() }}]" value="Home Player 1:" class=""/>
                                                    <x-jet-input 
                                                    id="home_player1[{{ $game->id() }}]" 
                                                    class="mt-1 w-full" 
                                                    type="text" 
                                                    name="home_player1[{{ $game->id() }}]" 
                                                    :value="old('home_player1[{{ $game->id() }}]')" 
                                                     autofocus 
                                                    />
                                                    <x-jet-input-error for="home_player1[{{ $game->id() }}]" class="mt-2" />
                                                </div>
                                                <div class="mx-4 mt-4 md:mt-0 mb-2"> 
                                                    <x-jet-label for="enemy_player1[{{ $game->id() }}]" value="Enemy Player 1:" />
                                                    <x-jet-input 
                                                    id="enemy_player1[{{ $game->id() }}]" 
                                                    class="mt-1  w-full" 
                                                    type="text" 
                                                    name="enemy_player1[{{ $game->id() }}]" 
                                                    :value="old('enemy_player1[{{ $game->id() }}]')" 
                                                     autofocus 
                                                    />
                                                    <x-jet-input-error for="enemy_player1[{{ $game->id() }}]" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="py-4 mt-2 md:grid md:grid-cols-2 bg-white">
                                                
                                                <div class="mx-4">                                           

                                                    <x-jet-label for="home_player2[{{ $game->id() }}]" value="Home Player 2:" class=""/>
                                                    <x-jet-input 
                                                    id="home_player2[{{ $game->id() }}]" 
                                                    class="mt-1 w-full" 
                                                    type="text" 
                                                    name="home_player2[{{ $game->id() }}]" 
                                                    :value="old('home_player2[{{ $game->id() }}]')" 
                                                     autofocus 
                                                    />
                                                    <x-jet-input-error for="home_player2[{{ $game->id() }}]" class="mt-2" />
                                                </div>
                                                <div class="mx-4 mt-4 md:mt-0 mb-2"> 
                                                    <x-jet-label for="enemy_player2[{{ $game->id() }}]" value="Enemy Player 2:" />
                                                    <x-jet-input 
                                                    id="enemy_player2[{{ $game->id() }}]" 
                                                    class="mt-1  w-full" 
                                                    type="text" 
                                                    name="enemy_player2[{{ $game->id() }}]" 
                                                    :value="old('enemy_player2[{{ $game->id() }}]')" 
                                                     autofocus 
                                                    />
                                                    <x-jet-input-error for="enemy_player2[{{ $game->id() }}]" class="mt-2" />
                                                </div>
                                            </div>

                                        </div>    
                                        @break

                                    @case('3v3')
                                        Second case...
                                        @break

                                    @case('4v4')
                                        Second case...
                                        @break

                                @endswitch

                            @endforeach
                        </div>
                        <x-jet-button class="mt-4"> Save games</x-jet-button>
                    </form>

                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
