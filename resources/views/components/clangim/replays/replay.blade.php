<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
    <div
    class="py-4 px-6 sm:px-20 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

        <span class="block lg:inline ">
            <img class="h-8 w-8 mr-2 rounded-full object-cover inline"
            src="{{ $replay->user->profile_photo_url }}" alt="{{ $replay->user->name }}"
            />
            <span><a href="{{route('replays.show', $replay->id)}}">{{ $replay->title }}</a></span>
        </span>
        <span class="mt-2 block lg:inline text-xs italic">
            {{ $replay->createdAt() }}, by {{ $replay->user->name }}
        </span>
    </div>

    <div class="px-6 sm:px-20 text-gray-500 py-6 grid grid-cols-2">

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

        <div class="flex justify-start pb-6 px-6 sm:px-20 gap-2">
            <livewire:replay.download :downloadsCounter='$replay->downloadsCounter()' :modelId="$replay->id" :key="$replay->id" />
            <div>
                @if (!Request::segment(2))
                <a href="{{route('replays.show', $replay->id)}}" class="text-sm font-semibold text-indigo-700"
                    >
                    Comment ({{$replay->comments()->count()}})
                </a>
                @endif
            </div>

            <div class="text-xs text-gray-500 italic mt-1">
                @if($replay->edited_by != null)
                Edited: {{ $replay->updatedAt() }}, by {{ $replay->editedBy->name }}.
                @endif
            </div>


        </div>

        @can('update', $replay)
            <div class="flex justify-end gap-2 pr-6 sm:pr-20">      
                <a href="{{ route('replays.edit', $replay) }}">
                    <x-zondicon-edit-pencil class="w-5 h-5 text-indigo-600 focus:text-indigo-800 hover:text-indigo-800"/>
                </a>
                @can('delete', $replay)
                <livewire:replay.delete :replay="$replay" />
                @endcan

            </div>
        @endcan



    </div>

</div>


