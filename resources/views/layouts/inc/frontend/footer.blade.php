{{-- <div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{$appSettings->website_name ?? 'Website Name'}}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{url('/about-us')}}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{url('/contact-us')}}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{url('/blogs')}}" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{url('/collections')}}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="" class="text-white">New Arrivals Products</a></div>
                    <div class="mb-2"><a href="" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="{{url('/cart')}}" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i>{{$appSettings->address ?? 'Address'}}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{$appSettings->phone1 ?? ''}}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{$appSettings->email1 ?? ''}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2022 - Funda of Web IT - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        @if ($appSettings->facebook)
                            <a href="{{$appSettings->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ($appSettings->twitter)
                            <a href="{{$appSettings->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if ($appSettings->instagram)
                            <a href="{{$appSettings->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ($appSettings->youtube)
                            <a href="{{$appSettings->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<footer aria-label="Site Footer" class="bg-yellow-400">
    <div class="max-w-screen-xl px-4 py-16 mx-auto space-y-8 sm:px-6 lg:space-y-16 lg:px-8">
        <div class="flex justify-center items-center">
            <div>
                <div class="text-gray-800 flex justify-center">
                    <h2>
                        {{ $appSettings->website_name }}
                    </h2>
                </div>

                <p class="mt-4 text-gray-800 flex justify-center">
                    Let us help bring your ideas to life with our professional and efficient printing services.
                </p>
                <h5 class="text-center">Contact Us</h5>
                <div class="no-left mb-3">    
                    <div class="flex justify-center">{{$appSettings->address}}</div>
                    <div class="flex justify-center">{{$appSettings->phone1}}</div>
                    <div class="flex justify-center">{{$appSettings->email1}}</div>
                </div>


                <div class="flex justify-center items-center gap-6 no-left">
                    @if ($appSettings->facebook)
                        <div>
                            <a href="{{ 'https://' . $appSettings->facebook }}" rel="noreferrer" target="_blank"
                                class="text-gray-800 transition hover:opacity-75">
                                <span class="sr-only">Facebook</span>

                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    @endif

                    @if ($appSettings->instagram)
                        <div>
                            <a href="{{ 'https://' . $appSettings->instagram }}" rel="noreferrer" target="_blank"
                                class="text-gray-800 transition hover:opacity-75">
                                <span class="sr-only">Instagram</span>

                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    @endif

                    @if ($appSettings->twitter)
                        <div>
                            <a href="{{ 'https://' . $appSettings->twitter }}" rel="noreferrer" target="_blank"
                                class="text-gray-800 transition hover:opacity-75">
                                <span class="sr-only">Twitter</span>

                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
{{-- 
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-4">
                <div>
                    <p class="font-medium text-gray-800">Services</p>

                    <nav aria-label="Footer Navigation - Services" class="mt-6">
                        <ul class="space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    1on1 Coaching
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Company Review
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Accounts Review
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    HR Consulting
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    SEO Optimisation
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div>
                    <p class="font-medium text-gray-800">Company</p>

                    <nav aria-label="Footer Navigation - Company" class="mt-6">
                        <ul class="space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    About
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Meet the Team
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Accounts Review
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div>
                    <p class="font-medium text-gray-800">Helpful Links</p>

                    <nav aria-label="Footer Navigation - Company" class="mt-6">
                        <ul class="space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Contact
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    FAQs
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Live Chat
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div>
                    <p class="font-medium text-gray-800">Legal</p>
                    <nav aria-label="Footer Navigation - Legal" class="mt-6">
                        <ul class="space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Accessibility
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Returns Policy
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Refund Policy
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-gray-800 transition hover:opacity-75">
                                    Hiring Statistics
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> --}}
        </div>

        <p class="text-xs text-gray-800 flex justify-center">
            &copy; 2023. {{ $appSettings->website_name }}. All rights reserved.
        </p>
    </div>
</footer>
