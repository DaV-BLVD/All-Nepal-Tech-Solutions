<!-- sidebar.blade.php -->
<div x-data="{ sidebarOpen: false }" class="relative">

    <!-- Mobile Toggle Button -->
    <button @click="sidebarOpen = true"
        class="md:hidden fixed top-4 left-4 z-40 p-2 bg-secondary text-white rounded shadow-lg">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="bg-primary text-white w-64 h-full flex flex-col transition-transform duration-300 fixed z-40 md:relative md:translate-x-0">

        <!-- Logo -->
        <div class="h-16 flex items-center justify-center bg-white shadow-xl border-b border-amber-300">
            <a href="{{ route('admin.dashboard') }}"
                class="text-xl sm:text-2xl font-black text-orange-500 tracking-tight hover:text-amber-800 transition duration-300">
                <img src="{{asset('frontendimages/homeimages/image.png')}}" alt="Company Logo" class="w-32">
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto styled-scrollbar" x-data="{ activeDropdown: null }">

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}" @click="sidebarOpen = false" class="flex items-center px-4 py-3 hover:bg-[#ff4242] hover:rounded-lg
                {{ request()->routeIs('admin.dashboard') ? 'bg-[#ff4242] text-white font-semibold rounded-lg' : '' }}">
                <i class="fas fa-tachometer-alt w-6"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            {{-- Users (Super Admin Only) --}}
            @if(auth()->user()->role === 'super_admin')
                <a href="{{ route('users.index') }}" @click="sidebarOpen = false" class="flex items-center px-4 py-3 hover:bg-[#ff4242] hover:rounded-lg
                            {{ request()->routeIs('users.*') ? 'bg-[#ff4242] text-white font-semibold rounded-lg' : '' }}">
                    <i class="fa-solid fa-users w-6"></i>
                    <span class="font-medium">Users</span>
                </a>
            @endif

            @php
                $dropdowns = [
                    [
                        'title' => 'Home Page',
                        'icon' => 'fa-solid fa-house-chimney',
                        'routes' => [
                            'home-header.*',
                            'services.*',
                            'features.*',
                            'section.*',
                            'excellence.*',
                            'statistics.*',
                            'team_members.*',
                            'contact_settings.*',
                        ],
                        'links' => [
                            ['route' => 'home-header.index', 'icon' => 'fa-solid fa-window-maximize', 'text' => 'Home Page Header'],
                            ['route' => 'services.index', 'icon' => 'fa-solid fa-briefcase', 'text' => 'Services'],
                            ['route' => 'section.index', 'icon' => 'fa-solid fa-square-poll-horizontal', 'text' => 'Company Section (Left)'],
                            ['route' => 'features.index', 'icon' => 'fa-solid fa-wand-magic-sparkles', 'text' => 'Company Features (Right)'],
                            ['route' => 'excellence.index', 'icon' => 'fa-solid fa-award', 'text' => 'Hire Us, Why Not?'],
                            ['route' => 'statistics.index', 'icon' => 'fa-solid fa-chart-line', 'text' => 'Statistics'],
                            ['route' => 'team_members.index', 'icon' => 'fa-solid fa-users-gear', 'text' => 'Team Members'],
                            ['route' => 'contact_settings.index', 'icon' => 'fa-solid fa-address-book', 'text' => 'Contact Settings'],
                        ],
                    ],
                    [
                        'title' => 'About Us Page',
                        'icon' => 'fa-solid fa-address-card',
                        'routes' => [
                            'about-header.*',
                            'milestones.*',
                            'company_statement.*',
                            'core_values.*',
                            'about_services.*',
                            'why_choose_us.*',
                        ],
                        'links' => [
                            ['route' => 'about-header.index', 'icon' => 'fa-solid fa-heading', 'text' => 'About Page Header'],
                            ['route' => 'milestones.index', 'icon' => 'fa-solid fa-flag-checkered', 'text' => 'Milestones'],
                            ['route' => 'company_statement.index', 'icon' => 'fa-solid fa-quote-left', 'text' => 'Company Statements'],
                            ['route' => 'core_values.index', 'icon' => 'fa-solid fa-heart-pulse', 'text' => 'Core Values'],
                            ['route' => 'about_services.index', 'icon' => 'fa-solid fa-info-circle', 'text' => 'About Services'],
                            ['route' => 'why_choose_us.index', 'icon' => 'fa-solid fa-circle-question', 'text' => 'Why Choose Us'],
                        ],
                    ],
                    [
                        'title' => 'Projects Page',
                        'icon' => 'fa-solid fa-diagram-project',
                        'routes' => [
                            'projects-header.*',
                            'projects.*',
                        ],
                        'links' => [
                            ['route' => 'projects-header.index', 'icon' => 'fa-solid fa-image', 'text' => 'Projects Page Header'],
                            ['route' => 'projects.index', 'icon' => 'fa-solid fa-list-check', 'text' => 'Projects'],
                        ],
                    ],
                    [
                        'title' => 'Services Page',
                        'icon' => 'fa-solid fa-gears',
                        'routes' => [
                            'service-header.*',
                            'comprehensive_services.*',
                            'why_choose_us_services.*',
                            'consults.*',
                        ],
                        'links' => [
                            ['route' => 'service-header.index', 'icon' => 'fa-solid fa-toolbox', 'text' => 'Service Page Header'],
                            ['route' => 'comprehensive_services.index', 'icon' => 'fa-solid fa-microchip', 'text' => 'Comprehensive Services'],
                            ['route' => 'why_choose_us_services.index', 'icon' => 'fa-solid fa-star-half-stroke', 'text' => 'Why Choose Us Services'],
                            ['route' => 'consults.index', 'icon' => 'fa-solid fa-clipboard-list', 'text' => 'Consults Messages'],
                        ],
                    ],
                ];
            @endphp

            {{-- Dropdown Loop --}}
            @foreach($dropdowns as $dropdown)

                @php
                    $isActive = false;
                    foreach ($dropdown['routes'] as $pattern) {
                        if (request()->routeIs($pattern)) {
                            $isActive = true;
                            break;
                        }
                    }
                @endphp

                <div class="mb-2" x-init="{{ $isActive ? 'activeDropdown = \'' . $dropdown['title'] . '\'' : '' }}">

                    <button @click="activeDropdown === '{{ $dropdown['title'] }}'
                        ? activeDropdown = null : activeDropdown = '{{ $dropdown['title'] }}'" class="flex items-center justify-between w-full px-4 py-3 hover:bg-[#ff4242] transition
                        {{ $isActive ? 'bg-[#ff4242] text-white font-bold rounded-lg' : '' }}">

                        <span class="flex items-center space-x-2">
                            <i class="{{ $dropdown['icon'] }} w-6"></i>
                            <span class="font-medium">{{ $dropdown['title'] }}</span>
                        </span>
                        <i :class="activeDropdown === '{{ $dropdown['title'] }}' ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'"
                            class="transition-transform duration-300"></i>
                    </button>

                    <div x-show="activeDropdown === '{{ $dropdown['title'] }}'" x-transition class="mt-1 space-y-1 pl-6">

                        @foreach($dropdown['links'] as $link)
                            <a href="{{ route($link['route']) }}" @click="sidebarOpen = false" class="flex items-center px-4 py-2 rounded-lg hover:bg-[#ff4242]
                            {{ request()->routeIs(explode('.', $link['route'])[0] . '.*')
                                ? 'bg-[#ff4242] text-white font-bold' : 'text-white' }}">
                            <i class="{{ $link['icon'] }} w-6"></i>
                            <span class="font-medium">{{ $link['text'] }}</span>
                        </a>

                        @endforeach
                    </div>
                </div>
            @endforeach

            {{-- Contact Page Header --}}
            <a href="{{ route('contact-header.index') }}" @click="sidebarOpen = false"
                class="flex items-center px-4 py-3 hover:bg-[#ff4242] hover:rounded-lg
                {{ request()->routeIs('contact-header.*') ? 'bg-[#ff4242] text-white font-semibold rounded-lg' : '' }}">
                <i class="fas fa-heading w-6"></i>
                <span class="font-medium">Contact Page Header</span>
            </a>

            {{-- Map Locations --}}
            <a href="{{ route('map_locations.index') }}" @click="sidebarOpen = false" 
                class="flex items-center px-4 py-3 hover:bg-[#ff4242] hover:rounded-lg
                {{ request()->routeIs('map_locations.*') ? 'bg-[#ff4242] text-white font-semibold rounded-lg' : '' }}">
                <i class="fas fa-map-location-dot w-6"></i>
                <span class="font-medium">Map Locations</span>
            </a>

            {{-- Footer Contact --}}
            <a href="{{ route('contact_cards.index') }}" @click="sidebarOpen = false" 
                class="flex items-center px-4 py-3 hover:bg-[#ff4242] hover:rounded-lg
                {{ request()->routeIs('contact_cards.*') ? 'bg-[#ff4242] text-white font-semibold rounded-lg' : '' }}">
                <i class="fas fa-address-card w-6"></i>
                <span class="font-medium">Footer Contact</span>
            </a>

            {{-- Footer Social Links --}}
            <a href="{{ route('social_links.index') }}" @click="sidebarOpen = false" 
                class="flex items-center px-4 py-3 hover:bg-[#ff4242] hover:rounded-lg
                {{ request()->routeIs('social_links.*') ? 'bg-[#ff4242] text-white font-semibold rounded-lg' : '' }}">
                <i class="fas fa-share-nodes w-6"></i>
                <span class="font-medium">Footer Social Links</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex w-full items-center px-4 py-2 text-gray-300 hover:text-white transition-colors">
                    <i class="fas fa-sign-out-alt w-6"></i>
                    <span class="font-medium ml-2">Logout</span>
                </button>
            </form>
        </div>
    </aside>
</div>