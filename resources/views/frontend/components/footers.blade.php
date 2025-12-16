<footer class="bg-slate-900 text-slate-300 pt-20 pb-10 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 mb-16">
            
            <div class="lg:col-span-4 space-y-8">
                <a href="#" class="inline-block">
                    <div class="h-20 bg-white rounded-lg p-3 inline-flex items-center justify-center shadow-lg shadow-white/5">
                        <img src="{{ asset('frontendimages/homeimages/image.png') }}" alt="All Nepal Tech Solutions" class="h-full object-contain">
                    </div>
                </a>
                
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    Empowering businesses with cutting-edge technology solutions. Your partner in digital transformation.
                </p>

                <ul class="space-y-4">
                    <li class="flex items-start gap-4 group">
                        <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center shrink-0 group-hover:bg-[#e32726] transition-colors duration-300">
                            <i class="fas fa-map-marker-alt text-sm text-[#e32726] group-hover:text-white transition-colors"></i>
                        </div>
                        <span class="text-sm pt-1.5">Kathmandu, Balwatar</span>
                    </li>
                    <li>
                        <a href="mailto:allnepaltechsolutions@gmail.com" class="flex items-center gap-4 group transition-colors duration-300 hover:text-white">
                            <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center shrink-0 group-hover:bg-[#e32726] transition-colors duration-300">
                                <i class="fas fa-envelope text-sm text-[#e32726] group-hover:text-white transition-colors"></i>
                            </div>
                            <span class="text-sm">allnepaltechsolutions@gmail.com</span>
                        </a>
                    </li>
                    <li>
                        <a href="tel:014500062" class="flex items-center gap-4 group transition-colors duration-300 hover:text-white">
                            <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center shrink-0 group-hover:bg-[#e32726] transition-colors duration-300">
                                <i class="fas fa-phone-alt text-sm text-[#e32726] group-hover:text-white transition-colors"></i>
                            </div>
                            <span class="text-sm">01-4500062</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 lg:pl-12">
                
                <div>
                    <h3 class="text-white text-lg font-bold mb-6 relative inline-block">
                        IT Services
                        <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-[#e32726] rounded-full"></span>
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Managed IT</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">IT Support</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">IT Consultancy</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Cloud Computing</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Cyber Security</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white text-lg font-bold mb-6 relative inline-block">
                        Quick Links
                        <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-[#e32726] rounded-full"></span>
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Home</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">About Us</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Our Projects</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Services</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white text-lg font-bold mb-6 relative inline-block">
                        Support
                        <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-[#e32726] rounded-full"></span>
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Forum Support</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Help & FAQ</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Contact Us</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Pricing & Plans</a></li>
                        <li><a href="#" class="hover:text-[#e32726] hover:pl-2 transition-all duration-300 block">Cookies Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-800 pt-8 mt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-slate-500 text-sm text-center md:text-left">
                    &copy; {{ date('Y') }} <span class="text-white font-medium">All Nepal Tech Solutions</span>. All Rights Reserved.
                </p>

                <div class="flex space-x-3">
                    <a href="#" class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#1DA1F2] hover:text-white hover:-translate-y-1 transition-all duration-300 shadow-lg shadow-black/20">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#4267B2] hover:text-white hover:-translate-y-1 transition-all duration-300 shadow-lg shadow-black/20">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#E1306C] hover:text-white hover:-translate-y-1 transition-all duration-300 shadow-lg shadow-black/20">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-[#0077B5] hover:text-white hover:-translate-y-1 transition-all duration-300 shadow-lg shadow-black/20">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>