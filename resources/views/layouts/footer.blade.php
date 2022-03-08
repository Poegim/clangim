<div>
    <footer class="text-gray-600 bg-gray-800 body-font {{config('settings.color1')}}">
      <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
        <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
          <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            <span class="ml-3 text-xl text-white">CLANGIM</span>
          </a>
          <p class="mt-2 ml-3 text-sm text-white">Just enjoy StarCraft.</p>
        </div>
        <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
          <div class="lg:w-1/4 md:w-1/2 w-full px-4">
            <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">Navigation</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-white hover:text-red-300" href="{{ route('dashboard') }}">Dashboard</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="{{route('clan-wars.index')}}">Clan Wars</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="{{route('replays.index')}}">Replays</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="{{route('team.index')}}">Team</a>
              </li>
            </nav>
          </div>
          <div class="lg:w-1/4 md:w-1/2 w-full px-4">
            <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">GIT Links</h2>
            <nav class="list-none mb-10">
                <li>
                  <a class="text-white hover:text-red-300" href="https://github.com/poegim">Author</a>
                </li>
                <li>
                  <a class="text-white hover:text-red-300" href="https://github.com/poegim/clangim">Clangim</a>
                </li>
                <li>
                    <a class="text-white hover:text-red-300" href="https://github.com/icza/screp">Screp Repository</a>
                </li>

              </nav>
          </div>
          <div class="lg:w-1/4 md:w-1/2 w-full px-4">
            <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">{{ env('APP_NAME') }}</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-white hover:text-red-300" href="mailto:{{ config('settings.email') }}">Contact US</a></a>
              </li>

            </nav>
          </div>
          <div class="lg:w-1/4 md:w-1/2 w-full px-4">
            <h2 class="title-font font-bold text-white tracking-widest text-md mb-3">Just required stuff</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-white hover:text-red-300" href="{{route('post.show', 'cookies')}}">Cookies</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="{{route('post.show', 'license')}}">License</a>
              </li>
              <li>
                <a class="text-white hover:text-red-300" href="{{route('post.show', 'media')}}">Media</a>
              </li>
            </nav>
          </div>
        </div>
      </div>
      <div class="bg-gray-700 {{config('settings.color4')}}">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
          <p class="text-white text-sm text-center sm:text-left">2020  — {{ \Carbon\Carbon::now()->format('Y') }}
            <a href="https://github.com/poegim" rel="noopener noreferrer" class="text-gray-400 ml-1 hover:text-white" target="_blank">Poegim</a>
            <span class="block lg:inline lg:ml-36">
                StarCraft is a trademark or registered trademark of Blizzard Entertainment, Inc.
            </span>
          </p>

          <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
            <a class="ml-3 text-gray-400 hover:text-white" href="https://github.com/poegim/clangim" target="_blank">
                <x-fab-github class="h-5 w-5"/>
            </a>
          </span>
        </div>
      </div>
    </footer>
  </div>
