<footer class="py-20 border-t border-gray-100">
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4 mb-8 lg:mb-16">
            <div class="w-full lg:w-2/3 px-4 mb-12 lg:mb-0 flex justify-center">
                <a class="text-gray-600 text-2xl leading-none mr-2" href="{{ route('home') }}">
                    <img src="{{ asset('storage/'.config('constants.site_icon', '')) }}" alt="" width="auto" style="max-width: 225px; max-height: 120px;">
                </a>
                <div>
                    <p class="mt-5 mb-6 max-w-xs text-gray-500 leading-loose">{{__('2021 come up with lot off challenges.')}}</p>
                    <a class="inline-block h-6 mr-8" href="{{ config('constants.facebook_link', '') }}">
                        <img class="mx-auto" src="{{ asset('img/socials/facebook.svg') }}">
                    </a>
                    <a class="inline-block h-6 mr-8" href="{{ config('constants.instagram_link', '') }}">
                        <img class="mx-auto" src="{{ asset('img/socials/instagram.svg') }}">
                    </a>
                    <a class="inline-block h-6" href="{{ config('constants.twitter_link', '') }}">
                        <img class="mx-auto" src="{{ asset('img/socials/twitter.svg') }}">
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-1/3 px-4">
                <div class="block">
                    {{-- 
                        <div class="w-1/2 lg:w-1/4 mb-8 lg:mb-0">
                            <h3 class="mb-6 text-lg font-bold font-heading">Company</h3>
                            <ul class="text-sm">
                                <li class="mb-4"><a classP="text-gray-500 hover:text-gray-600" href="#">About Us</a></li>
                                <li class="mb-4"><a class="text-gray-500 hover:text-gray-600" href="#">Careers</a></li>
                                <li class="mb-4"><a class="text-gray-500 hover:text-gray-600" href="#">Press</a></li>
                                <li><a class="text-gray-500 hover:text-gray-600" href="#">Blog</a></li>
                            </ul>
                        </div> 
                    --}}
                    {{-- <div class="w-1/2 lg:w-1/4 mb-8 lg:mb-0">
                        <h3 class="mb-6 text-lg font-bold font-heading">Pages</h3>
                        <ul class="text-sm">
                            <li class="mb-4"><a class="text-gray-500 hover:text-gray-600" href="#">Login</a></li>
                            <li class="mb-4"><a class="text-gray-500 hover:text-gray-600" href="#">Register</a></li>
                            <li class="mb-4"><a class="text-gray-500 hover:text-gray-600" href="#">Add list</a></li>
                            <li><a class="text-gray-500 hover:text-gray-600" href="#">Contact</a></li>
                        </ul>
                    </div> --}}
                    <div class="mb-8 lg:mb-0">
                        <h3 class="mb-6 text-lg font-bold font-heading">{{__('Legal')}}</h3>
                        <ul class="text-sm">
                            <li class="mb-4">
                                <a class="text-gray-500 hover:text-gray-600" href="{{ route('tnc') }}">{{__('Terms & Conditions')}}</a>
                            </li>
                            <li class="mb-4">
                                <a class="text-gray-500 hover:text-gray-600" href="{{ route('privacy') }}">{{__('Privacy Policy')}}</a>
                            </li>
                            <li class="mb-4">
                                <a class="text-gray-500 hover:text-gray-600" href="{{ route('faq') }}">{{__('FAQ')}}s</a>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="w-1/2 lg:w-1/4">
                        <h3 class="mb-6 text-lg font-bold font-heading">Resources</h3>
                        <ul class="text-sm">
                            <li class="mb-4"><a class="text-gray-500 hover:text-gray-600" href="#">Blog</a></li>
                            <li class="mb-4"><a class="text-gray-500 hover:text-gray-600" href="#">Service</a></li>
                            <li class="mb-4"><a class="text-gray-500 hover:text-gray-600" href="#">Product</a></li>
                            <li><a class="text-gray-500 hover:text-gray-600" href="#">Pricing</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="border-t border-gray-50 pt-8">
            <p class="lg:text-center text-sm text-gray-400">
                {{ config('constants.site_copyright', 'All rights reserved © ThinkinDragon 2021') }}</p>
        </div>
    </div>
</footer>