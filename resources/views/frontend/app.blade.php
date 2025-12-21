<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Nepal Tech Solutions</title>
    <link rel="icon" type="image/png" href="{{ asset('frontendimages/homeimages/image.png') }}" />

    {{--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('style')
    
</head>

<body>
    {{-- preloader --}}
    <div id="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <header>
        @include('frontend.components.headers')
    </header>
    <main>
        @yield('content')
    </main>

    <!-- Scroll Top Button -->
    <a href="#" id="scroll-top"
        class="fixed bottom-6 right-6 bg-[#e32726] text-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg transform translate-y-20 opacity-0 transition-all duration-300 z-40">
        <i class="fas fa-arrow-up"></i>
    </a>

    <footer>
        @include('frontend.components.footers')
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- --}}
    @stack('script')
</body>

</html>