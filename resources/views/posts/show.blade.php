<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            <a href="{{route('dashboard')}}"
                class="hover:text-blue-500 focus:text-blue-500" >
                {{ __('Dashboard') }}
            </a>
            / {{ $post->title}}
        </h2>
    </x-slot>

    <x-notification></x-notification>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    @if ((empty($_GET)) || (!empty($_GET) && $_GET["page"] == 1))
        <x-clangim.window :item="$post">
            {!! $post->body !!}
        </x-clangim.window>
    @endif

    <span id="comments"></span>

    @foreach ($postComments as $postComment)
        <x-clangim.window :item="$postComment">
            {!! $postComment->body !!}
        </x-clangim.window>
    @endforeach

    @if ($postComments->hasPages())
    <x-clangim.window :item="NULL">
        {{ $postComments->links() }}
    </x-clangim.window>
    @endif

    </div>



    @can( 'create', App\Models\Forum\PostComment::class)
    <form action="{{ route('postComment.store') }}" method="post">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-clangim.window :item="NULL">

                <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="hidden" name="post_slug" value="{{$post->slug}}">

                <x-trix name="body" class="mt-4" value="{{old('body')}}"/>
                <x-jet-input-error for="body" class="mt-2 mb-2" />

                <x-jet-button class="mt-2">Save</x-jet-button>
            </x-clangim.window>
        </div>
    </form>
    @endcan

</x-app-layout>
