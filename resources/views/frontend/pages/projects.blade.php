@extends('frontend.layout.app')

@section('content')
    @push('style')
        <style>
            /* Animation Utilities */
            .fade-in-up {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            }

            .fade-in-up.visible {
                opacity: 1;
                transform: translateY(0);
            }

            /* Card Hover Effects */
            .project-card:hover .icon-container {
                transform: scale(1.1) rotate(5deg);
                background-color: #eff6ff;
            }

            .project-card {
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }
        </style>

    @endpush
    <section>
        <!--  Hero Section -->
        <header class=" bg-[#24244a] overflow-hidden min-h-screen space-y-40">

            <div class="pt-40 flex-cols justify-center text-center tracking-tight">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-blue-500/10 border text-stone-100 text-sm font-semibold mb-6 fade-in-up">
                    INNOVATION IN ACTION
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-6 fade-in-up"
                    style="animation-delay: 0.1s;">
                    Our <span class="text-stone-100">Masterpieces</span>
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-slate-400 fade-in-up" style="animation-delay: 0.2s;">
                    Explore how we transform complex challenges into elegant digital solutions. From cloud architecture to
                    seamless mobile experiences.
                </p>
            </div>

            <!-- Scroll Indicator -->
            <div class="fade-in stagger-4 text-center">
                <a href="#Project"
                    class="inline-flex flex-col items-center  text-white/60 hover:text-white transition-colors">
                    <span class="text-lg mb-2">Discover Our Projects</span>
                    <i class="fas fa-chevron-down animate-bounce"></i>
                </a>
            </div>
        </header>

        <!-- Filter & Grid Section -->
        <main class="grow mt-10 relative z-20 px-4 sm:px-6 lg:px-8 pb-24">
            <div class="max-w-7xl mx-auto">

                <!-- Filters -->
                <div id='Project' class="flex flex-wrap justify-center gap-4 mb-12 fade-in-up"
                    style="animation-delay: 0.3s;">
                    <button onclick="filterProjects('all')"
                        class="filter-btn active px-6 py-2 rounded-full bg-white text-slate-600 shadow-md transition-all duration-300 font-medium  outline-none"
                        data-filter="all">All Works</button>
                    <button onclick="filterProjects('development')"
                        class="filter-btn px-6 py-2 rounded-full bg-white text-slate-600 shadow-md  transition-all duration-300 font-medium outline-none"
                        data-filter="development">Development</button>
                    <button onclick="filterProjects('infrastructure')"
                        class="filter-btn px-6 py-2 rounded-full bg-white text-slate-600 shadow-md transition-all duration-300 font-medium  outline-none"
                        data-filter="infrastructure">Cloud & Infra</button>
                    <button onclick="filterProjects('security')"
                        class="filter-btn px-6 py-2 rounded-full bg-white text-slate-600 shadow-md transition-all duration-300 font-medium  outline-none"
                        data-filter="security">Security</button>
                    <button onclick="filterProjects('data')"
                        class="filter-btn px-6 py-2 rounded-full bg-white text-slate-600 shadow-md transition-all duration-300 font-medium  outline-none"
                        data-filter="data">Data & Analytics</button>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-grid">

                    <!-- Project 1: Cloud Migration -->
                    <div class="project-card group bg-white rounded-3xl shadow-xl hover:shadow-2xl overflow-hidden border border-slate-100 relative fade-in-up"
                        data-category="infrastructure">
                        <div class="h-2 w-full bg-linear-to-r from-[#2f2f73] to-[#e32726]"></div>
                        <div class="p-8">
                            <div
                                class="icon-container w-14 h-14 bg-blue-50 text-[#2f2f73] rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#2f2f73] mb-3 group-hover:text-[#e32726] transition-colors">
                                Cloud Migration</h3>
                            <p class="text-slate-600 leading-relaxed mb-6">
                                Successfully migrated enterprise data and applications to cloud platforms ensuring seamless
                                workflow.
                            </p>
                            <a href="#" class="inline-flex items-center text-sm font-bold text-[#2f2f73] transition-colors">
                                View Case Study
                                <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Project 2: Cybersecurity Upgrade -->
                    <div class="project-card group bg-white rounded-3xl shadow-xl hover:shadow-2xl overflow-hidden border border-slate-100 relative fade-in-up"
                        data-category="security">
                        <div class="h-2 w-full bg-linear-to-r from-[#2f2f73] to-[#e32726]"></div>
                        <div class="p-8">
                            <div
                                class="icon-container w-14 h-14 bg-indigo-50 text-[#2f2f73] rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#2f2f73] mb-3 group-hover:text-[#e32726] transition-colors">
                                Cybersecurity Upgrade</h3>
                            <p class="text-slate-600 leading-relaxed mb-6">
                                Enhanced firewall and endpoint security to protect sensitive information across multiple
                                networks.
                            </p>
                            <a href="#" class="inline-flex items-center text-sm font-bold text-[#2f2f73] transition-colors">
                                View Case Study
                                <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Project 3: Enterprise Software -->
                    <div class="project-card group bg-white rounded-3xl shadow-xl hover:shadow-2xl overflow-hidden border border-slate-100 relative fade-in-up"
                        data-category="development">
                        <div class="h-2 w-full bg-linear-to-r from-[#2f2f73] to-[#e32726]"></div>
                        <div class="p-8">
                            <div
                                class="icon-container w-14 h-14 bg-emerald-50 text-[#2f2f73] rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#2f2f73] mb-3 group-hover:text-[#e32726] transition-colors">
                                Enterprise Software</h3>
                            <p class="text-slate-600 leading-relaxed mb-6">
                                Developed a custom ERP solution streamlining business processes for global clients.
                            </p>
                            <a href="#" class="inline-flex items-center text-sm font-bold text-[#2f2f73] transition-colors">
                                View Case Study
                                <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Project 4: Mobile App Development -->
                    <div class="project-card group bg-white rounded-3xl shadow-xl hover:shadow-2xl overflow-hidden border border-slate-100 relative fade-in-up"
                        data-category="development">
                        <div class="h-2 w-full bg-linear-to-r from-[#2f2f73] to-[#e32726]"></div>
                        <div class="p-8">
                            <div
                                class="icon-container w-14 h-14 bg-rose-50 text-[#2f2f73] rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#2f2f73] mb-3 group-hover:text-[#e32726] transition-colors">
                                Mobile App Development</h3>
                            <p class="text-slate-600 leading-relaxed mb-6">
                                Created cross-platform mobile applications with intuitive UI and high performance.
                            </p>
                            <a href="#" class="inline-flex items-center text-sm font-bold text-[#2f2f73] transition-colors">
                                View Case Study
                                <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Project 5: Data Analytics Dashboard -->
                    <div class="project-card group bg-white rounded-3xl shadow-xl hover:shadow-2xl overflow-hidden border border-slate-100 relative fade-in-up"
                        data-category="data">
                        <div class="h-2 w-full bg-linear-to-r from-[#2f2f73] to-[#e32726]"></div>
                        <div class="p-8">
                            <div
                                class="icon-container w-14 h-14 bg-orange-50 text-[#2f2f73] rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#2f2f73] mb-3 group-hover:text-[#e32726] transition-colors">
                                Data Analytics Dashboard</h3>
                            <p class="text-slate-600 leading-relaxed mb-6">
                                Built interactive dashboards enabling businesses to track key metrics and insights in
                                real-time.
                            </p>
                            <a href="#" class="inline-flex items-center text-sm font-bold text-[#2f2f73] transition-colors">
                                View Case Study
                                <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Project 6: IT Infrastructure Setup -->
                    <div class="project-card group bg-white rounded-3xl shadow-xl hover:shadow-2xl overflow-hidden border border-slate-100 relative fade-in-up"
                        data-category="infrastructure">
                        <div class="h-2 w-full bg-linear-to-r from-[#2f2f73] to-[#e32726]"></div>
                        <div class="p-8">
                            <div
                                class="icon-container w-14 h-14 bg-cyan-50 text-[#2f2f73] rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#2f2f73] mb-3 group-hover:text-[#e32726] transition-colors">
                                IT Infrastructure Setup</h3>
                            <p class="text-slate-600 leading-relaxed mb-6">
                                Designed and deployed secure IT infrastructure for startups and corporate clients.
                            </p>
                            <a href="#" class="inline-flex items-center text-sm font-bold text-[#2f2f73] transition-colors">
                                View Case Study
                                <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modern CTA -->
            <div class="max-w-7xl mx-auto mt-24">
                <div class="bg-linear-to-r from-[#2f2f73] to-slate-800 rounded-3xl shadow-2xl overflow-hidden relative">
                    <div class="absolute inset-0 bg-grid-white/[0.05] bg-size[20px_20px]"></div>
                    <div
                        class="absolute right-0 top-0 -mt-10 -mr-10 w-64 h-64 bg-blue-300 rounded-full blur-3xl opacity-20">
                    </div>

                    <div
                        class="relative px-6 py-16 sm:px-12 lg:px-16 text-center lg:text-left lg:flex lg:items-center lg:justify-between">
                        <div>
                            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                                Ready to transform your business?
                            </h2>
                            <p class="mt-4 text-lg text-slate-300 max-w-xl">
                                Let's discuss how our expert team can help you achieve your technology goals with our
                                award-winning solutions.
                            </p>
                        </div>
                        <div class="mt-8 lg:mt-0 lg:ml-8 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <a href="#"
                                class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-slate-900 bg-white hover:bg-blue-50 md:text-lg transition-transform hover:scale-105 shadow-lg">
                                Get Started Now
                            </a>
                            <a href="#"
                                class="inline-flex items-center justify-center px-8 py-4 border border-slate-600 text-base font-bold rounded-full text-white hover:bg-slate-800 md:text-lg transition-all">
                                Contact Sales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>


    </section>

    @push('script')
        <script>
            // Filter Functionality
            function filterProjects(category) {
                const cards = document.querySelectorAll('.project-card');
                const buttons = document.querySelectorAll('.filter-btn');

                // Update active button state
                buttons.forEach(btn => {
                    if (btn.dataset.filter === category) {
                        btn.classList.add('bg-[#e32726]', 'text-white');
                        btn.classList.remove('bg-white', 'text-slate-600');
                    } else {
                        btn.classList.remove('bg-[#e32726]', 'text-white');
                        btn.classList.add('bg-white', 'text-slate-600');
                    }
                });

                // Filter cards
                cards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                        // Trigger reflow to restart animation
                        card.classList.remove('fade-in-up');
                        void card.offsetWidth;
                        card.classList.add('fade-in-up', 'visible');
                    } else {
                        card.style.display = 'none';
                        card.classList.remove('visible');
                    }
                });
            }

            // Intersection Observer for scroll animations
            document.addEventListener('DOMContentLoaded', () => {
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: "0px 0px -50px 0px"
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target); // Only animate once
                        }
                    });
                }, observerOptions);

                const animatedElements = document.querySelectorAll('.fade-in-up');
                animatedElements.forEach(el => observer.observe(el));

                // Set 'All' filter as active initially visually
                const allBtn = document.querySelector('[data-filter="all"]');
                if (allBtn) {
                    allBtn.classList.add('bg-[#e32726]', 'text-white');
                    allBtn.classList.remove('bg-white', 'text-slate-600');
                }
            });
        </script>
    @endpush
@endsection