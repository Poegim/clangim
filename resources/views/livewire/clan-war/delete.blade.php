<div class="inline text-left">

    <a 
    class="text-indigo-600 hover:text-indigo-900 cursor-pointer"
    wire:click="loadModal"
    wire:loading.attr="disabled"
    >
        <x-zondicon-trash
        class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mb-1"
        />
    </a>

    <x-jet-dialog-modal wire:model="modalVisibility">
        <x-slot name="title" >
            {{ __("Delete Clan War") }}
        </x-slot>

        <x-slot name="content">
            {{ __("CRITICAL WARNING! Removing this Clan War will also delete all Games of it. Are you sure you want to delete?")}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="$toggle('modalVisibility')"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="deleteClanWar" wire:loading.attr='disabled'>
                {{ __("Delete Clan War")}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
