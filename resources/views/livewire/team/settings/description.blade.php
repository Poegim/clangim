<div class="sm:grid sm:grid-cols-3 mt-10">
    <div class="mb-6 p-4">
        <p class="text-lg">Description</p>
        <p class="font-extralight text-sm text-gray-500 dark:text-gray-400 mt-1">As long as you have any idea what to say, do it.</p>
    </div>
    <div class="shadow-xl sm:rounded-lg overflow-hidden col-span-2">

        <div class="pt-6 pb-10 px-2 sm:px-12 border-b border-gray-200 bg-white {{config('settings.color1')}} dark:text-white dark:border-gray-700">
            <form wire:submit.prevent="save">

                <x-jet-label for="description" value="{{ __('Description') }}" class="mb-2"/>
                <x-jet-input
                    id="description"
                    wire:model="description"
                    type="text"
                    class="w-full"
                    />

                <div class="flex justify-end mt-4 gap-2">
                    <x-jet-action-message class="mr-3 mt-2" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>
                    <x-jet-button type="submit" wire:click="save">Save</x-jet-button>
                </div>

            </form>

        </div>

    </div>
</div>

