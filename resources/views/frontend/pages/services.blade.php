@extends('frontend.app')

@section('content')

    @push('style')
        <style type="text/tailwindcss">


            @keyframes fadeIn {
                                                                from { opacity: 0; transform: translateY(20px); }
                                                                to { opacity: 1; transform: translateY(0); }
                                                                }

                                                                .animate-fade-in {
                                                                animation: fadeIn 0.6s ease-out forwards;
                                                                }

                                                                .service-card:hover {
                                                                transform: translateY(-5px);
                                                                }
                                                                </style>
    @endpush
    <section class='pt-20'>
        {{-- header section --}}
        <header class="bg-gradient-to-r from-[#2f2f73] to-[#222255] text-white py-20 lg:py-28 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 opacity-10 text-9xl">
                <i class="fas fa-cogs"></i>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 animate-fade-in">
                    World-Class <span class="text-[#e32726]">Tech Solutions</span>
                </h1>
                <p class="text-lg md:text-xl text-stone-300 max-w-3xl mx-auto mb-10 animate-fade-in"
                    style="animation-delay: 0.2s;">
                    Empowering businesses across Nepal with cutting-edge technology. From robust security systems to
                    seamless cloud integration, we are your partners in digital transformation.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in" style="animation-delay: 0.4s;">
                    <a href="#services-grid"
                        class="bg-[#e32726]  text-white font-bold py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
                        Explore Services
                    </a>
                    <a href="#contact"
                        class="bg-transparent border-2 border-white hover:bg-white hover:text-[#2f2f73] text-white font-bold py-3 px-8 rounded-lg transition-all">
                        Contact Us
                    </a>
                </div>
            </div>
            <!-- Decorative shape -->
            <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none rotate-180">
                <svg class="relative block w-[calc(100%+1.3px)] h-[50px] sm:h-[100px]" data-name="Layer 1"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        class="fill-stone-50"></path>
                </svg>
            </div>
        </header>

        <!-- Main Services Section -->
        <main id="services-grid" class="grow py-20 bg-stone-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-[#2f2f73] font-bold text-lg uppercase tracking-wider mb-2">What We Offer</h2>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-stone-800">Comprehensive IT Services</h3>
                    <div class="w-24 h-1 bg-[#e32726] mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                        <div
                            class="service-card bg-white rounded-xl shadow-md border border-stone-100 p-8 transition-all duration-300 group hover:border-[#e32726] hover:shadow-xl">
                            <div
                                class="w-14 h-14 bg-[#2f2f73]/10 rounded-lg flex items-center justify-center mb-6 group-hover:bg-[#e32726] group-hover:text-white transition-colors duration-300">
                                <i class="{{ $service->icon_class }} text-2xl text-[#2f2f73] group-hover:text-white"></i>
                            </div>
                            <h4 class="text-xl font-bold text-[#2f2f73] mb-3 group-hover:text-[#e32726] transition-colors">
                                {{ $service->title }}
                            </h4>
                            <p class="text-stone-600 mb-4 text-sm leading-relaxed">
                                {{ $service->description }}
                            </p>
                            <a href="{{ $service->link }}"
                                class="text-[#e32726] font-semibold text-sm hover:text-[#e32726] flex items-center gap-2">
                                Learn More <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

        <!-- Why Choose Us -->
        {{-- <section class="py-20 bg-[#2f2f73] text-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-[#e32726] font-bold text-lg uppercase tracking-wider mb-2">Why Choose Us</h2>
                        <h3 class="text-3xl md:text-4xl font-extrabold mb-6">Your Trusted Technology Partner in Nepal</h3>
                        <p class="text-stone-300 mb-8 leading-relaxed">
                            At All Nepal Tech Solutions, we don't just provide services; we build relationships. Our
                            commitment to quality, support, and innovation sets us apart in the industry.
                        </p>

                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div
                                    class="shrink-0 w-6 h-6 rounded-full bg-[#e32726] flex items-center justify-center mt-1">
                                    <i class="fas fa-check text-xs text-white"></i>
                                </div>
                                <span class="ml-4 text-stone-200">24/7 Technical Support Team</span>
                            </li>
                            <li class="flex items-start">
                                <div
                                    class="shrink-0 w-6 h-6 rounded-full bg-[#e32726] flex items-center justify-center mt-1">
                                    <i class="fas fa-check text-xs text-white"></i>
                                </div>
                                <span class="ml-4 text-stone-200">Customized Solutions for Every Business Size</span>
                            </li>
                            <li class="flex items-start">
                                <div
                                    class="shrink-0 w-6 h-6 rounded-full bg-[#e32726] flex items-center justify-center mt-1">
                                    <i class="fas fa-check text-xs text-white"></i>
                                </div>
                                <span class="ml-4 text-stone-200">Experienced & Certified Professionals</span>
                            </li>
                            <li class="flex items-start">
                                <div
                                    class="shrink-0 w-6 h-6 rounded-full bg-[#e32726] flex items-center justify-center mt-1">
                                    <i class="fas fa-check text-xs text-white"></i>
                                </div>
                                <span class="ml-4 text-stone-200">Cost-Effective Implementation</span>
                            </li>
                        </ul>
                    </div>

                    <div class="relative">
                        <!-- Abstract graphic representation instead of image -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm transform translate-y-8">
                                <div class="text-[#e32726] text-4xl mb-2 font-bold">500+</div>
                                <div class="text-stone-300 text-sm">Happy Clients</div>
                            </div>
                            <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm">
                                <div class="text-[#e32726] text-4xl mb-2 font-bold">99%</div>
                                <div class="text-stone-300 text-sm">Satisfaction Rate</div>
                            </div>
                            <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm transform translate-y-8">
                                <div class="text-[#e32726] text-4xl mb-2 font-bold">10+</div>
                                <div class="text-stone-300 text-sm">Years Experience</div>
                            </div>
                            <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm">
                                <div class="text-[#e32726] text-4xl mb-2 font-bold">24/7</div>
                                <div class="text-stone-300 text-sm">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="py-20 bg-[#2f2f73] text-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-[#e32726] font-bold text-lg uppercase tracking-wider mb-2">Why Choose Us</h2>
                        <h3 class="text-3xl md:text-4xl font-extrabold mb-6">Your Trusted Technology Partner in Nepal</h3>
                        <p class="text-stone-300 mb-8 leading-relaxed">At All Nepal Tech Solutions, we don't just provide
                            services; we build relationships. Our commitment to quality, support, and innovation sets us
                            apart in the industry.</p>

                        <ul class="space-y-4">
                            @foreach($whyChooseCheckpoints as $check)
                                <li class="flex items-start">
                                    <div
                                        class="shrink-0 w-6 h-6 rounded-full bg-[#e32726] flex items-center justify-center mt-1">
                                        <i class="fas fa-check text-xs text-white"></i>
                                    </div>
                                    <span class="ml-4 text-stone-200">{{ $check->title }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="relative">
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($whyChooseStats as $index => $stat)
                                <div
                                    class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm {{ $index % 2 == 0 ? 'transform translate-y-8' : '' }}">
                                    <div class="text-[#e32726] text-4xl mb-2 font-bold">{{ $stat->title }}</div>
                                    <div class="text-stone-300 text-sm">{{ $stat->subtitle }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-stone-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-[#2f2f73] font-bold text-lg uppercase tracking-wider mb-2">Get In Touch</h2>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-stone-800">Request a Consultation</h3>
                    <div class="w-24 h-1 bg-[#e32726] mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 bg-white rounded-2xl shadow-xl overflow-hidden">
                    <!-- Contact Info Side -->
                    <div class="bg-[#2f2f73] p-10 text-white flex flex-col justify-between relative overflow-hidden">
                        <div class="relative z-10">
                            <h4 class="text-2xl font-bold mb-6">Contact Information</h4>
                            <p class="text-stone-300 mb-8">Fill up the form and our team will get back to you within 24
                                hours.</p>

                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <i class="fas fa-phone-alt mt-1 w-6 text-[#e32726]"></i>
                                    <span>+977 9800000000</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-envelope mt-1 w-6 text-[#e32726]"></i>
                                    <span>contact@allnepaltech.com</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-map-marker-alt mt-1 w-6 text-[#e32726]"></i>
                                    <span>Kathmandu, Nepal</span>
                                </div>
                            </div>
                        </div>

                        <div class="relative z-10 mt-12">
                            <div class="flex space-x-4">
                                <a href="#"
                                    class="w-10 h-10 rounded-full border border-stone-500 flex items-center justify-center hover:bg-[#e32726] hover:border-[#e32726] transition-colors">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 rounded-full border border-stone-500 flex items-center justify-center hover:bg-[#e32726] hover:border-[#e32726] transition-colors">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 rounded-full border border-stone-500 flex items-center justify-center hover:bg-[#e32726] hover:border-[#e32726] transition-colors">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Decor circle -->
                        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-[#e32726]/20 rounded-full"></div>
                        <div class="absolute -top-20 -left-20 w-40 h-40 bg-white/10 rounded-full"></div>
                    </div>


                    <!-- Form Side -->
                    <div class="p-10">
                        <form class="space-y-6" method="POST" action="{{ route('consults.store') }}">
                            @if(session('success'))
                                <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-stone-700 mb-1">First
                                        Name</label>
                                    <input type="text" name="first_name" id="first-name"
                                        class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-[#e32726] focus:border-[#e32726] outline-none transition-colors"
                                        placeholder="John" required>
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-stone-700 mb-1">Last
                                        Name</label>
                                    <input type="text" name="last_name" id="last-name"
                                        class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-[#e32726] focus:border-[#e32726] outline-none transition-colors"
                                        placeholder="Doe" required>
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-stone-700 mb-1">Email
                                    Address</label>
                                <input type="email" name="email" id="email"
                                    class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-[#e32726] focus:border-[#e32726] outline-none transition-colors"
                                    placeholder="john@example.com" required>
                            </div>

                            <div>
                                <label for="service" class="block text-sm font-medium text-stone-700 mb-1">Service
                                    Interested In</label>
                                <select name="service" id="service"
                                    class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-[#e32726] focus:border-[#e32726] outline-none transition-colors bg-white"
                                    required>
                                    <option>Security Systems</option>
                                    <option>POS Systems</option>
                                    <option>Cloud Facilities</option>
                                    <option>Web Development</option>
                                    <option>Network Solutions</option>
                                    <option>IT Consulting</option>
                                    <option>Other</option>
                                </select>
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-stone-700 mb-1">Message</label>
                                <textarea name="message" id="message" rows="4"
                                    class="w-full px-4 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-[#e32726] focus:border-[#e32726] outline-none transition-colors"
                                    placeholder="Tell us about your project..." required></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-[#2f2f73] hover:bg-[#222255] text-white font-bold py-3 rounded-lg shadow-md transition-colors">
                                Send Message
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </section>

    @push('script')
        <!-- JavaScript for Mobile Menu -->
        <script>
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');

            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });

            // Simple animation on scroll
            document.addEventListener('DOMContentLoaded', () => {
                const observerOptions = {
                    root: null,
                    rootMargin: '0px',
                    threshold: 0.1
                };

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('opacity-100', 'translate-y-0');
                            entry.target.classList.remove('opacity-0', 'translate-y-10');
                            observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                const cards = document.querySelectorAll('.service-card');
                cards.forEach((card, index) => {
                    // Add initial state classes
                    card.classList.add('transform', 'transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
                    // Stagger animations
                    card.style.transitionDelay = `${index * 100}ms`;
                    observer.observe(card);
                });
            });
        </script>

    @endpush
@endsection