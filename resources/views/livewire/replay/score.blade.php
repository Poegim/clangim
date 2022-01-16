<div class="flex justify-between">
    <div class="relative">
        <div class="absolute top-10">
            <div class="flex">

                @for ($i = 1; $i <= 10; $i++)

                @php
                    if($i == 1)
                    {
                        $starTextColor = 'text-yellow-50';
                    } else
                    {
                        $starTextColor = 'text-yellow-'.($i+1).'00';
                    }

                    if($i == 10)
                    {
                        $left = 'left-1';
                    } else 
                    {
                        $left = 'left-2';
                    }
                @endphp

                @if(!\App\Helpers\AppHelper::isLoggedAndTeamMember())
                    @php $starTextColor = 'text-gray-200' @endphp
                @endif                
                
                <button class="inline rounded-full p-1 hover:shadow-lg border-b-2 border-l-2 {{$i == $score ? 'border-red-500' : 'border-white'}}" wire:click='setScore({{$i}})' @if(!\App\Helpers\AppHelper::isLoggedAndTeamMember())  disabled @endif>
                    <div class="relative">
                        <div>
                            <x-clarity-star-solid class="w-6 h-6 {{$starTextColor}} rounded-full"/>
                        </div>
                        <div class="absolute -top-6 {{$left}} text-xs font-extralight text-gray-500 ">{{$i}}</div>
                    </div>
                </button>
                
                @endfor
                
                
            </div>
            @if(!\App\Helpers\AppHelper::isLoggedAndTeamMember())
            <span class="text-xs text-gray-500 pl-2">
                Only players can vote, join our team!
            </span>
            @endif
        </div>
    </div>



    <div class="rounded-full relative">
        <div>
            <x-clarity-star-solid class="w-24 h-24 text-yellow-200"/>
        </div>
        <div class="absolute top-10 {{abs($averageScore) == 10 ? 'left-8' : 'left-9'}} font-extrabold" wire:model='averageScore'>{{$averageScore}}</div>
    </div>
</div>  