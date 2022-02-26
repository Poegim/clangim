
    <div class="px-2 sm:px-12 text-gray-500 pb-6 grid grid-cols-2">

        @if($replay->players_count == 0)
        <div class="col-span-2">
            This app requires linux server to read replays data.
        </div>
        @endif

        @if ($playerOne->name)
        <x-clangim.replays.player :player="$playerOne" />
        @endif

        @if ($playerTwo->name)
        <x-clangim.replays.player :player="$playerTwo" />
        @endif

        @if ($playerThree->name)
        <x-clangim.replays.player :player="$playerThree" />
        @endif

        @if ($playerFour->name)
        <x-clangim.replays.player :player="$playerFour" />
        @endif

        @if ($playerFive->name)
        <x-clangim.replays.player :player="$playerFive" />
        @endif

        @if ($playerSix->name)
        <x-clangim.replays.player :player="$playerSix" />
        @endif

        @if ($playerSeven->name)
        <x-clangim.replays.player :player="$playerSeven" />
        @endif

        @if ($playerEight->name)
        <x-clangim.replays.player :player="$playerEight" />
        @endif

    </div>
    <div class="flex justify-between">


        <div class="flex justify-start pb-6 px-2 sm:px-12 gap-2">
            <livewire:replay.download :downloadsCounter='$replay->downloadsCounter()' :modelId="$replay->id" :key="$replay->id" />
            <div>
                @if (!Request::segment(2))
                <a href="{{route('replays.show', $replay->id)}}#comments" class="text-sm font-semibold text-indigo-700 hover:text-indigo-900 dark:text-indigo-200 dark:hover:text-indigo-400"
                    >
                    Comment ({{$replay->comments_count}})
                </a>
                @endif
            </div>

            <div class="text-xs text-gray-400 italic mt-1 ">
                @if($replay->edited_by != null)
                Edited: {{ $replay->updatedAt() }}, by {{ $replay->editedBy->name }}.
                @endif
            </div>

        </div>

        @can('update', $replay)
            <div class="flex justify-end gap-2 pr-6 sm:pr-20">
                <a href="{{ route('replays.edit', $replay) }}">
                    <x-clarity-note-edit-line class="w-5 h-5 text-indigo-600 focus:text-indigo-800 hover:text-indigo-800 "/>
                </a>
                @can('delete', $replay)
                <livewire:replay.delete :replay="$replay" />
                @endcan

            </div>
        @endcan



    </div>




