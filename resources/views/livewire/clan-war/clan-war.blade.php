<div>
    <x-notification></x-notification>


    @can('create', App\Models\ClanWars\ClanWar::class)
    <div class="flex justify-between mt-12">

        <span>
            <x-govicon-tank class="w-16 h-16 text-blue-700 inline dark:text-gray-200" />
        </span>


        <x-clangim.dark-button-link wire:click='showCreateModal' class="cursor-pointer">Add Clan War
        </x-clangim.dark-button-link>

    </div>
    @endcan


    <x-clangim.window :item="NULL">
        <div class="rounded-lg overflow-hidden">
            <table class="rounded-md min-w-full divide-y divide-gray-200 table-fixed dark:divide-none">
                <thead class="bg-gray-50 text-gray-500 dark:text-gray-300 dark:bg-purple-800">
                    <tr>
                        <th scope="col" class="p-4 text-left text-xs font-medium uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col" class="px-2 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col" class="px-2 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Games
                        </th>
                        <th scope="col" class="px-2 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Added by
                        </th>
                        <th scope="col" class="relative px-2 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-none">
                    @foreach ($clanWars as $clanWar)

                    <tr class="dark:bg-black dark:text-gray-400">
                        <td class="p-2 md:p-4">
                            <div class="text-sm flex justify-between">
                                <div>
                                    <img class="w-5 h-5 sm:h-8 sm:w-8 rounded-full object-cover inline"
                                        src="{{ asset('images/country_flags/'.strtolower($teamFlag->value).'.png') }}"
                                        alt="{{ $teamFlag->value }}" />
                                </div>

                                <div class="text-center">
                                    <a
                                        class="dark:text-gray-300 dark:hover:text-gray-400"
                                        href="{{route('clan-wars.show', $clanWar->id)}}">{{$clanWar->title}}
                                        ({{$clanWar->results->wins}}:{{$clanWar->results->losses}})</a>
                                </div>

                                <div>
                                    <img class="w-5 h-5 sm:h-8 sm:w-8 rounded-full object-cover inline"
                                        src="{{ $clanWar->countryFlagURL() }}" alt="{{ $clanWar->enemy_flag }}" />
                                </div>
                            </div>
                            <div class="text-sm">
                                <!-- Somethin here? -->
                            </div>

                        </td>
                        <td class="px-2 py-4 text-sm">
                            {{ $clanWar->date() }}
                        </td>
                        <td class="px-2 py-4 text-sm">
                            {{ $clanWar->gamesCount() }}

                            @can('update', $clanWar)

                            <a href="{{route('games.edit', $clanWar->id)}}">
                                <x-clarity-note-edit-line
                                    class="w-5 h-5 hover:text-gray-700 focus:text-gray-700 inline mb-1 dark:text-indigo-500 dark:hover:text-indigo-600" />
                            </a>

                            @endcan
                        </td>
                        <td class="px-2 py-4 text-sm">
                            {{ $clanWar->user->name }}
                        </td>
                        <td class="px-0 md:px-2 py-4 text-left sm:text-center text-sm font-medium ">

                            @can('delete', $clanWar)

                            <livewire:clan-war.delete :clanWar="$clanWar" :key="$clanWar->id()">

                                @endcan

                                @can('update', $clanWar)

                                <button wire:click='showEditModal({{$clanWar->id}})' class="hover:text-indigo-900 ">
                                    <x-clarity-note-edit-line
                                        class="w-5 h-5 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mr-2 mb-1 dark:text-indigo-500 dark:hover:text-indigo-600" />
                                </button>

                                @endcan
                        </td>
                    </tr>

                    @endforeach

                    <!-- Next line -->
                </tbody>
            </table>
        </div>
    </x-clangim.window>

    <!-- Create Modal Form -->
    <x-jet-dialog-modal wire:model="createAndEditModalVisibility">
        <x-slot name="title">
            @if($modelId == NULL)
            {{ __("Add Clan War") }}
            @else
            {{ __("Edit Clan War: ") }} {{ $modelId }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div>

                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1" type="text" name="title" placeholder="Is it critical?"
                    wire:model.debounce.800ms='title' required autofocus />
                <x-jet-input-error for="title" class="mt-2" />

                <!-- Country -->
                <x-jet-label class="mt-2" for="country" value="{{ __('Country / Region / Union') }}" />
                <select name="country" id="country"
                    class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full block dark:text-gray-700"
                    wire:model.debounce.800ms="enemy_flag">
                    @foreach (config('countries.country_list') as $key => $country))
                    <option value="{{$key}}">{{$country}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="country" class="mt-2" />

                <x-jet-label for="date" value="{{ __('Date') }}" class="mt-4" />
                <x-jet-input id="date" class="block mt-1" type="datetime-local" name="date"
                    wire:model.debounce.800ms='date' />
                <x-jet-input-error for="date" class="mt-" />

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('createAndEditModalVisibility')" wire:loading.attr="disabled">
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            @if($modelId == NULL)
            <x-jet-danger-button wire:click="create" wire:loading.attr='disabled'>
                {{ __("Create Clan War")}}
            </x-jet-danger-button>
            @else
            <x-jet-danger-button wire:click="update" wire:loading.attr='disabled'>
                {{ __("Update Clan War")}}
            </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Of Create Modal Form -->

</div>
