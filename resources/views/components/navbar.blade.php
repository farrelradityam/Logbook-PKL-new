<nav class="bg-violet-950" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <x-nav-link href="/home" :active="request()->is('home')">Home</x-nav-link>
              <x-nav-link href="/team" :active="request()->is('team')">Team</x-nav-link>
              <x-nav-link href="/projects" :active="request()->is('projects')">Projects</x-nav-link>
              <x-nav-link href="/calendar" :active="request()->is('calendar')">Crud</x-nav-link>
              <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                  <button @click="isOpen = !isOpen" class="flex items-center text-sm text-white ">
                      <span>{{ Auth::user()->name }}</span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-0.5 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" 
                          :class="isOpen ? 'rotate-180' : 'rotate-0'">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                      </svg>
                  </button>
              </div>

              <div x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-36 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="{{ route('profile.show') }}" class="block w-full text-left px-4 py-2 text-sm text-gray-500 hover:text-gray-950 hover:translate-y-[-2px] transition-transform duration-150 ease-in-out" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
                <a href="#" class="block w-full text-left px-4 py-2 text-sm text-gray-500 hover:text-gray-950 hover:translate-y-[-2px] transition-transform duration-150 ease-in-out" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-500 hover:text-gray-950 hover:translate-y-[-2px] transition-transform duration-150 ease-in-out" role="menuitem" tabindex="-1" id="user-menu-item-2">Log out</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button"  @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" 
            class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg :class="{'block': isOpen, 'hidden': !isOpen }"
            class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3 ml-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <x-nav-link href="home" :active="request()->is('home')">Home</x-nav-link>
        <x-nav-link href="team" :active="request()->is('team')">Team</x-nav-link>
        <x-nav-link href="projects" :active="request()->is('projects')">Projects</x-nav-link>
        <x-nav-link href="calendar" :active="request()->is('calendar')">Crud</x-nav-link>
        <x-nav-link href="about" :active="request()->is('about')">About</x-nav-link>
      </div>

      <hr class="border-t border-gray-600 mt-2 ml-6 mr-6">
      <div class="pb-3 pt-4">
        <div class="flex items-center px-5 mb-5">
          <div class="flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg>
          </div>

          <div class="mt-3">
              <div class="text-base font-medium text-gray-300">{{ Auth::user()->name }}</div>
              <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
          </div>
        </div>

        <hr class="border-t border-gray-600 ml-6 mr-6 mt-2">
        <div class="mt-1 space-y-1 px-2 ml-3 mr-3">
          <a href="{{ route('profile.show') }}" class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Profile</a>
          <a href="#" class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                Log out
            </button>
        </form>
        </div>
      </div>
    </div>
  </nav>