@extends('frontend.app')

@section('content')

    @push('style')
        <style>
            :root {
                --primary-dark: #2f2f73;
                --primary-red: #e32726;
            }

            .bg-primary-dark {
                background-color: #2f2f73;
            }

            .bg-primary-red {
                background-color: #e32726;
            }

            .text-primary-dark {
                color: #2f2f73;
            }

            .text-primary-red {
                color: #e32726;
            }

            .border-primary-dark {
                border-color: #2f2f73;
            }

            .border-primary-red {
                border-color: #e32726;
            }

            .hover\:bg-primary-dark:hover {
                background-color: #2f2f73;
            }

            .hover\:bg-primary-red:hover {
                background-color: #e32726;
            }

            .focus\:ring-primary-dark:focus {
                --tw-ring-color: #2f2f73;
            }

            .focus\:border-primary-dark:focus {
                border-color: #2f2f73;
            }

            .gradient-bg {
                background: linear-gradient(135deg, #2f2f73 0%, #1a1a4a 100%);
            }

            .card-hover {
                transition: all 0.3s ease;
            }

            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(47, 47, 115, 0.2);
            }

            .pulse-icon {
                animation: pulse 2s infinite;
            }

            @keyframes pulse {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.05);
                }
            }
        </style>

    @endpush
    <section class='pt-20'>

        <!-- Hero Section -->
        <section class="gradient-bg py-16 md:py-24 min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Get In Touch</h1>
                <p class="text-stone-300 text-lg md:text-xl max-w-2xl mx-auto">
                    We'd love to hear from you! Whether you have a question about our services, pricing, or anything else,
                    our team is ready to answer all your questions.
                </p>
                <div class="flex justify-center mt-8">
                    <div class="flex items-center space-x-2 bg-white/10 backdrop-blur px-6 py-3 rounded-full">
                        <i class="fas fa-headset text-primary-red text-xl"></i>
                        <span class="text-white">24/7 Support Available</span>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="fade-in mt-16 stagger-4 text-center">
                <a href="#Contact"
                    class="inline-flex flex-col items-center  text-white/60 hover:text-white transition-colors">
                    <span class="text-lg mb-2">Contact here</span>
                    <i class="fas fa-chevron-down animate-bounce"></i>
                </a>
            </div>
        </section>


        <!-- Contact Info Cards -->
        <section class="py-12 md:py-16 -mt-8" id='Contact'>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                        <div
                            class="w-16 h-16 bg-primary-dark/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-map-marker-alt text-2xl text-primary-red"></i>
                        </div>
                        <h3 class="text-primary-dark font-bold text-lg mb-2">Our Office</h3>
                        <p class="text-stone-500">Baluwatar, Kathmandu</p>
                        <p class="text-stone-500">xxxx</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                        <div
                            class="w-16 h-16 bg-primary-dark/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-phone-alt text-2xl text-primary-red"></i>
                        </div>
                        <h3 class="text-primary-dark font-bold text-lg mb-2">Phone Number</h3>
                        <p class="text-stone-500">+977 xx-xxxxxxx</p>
                        <p class="text-stone-500">+977 xx-xxxxxxx</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                        <div
                            class="w-16 h-16 bg-primary-dark/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-envelope text-2xl text-primary-red"></i>
                        </div>
                        <h3 class="text-primary-dark font-bold text-lg mb-2">Email Address</h3>
                        <p class="text-stone-500">info@allnepaltech.com</p>
                        <p class="text-stone-500">support@allnepaltech.com</p>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                        <div
                            class="w-16 h-16 bg-primary-dark/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-clock text-2xl text-primary-red"></i>
                        </div>
                        <h3 class="text-primary-dark font-bold text-lg mb-2">Working Hours</h3>
                        <p class="text-stone-500">Sun - Fri: 9AM - 6PM</p>
                        <p class="text-stone-500">Saturday: Closed</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form & Map Section -->
        <section class="py-12 md:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                    <!-- Contact Form -->
                    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-10">
                        <h2 class="text-2xl md:text-3xl font-bold text-primary-dark mb-2">Send us a Message</h2>
                        <p class="text-stone-500 mb-8">Fill out the form below and we'll get back to you within 24 hours.
                        </p>

                        <form id="contactForm" class="space-y-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-stone-700 font-medium mb-2">Full Name *</label>
                                    <input type="text" required
                                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-2 focus:ring-primary-dark focus:border-primary-dark outline-none transition"
                                        placeholder="Your name">
                                </div>
                                <div>
                                    <label class="block text-stone-700 font-medium mb-2">Email Address *</label>
                                    <input type="email" required
                                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-2 focus:ring-primary-dark focus:border-primary-dark outline-none transition"
                                        placeholder="your@email.com">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-stone-700 font-medium mb-2">Phone Number</label>
                                    <input type="tel"
                                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-2 focus:ring-primary-dark focus:border-primary-dark outline-none transition"
                                        placeholder="+977 98XXXXXXXX">
                                </div>
                                <div>
                                    <label class="block text-stone-700 font-medium mb-2">Service Interested In</label>
                                    <select
                                        class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-2 focus:ring-primary-dark focus:border-primary-dark outline-none transition bg-white">
                                        <option value="">Select a service</option>
                                        <option value="web">Web Development</option>
                                        <option value="mobile">Mobile App Development</option>
                                        <option value="software">Custom Software</option>
                                        <option value="cloud">Cloud Solutions</option>
                                        <option value="it">IT Consulting</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-stone-700 font-medium mb-2">Your Message *</label>
                                <textarea required rows="5"
                                    class="w-full px-4 py-3 border border-stone-300 rounded-lg focus:ring-2 focus:ring-primary-dark focus:border-primary-dark outline-none transition resize-none"
                                    placeholder="Tell us about your project..."></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-primary-red text-white font-bold py-4 px-6 rounded-lg hover:bg-primary-dark transition duration-300 flex items-center justify-center space-x-2">
                                <span>Send Message</span>
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>

                        <!-- Success Message -->
                        <div id="successMsg"
                            class="hidden mt-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle"></i>
                                <span>Thank you! Your message has been sent successfully. We'll get back to you soon.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Map & Additional Info -->
                    <div class="space-y-6">
                        <!-- Map -->
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden h-64 md:h-80">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.6546931919925!2d85.33179037524076!3d27.727945924583096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1957d4429403%3A0x2e8fb4f4cfe35919!2sBeyondtech%20Nepal%20Pvt.%20Ltd.!5e0!3m2!1sen!2snp!4v1765787237364!5m2!1sen!2snp"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class='w-full h-full'></iframe>
                        </div>

                        <!-- Why Choose Us -->
                        <div class="bg-primary-dark rounded-2xl p-6 md:p-8 text-white">
                            <h3 class="text-xl md:text-2xl font-bold mb-6">Why Choose Us?</h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-10 h-10 bg-primary-red rounded-lg flex items-center justify-center shrink-0">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">10+ Years Experience</h4>
                                        <p class="text-stone-300 text-sm">Serving businesses across Nepal with innovative
                                            tech solutions</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-10 h-10 bg-primary-red rounded-lg flex items-center justify-center shrink-0">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">500+ Projects Delivered</h4>
                                        <p class="text-stone-300 text-sm">Successfully completed projects for startups to
                                            enterprises</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-10 h-10 bg-primary-red rounded-lg flex items-center justify-center shrink-0">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">24/7 Technical Support</h4>
                                        <p class="text-stone-300 text-sm">Round the clock support for all your technical
                                            needs</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="w-10 h-10 bg-primary-red rounded-lg flex items-center justify-center shrink-0">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Affordable Pricing</h4>
                                        <p class="text-stone-300 text-sm">Competitive rates without compromising on quality
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Social & CTA Section -->
        <section class="py-12 md:py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-primary-dark mb-4">Connect With Us</h2>
                <p class="text-stone-500 mb-8 max-w-xl mx-auto">Follow us on social media for latest updates, tech news, and
                    more!</p>

                <div class="flex justify-center space-x-4 md:space-x-6 mb-12">
                    <a href="#"
                        class="w-14 h-14 bg-primary-dark rounded-full flex items-center justify-center text-white hover:bg-primary-red transition duration-300 pulse-icon">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#"
                        class="w-14 h-14 bg-primary-dark rounded-full flex items-center justify-center text-white hover:bg-primary-red transition duration-300 pulse-icon">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#"
                        class="w-14 h-14 bg-primary-dark rounded-full flex items-center justify-center text-white hover:bg-primary-red transition duration-300 pulse-icon">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                    <a href="#"
                        class="w-14 h-14 bg-primary-dark rounded-full flex items-center justify-center text-white hover:bg-primary-red transition duration-300 pulse-icon">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#"
                        class="w-14 h-14 bg-primary-dark rounded-full flex items-center justify-center text-white hover:bg-primary-red transition duration-300 pulse-icon">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                </div>

                <!-- Quick Contact -->
                <div class="bg-stone-100 rounded-2xl p-6 md:p-10 max-w-4xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                        <a href="tel:+97714123456"
                            class="flex items-center justify-center space-x-3 bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition">
                            <i class="fas fa-phone-alt text-primary-red text-xl"></i>
                            <span class="text-primary-dark font-semibold">Call Us Now</span>
                        </a>
                        <a href="mailto:info@allnepaltech.com"
                            class="flex items-center justify-center space-x-3 bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition">
                            <i class="fas fa-envelope text-primary-red text-xl"></i>
                            <span class="text-primary-dark font-semibold">Email Us</span>
                        </a>
                        <a href="#"
                            class="flex items-center justify-center space-x-3 bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition">
                            <i class="fab fa-whatsapp text-primary-red text-xl"></i>
                            <span class="text-primary-dark font-semibold">WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </section>
    @push('script')
        <script>
            // Mobile Menu Toggle
            const menuBtn = document.getElementById('menuBtn');
            const mobileMenu = document.getElementById('mobileMenu');

            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                const icon = menuBtn.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                }
            });

            // Form Submission
            const contactForm = document.getElementById('contactForm');
            const successMsg = document.getElementById('successMsg');

            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();

                // Simulate form submission
                const submitBtn = contactForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Sending...';
                submitBtn.disabled = true;

                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    successMsg.classList.remove('hidden');
                    contactForm.reset();

                    // Hide success message after 5 seconds
                    setTimeout(() => {
                        successMsg.classList.add('hidden');
                    }, 5000);
                }, 1500);
            });

            // Smooth scroll for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection