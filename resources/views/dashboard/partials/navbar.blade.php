<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="{{ asset('assets/images/logo.png') }}" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
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
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="toggleDropdown">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="{{ optional(Auth::user())->photo ?: 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg' }}"
                                    alt="{{ Auth::user()->name }}">
                            </button>
                        </div>
                        <div class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
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
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" id="toggleNav"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg id="hamburgerIcon" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg id="closeIcon" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden md:hidden" id="navbar">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/"
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
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="{{ optional(Auth::user())->photo ?: 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg' }}"
                        alt="{{ Auth::user()->name }}">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                </div>
                <button type="button"
                    class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                    Profile</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>
