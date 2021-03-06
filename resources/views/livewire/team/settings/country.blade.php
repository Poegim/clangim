<div class="sm:grid sm:grid-cols-3 mt-10">
    <div class="mb-6 p-4">
        <p class="text-lg">Flag</p>
        <p class="font-extralight text-sm text-gray-500 dark:text-gray-400 mt-1">Select a team country/region flag.</p>
    </div>
    <div class="shadow-xl sm:rounded-lg overflow-hidden col-span-2">

        <div class="pt-6 pb-10 px-2 sm:px-12 border-b border-gray-200 bg-white {{config('settings.color1')}} dark:text-white dark:border-gray-700">
            <!-- Country -->
            <div class="mt-2 mb-4 flex justify-between" x-show="! photoPreview">
                <img src="{{$this->countryFlagURL()}}" alt="{{$country}}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- Country -->
            <x-jet-label for="country" value="{{ __('Country / Region / Union') }}" />
            <select name="country" id="country" class="mt-2 border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 rounded-md shadow-sm w-full block dark:text-gray-700" wire:model="country">
                @foreach (config('countries.country_list') as $key => $item))
                    <option value="{{$key}}">{{$item}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="country" class="mt-2" />

            <div class="flex justify-end mt-4">
                <x-jet-action-message class="mr-3 mt-2" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>
                <x-jet-button type="submit" wire:click="save">Save</x-jet-button>
            </div>

        </div>

    </div>
</div>
