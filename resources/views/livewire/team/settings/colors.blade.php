<div class="sm:grid sm:grid-cols-3 mt-10">
    <div class="mb-6 px-4 sm:px-0">
        <p class="text-lg">Colors pallete</p>
        <p class="font-extralight text-sm text-gray-500 dark:text-gray-400 mt-1">Select colors for your team.</p>
    </div>
    <div class="shadow-xl sm:rounded-lg overflow-hidden col-span-2">

        <div class="pt-6 pb-10 px-2 sm:px-12 border-b border-gray-200 bg-white {{config('settings.color1')}} dark:text-white dark:border-gray-700">
            <div class="flex justify-between space-x-2">

                <!-- Color1 -->
                <div>
                    <x-jet-label for="color1" value="{{ __('Color 1') }}" />
                    <select name="color1" id="color1" class="mt-2 border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:text-gray-200 {{$color1value}}" wire:model="color1value">
                        <x-clangim.team.settings.colors-pallete />
                    </select>
                    <x-jet-input-error for="color1" class="mt-2" />
                </div>

                <!-- Color2 -->
                <div>
                    <x-jet-label for="color2" value="{{ __('Color 2') }}" />
                    <select name="color2" id="color2" class="mt-2 border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:text-gray-200 {{$color2value}}" wire:model="color2value">
                        <x-clangim.team.settings.colors-pallete />
                    </select>
                    <x-jet-input-error for="color2" class="mt-2" />
                </div>

                <!-- Color3 -->
                <div>
                    <x-jet-label for="color3" value="{{ __('Color 3') }}" />
                    <select name="color3" id="color3" class="mt-2 border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:text-gray-200 {{$color3value}}" wire:model="color3value">
                        <x-clangim.team.settings.colors-pallete />
                    </select>
                    <x-jet-input-error for="color3" class="mt-2" />
                </div>

                <!-- Color4 -->
                <div>
                    <x-jet-label for="color4" value="{{ __('Color 4') }}" />
                    <select name="color4" id="color4" class="mt-2 border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full dark:text-gray-200 {{$color4value}}" wire:model="color4value">
                        <x-clangim.team.settings.colors-pallete />
                    </select>
                    <x-jet-input-error for="color4" class="mt-2" />
                </div>

            </div>

            <div class="flex justify-end mt-4">
                <x-jet-action-message class="mr-3 mt-2" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>
                <x-jet-button type="submit" wire:click="save">Save</x-jet-button>
            </div>

        </div>

    </div>
</div>
