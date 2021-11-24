<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Replays') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg overflow-hidden">

                <div class="py-6 px-2 sm:px-20 border-b border-gray-200 bg-white">

                    <div>
                        <div>
                            <x-alert type="success" class="bg-green-700 text-green-100 p-2 mb-4" x-data="{ show: true }"
                                x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-50" />
                        </div>

                        <div>
                            <div class="flex justify-between px-1">

                                <span>
                                    <x-clarity-replay-all-line class="w-16 h-16 text-blue-700 inline" />
                                </span>

                                @can('create', App\Models\Replays\Replay::class)

                                <x-clangim.dark-button-link class="cursor-pointer" href="{{route('replays.create')}}">Add
                                    Replay
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
                                                            class="px-1 sm:px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Title
                                                        </th>
                                                        <th scope="col"
                                                            class="px-1 sm:px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Date
                                                        </th>
                                                        <th scope="col"
                                                            class="px-1 sm:px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Comments
                                                        </th>
                                                        <th scope="col"
                                                            class="px-1 sm:px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Score
                                                        </th>
                                                        <th scope="col"
                                                            class="px-1 sm:px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Added by
                                                        </th>
                                                        <th scope="px-1 col" class="relative sm:px-2 py-3">
                                                            <span class="sr-only">Actions</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">

                                                    {{-- @foreach ($clanWars as $clanWar) --}}

                                                    <tr>
                                                        <td class="px-1 sm:px-2 py-4 text-sm text-gray-500">
                                                            Title
                                                        </td>
                                                        <td class="px-1 sm:px-2 py-4 text-sm text-gray-500">
                                                            Date
                                                        </td>
                                                        <td class="px-1 sm:px-2 py-4 text-sm text-gray-500">
                                                            Count
                                                        </td>
                                                        <td class="px-1 sm:px-2 py-4 text-sm text-gray-500">
                                                            Score
                                                        </td>
                                                        <td class="px-1 sm:px-2 py-4 text-sm text-gray-500">
                                                            Name
                                                        </td>
                                                        <td class="px-1 sm:px-2 py-4 text-center text-sm font-medium ">

                                                            Actions

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="6" class="text-xs text-gray-500">
                                                            Players list, Players list, Players list, Players list,
                                                            Players list,
                                                        </td>
                                                    </tr>

                                                    {{-- @endforeach --}}

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
    </div>
</x-app-layout>
