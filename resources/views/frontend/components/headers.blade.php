<div x-data="{ open: false, companyOpen: false, itSolutionsOpen: false }">
    <nav class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full z-50 top-0 left-0 transition-all duration-300"
        id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">

                <div class="shrink-0 flex items-center cursor-pointer">
                    <a href="{{route('/')}}" class="flex items-center gap-2 group">
                        <div
                            class="w-32 sm:w-40 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                            <img src="{{asset('frontendimages/homeimages/image.png')}}" alt="Company Logo"
                                class="max-w-full h-auto object-contain">
                        </div>
                    </a>
                </div>

                <div class="hidden lg:flex space-x-10 items-center">

                    <a href="{{route('/')}}" class="relative font-semibold text-sm tracking-wide transition-colors duration-300 group py-2
                        {{ request()->routeIs('/') ? 'text-[#2f2f73]' : 'text-gray-600 hover:text-[#2f2f73]' }}">
                        Home
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#2f2f73] transition-all duration-300 group-hover:w-full 
                        {{ request()->routeIs('/') ? 'w-full' : '' }}"></span>
                    </a>

                    <a href="{{route('about')}}" class="relative font-semibold text-sm tracking-wide transition-colors duration-300 group py-2
                        {{ request()->routeIs('about') ? 'text-[#2f2f73]' : 'text-gray-600 hover:text-[#2f2f73]' }}">
                        About
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#2f2f73] transition-all duration-300 group-hover:w-full
                        {{ request()->routeIs('about') ? 'w-full' : '' }}"></span>
                    </a>

                    <a href="{{route('projects')}}"
                        class="relative font-semibold text-sm tracking-wide transition-colors duration-300 group py-2
                        {{ request()->routeIs('projects') ? 'text-[#2f2f73]' : 'text-gray-600 hover:text-[#2f2f73]' }}">
                        Projects
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#2f2f73] transition-all duration-300 group-hover:w-full
                        {{ request()->routeIs('projects') ? 'w-full' : '' }}"></span>
                    </a>

                    <a href="{{ route('services') }}"
                        class="relative font-semibold text-sm tracking-wide transition-colors duration-300 group py-2
                        {{ request()->routeIs('services') ? 'text-[#2f2f73]' : 'text-gray-600 hover:text-[#2f2f73]' }}">
                        Services
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#2f2f73] transition-all duration-300 group-hover:w-full
                        {{ request()->routeIs('services') ? 'w-full' : '' }}"></span>
                    </a>

                    <a href="{{ route('contactus') }}"
                        class="relative font-semibold text-sm tracking-wide transition-colors duration-300 group py-2
                        {{ request()->routeIs('contactus') ? 'text-[#2f2f73]' : 'text-gray-600 hover:text-[#2f2f73]' }}">
                        Contact
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#2f2f73] transition-all duration-300 group-hover:w-full
                        {{ request()->routeIs('contactus') ? 'w-full' : '' }}"></span>
                    </a>
                </div>

                <div class="hidden lg:flex items-center">
                    <a href="{{ route('contactus') }}#contact-Form"
                        class="bg-[#2f2f73] text-white px-7 py-3 rounded-full font-bold text-sm transition-all duration-300 shadow-lg shadow-[#2f2f73]/30 hover:shadow-[#2f2f73]/50 hover:-translate-y-1 hover:bg-[#38388a]">
                        Get a Quote
                    </a>
                </div>

                <div class="lg:hidden flex items-center">
                    <button @click="open = true"
                        class="text-[#2f2f73] focus:outline-none p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed inset-0 bg-white z-[60] transform lg:hidden flex flex-col h-screen w-full overflow-y-auto">

        <div
            class="p-4 sm:p-6 border-b border-gray-100 flex justify-between items-center h-20 bg-white sticky top-0 z-10">
            <div class="flex items-center gap-2">
                <div class="w-32 sm:w-36 flex items-center justify-center">
                    <img src="{{asset('frontendimages/homeimages/image.png')}}" alt="Company Logo"
                        class="max-w-full h-auto object-contain">
                </div>
            </div>

            <button @click="open = false"
                class="text-[#2f2f73] focus:outline-none p-2 rounded-full hover:bg-red-50 hover:text-red-600 transition-colors duration-300">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
            <nav class="flex flex-col space-y-2">
                <div>
                    <a @click="open = false" href="{{ route('/') }}"
                        class="flex justify-between items-center w-full p-3 rounded-lg text-lg font-semibold 
                        {{ request()->routeIs('/') ? 'bg-blue-50 text-[#2f2f73]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#2f2f73]' }} transition duration-200">
                        Home
                    </a>
                </div>

                <div class="rounded-lg overflow-hidden transition-all duration-300"
                    :class="{'bg-gray-50': companyOpen}">
                    <button @click="companyOpen = !companyOpen"
                        class="flex justify-between items-center w-full p-3 text-lg font-semibold text-gray-700 hover:text-[#2f2f73] transition duration-200">
                        Company
                        <svg :class="{'rotate-180': companyOpen}"
                            class="w-5 h-5 text-[#2f2f73] transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <ul x-show="companyOpen" x-collapse.duration.300ms class="px-3 pb-3 space-y-1">
                        <li><a @click="open = false" href="{{ route('about') }}"
                                class="block p-2 rounded-md text-gray-600 hover:bg-white hover:text-[#2f2f73] hover:shadow-sm font-medium transition duration-150 pl-4 border-l-2 border-transparent hover:border-[#2f2f73]">About
                                Us</a></li>
                        <li><a @click="open = false" href="{{ route('contactus') }}"
                                class="block p-2 rounded-md text-gray-600 hover:bg-white hover:text-[#2f2f73] hover:shadow-sm font-medium transition duration-150 pl-4 border-l-2 border-transparent hover:border-[#2f2f73]">Contact
                                Us</a></li>
                        <li><a @click="open = false" href="{{ route('projects') }}"
                                class="block p-2 rounded-md text-gray-600 hover:bg-white hover:text-[#2f2f73] hover:shadow-sm font-medium transition duration-150 pl-4 border-l-2 border-transparent hover:border-[#2f2f73]">Our
                                Projects</a></li>
                    </ul>
                </div>

                <div class="rounded-lg overflow-hidden transition-all duration-300"
                    :class="{'bg-gray-50': itSolutionsOpen}">
                    <button @click="itSolutionsOpen = !itSolutionsOpen"
                        class="flex justify-between items-center w-full p-3 text-lg font-semibold text-gray-700 hover:text-[#2f2f73] transition duration-200">
                        IT Solutions
                        <svg :class="{'rotate-180': itSolutionsOpen}"
                            class="w-5 h-5 text-[#2f2f73] transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <ul x-show="itSolutionsOpen" x-collapse.duration.300ms class="px-3 pb-3 space-y-1">
                        <li><a @click="open = false" href="{{ route('services') }}"
                                class="block p-2 rounded-md text-gray-600 hover:bg-white hover:text-[#2f2f73] hover:shadow-sm font-medium transition duration-150 pl-4 border-l-2 border-transparent hover:border-[#2f2f73]">IT
                                Services</a></li>
                        <li><a @click="open = false" href="#"
                                class="block p-2 rounded-md text-gray-600 hover:bg-white hover:text-[#2f2f73] hover:shadow-sm font-medium transition duration-150 pl-4 border-l-2 border-transparent hover:border-[#2f2f73]">Managed
                                IT</a></li>
                        <li><a @click="open = false" href="#"
                                class="block p-2 rounded-md text-gray-600 hover:bg-white hover:text-[#2f2f73] hover:shadow-sm font-medium transition duration-150 pl-4 border-l-2 border-transparent hover:border-[#2f2f73]">Business
                                Solutions</a></li>
                    </ul>
                </div>

                <a @click="open = false" href="#"
                    class="block p-3 rounded-lg text-lg font-semibold text-gray-700 hover:bg-gray-50 hover:text-[#2f2f73] transition duration-200">Careers</a>
                <a @click="open = false" href="#"
                    class="block p-3 rounded-lg text-lg font-semibold text-gray-700 hover:bg-gray-50 hover:text-[#2f2f73] transition duration-200">Blog</a>
            </nav>
        </div>

        <div class="p-6 bg-white border-t border-gray-100 shadow-[0_-5px_15px_rgba(0,0,0,0.05)] z-20">
            <a @click="open = false" href="{{ route('contactus') }}#contactForm"
                class="flex items-center justify-center w-full bg-[#2f2f73] hover:bg-blue-900 text-white text-lg px-6 py-4 rounded-xl font-bold transition duration-300 shadow-xl shadow-[#2f2f73]/20 active:scale-95">
                Get a Quote
            </a>

            <div class="mt-4 text-center text-sm text-gray-500">
                Need help? Call us:
                <a href="tel:0123456789"
                    class="text-[#2f2f73] font-bold hover:underline transition duration-150">01-4500062</a>
            </div>
        </div>
    </div>
</div>