<div>
    <div>
        <x-alert type="success" class="bg-green-700 text-green-100 p-2 mb-4" x-data="{ show: true }" x-show="show"
        x-init="setTimeout(() => show = false, 3000)" 
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-50"
        />
    </div>

    <div>
        <div class="flex justify-between px-1">

            <span>
                <x-govicon-tank class="w-16 h-16 text-blue-700 inline" />
            </span>

            @can('create', App\Models\ClanWars\ClanWar::class)

            <x-clangim.dark-button-link wire:click='showCreateModal' class="cursor-pointer">Add Clan War
            </x-clangim.dark-button-link>

            @endcan
        </div>

        <div class="flex flex-col mt-6 mb-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Games
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Added by
                                    </th>
                                    <th scope="col" class="relative px-2 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($clanWars as $clanWar)
                                    
                                <tr>
                                    <td class="px-2 py-4">
                                        <div class="text-sm text-gray-900">{{$clanWar->title}}
                                        </div>
                                        <div class="text-sm text-gray-500"><!-- Somethin here? --></div>
                                    </td>
                                    <td class="px-2 py-4 text-sm text-gray-500">
                                        {{ $clanWar->date() }}
                                    </td>
                                    <td class="px-2 py-4 text-sm text-gray-500">
                                        {{ $clanWar->gamesCount() }}

                                        @can('update', $clanWar)

                                        <a href="{{route('games.edit', $clanWar->id)}}">
                                            <x-clarity-note-edit-solid 
                                            class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mb-1"
                                            />
                                        </a>

                                        @endcan
                                    </td>
                                    <td class="px-2 py-4 text-sm text-gray-500">
                                        {{ $clanWar->user->name }}
                                    </td>
                                    <td
                                        class="px-0 md:px-2 py-4 text-center text-sm font-medium ">

                                        @can('delete', $clanWar)

                                        <livewire:clan-war.delete :clanWar="$clanWar" :key="$clanWar->id()">

                                        @endcan

                                        @can('update', $clanWar)

                                        <button
                                            wire:click='showEditModal({{$clanWar->id}})'
                                            class="text-indigo-600 hover:text-indigo-900 ">
                                            <x-zondicon-edit-pencil
                                            class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mr-2 mb-1"
                                            />
                                        </button>

                                        @endcan
                                    </td>
                                </tr>

                                @endforeach

                                <!-- Next line -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Create Modal Form -->
    <x-jet-dialog-modal wire:model="createModalVisibility">
        <x-slot name="title" >
            {{ __("Add Clan War") }} {{ $modelId }}

        </x-slot>

        <x-slot name="content">
            <div>

                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1" type="text" name="title" 
                    placeholder="Is it critical?"
                    wire:model.debounce.800ms='title'
                    required autofocus 
                />
                <x-jet-input-error for="title" class="mt-2" />

                <x-jet-label for="date" value="{{ __('Date') }}" class="mt-4"/>
                <x-jet-input id="date" class="block mt-1" type="datetime-local" name="date" wire:model='date'/>
                <x-jet-input-error for="date" class="mt-" />

            </div>
            

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="$toggle('createModalVisibility')"
            wire:loading.attr="disabled"
            >
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
