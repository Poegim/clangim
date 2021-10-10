<div class="">

    <a
        class="cursor-pointer text-gray-200"
        wire:click="loadModal"
        wire:loading.attr="disabled"
        >
        <x-zondicon-trash
        class="w-5 h-5 md:w-4 md:h-4 mt-1 text-gray-500 hover:text-gray-700 focus:text-gray-700"

        />
    </a>

    <x-jet-dialog-modal wire:model="modalVisibility">
        <x-slot name="title" >
            {{ __("Delete Category") }}
        </x-slot>

        <x-slot name="content">
            {{ __("CRITICAL WARNING! Removing this category will also delete all threads and replies inside. Are you sure you want to delete this category?")}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="$toggle('modalVisibility')"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="deleteCategory" wire:loading.attr='disabled'>
                {{ __("Delete Category")}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
