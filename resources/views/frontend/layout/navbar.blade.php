<!-- Navbar -->
<nav class="bg-white shadow-md fixed w-full z-50 top-0 left-0 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8">
        <div class="flex justify-between h-16 sm:h-20 items-center">

            <!-- Logo -->
            <div class="shrink-0 flex items-center cursor-pointer">
                <a href="{{url('/')}}" class="flex items-center gap-2">
                    <div class="w-28 sm:w-36 md:w-40 flex items-center justify-center">
                        <img src="{{asset('frontendimages/homeimages/image.png')}}" alt=""
                            class="max-w-full h-auto object-contain">
                    </div>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex space-x-8 items-center">
                <a href="{{route('home')}}"
                    class="text-[#2f2f73] hover:text-blue-800 font-medium transition duration-300">Home</a>
                <a href="{{route('about')}}"
                    class="text-[#2f2f73] hover:text-blue-800 font-medium transition duration-300">About</a>
                <a href="{{route('projects')}}"
                    class="text-[#2f2f73] hover:text-blue-800 font-medium transition duration-300">Projects</a>
                <a href="{{ route('services') }}"
                    class="text-[#2f2f73] hover:text-blue-800 font-medium transition duration-300">Services</a>
                <a href="{{ route('contact') }}"
                    class="text-[#2f2f73] hover:text-blue-800 font-medium transition duration-300">Contact</a>
            </div>

            <!-- Desktop Button -->
            <div class="hidden lg:flex items-center">
                <a href="#"
                    class="bg-[#2f2f73] hover:bg-opacity-90 text-white px-6 py-2.5 rounded-full font-medium transition duration-300 shadow-sm">
                    Get a Quote
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-[#2f2f73] focus:outline-none p-2">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu"
    class="fixed inset-0 bg-white z-50 transform translate-x-full transition-transform duration-300 lg:hidden flex flex-col h-screen w-screen overflow-y-auto">

    <div class="p-4 sm:p-6 border-b border-gray-100 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-28 sm:w-32 flex items-center justify-center">
                <img src="{{asset('frontendimages/homeimages/image.png')}}" alt=""
                    class="max-w-full h-auto object-contain">
            </div>
        </div>

        <button id="close-menu-btn" class="text-[#2f2f73] focus:outline-none p-2">
            <i class="fas fa-times text-2xl"></i>
        </button>
    </div>

    <div class="flex-1 overflow-y-auto py-4 px-4 sm:px-6">
        <nav class="flex flex-col space-y-1">
            <div>
                <a href="{{ route('home') }}"
                    class="flex justify-between items-center w-full py-3 text-base sm:text-lg font-medium text-gray-800 border-b border-gray-100">
                    Home
                </a>
            </div>

            <div>
                <button
                    class="flex justify-between items-center w-full py-3 text-base sm:text-lg font-medium text-gray-800 border-b border-gray-100 submenu-toggle">
                    Company
                    <i class="fas fa-chevron-down text-sm text-[#2f2f73] transition-transform duration-300"></i>
                </button>
                <ul class="sub-menu pl-4 bg-gray-50 rounded-md overflow-hidden">
                    <li><a href="{{ route('about') }}" class="block py-2 text-[#2f2f73]">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="block py-2 text-[#2f2f73]">Contact Us</a></li>
                    <li><a href="{{ route('projects') }}" class="block py-2 text-[#2f2f73]">Our Projects</a></li>
                </ul>
            </div>

            <div>
                <button
                    class="flex justify-between items-center w-full py-3 text-base sm:text-lg font-medium text-gray-800 border-b border-gray-100 submenu-toggle">
                    IT Solutions
                    <i class="fas fa-chevron-down text-sm text-[#2f2f73] transition-transform duration-300"></i>
                </button>
                <ul class="sub-menu pl-4 bg-gray-50 rounded-md overflow-hidden">
                    <li><a href="{{ route('services') }}" class="block py-2 text-[#2f2f73]">IT Services</a></li>
                    <li><a href="#" class="block py-2 text-[#2f2f73]">Managed IT</a></li>
                    <li><a href="#" class="block py-2 text-[#2f2f73]">Business Solutions</a></li>
                </ul>
            </div>

            <a href="#"
                class="block py-3 text-base sm:text-lg font-medium text-gray-800 border-b border-gray-100">Careers</a>
            <a href="#"
                class="block py-3 text-base sm:text-lg font-medium text-gray-800 border-b border-gray-100">Blog</a>
        </nav>
    </div>

    <div class="p-4 sm:p-6 bg-gray-50">
        <a href="#"
            class="flex items-center justify-center w-full bg-[#2f2f73] hover:bg-opacity-90 text-white text-base sm:text-lg px-6 py-3 rounded-md font-medium transition duration-300 shadow-md">
            Get a Quote
        </a>

        <div class="mt-4 text-center text-sm text-gray-500">
            Call us:
            <a href="tel:0123456789" class="text-primary-custom font-bold">01-4500062</a>
        </div>
    </div>
</div>