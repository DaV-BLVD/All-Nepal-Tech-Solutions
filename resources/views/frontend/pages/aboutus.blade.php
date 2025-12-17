@extends('frontend.app')

@section('content')
    @push('style')
        <style>
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideInLeft {
                from {
                    opacity: 0;
                    transform: translateX(-30px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translateX(30px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            .fade-in {
                opacity: 0;
                transform: translateY(30px);
                transition: opacity 0.8s ease, transform 0.8s ease;
            }

            .fade-in.visible {
                opacity: 1;
                transform: translateY(0);
            }

            .slide-left {
                opacity: 0;
                transform: translateX(-50px);
                transition: opacity 0.8s ease, transform 0.8s ease;
            }

            .slide-left.visible {
                opacity: 1;
                transform: translateX(0);
            }

            .slide-right {
                opacity: 0;
                transform: translateX(50px);
                transition: opacity 0.8s ease, transform 0.8s ease;
            }

            .slide-right.visible {
                opacity: 1;
                transform: translateX(0);
            }

            .scale-in {
                opacity: 0;
                transform: scale(0.8);
                transition: opacity 0.6s ease, transform 0.6s ease;
            }

            .scale-in.visible {
                opacity: 1;
                transform: scale(1);
            }



            .timeline-line {
                background: #2f2f73;
                animation: drawLine 2s ease-out forwards;
            }

            @keyframes drawLine {
                from {
                    transform: scaleY(0);
                    transform-origin: top;
                }

                to {
                    transform: scaleY(1);
                    transform-origin: top;
                }
            }


            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.4);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }

            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }


            .floating {
                animation: float 3s ease-in-out infinite;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            .stagger-1 {
                transition-delay: 0.1s;
            }

            .stagger-2 {
                transition-delay: 0.2s;
            }

            .stagger-3 {
                transition-delay: 0.3s;
            }

            .stagger-4 {
                transition-delay: 0.4s;
            }

            .stagger-5 {
                transition-delay: 0.5s;
            }

            .stagger-6 {
                transition-delay: 0.6s;
            }


            .card-shine {
                position: relative;
                overflow: hidden;
            }

            .card-shine::after {
                content: '';
                position: absolute;

                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: ;
                transform: rotate(45deg);
                transition: all 0.5s ease;
                opacity: 0;
            }

            .card-shine:hover::after {
                opacity: 1;
                left: 100%;
                top: 100%;
            }

            @media (max-width: 768px) {

                /* Reduce excessive vertical spacing */
                section {
                    padding-top: 3.5rem !important;
                    padding-bottom: 3.5rem !important;
                }

                /* Timeline: single column on mobile */
                #story .md\:flex-row {
                    flex-direction: column !important;
                }

                /* Timeline vertical line alignment */
                .timeline-line {
                    left: 0.75rem !important;
                }

                /* Timeline card spacing */
                #story .pl-12 {
                    padding-left: 2.75rem !important;
                }

                /* Prevent image overflow */
                img {
                    max-width: 100%;
                    height: auto;
                }

                /* CTA buttons full-width on mobile */
                .ripple-btn {
                    width: 100%;
                    text-align: center;
                }
            }

            @keyframes drawLine {
                from {
                    transform: scaleY(0);
                    transform-origin: top;
                }

                to {
                    transform: scaleY(1);
                    transform-origin: top;
                }
            }
        </style>
    @endpush
    <section class="pt-20">

        {{-- hero section --}}
        <header class='min-h-screen bg-[#2f2f73]'>

            <div class="flex-col justify-center items-center text-center max-w-5xl px-3 py-20 container mx-auto">
                <div class=''>
                    {{-- heading --}}
                    <h1 class="fade-in text-5xl md:text-7xl font-black text-white mb-6 tracking-tight">
                        About <span class="">Us</span>
                    </h1>


                    <!-- Sub-heading -->
                    <p class="fade-in text-xl md:text-2xl text-blue-200 font-medium mb-8 stagger-1">
                        <i class="fas fa-microchip mr-2"></i>
                        Highly Tailored IT Design, Management & Support Services
                    </p>
                    <!-- Intro Paragraph -->
                    <p class="fade-in text-lg text-gray-300  mx-auto text-center tracking-wide mb-12 stagger-2">
                        All Nepal Tech Solutions (ANTS) stands at the forefront of technological innovation in Nepal.
                        We are dedicated to empowering businesses with cutting-edge IT solutions that drive growth,
                        enhance productivity, and fortify security. Our team of experts brings together local expertise
                        with global standards to deliver excellence in every project.
                    </p>

                    <!-- Feature Icons -->
                    <div class="fade-in flex flex-wrap justify-center gap-6 stagger-3">
                        <div class="flex items-center gap-2 text-white">
                            <i class="fas fa-shield-halved text-xl"></i>
                            <span>Enterprise Security</span>
                        </div>
                        <div class="flex items-center gap-2 text-white">
                            <i class="fas fa-cloud text-xl"></i>
                            <span>Cloud Solutions</span>
                        </div>
                        <div class="flex items-center gap-2 text-white">
                            <i class="fas fa-network-wired text-xl"></i>
                            <span>IT Infrastructure</span>
                        </div>
                    </div>


                </div>
                <!-- Scroll Indicator -->
                <div class="fade-in mt-16 stagger-4 text-center">
                    <a href="#story"
                        class="inline-flex flex-col items-center  text-white/60 hover:text-white transition-colors">
                        <span class="text-lg mb-2">Discover Our Story</span>
                        <i class="fas fa-chevron-down animate-bounce"></i>
                    </a>
                </div>
            </div>


        </header>

        {{-- <section id="story" class="py-16 md:py-24 bg-gradient-to-br from-gray-50 to-white overflow-hidden">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="text-center mb-12 md:mb-16">
                    <h2 class="fade-in text-3xl sm:text-4xl md:text-5xl font-bold text-[#2f2f73] mb-4">
                        Our <span class="gradient-text">Journey</span>
                    </h2>
                    <p class="fade-in text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                        From a vision to empower Nepal's digital landscape to becoming a trusted technology partner for
                        businesses across the nation.
                    </p>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 top-0 bottom-0 w-1 timeline-line rounded-full">
                    </div>
                    <div class="space-y-12 md:space-y-20">
                        <div class="relative md:grid md:grid-cols-2 md:gap-12 items-center">
                            <div class="ml-12 md:ml-0 md:text-right">
                                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                                    <span class="inline-block mb-3 px-3 py-1 bg-[#2f2f73] text-white text-xs rounded-full">
                                        2018
                                    </span>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2 text-left md:text-right">
                                        The Beginning
                                    </h3>
                                    <p class="text-gray-600 text-sm sm:text-base text-left md:text-right">
                                        ANTS was founded with a vision to bridge the technology gap in Nepal’s business
                                        sector, starting with tailored IT consulting services.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="absolute left-4 md:left-1/2 w-8 h-8 bg-[#2f2f73] rounded-full flex items-center justify-center shadow-lg md:-translate-x-1/2">
                                <i class="fas fa-rocket text-white text-sm"></i>
                            </div>
                        </div>

                        <div class="relative md:grid md:grid-cols-2 md:gap-12 items-center">
                            <div
                                class="absolute left-4 md:left-1/2 w-8 h-8 bg-[#2f2f73] rounded-full flex items-center justify-center shadow-lg md:-translate-x-1/2">
                                <i class="fas fa-expand text-white text-sm"></i>
                            </div>

                            <div class="ml-12 md:ml-0 md:col-start-2">
                                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                                    <span class="inline-block mb-3 px-3 py-1 bg-[#2f2f73] text-white text-xs rounded-full">
                                        2020
                                    </span>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                                        Expansion & Growth
                                    </h3>
                                    <p class="text-gray-600 text-sm sm:text-base">
                                        Expanded into cloud, cybersecurity, and managed IT services, serving 100+ clients
                                        nationwide.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="relative md:grid md:grid-cols-2 md:gap-12 items-center">
                            <div class="ml-12 md:ml-0 md:text-right">
                                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                                    <span class="inline-block mb-3 px-3 py-1 bg-[#2f2f73] text-white text-xs rounded-full">
                                        2022
                                    </span>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2 text-left md:text-right">
                                        Innovation Hub
                                    </h3>
                                    <p class="text-gray-600 text-sm sm:text-base text-left md:text-right">
                                        Launched AI, IoT, and blockchain initiatives with international partnerships.
                                    </p>
                                </div>
                            </div>

                            <div
                                class="absolute left-4 md:left-1/2 w-8 h-8 bg-[#2f2f73] rounded-full flex items-center justify-center shadow-lg md:-translate-x-1/2">
                                <i class="fas fa-lightbulb text-white text-sm"></i>
                            </div>
                        </div>

                        <div class="relative md:grid md:grid-cols-2 md:gap-12 items-center">
                            <div
                                class="absolute left-4 md:left-1/2 w-8 h-8 bg-[#2f2f73] rounded-full flex items-center justify-center shadow-lg md:-translate-x-1/2">
                                <i class="fas fa-star text-white text-sm"></i>
                            </div>

                            <div class="ml-12 md:ml-0 md:col-start-2">
                                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                                    <span class="inline-block mb-3 px-3 py-1 bg-[#2f2f73] text-white text-xs rounded-full">
                                        Today
                                    </span>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                                        Industry Leader
                                    </h3>
                                    <p class="text-gray-600 text-sm sm:text-base">
                                        Serving 300+ clients with 100+ experts, setting benchmarks in Nepal’s IT industry.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section id="story" class="py-2 md:py-24 bg-gradient-to-br from-gray-50 to-white overflow-hidden">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="text-center mb-12 md:mb-16">
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-[#2f2f73] mb-4">
                        Our <span class="gradient-text">Journey</span>
                    </h2>
                    <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
                        Our history of innovation and growth.
                    </p>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 top-0 bottom-0 w-1 timeline-line rounded-full bg-indigo-100">
                    </div>

                    <div class="space-y-12 md:space-y-20">
                        @foreach($milestones as $index => $item)
                            <div class="relative md:grid md:grid-cols-2 md:gap-12 items-center">

                                <div class="ml-12 md:ml-0 {{ $index % 2 == 0 ? 'md:text-right' : 'md:col-start-2' }}">
                                    <div
                                        class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition border border-gray-50">
                                        <span class="inline-block mb-3 px-3 py-1 bg-[#2f2f73] text-white text-xs rounded-full">
                                            {{ $item->year }}
                                        </span>
                                        <h3
                                            class="text-xl font-bold text-gray-800 mb-2 {{ $index % 2 == 0 ? 'text-left md:text-right' : '' }}">
                                            {{ $item->title }}
                                        </h3>
                                        <p
                                            class="text-gray-600 text-sm sm:text-base {{ $index % 2 == 0 ? 'text-left md:text-right' : '' }}">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="absolute left-4 md:left-1/2 w-8 h-8 bg-[#2f2f73] rounded-full flex items-center justify-center shadow-lg transform md:-translate-x-1/2">
                                    <i class="{{ $item->icon }} text-white text-xs"></i>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- vision and mission --}}
        <section class="py-24 bg-[#2f2f73] w-full min-h-screen">
            <div class="container mx-auto">
                <div class="text-center mb-16">
                    <h2 class="fade-in text-4xl md:text-5xl font-bold text-white mb-4">
                        Vision & <span class="gradient-text">Mission</span>
                    </h2>
                    <p class="text-gray-300 text-lg max-w-2xl mx-auto">Guided by our core principles...</p>
                </div>

                <div class="grid lg:grid-cols-2 w-full gap-6 p-6">
                    {{-- Dynamic Mission Card --}}
                    <div class="w-full border p-6 border-stone-400 rounded-2xl hover:bg-white/10 transition-all">
                        <div class="w-16 h-16 bg-[#e32726] rounded-xl flex items-center justify-center mb-6 shadow-lg">
                            <i class='fas fa-bullseye text-white text-2xl'></i>
                        </div>
                        <h3 class="text-2xl font-bold text-stone-200 mb-4">Our Mission</h3>
                        <p class='text-gray-300 leading-relaxed mb-6'>{{ $statement->mission_text }}</p>
                        <ul class="space-y-3">
                            @foreach($statement->mission_points as $point)
                                <li class="flex items-center text-stone-200">
                                    <i class="fas fa-check-circle mr-3 text-red-500"></i>
                                    <span>{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Dynamic Vision Card --}}
                    <div class="w-full border p-6 border-stone-400 rounded-2xl hover:bg-white/10 transition-all">
                        <div class="w-16 h-16 bg-[#e32726] rounded-xl flex items-center justify-center mb-6 shadow-lg">
                            <i class="fas fa-eye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-stone-200 mb-4">Our Vision</h3>
                        <p class='text-gray-300 leading-relaxed mb-6'>{{ $statement->vision_text }}</p>
                        <ul class="space-y-3">
                            @foreach($statement->vision_points as $point)
                                <li class="flex items-center text-stone-200">
                                    <i class="fas fa-check-circle mr-3 text-red-500"></i>
                                    <span>{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Values Grid -->
        {{-- <section class="py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="fade-in text-4xl md:text-5xl font-bold text-[#e32726] mb-4">
                        Our Core <span class="text-[#2f2f73]">Values</span>
                    </h2>
                    <p class="fade-in text-stone-500 text-lg max-w-2xl mx-auto">
                        The principles that guide everything we do and define who we are as a company.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                    <!-- Innovation -->
                    <div class="fade-in stagger-1 group">
                        <div
                            class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 h-full border border-gray-100">
                            <div
                                class="w-14 h-14 bg-[#2f2f73] rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i class="fas fa-lightbulb text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#e32726] mb-3">Innovation</h3>
                            <p class="text-gray-600">We constantly push boundaries and embrace new technologies to deliver
                                cutting-edge solutions that keep our clients ahead of the curve.</p>
                        </div>
                    </div>

                    <!-- Integrity -->
                    <div class="fade-in stagger-2 group">
                        <div
                            class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 h-full border border-gray-100">
                            <div
                                class="w-14 h-14 bg-[#2f2f73] rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i class="fas fa-handshake text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#e32726] mb-3">Integrity</h3>
                            <p class="text-gray-600">We operate with complete transparency and honesty, building trust
                                through ethical practices and accountability in every interaction.</p>
                        </div>
                    </div>

                    <!-- Security -->
                    <div class="fade-in stagger-3 group">
                        <div
                            class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 h-full border border-gray-100">
                            <div
                                class="w-14 h-14 bg-[#2f2f73] rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i class="fas fa-shield-halved text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#e32726] mb-3">Security</h3>
                            <p class="text-gray-600">We prioritize the protection of our clients' data and systems with
                                enterprise-grade security measures and best practices.</p>
                        </div>
                    </div>

                    <!-- Reliability -->
                    <div class="fade-in stagger-4 group">
                        <div
                            class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 h-full border border-gray-100">
                            <div
                                class="w-14 h-14 bg-[#2f2f73] rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clock text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#e32726] mb-3">Reliability</h3>
                            <p class="text-gray-600">Our clients can count on us for consistent, dependable service
                                delivery with 24/7 support and guaranteed uptime.</p>
                        </div>
                    </div>

                    <!-- Customer-Centric -->
                    <div class="fade-in stagger-5 group">
                        <div
                            class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 h-full border border-gray-100">
                            <div
                                class="w-14 h-14 bg-[#2f2f73] rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i class="fas fa-heart text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#e32726] mb-3">Customer-Centric</h3>
                            <p class="text-gray-600">Every solution we design starts with understanding our clients' unique
                                needs and delivering personalized experiences.</p>
                        </div>
                    </div>

                    <!-- Growth Mindset -->
                    <div class="fade-in stagger-6 group">
                        <div
                            class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 h-full border border-gray-100">
                            <div
                                class="w-14 h-14 bg-[#2f2f73] rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <i class="fas fa-chart-line text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#e32726] mb-3">Growth Mindset</h3>
                            <p class="text-gray-600">We believe in continuous learning and improvement, helping both our
                                team and clients evolve with the changing tech landscape.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-[#e32726] mb-4">
                        Our Core <span class="text-[#2f2f73]">Values</span>
                    </h2>
                    <p class="text-stone-500 text-lg max-w-2xl mx-auto">
                        The principles that guide everything we do and define who we are as a company.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                    @foreach($coreValues as $index => $item)
                        <div class="fade-in group" style="animation-delay: {{ ($index + 1) * 100 }}ms">
                            <div
                                class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-2 transition-all duration-300 h-full border border-gray-100">
                                <div
                                    class="w-14 h-14 bg-[#2f2f73] rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    <i class="{{ $item->icon }} text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-[#e32726] mb-3">{{ $item->title }}</h3>
                                <p class="text-gray-600">{{ $item->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Detailed Services Section -->
        <section class="py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="fade-in text-4xl md:text-5xl font-bold text-[#2f2f73] mb-4">
                        Our <span class="">Services</span>
                    </h2>
                    <p class="fade-in text-gray-600 text-lg max-w-2xl mx-auto">
                        Comprehensive IT solutions designed to accelerate your business growth and digital transformation.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    <!-- IT Design & Consulting -->
                    <div class="fade-in stagger-1 group">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-blue-50 p-8 rounded-2xl border border-gray-200 hover:border-blue-300 hover:shadow-xl transition-all duration-300 h-full">
                            <div
                                class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform shadow-lg">
                                <i class="fas fa-drafting-compass text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">IT Design & Consulting</h3>
                            <p class="text-gray-600 mb-4">Strategic technology consulting and system design that aligns
                                with your business objectives and drives innovation.</p>
                            <ul class="space-y-2 text-gray-500 text-sm">
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>Technology Roadmap
                                    Development</li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>System Architecture
                                    Design</li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>Digital Strategy
                                    Planning</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Cloud & Infrastructure -->
                    <div class="fade-in stagger-2 group">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-purple-50 p-8 rounded-2xl border border-gray-200 hover:border-purple-300 hover:shadow-xl transition-all duration-300 h-full">
                            <div
                                class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform shadow-lg">
                                <i class="fas fa-cloud text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Cloud & Infrastructure</h3>
                            <p class="text-gray-600 mb-4">Scalable cloud solutions and robust infrastructure services that
                                ensure performance, reliability, and flexibility.</p>
                            <ul class="space-y-2 text-gray-500 text-sm">
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-purple-500 mr-2 text-xs"></i>Cloud Migration &
                                    Management</li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-purple-500 mr-2 text-xs"></i>Hybrid Cloud
                                    Solutions</li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-purple-500 mr-2 text-xs"></i>Infrastructure
                                    Optimization</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Managed IT Support -->
                    <div class="fade-in stagger-3 group">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-green-50 p-8 rounded-2xl border border-gray-200 hover:border-green-300 hover:shadow-xl transition-all duration-300 h-full">
                            <div
                                class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform shadow-lg">
                                <i class="fas fa-headset text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Managed IT Support</h3>
                            <p class="text-gray-600 mb-4">24/7 proactive IT support and maintenance services that keep your
                                systems running smoothly and securely.</p>
                            <ul class="space-y-2 text-gray-500 text-sm">
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-green-500 mr-2 text-xs"></i>24/7 Help Desk Support
                                </li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-green-500 mr-2 text-xs"></i>Proactive Monitoring
                                </li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-green-500 mr-2 text-xs"></i>System Maintenance
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Network Engineering -->
                    <div class="fade-in stagger-4 group">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-orange-50 p-8 rounded-2xl border border-gray-200 hover:border-orange-300 hover:shadow-xl transition-all duration-300 h-full">
                            <div
                                class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform shadow-lg">
                                <i class="fas fa-network-wired text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Network Engineering</h3>
                            <p class="text-gray-600 mb-4">Enterprise-grade network design, implementation, and optimization
                                for seamless connectivity and performance.</p>
                            <ul class="space-y-2 text-gray-500 text-sm">
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i>Network Design &
                                    Setup</li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i>Wireless Solutions
                                </li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i>Performance
                                    Optimization</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Warranty & Product Management -->
                    <div class="fade-in stagger-5 group">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-cyan-50 p-8 rounded-2xl border border-gray-200 hover:border-cyan-300 hover:shadow-xl transition-all duration-300 h-full">
                            <div
                                class="w-16 h-16 bg-cyan-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform shadow-lg">
                                <i class="fas fa-certificate text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Warranty & Product Management</h3>
                            <p class="text-gray-600 mb-4">Complete product lifecycle management and warranty services for
                                your IT assets and equipment.</p>
                            <ul class="space-y-2 text-gray-500 text-sm">
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-cyan-500 mr-2 text-xs"></i>Asset Management</li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-cyan-500 mr-2 text-xs"></i>Warranty Administration
                                </li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-cyan-500 mr-2 text-xs"></i>Product Engineering
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Cybersecurity -->
                    <div class="fade-in stagger-6 group">
                        <div
                            class="bg-gradient-to-br from-gray-50 to-red-50 p-8 rounded-2xl border border-gray-200 hover:border-red-300 hover:shadow-xl transition-all duration-300 h-full">
                            <div
                                class="w-16 h-16 bg-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform shadow-lg">
                                <i class="fas fa-lock text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Cybersecurity</h3>
                            <p class="text-gray-600 mb-4">Enterprise-grade security solutions to protect your business from
                                evolving cyber threats and vulnerabilities.</p>
                            <ul class="space-y-2 text-gray-500 text-sm">
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-red-500 mr-2 text-xs"></i>Threat Detection &
                                    Response</li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-red-500 mr-2 text-xs"></i>Security Audits</li>
                                <li class="flex items-center"><i
                                        class="fas fa-chevron-right text-red-500 mr-2 text-xs"></i>Compliance Management
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose ANTS Section -->
        <section class="py-24 bg-[#2f2f73]">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="fade-in text-4xl md:text-5xl font-bold text-slate-200 mb-4">
                        Why Choose <span class="">Us</span>?
                    </h2>
                    <p class="fade-in text-slate-200 text-lg max-w-2xl mx-auto">
                        Discover what sets us apart as Nepal's premier IT solutions provider.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                    <!-- USP 1 -->
                    <div
                        class="fade-in stagger-1 bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e32726] rounded-full flex items-center justify-center shrink-0">
                            <i class="fas fa-check text-slate-200 text-xl animate-pulse"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Highly Tailored IT Strategies</h3>
                            <p class="text-gray-600 text-sm">Custom solutions designed specifically for your unique
                                business requirements and goals.</p>
                        </div>
                    </div>

                    <!-- USP 2 -->
                    <div
                        class="fade-in stagger-2 bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e32726] rounded-full flex items-center justify-center shrink-0">
                            <i class="fas fa-check text-slate-200 text-xl animate-pulse"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">End-to-End Project Delivery</h3>
                            <p class="text-gray-600 text-sm">Complete project management from conception to deployment and
                                beyond.</p>
                        </div>
                    </div>

                    <!-- USP 3 -->
                    <div
                        class="fade-in stagger-3 bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e32726] rounded-full flex items-center justify-center shrink-0">
                            <i class="fas fa-check text-slate-200 text-xl animate-pulse"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">24/7 Support Capability</h3>
                            <p class="text-gray-600 text-sm">Round-the-clock technical support ensuring your systems run
                                smoothly at all times.</p>
                        </div>
                    </div>

                    <!-- USP 4 -->
                    <div
                        class="fade-in stagger-4 bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e32726] rounded-full flex items-center justify-center shrink-0">
                            <i class="fas fa-check text-slate-200 text-xl animate-pulse"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Enterprise-Grade Solutions</h3>
                            <p class="text-gray-600 text-sm">Industry-leading technologies and practices suitable for
                                businesses of all sizes.</p>
                        </div>
                    </div>

                    <!-- USP 5 -->
                    <div
                        class="fade-in stagger-5 bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e32726] rounded-full flex items-center justify-center shrink-0">
                            <i class="fas fa-check text-slate-200 text-xl animate-pulse"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Local Expertise, Global Standards</h3>
                            <p class="text-gray-600 text-sm">Deep understanding of Nepal's market combined with
                                international best practices.</p>
                        </div>
                    </div>

                    <!-- USP 6 -->
                    <div
                        class="fade-in stagger-6 bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#e32726] rounded-full flex items-center justify-center shrink-0">
                            <i class="fas fa-check text-slate-200 text-xl animate-pulse"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Cost-Effective Transformation</h3>
                            <p class="text-gray-600 text-sm">Maximize your IT investment with solutions that deliver
                                measurable ROI.</p>
                        </div>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="mt-16 mb-5 max-w-4xl container mx-auto">
                    <h1 class="text-4xl font-bold text-slate-200 ">Our Reviews</h1>
                </div>
                <div class=" grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                    <div class="fade-in text-center p-6">
                        <div class="text-4xl md:text-5xl text-slate-200 font-bold mb-2">300+</div>
                        <p class="text-slate-200 font-medium">Happy Clients</p>
                    </div>
                    <div class="fade-in text-center p-6">
                        <div class="text-4xl md:text-5xl  text-slate-200 font-bold mb-2">100+</div>
                        <p class="text-slate-200 font-medium">IT Experts</p>
                    </div>
                    <div class="fade-in text-center p-6">
                        <div class="text-4xl md:text-5xl text-slate-200 font-bold mb-2">500+</div>
                        <p class="text-slate-200 font-medium">Projects Done</p>
                    </div>
                    <div class="fade-in text-center p-6">
                        <div class="text-4xl md:text-5xl text-slate-200 font-bold mb-2">99.9%</div>
                        <p class="text-slate-200 font-medium">Uptime SLA</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="fade-in text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                        Meet Our <span class="bg-[#e32726] text-white px-5">Leadership</span>
                    </h2>
                    <p class="fade-in text-gray-600 text-lg max-w-2xl mx-auto">
                        Experienced professionals dedicated to driving innovation and excellence.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    <!-- Team Member 1 -->
                    <div class="fade-in stagger-1 group">
                        <div
                            class="bg-gray-50 rounded-2xl overflow-hidden text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                            <div class="w-full h-50 mx-auto mb-4  flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('frontendimages/aboutusimages/ceo.jpg') }}" alt="">
                            </div>
                            <div class="p-5">
                                <h3 class="text-xl font-bold text-[#2f2f73] mb-1">Davi Phal Magar</h3>
                                <p class="text-[#e32726] font-medium mb-3">CEO & Founder</p>
                                <p class="text-stone-500 text-sm mb-4">20+ years of IT industry experience leading digital
                                    transformation initiatives.</p>
                                <div class="flex justify-center gap-3">
                                    <a href="#"
                                        class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-[#2f2f73] hover:text-white transition-colors text-gray-600">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#"
                                        class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-[#2f2f73] hover:text-white transition-colors text-gray-600">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- .............. add more member --}}

                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 bg-[#2f2f73] relative overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute inset-0">
                <div class="absolute top-10 left-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-10 right-10 w-60 h-60 bg-white/10 rounded-full blur-3xl"></div>
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="fade-in text-3xl md:text-5xl font-bold text-white mb-6">
                        Ready to Scale Your Business with Secure and Tailored IT Solutions?
                    </h2>
                    <p class="fade-in text-xl text-white/80 mb-10">
                        Partner with ANTS and unlock the full potential of technology for your business growth.
                    </p>
                    <div class="fade-in flex flex-col sm:flex-row gap-4 justify-center">
                        <button
                            class="ripple-btn relative overflow-hidden bg-white text-blue-600 px-8 py-4 rounded-xl font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-300">
                            <i class="fas fa-phone-alt mr-2"></i>
                            Schedule a Consultation
                        </button>
                        <button
                            class="ripple-btn relative overflow-hidden bg-transparent border-2 border-white text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/10 hover:scale-105 transition-all duration-300">
                            <i class="fas fa-envelope mr-2"></i>
                            Contact Us
                        </button>
                    </div>

                    <!-- Trust Badges -->
                    <div class="fade-in mt-12 flex flex-wrap justify-center gap-8 items-center">
                        <div class="flex items-center gap-2 text-white/80">
                            <i class="fas fa-shield-halved text-2xl"></i>
                            <span>ISO 27001 Certified</span>
                        </div>
                        <div class="flex items-center gap-2 text-white/80">
                            <i class="fas fa-award text-2xl"></i>
                            <span>Award Winning</span>
                        </div>
                        <div class="flex items-center gap-2 text-white/80">
                            <i class="fas fa-headset text-2xl"></i>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </section>
    @push('script')
        <script>
            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateX(0)';
                    }
                });
            }, observerOptions);

            // Observe timeline items
            document.addEventListener('DOMContentLoaded', () => {
                const timelineItems = document.querySelectorAll('.slide-left, .slide-right, .fade-in');
                timelineItems.forEach(item => observer.observe(item));

                // Add click animation to timeline dots
                const timelineDots = document.querySelectorAll('.pulse-dot');
                timelineDots.forEach(dot => {
                    dot.addEventListener('click', function () {
                        this.style.transform = 'scale(1.2)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 200);
                    });
                });
            });

            // Ripple effect for buttons
            document.querySelectorAll('.ripple-btn').forEach(button => {
                button.addEventListener('click', function (e) {
                    const rect = button.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const ripple = document.createElement('span');
                    ripple.classList.add('ripple');
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';

                    button.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Counter animation for stats
            const animateCounters = () => {
                const counters = document.querySelectorAll('.gradient-text');
                counters.forEach(counter => {
                    const text = counter.textContent;
                    if (text.includes('+') || text.includes('%')) {
                        const value = parseInt(text);
                        let current = 0;
                        const increment = value / 50;
                        const suffix = text.includes('%') ? '%' : '+';

                        const updateCounter = () => {
                            if (current < value) {
                                current += increment;
                                counter.textContent = Math.floor(current) + suffix;
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = text;
                            }
                        };
                        updateCounter();
                    }
                });
            };

            // Trigger counter animation when stats section is visible
            const statsSection = document.querySelector('.grid.grid-cols-2.md\\:grid-cols-4');
            if (statsSection) {
                const statsObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animateCounters();
                            statsObserver.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.5
                });
                statsObserver.observe(statsSection);
            }

            // Parallax effect for hero background elements
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const heroElements = document.querySelectorAll('.floating');
                heroElements.forEach((el, index) => {
                    const speed = 0.1 + (index * 0.05);
                    el.style.transform = `translateY(${scrolled * speed}px)`;
                });
            });

            // Add hover sound effect (visual feedback)
            document.querySelectorAll('.group').forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                });
            });
        </script>
    @endpush
@endsection