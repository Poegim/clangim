<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-12">
    <div
    class="py-4 px-6 sm:px-20 border-b border-gray-200 bg-gray-200 rounded-t-lg lg:flex lg:justify-between text-gray-600 leading-7 font-semibold">

        <span class="block lg:inline ">
            <img class="h-8 w-8 mr-2 rounded-full object-cover inline"
            src="{{ $replay->user->profile_photo_url }}" alt="{{ $replay->user->name }}"
            />
            <span>{{ $replay->title }}</span>
        </span>
        <span class="mt-2 block lg:inline text-xs italic">
            {{ $replay->createdAt() }}, by {{ $replay->user->name }}
        </span>
    </div>

    <div class="px-6 sm:px-20 text-gray-500 py-6 grid grid-cols-2">

        @if ($replay->player_1)
        <div 
            class="col-span-2 md:col-span-1 mt-2 rounded-md"
            >
            <div>
                Player: <span class="font-semibold">{{ $replay->player_1 }}</span>
            </div>
            <div>
                APM: {{ $replay->player_1_apm}}
            </div>
            <div>
                EAPM: {{ $replay->player_1_eapm}}
            </div>
            <div>
                Race: {{ $replay->player_1_race}}
            </div>
            <div class="{{$replay->playerOneTeam()}} bg-gradient-to-r h-2">
            </div>
        </div>
        @endif

        @if ($replay->player_2)
        <div class="col-span-2 md:col-span-1 mt-2 rounded-md">
            <div>
                Player: {{ $replay->player_2 }}
            </div>
            <div>
                APM: {{ $replay->player_2_apm}}
            </div>
            <div>
                EAPM: {{ $replay->player_2_eapm}}
            </div>
            <div>
                Race: {{ $replay->player_2_race}}
            </div>
            <div class="{{$replay->playerTwoTeam()}} bg-gradient-to-r h-2">

            </div>
        </div>
        @endif

        @if ($replay->player_3)
        <div class="col-span-2 md:col-span-1 mt-2 rounded-md">
            <div>
                Player: {{ $replay->player_3 }}
            </div>
            <div>
                APM: {{ $replay->player_3_apm}}
            </div>
            <div>
                EAPM: {{ $replay->player_3_eapm}}
            </div>
            <div>
                Race: {{ $replay->player_3_race}}
            </div>
            <div class="{{$replay->playerThreeTeam()}} bg-gradient-to-r h-2">

            </div>
        </div>
        @endif

        @if ($replay->player_4)
        <div class="col-span-2 md:col-span-1 mt-2 rounded-md">
            <div>
                Player: {{ $replay->player_4 }}
            </div>
            <div>
                APM: {{ $replay->player_4_apm}}
            </div>
            <div>
                EAPM: {{ $replay->player_4_eapm}}
            </div>
            <div>
                Race: {{ $replay->player_4_race}}
            </div>
            <div class="{{$replay->playerFourTeam()}} bg-gradient-to-r h-2">

            </div>
        </div>
        @endif

        @if ($replay->player_5)
        <div class="col-span-2 md:col-span-1 mt-2 rounded-md">
            <div>
                Player: {{ $replay->player_5 }}
            </div>
            <div>
                APM: {{ $replay->player_5_apm}}
            </div>
            <div>
                EAPM: {{ $replay->player_5_eapm}}
            </div>
            <div>
                Race: {{ $replay->player_5_race}}
            </div>
            <div class="{{$replay->playerFiveTeam()}} bg-gradient-to-r h-2">

            </div>
        </div>
        @endif

        @if ($replay->player_6)
        <div class="col-span-2 md:col-span-1 mt-2 rounded-md">
            <div>
                Player: {{ $replay->player_6 }}
            </div>
            <div>
                APM: {{ $replay->player_6_apm}}
            </div>
            <div>
                EAPM: {{ $replay->player_6_eapm}}
            </div>
            <div>
                Race: {{ $replay->player_6_race}}
            </div>
            <div class="{{$replay->playerSixTeam()}} bg-gradient-to-r h-2">

            </div>
        </div>
        @endif

        @if ($replay->player_7)
        <div class="col-span-2 md:col-span-1 mt-2 rounded-md">
            <div>
                Player: {{ $replay->player_7 }}
            </div>
            <div>
                APM: {{ $replay->player_7_apm}}
            </div>
            <div>
                EAPM: {{ $replay->player_7_eapm}}
            </div>
            <div>
                Race: {{ $replay->player_7_race}}
            </div>
            <div class="{{$replay->playerSevenTeam()}} bg-gradient-to-r h-2">

            </div>
        </div>
        @endif

        @if ($replay->player_8)
        <div class="col-span-2 md:col-span-1 mt-2 rounded-md">
            <div>
                Player: {{ $replay->player_8 }}
            </div>
            <div>
                APM: {{ $replay->player_8_apm}}
            </div>
            <div>
                EAPM: {{ $replay->player_8_eapm}}
            </div>
            <div>
                Race: {{ $replay->player_8_race}}
            </div>
            <div class="{{$replay->playerEightTeam()}} bg-gradient-to-r h-2">

            </div>
        </div>
        @endif


    </div>

</div>