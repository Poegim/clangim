<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($replay->title) }}
        </h2>
    </x-slot>

    <div>
        <x-alert type="success" class="bg-green-700 text-green-100 p-2 mb-4" x-data="{ show: true }"
            x-show="show" x-init="setTimeout(() => show = false, 3000)"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-50" />
    </div>

    <div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            

            <x-clangim.replays.replay :replay="$replay" />

            @foreach ($replay->comments as $comment)
                <x-clangim.replays.comment :comment="$comment" />
            @endforeach

            <x-clangim.replays.addComment :replayId="$replay->id" />
            

        </div>
    </div>
</x-app-layout>
