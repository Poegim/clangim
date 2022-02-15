@can( 'create', App\Models\Replays\ReplayComment::class)
<form action="{{ route('replayComment.store') }}" method="post">
    @csrf
    <div class="mt-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6 p-2 sm:p-12 dark:bg-indigo-900 dark:text-white">

            <input type="hidden" name="replay_id" value="{{$replayId}}">

            <x-trix name="body" class="mt-4 dark:text-white" value="{{old('body')}}"/>
            <x-jet-input-error for="body" class="mt-2 mb-2" />

            <x-jet-button class="mt-2">Save Comment</x-jet-button>

        </div>
    </div>
</form>

@endcan
