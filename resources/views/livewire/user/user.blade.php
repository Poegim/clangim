<div>
    <x-notification></x-notification>

    <div>

        <div class="flex flex-col mt-6 mb-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg dark:border-none">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-none">
                            <thead class="bg-gray-50 text-gray-500 dark:text-gray-300 dark:bg-purple-800 dark:divide-none">
                                <tr>
                                    <th scope="col"
                                        class="pl-4 pr-2 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col"
                                        class="pl-2 pr-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white text-gray-500 divide-y divide-gray-200 dark:bg-black dark:text-gray-300 dark:divide-none">
                                @foreach ($users as $itemUser)

                                <tr>
                                    <td class="px-4 py-4">
                                        <div class="text-sm">
                                                {{$itemUser->id}}
                                        </div>
                                    </td>
                                    <td class="px-2 py-4 text-sm">
                                        {{ $itemUser->name }}
                                    </td>
                                    <td class="px-2 py-4 text-sm">
                                        {{ $itemUser->email }}
                                    </td>
                                    <td class="px-2 py-4 text-sm">
                                        {{ $itemUser->role() }}
                                    </td>
                                    <td
                                        class="px-0 md:px-2 py-4 text-sm font-medium">

                                        <div class="flex justify-start">
                                            @can('update', $itemUser)
                                                <div class="flex justify-end gap-2 pr-6 sm:pr-20">
                                                    <button
                                                    wire:click="showEditModal({{$itemUser->id}})"
                                                    wire:loading.attr="disabled"
                                                    >
                                                        <x-clarity-note-edit-line class="w-5 h-5 text-indigo-600 focus:text-indigo-800 hover:text-indigo-800"/>
                                                    </a>
                                                    @can('delete', $itemUser)
                                                    <button
                                                        class="cursor-pointer text-sm font-semibold text-red-500 focus:text-red-700 hover:text-red-700"
                                                        wire:click="showDeleteModal({{$itemUser->id}})"
                                                        wire:loading.attr="disabled"
                                                        >
                                                        <x-clarity-trash-line class="w-5 h-5"/>
                                                </button>
                                                    @endcan

                                                </div>
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

    <!-- Delete Modal -->
    <x-jet-dialog-modal wire:model="deleteModalVisibility">
        <x-slot name="title" >
            {{ __("Delete User") }}
        </x-slot>

        <x-slot name="content">
            {{ __("CRICITAL WARINING! Are you sure you want to delete this User? This action will remove user and all its dependencies like posts and comments!")}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="$toggle('deleteModalVisibility')"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="deleteUser" wire:loading.attr='disabled'>
                {{ __("Delete User")}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Edit Modal -->
    <x-jet-dialog-modal wire:model="editModalVisibility">
        <x-slot name="title" >
            {{ __("Edit User") }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-2">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.debounce.800ms="name" autofocus />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="mt-2">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.debounce.800msl="email" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>
            <div class="mt-2">
                <x-jet-label for="role" value="{{ __('Role') }}" />

                <select name="role" id="role" class="rounded block w-full mt-2 dark:text-gray-600" wire:model.debounce.800ms="role">

                        @if (auth()->user()->isAdmin())
                        <option value="1" {{ $role == 1 ? 'selected' : null }}>ADMIN</option>
                        @endif

                        @if (auth()->user()->isCaptain())
                        <option value="2" {{ $role == 2 ? 'selected' : null }}>CAPTAIN</option>
                        @endif

                        <option value="3" {{ $role == 3 ? 'selected' : null }}>VICE_CAPTAIN</option>
                        <option value="4" {{ $role == 4 ? 'selected' : null }}>PLAYER</option>
                        <option value="5" {{ $role == 5 ? 'selected' : null }}>INACTIVE</option>
                        <option value="6" {{ $role == 6 ? 'selected' : null }}>EX_PLAYER</option>
                        <option value="7" {{ $role == 7 ? 'selected' : null }} {{ $role < 7 ? ' disabled' : null }}>USER</option>

                </select>

                <x-jet-input-error for="role" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
            wire:click="$toggle('editModalVisibility')"
            wire:loading.attr="disabled"
            >
                {{ __("Cancel")}}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="updateUser()" wire:loading.attr='disabled'>
                {{ __("Save")}}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


</div>
