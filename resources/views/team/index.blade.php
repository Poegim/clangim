<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meet The Team') }}
        </h2>
    </x-slot>

    <livewire:team.team-stats-table :players='$players' />
    <livewire:team.former-stats-table :players='$formerPlayers' />

</x-app-layout>
