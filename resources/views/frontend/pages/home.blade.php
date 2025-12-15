@extends('frontend.layout.app')

@section('content')
    @push('style')
        <style>
            .swiper-slide {
                flex-shrink: 0;
            }
        </style>
    @endpush
    <section>
        <!-- Hero Section -->
        <section class="relative bg-white  h-[90vh] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <picture>


                    <!-- Mobile L (376px to 425px) -->
                    <source media="(max-width: 425px)" srcset="{{ asset('frontendimages/homeimages/heromobile.png') }}">

                    <!-- Tablet (426px to 768px) -->
                    <source media="(max-width: 768px)" srcset="{{ asset('frontendimages/homeimages/herotablet.png') }}">

                    <!-- Laptop (769px to 1024px) -->
                    <source media="(max-width: 1024px)" srcset="{{ asset('frontendimages/homeimages/herolaptop.png') }}">

                    <!-- Default: Laptop L (1025px+) -->
                    <img src="{{ asset('frontendimages/homeimages/herolaptop.png') }}" alt="Hero Background"
                        class="h-full w-full object-cover opacity-95">
                </picture>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center lg:text-left w-full">
                <div class="lg:w-2/3">
                    <p class="text-slate-800 font-semibold tracking-wide text-lg mb-2 uppercase">IT Design & Consulting</p>
                    <h1 class="text-4xl lg:text-6xl font-extrabold text-[#2f2f73] leading-tight mb-6">
                        Facilitate All Local <br> <span class="text-primary-custom">IT-related Service</span> Providers
                    </h1>
                    <p class="text-lg text-gray-700 mb-8 max-w-2xl mx-auto lg:mx-0 font-medium">
                        Highly Tailored IT Design, Management & Support Services for your business growth and security.
                    </p>
                    <div>
                        <a href="#"
                            class="inline-block bg-[#2f2f73] text-white font-medium px-8 py-4 rounded-md shadow-lg hover:bg-opacity-90 transition transform hover:scale-105">
                            Get Details
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-20 bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h6 class="text-stone-500 text-lg font-bold uppercase tracking-wider mb-2">Our services</h6>
                    <p class="max-lg:text-3xl text-5xl font-bold text-gray-900">
                        For your very specific industry,<br> we have <span class="text-[#e32726] ">highly-tailored IT
                            solutions.</span>
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Service 1 -->
                    <div class="bg-white p-8 rounded-xl border border-gray-100 shadow-sm hover-lift group">
                        <div
                            class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 group-hover:bg-primary-custom transition-colors duration-300">
                            <i
                                class="fas fa-laptop-code text-2xl text-primary-custom group-hover:text-[#2f2f73] transition-colors"></i>
                        </div>
                        <h5 class="text-xl font-bold text-gray-900 mb-3">Software Design</h5>
                        <p class="text-gray-600 mb-6">We provide the most responsive and functional software design for
                            companies and businesses worldwide.</p>
                        <a href="#"
                            class="inline-flex items-center text-primary-custom font-semibold hover:text-secondary-custom transition">
                            Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>

                    <!-- Service 2 -->
                    <div class="bg-white p-8 rounded-xl border border-gray-100 shadow-sm hover-lift group">
                        <div
                            class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 group-hover:bg-primary-custom transition-colors duration-300">
                            <i
                                class="fas fa-server text-2xl text-primary-custom group-hover:text-[#2f2f73] transition-colors"></i>
                        </div>
                        <h5 class="text-xl font-bold text-gray-900 mb-3">IT Management</h5>
                        <p class="text-gray-600 mb-6">It’s possible to simultaneously manage and transform information from
                            one server to another efficiently.</p>
                        <a href="#"
                            class="inline-flex items-center text-primary-custom font-semibold hover:text-secondary-custom transition">
                            Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>

                    <!-- Service 3 -->
                    <div class="bg-white p-8 rounded-xl border border-gray-100 shadow-sm hover-lift group">
                        <div
                            class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 group-hover:bg-primary-custom transition-colors duration-300">
                            <i
                                class="fas fa-shield-alt text-2xl text-primary-custom group-hover:text-[#2f2f73] transition-colors"></i>
                        </div>
                        <h5 class="text-xl font-bold text-gray-900 mb-3">Data Security</h5>
                        <p class="text-gray-600 mb-6">Back up your database, store in a safe and secure place while still
                            maintaining its accessibility.</p>
                        <a href="#"
                            class="inline-flex items-center text-primary-custom font-semibold hover:text-secondary-custom transition">
                            Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <div class="text-center mt-12 text-gray-600">
                    Challenges are just opportunities in disguise. <a href="#"
                        class="text-blue-800 font-semibold hover:underline">Take the challenge!</a>
                </div>
            </div>
        </section>

        <!-- Our Experience Section -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row gap-16">
                    <div class="lg:w-1/2">
                        <h6 class="text-gray-500 font-bold text-lg uppercase tracking-wider mb-2">Our company</h6>
                        <h3 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-6">
                            We’ve been thriving in <br> <span class="text-[#2f2f73]">since past few years</span>
                        </h3>
                        <p class="text-gray-600 leading-relaxed mb-8">
                            We are specialized in technological and IT-related services such as product engineering,
                            warranty management, building cloud, infrastructure, network, etc. We put a strong focus on the
                            needs of your business to figure out solutions that best fits your demand and nail it.
                        </p>
                        <a href="#"
                            class="bg-[#2f2f73] text-white px-8 py-3 rounded-md font-medium hover:bg-opacity-90 transition">
                            Join us now
                        </a>
                    </div>

                    <div class="lg:w-1/2">
                        <div class="space-y-6">
                            <!-- List Item 1 -->
                            <a href="#" class="block group">
                                <div
                                    class="flex items-start p-6 bg-white rounded-lg shadow-sm border border-transparent group-hover:border-gray-200 transition">
                                    <div
                                        class="text-4xl font-bold text-gray-200 group-hover:text-primary-custom mr-6 transition-colors">
                                        01</div>
                                    <div>
                                        <h6
                                            class="text-2xl font-bold text-gray-900 group-hover:text-primary-custom transition-colors">
                                            How we can help your business?</h6>
                                        <p class="text-gray-500 mt-2 text-sm group-hover:text-gray-600">Discover our
                                            tailored strategies.</p>
                                    </div>
                                </div>
                            </a>
                            <!-- List Item 2 -->
                            <a href="#" class="block group">
                                <div
                                    class="flex items-start p-6 bg-white rounded-lg shadow-sm border border-transparent group-hover:border-gray-200 transition">
                                    <div
                                        class="text-4xl font-bold text-gray-200 group-hover:text-primary-custom mr-6 transition-colors">
                                        02</div>
                                    <div>
                                        <h6
                                            class="text-2xl font-bold text-gray-900 group-hover:text-primary-custom transition-colors">
                                            Why become our partner?</h6>
                                        <p class="text-gray-500 mt-2 text-sm group-hover:text-gray-600">Growth, support,
                                            and innovation.</p>
                                    </div>
                                </div>
                            </a>
                            <!-- List Item 3 -->
                            <a href="#" class="block group">
                                <div
                                    class="flex items-start p-6 bg-white rounded-lg shadow-sm border border-transparent group-hover:border-gray-200 transition">
                                    <div
                                        class="text-4xl font-bold text-gray-200 group-hover:text-primary-custom mr-6 transition-colors">
                                        03</div>
                                    <div>
                                        <h6
                                            class="text-2xl font-bold text-gray-900 group-hover:text-primary-custom transition-colors">
                                            What are the best of All Nepal Tech?</h6>
                                        <p class="text-gray-500 mt-2 text-sm group-hover:text-gray-600">Quality,
                                            reliability, and speed.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Feature Large Images -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h6 class="text-gray-500 lg:text-xl font-bold uppercase tracking-wider mb-2">Hire us, why not?</h6>
                    <h3 class="text-5xl font-bold text-gray-900">
                        How we claim to <span class="text-[#2f2f73]">excel?</span>
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Data Management"
                                class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-linear-to-t from-black/80 to-transparent flex items-end p-6">
                                <h5 class="text-white text-xl font-bold">Data Management Systems</h5>
                            </div>
                        </div>
                        <div class="mt-6 text-center px-4">
                            <p class="text-gray-600">Our technical experts have a flair for developing <strong>clean-coded
                                    websites</strong> based on customers’ needs.</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl">
                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Database Security"
                                class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-linear-to-t from-black/80 to-transparent flex items-end p-6">
                                <h5 class="text-white text-xl font-bold">Efficient Database Security</h5>
                            </div>
                        </div>
                        <div class="mt-6 text-center px-4">
                            <p class="text-gray-600">Our technical experts have a flair for developing <strong>secure
                                    systems</strong> based on global security guidelines.</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl">
                            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Multi-function Tech"
                                class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-linear-to-t from-black/80 to-transparent flex items-end p-6">
                                <h5 class="text-white text-xl font-bold">Reliable Multi-function Technology</h5>
                            </div>
                        </div>
                        <div class="mt-6 text-center px-4">
                            <p class="text-gray-600">Our technical experts have a flair for developing <strong>versatile
                                    solutions</strong> based on customers’ trends.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Fun Facts -->
        <section class="py-16 bg-[#e32726] rounded-2xl text-white container mx-auto ">
            <div class=" mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                    <div>
                        <h5 class=" text-sm font-medium mb-2">Successfully Worked with</h5>
                        <div class="text-4xl lg:text-5xl font-bold text-secondary-custom mb-1">100</div>
                        <span class="text-xs tracking-wider uppercase">Happy Clients</span>
                    </div>
                    <div>
                        <h5 class=" text-sm font-medium mb-2">Successfully Completed</h5>
                        <div class="text-4xl lg:text-5xl font-bold text-secondary-custom mb-1">40</div>
                        <span class="text-xs tracking-wider uppercase">Finished Projects</span>
                    </div>
                    <div>
                        <h5 class=" text-sm font-medium mb-2">Recruited More than</h5>
                        <div class="text-4xl lg:text-5xl font-bold text-secondary-custom mb-1">300</div>
                        <span class="text-xs tracking-wider uppercase">Skilled Experts</span>
                    </div>
                    <div>
                        <h5 class=" text-sm font-medium mb-2">Services Provided</h5>
                        <div class="text-4xl lg:text-5xl font-bold text-secondary-custom mb-1">150</div>
                        <span class="text-xs tracking-wider uppercase">Quality Certified</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <div class="relative w-full overflow-hidden mt-20">
            <div id="swiperTrack" class="flex will-change-transform transition-transform duration-500 ease-out">

                <!-- Slides -->

                {{-- slide1 --}}
                <div class="swiper-slide p-4  ">
                    <div class="bg-white shadow-lg  rounded-xl overflow-hidden ">
                        <div class="">
                            <img class=" h-70 w-full object-center object-cover"
                                src="{{ asset('frontendimages/aboutusimages/ceo.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center space-y-3">
                            <h3 class="text-lg font-medium text-[#2f2f73]">Internal Networking for Shangrila Blu</h3>
                            <h1 class="text-xl font-bold text-[#e32726]">IT Networking</h1>
                            <div class="text text-justify tracking-tight">Designed and implemented internal networking
                                solutions for optimal connectivity and security.</div>
                        </div>
                    </div>
                </div>

                {{-- slide2 --}}
                <div class="swiper-slide p-4">
                    <div class="bg-white shadow-lg  rounded-xl overflow-hidden ">
                        <div class="">
                            <img class=" h-70 w-full object-center object-cover"
                                src="{{ asset('frontendimages/aboutusimages/ceo.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center space-y-3">
                            <h3 class="text-lg font-medium text-[#2f2f73]">Internal Networking for Shangrila Blu</h3>
                            <h1 class="text-xl font-bold text-[#e32726]">IT Networking</h1>
                            <div class="text text-justify tracking-tight">Designed and implemented internal networking
                                solutions for optimal connectivity and security.</div>
                        </div>
                    </div>
                </div>

                {{-- slide3 --}}
                <div class="swiper-slide p-4">
                    <div class="bg-white shadow-lg  rounded-xl overflow-hidden ">
                        <div class="">
                            <img class=" h-70 w-full object-center object-cover"
                                src="{{ asset('frontendimages/aboutusimages/ceo.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center space-y-3">
                            <h3 class="text-lg font-medium text-[#2f2f73]">Internal Networking for Shangrila Blu</h3>
                            <h1 class="text-xl font-bold text-[#e32726]">IT Networking</h1>
                            <div class="text text-justify tracking-tight">Designed and implemented internal networking
                                solutions for optimal connectivity and security.</div>
                        </div>
                    </div>
                </div>

                {{-- slide4 --}}
                <div class="swiper-slide p-4">
                    <div class="bg-white shadow-lg  rounded-xl overflow-hidden ">
                        <div class="">
                            <img class=" h-70 w-full object-center object-cover"
                                src="{{ asset('frontendimages/aboutusimages/ceo.jpg') }}" alt="">
                        </div>
                        <div class="p-4 text-center space-y-3">
                            <h3 class="text-lg font-medium text-[#2f2f73]">Internal Networking for Shangrila Blu</h3>
                            <h1 class="text-xl font-bold text-[#e32726]">IT Networking</h1>
                            <div class="text text-justify tracking-tight">Designed and implemented internal networking
                                solutions for optimal connectivity and security.</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <button id="prevBtn"
                class="absolute left-2 top-1/2 -translate-y-1/2 bg-[#2f2f73] text-white px-3 py-2 rounded-full">
                <i class='fa-solid fa-angle-left'></i>
            </button>

            <button id="nextBtn"
                class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#2f2f73] text-white px-3 py-2 rounded-full">
                <i class='fa-solid fa-angle-right'></i>
            </button>
        </div>
        @push('script')
            <script>
                (() => {
                    const track = document.getElementById('swiperTrack');
                    const prevBtn = document.getElementById('prevBtn');
                    const nextBtn = document.getElementById('nextBtn');

                    let slides = Array.from(track.children);
                    let index = 0;
                    let slidesPerView = 1;
                    let slideWidth = 0;

                    let startX = 0;
                    let currentX = 0;
                    let dragging = false;

                    /* ---------- Responsive Slides Per View ---------- */
                    const getSlidesPerView = () => {
                        const w = window.innerWidth;
                        if (w >= 1024) return 3;
                        if (w >= 768) return 2;
                        return 1;
                    };

                    /* ---------- Setup Loop ---------- */
                    const setupLoop = () => {
                        track.innerHTML = '';
                        const before = slides.slice(-slidesPerView).map(s => s.cloneNode(true));
                        const after = slides.slice(0, slidesPerView).map(s => s.cloneNode(true));

                        [...before, ...slides, ...after].forEach(s => track.appendChild(s));
                        index = slidesPerView;
                    };

                    /* ---------- Layout ---------- */
                    const updateLayout = () => {
                        slidesPerView = getSlidesPerView();
                        slideWidth = track.parentElement.offsetWidth / slidesPerView;

                        Array.from(track.children).forEach(slide => {
                            slide.style.width = slideWidth + 'px';
                        });

                        setupLoop();
                        moveTo(index, false);
                    };

                    /* ---------- Movement ---------- */
                    const moveTo = (i, animate = true) => {
                        track.style.transition = animate ? 'transform 0.5s ease-out' : 'none';
                        track.style.transform = `translateX(-${i * slideWidth}px)`;
                        index = i;
                    };

                    const next = () => moveTo(index + slidesPerView);
                    const prev = () => moveTo(index - slidesPerView);

                    /* ---------- Loop Correction ---------- */
                    track.addEventListener('transitionend', () => {
                        if (index >= slides.length + slidesPerView) {
                            moveTo(slidesPerView, false);
                        }
                        if (index <= 0) {
                            moveTo(slides.length, false);
                        }
                    });

                    /* ---------- Drag Logic ---------- */
                    const dragStart = x => {
                        startX = x;
                        dragging = true;
                        track.style.transition = 'none';
                    };

                    const dragMove = x => {
                        if (!dragging) return;
                        currentX = x - startX;
                        track.style.transform =
                            `translateX(${currentX - index * slideWidth}px)`;
                    };

                    const dragEnd = () => {
                        if (!dragging) return;
                        dragging = false;

                        if (Math.abs(currentX) > slideWidth / 4) {
                            currentX < 0 ? next() : prev();
                        } else {
                            moveTo(index);
                        }
                        currentX = 0;
                    };

                    /* ---------- Events ---------- */
                    nextBtn.addEventListener('click', next);
                    prevBtn.addEventListener('click', prev);

                    track.addEventListener('touchstart', e => dragStart(e.touches[0].clientX));
                    track.addEventListener('touchmove', e => dragMove(e.touches[0].clientX));
                    track.addEventListener('touchend', dragEnd);

                    track.addEventListener('mousedown', e => dragStart(e.clientX));
                    window.addEventListener('mousemove', e => dragMove(e.clientX));
                    window.addEventListener('mouseup', dragEnd);

                    window.addEventListener('resize', updateLayout);

                    updateLayout();
                })();
            </script>
        @endpush

        <!-- Contact Section -->
        <section class="py-24 bg-white border-t border-gray-100">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-12 ">
                    <div class="lg:w-1/2">
                        <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 border-l-4 border-[#e32726] p-5">
                            Obtaining further information by <span class="text-primary-custom">making a contact</span>
                            with our experienced IT staffs.
                        </h3>
                        <p class="text-gray-600 text-lg p-5">
                            We’re available for 8 hours a day! Contact us to require a detailed analysis and assessment of
                            your plan.
                        </p>
                    </div>

                    <div class="lg:w-1/2 flex flex-col items-center justify-center text-center">
                        <div
                            class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 text-primary-custom">
                            <i class="fas fa-phone-alt text-2xl"></i>
                        </div>
                        <h6 class="text-gray-500 font-medium mb-2">Reach out now!</h6>
                        <h2 class="text-3xl lg:text-4xl font-bold text-primary-custom mb-6">01-4500062</h2>
                        <a href="#"
                            class="bg-[#e32726] text-white px-8 py-3 rounded-md font-medium hover:bg-opacity-90 transition shadow-lg">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </section>
@endsection