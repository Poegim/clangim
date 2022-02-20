
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 {{config('settings.color1')}} dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 ">

            <div class="w-full sm:w-1/4">
                <!-- Logo -->
                <div class="mt-3">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
            </div>

            <div class="flex justify-center w-1/6 md:w-2/4">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>

                    @can('viewAny', App\Models\Forum\Category::class)
                    <x-jet-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                        {{ __('Forum') }}
                    </x-jet-nav-link>
                    @endcan

                    <x-jet-nav-link href="{{ route('clan-wars.index') }}" :active="request()->routeIs('clan-wars.index')">
                        {{ __('Clan Wars') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('replays.index') }}" :active="request()->routeIs('replays.index')">
                        {{ __('Replays') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('team.index') }}" :active="request()->routeIs('team.index')">
                        {{ __('Team') }}
                    </x-jet-nav-link>

                    @if ((auth()->check()) && (auth()->user()->isViceCaptain()))
                        <x-jet-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                            {{ __('Users') }}
                        </x-jet-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:justify-end sm:ml-6 w-1/5">

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">

                    @guest
                    <a href="{{ route('login') }}"
                    class="text-sm text-gray-600 hover:text-gray-800 px-2 dark:text-gray-300 dark:hover:text-gray-100">Login
                    </a>

                    <a href="{{ route('register') }}"
                    class="text-sm text-gray-600 hover:text-gray-800 px-2 dark:text-gray-300 dark:hover:text-gray-100" >Register
                    </a>
                    @endguest

                    <x-jet-dropdown align="right" width="48">

                        <x-slot name="trigger">

                            @auth
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition {{config('settings.color4')}}">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                            @endauth
                        </x-slot>


                        <x-slot name="content">

                            @can('create', App\Models\Posts\Post::class)
                            <div class="block px-4 py-2 text-xs text-gray-400 dark:text-gray-300">
                                {{ __('Posts') }}
                            </div>
                            <x-jet-dropdown-link href="{{ route('post.create') }}">
                                {{ __('Create Post') }}
                            </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400 dark:text-gray-300">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                            @endif

                            @if (auth()->check() && auth()->user()->isAdmin())

                            <div class="border-t border-gray-100"></div>
                            <!-- Team Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400 dark:text-gray-300">
                                {{ __('Manage Team') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('team.settings') }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @endif

                            <div class="border-t border-gray-100"></div>


                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>

                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-300 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>

            @can('viewAny', App\Models\Forum\Category::class)
            <x-jet-responsive-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                {{ __('Forum') }}
            </x-jet-responsive-nav-link>
            @endcan

            <x-jet-responsive-nav-link href=" {{ route('clan-wars.index') }}" :active="request()->routeIs('clan-wars.index')">
                {{ __('Clan Wars') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('replays.index') }}" :active="request()->routeIs('replays.index')">
                {{ __('Replays') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('team.index') }}" :active="request()->routeIs('team.index')">
                {{ __('Team') }}
            </x-jet-responsive-nav-link>

            @if ((auth()->check()) && (auth()->user()->isViceCaptain()))
                <x-jet-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                    {{ __('Users') }}
                </x-jet-responsive-nav-link>
            @endif


        </div>



        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="flex items-center px-4">

                @auth
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="flex-shrink-0 mr-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                @endif
                @endauth

                <div>
                    @auth
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
                    @endauth
                </div>

            </div>

            <div class="mt-3 space-y-1">

                <!-- Create Post -->
                @can('create', App\Models\Posts\Post::class)
                <x-jet-responsive-nav-link href="{{ route('post.create') }}"
                    :active="request()->routeIs('post.create')">
                    {{ __('Create Post') }}
                </x-jet-responsive-nav-link>
                @endcan


                @auth
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-jet-responsive-nav-link>
                @endif

                @if (auth()->check() && auth()->user()->isAdmin())

                <x-jet-responsive-nav-link href="{{ route('team.settings') }}"
                    :active="request()->routeIs('team.settings')">
                    {{ __('Team Settings') }}
                </x-jet-responsive-nav-link>

                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
                @endauth

                @guest
                <x-jet-responsive-nav-link href="{{ route('login') }}">
                    {{ __('Login') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('register') }}">
                    {{ __('Register') }}
                </x-jet-responsive-nav-link>

                @endguest

            </div>


        </div>


    </div>
</nav>
