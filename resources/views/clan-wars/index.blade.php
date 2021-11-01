<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clan Wars') }}
        </h2>
    </x-slot>

    <x-alert type="success" class="bg-green-700 text-green-100 p-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="py-6 sm:px-20 border-b border-gray-200 bg-white">

                    <div>
                        <div class="flex justify-between px-1">

                            <span>
                                <x-govicon-tank class="w-16 h-16 text-blue-700 inline" />
                            </span>

                            <x-clangim.dark-button-link href="{{ route('clan-wars.create') }}">Add Clan War
                            </x-clangim.dark-button-link>
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
                                                        <x-clarity-note-edit-solid 
                                                        class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mb-1"
                                                        />
                                                    </td>
                                                    <td class="px-2 py-4 text-sm text-gray-500">
                                                        {{ $clanWar->user->name }}
                                                    </td>
                                                    <td
                                                        class="px-0 md:px-2 py-4 text-center text-sm font-medium ">

                                                        <livewire:clan-war.delete :clanWar="$clanWar" :key="$clanWar->id()">

                                                        {{-- <a href="#"
                                                            class="text-indigo-600 hover:text-indigo-900">
                                                            <x-zondicon-trash
                                                            class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mb-1"
                                                            />
                                                        </a> --}}

                                                        <a href="#"
                                                            class="text-indigo-600 hover:text-indigo-900 ">
                                                            <x-zondicon-edit-pencil
                                                            class="w-5 h-5 md:w-4 md:h-4 text-gray-500 hover:text-gray-700 focus:text-gray-700 inline mr-2 mb-1"
                                                            />
                                                        </a>
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

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
