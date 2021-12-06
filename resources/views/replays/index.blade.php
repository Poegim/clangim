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

                                <x-clangim.dark-button-link class="cursor-pointer" href="{{route('replays.create')}}">
                                    Add
                                    Replay
                                </x-clangim.dark-button-link>

                                @endcan
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            @foreach ($replays as $replay)

                <x-clangim.replays.replay :replay="$replay" />

            @endforeach

        </div>
    </div>
</x-app-layout>
