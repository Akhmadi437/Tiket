<div class="drawer lg:drawer-open">
    <input id="drawer" type="checkbox" class="drawer-toggle" />

    {{-- CONTENT --}}
    <div class="drawer-content">
        {{-- Navbar --}}
        <nav class="navbar bg-base-300">
            <label for="drawer" class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     class="w-5 h-5"
                     fill="none"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </label>
        </nav>

        {{-- PAGE CONTENT --}}
        @yield('content')
    </div>

    {{-- SIDEBAR --}}
    <div class="drawer-side">
        <label for="drawer" class="drawer-overlay"></label>

        <aside class="menu p-4 w-64 bg-base-200 min-h-screen flex flex-col">

            {{-- Logo --}}
            <div class="mb-6 text-center">
                <img src="{{ asset('assets/images/logo_bengkod.svg') }}"
                     class="mx-auto"
                     alt="Logo">
            </div>

            {{-- Menu --}}
            <ul>
                <li class="{{ request()->routeIs('admin.dashboard') ? 'bg-base-300 rounded' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Dashboard
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.categories.*') ? 'bg-base-300 rounded' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                        Manajemen Kategori
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.lokations.*') ? 'bg-base-300 rounded' : '' }}">
                    <a href="{{ route('admin.lokations.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        Manajemen Lokasi
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.events.*') ? 'bg-base-300 rounded' : '' }}">
                    <a href="{{ route('admin.events.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        Manajemen Event
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.tickets.*') ? 'bg-base-300 rounded' : '' }}">
                    <a href="{{ route('admin.tickets.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 7.5V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2.5M6 13v2M6 17v2M10 13v2M10 17v2M14 13v2M14 17v2M18 13v2M18 17v2"></path><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                        Manajemen Tiket
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.ticket-types.*') ? 'bg-base-300 rounded' : '' }}">
                    <a href="{{ route('admin.ticket-types.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        Tipe Tiket
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.histories.*') ? 'bg-base-300 rounded' : '' }}">
                    <a href="{{ route('admin.histories.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        History
                    </a>
                </li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="w-full text-left hover:bg-base-300 rounded px-4 py-2">
            Logout
        </button>
    </form>
        </aside>
    </div>
</div>
