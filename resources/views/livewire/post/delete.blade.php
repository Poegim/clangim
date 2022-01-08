<div class="inline text-gray-700">
    <a 
        class="cursor-pointer text-sm font-semibold text-red-500 focus:text-red-700 hover:text-red-700"
        wire:click="loadModal"
        wire:loading.attr="disabled"
        >
        <x-clarity-trash-line class="w-5 h-5"/>
    </a>

    <x-jet-dialog-modal wire:model="modalVisibility">
        <x-slot name="title" >
            {{ __("Delete Post") }}
        </x-slot>

        <x-slot name="content">
            {{ __("CRITICAL WARNING! Removing this post will also delete all comments inside. Are you sure you want to delete this post?")}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="$toggle('modalVisibility')"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="deletePost" wire:loading.attr='disabled'>
                {{ __("Delete Post")}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
