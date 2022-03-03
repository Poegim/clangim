<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            {{ __('Meet The Team') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-clangim.window :item="NULL">

            <div class="pb-2 pl-1">
                <span class="tracking-widest text-lg">
                    Players:
                </span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-12">
                @foreach ($teamList as $player)
                <x-clangim.team.player :player="$player" />
                @endforeach
            </div>

        </x-clangim.window>

    </div>

    <livewire:team.team-stats-table :players='$players' />

    <livewire:team.former-stats-table :players='$formerPlayers' />

</x-app-layout>
