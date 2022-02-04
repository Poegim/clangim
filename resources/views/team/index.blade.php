<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meet The Team') }}
        </h2>
    </x-slot>


    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="py-12 px-2 sm:px-12 border-b border-gray-200 bg-white">

                    <div class="pb-2 pl-1">
                        <span class="tracking-widest text-lg">
                            Players:
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-12">
                        @foreach ($teamList as $player)
                        <x-clangim.team.player :player="$player" />
                        @endforeach
                    </div>


                </div>

            </div>
        </div>
    </div>

    <livewire:team.team-stats-table :players='$players' />

    <livewire:team.former-stats-table :players='$formerPlayers' />

</x-app-layout>
