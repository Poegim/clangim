<div class="sm:grid sm:grid-cols-3 mt-10">
    <div class="mb-6 px-4 sm:px-0">
        <p class="text-lg">Logo</p>
        <p class="font-extralight text-sm text-gray-500 mt-1">Upload or remove team logo.</p>
    </div>
    <div class="shadow-xl sm:rounded-lg overflow-hidden col-span-2">

        <div class="pt-6 pb-10 px-2 sm:px-12 border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-700">
            <form wire:submit.prevent="save">

                @if ($logo != NULL)

                <!-- Logo Image -->
                <div class="mt-2 mb-4 flex justify-between">
                    <img src="{{asset('storage/'.$logo)}}" alt="Logo" class="rounded-full h-20 w-20 object-cover">
                </div>

                @endif

                <x-jet-input
                    wire:model="photo"
                    type="file"
                    class="p-1 shadow border hover:border-gray-300 rounded w-full mt-2"
                    accept=".jpg, .jpeg"/>

                <div class="flex justify-end mt-4 gap-2">
                    <x-jet-action-message class="mr-3 mt-2" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>
                    <x-jet-action-message class="mr-3 mt-2" on="deleted">
                        {{ __('Deleted.') }}
                    </x-jet-action-message>
                    <x-jet-secondary-button wire:click="recoverOldLogo">Recover</x-jet-secondary-button>
                    <x-jet-danger-button wire:click="delete">Delete</x-jet-danger-button>
                    <x-jet-button type="submit" wire:click="save">Save</x-jet-button>
                </div>

            </form>

        </div>

    </div>
</div>

