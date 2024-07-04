<nav class="bg-gray-800">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="w-8 h-8" src="{{ asset('assets/images/logo.png') }}" alt="Your Company">
                </div>
                <div class="hidden lg:block">
                    <div class="flex items-baseline ml-10 space-x-4">
                        <a href="/dashboard"
                            class="px-3 py-2 text-sm font-medium rounded-md {{ $title == 'Dashboard' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Dashboard</a>
                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <a href="/dashboard/users"
                                class="px-3 py-2 text-sm font-medium rounded-md {{ $title == 'Users' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Users</a>
                        @endif
                        <a href="/dashboard/posts"
                            class="px-3 py-2 text-sm font-medium rounded-md {{ $title == 'Posts' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Posts</a>
                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <a href="/dashboard/member-categories"
                                class="px-3 py-2 text-sm font-medium rounded-md {{ $title == 'Member Categories' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Member
                                Categories</a>
                        @endif
                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <a href="/dashboard/members"
                                class="px-3 py-2 text-sm font-medium rounded-md {{ $title == 'Members' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Members</a>
                        @endif
                        @if (Auth::check() && Auth::user()->role === 'admin')
                            <a href="/dashboard/cabinets"
                                class="px-3 py-2 text-sm font-medium rounded-md {{ $title == 'Cabinets' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Cabinets</a>
                        @endif
                        <a href="/dashboard/messages"
                            class="px-3 py-2 text-sm font-medium rounded-md {{ $title == 'Messages' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Messages</a>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="flex items-center ml-4 md:ml-6">
                    <button type="button"
                        class="relative p-1 text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                class="relative flex items-center max-w-xs text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="toggleDropdown">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ optional(Auth::user())->photo ?: 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg' }}"
                                    alt="{{ Auth::user()->name }}">
                            </button>
                        </div>
                        <div class="absolute right-0 z-10 hidden w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            id="dropdown">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="block px-4 py-2 text-sm text-gray-700" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex -mr-2 lg:hidden">
                <!-- Mobile menu button -->
                <button type="button" id="toggleNav"
                    class="relative inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg id="hamburgerIcon" class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg id="closeIcon" class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden lg:hidden" id="navbar">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/dashboard"
                class="block rounded-md px-3 py-2 text-base font-medium {{ $title == 'Dashboard' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Dashboard</a>
            @if (Auth::check() && Auth::user()->role === 'admin')
                <a href="/dashboard/users"
                    class="block rounded-md px-3 py-2 text-base font-medium {{ $title == 'Users' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Users</a>
            @endif
            <a href="/dashboard/posts"
                class="block rounded-md px-3 py-2 text-base font-medium {{ $title == 'Posts' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Posts</a>
            @if (Auth::check() && Auth::user()->role === 'admin')
                <a href="/dashboard/member-categories"
                    class="block rounded-md px-3 py-2 text-base font-medium {{ $title == 'Member Categories' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Member
                    Categories</a>
            @endif
            @if (Auth::check() && Auth::user()->role === 'admin')
                <a href="/dashboard/members"
                    class="block rounded-md px-3 py-2 text-base font-medium {{ $title == 'Members' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Members</a>
            @endif
            @if (Auth::check() && Auth::user()->role === 'admin')
                <a href="/dashboard/cabinets"
                    class="block rounded-md px-3 py-2 text-base font-medium {{ $title == 'Cabinets' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Cabinets</a>
            @endif
            <a href="/dashboard/messages"
                class="block rounded-md px-3 py-2 text-base font-medium {{ $title == 'Messages' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Messages</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10 rounded-full"
                        src="{{ optional(Auth::user())->photo ?: 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg' }}"
                        alt="{{ Auth::user()->name }}">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                </div>
                <button type="button"
                    class="relative flex-shrink-0 p-1 ml-auto text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>
            </div>
            <div class="px-2 mt-3 space-y-1">
                <a href="#"
                    class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:bg-gray-700 hover:text-white">Your
                    Profile</a>
                <a href="#"
                    class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:bg-gray-700 hover:text-white">Settings</a>
                <a href="#"
                    class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:bg-gray-700 hover:text-white">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>
