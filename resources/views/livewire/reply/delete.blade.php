<div class="inline text-gray-700">
    <a 
        class="cursor-pointer text-gray-200"
        wire:click="loadModal"
        wire:loading.attr="disabled"
        >
        <x-clarity-trash-line class="w-6 h-6 inline ml-4 text-gray-500 hover:text-gray-700 focus:text-gray-700"/>
    </a>

    <x-jet-dialog-modal wire:model="modalVisibility">
        <x-slot name="title" >
            {{ __("Delete Reply") }}
        </x-slot>

        <x-slot name="content">
            {{ __("Are you sure you want to delete this reply?")}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="$toggle('modalVisibility')"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="deleteReply" wire:loading.attr='disabled'>
                {{ __("Delete Reply")}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
