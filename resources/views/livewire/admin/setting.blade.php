<div>
    @php
    $timezones = array(
        'America/Adak' ,'America/Atka' ,'America/Anchorage' ,'America/Juneau' ,'America/Nome' ,'America/Yakutat' ,'America/Dawson' ,'America/Ensenada' ,'America/Los_Angeles' ,'America/Tijuana' ,'America/Vancouver' ,'America/Whitehorse' ,'Canada/Pacific' ,'Canada/Yukon' ,'Mexico/BajaNorte' ,'America/Boise' ,'America/Cambridge_Bay' ,'America/Chihuahua' ,'America/Dawson_Creek' ,'America/Denver' ,'America/Edmonton' ,'America/Hermosillo' ,'America/Inuvik' ,'America/Mazatlan' ,'America/Phoenix' ,'America/Shiprock' ,'America/Yellowknife' ,'Canada/Mountain' ,'Mexico/BajaSur' ,'America/Belize' ,'America/Cancun' ,'America/Chicago' ,'America/Costa_Rica' ,'America/El_Salvador' ,'America/Guatemala' ,'America/Knox_IN' ,'America/Managua' ,'America/Menominee' ,'America/Merida' ,'America/Mexico_City' ,'America/Monterrey' ,'America/Rainy_River' ,'America/Rankin_Inlet' ,'America/Regina' ,'America/Swift_Current' ,'America/Tegucigalpa' ,'America/Winnipeg' ,'Canada/Central' ,'Canada/East-Saskatchewan' ,'Canada/Saskatchewan' ,'Chile/EasterIsland' ,'Mexico/General' ,'America/Atikokan' ,'America/Bogota' ,'America/Cayman' ,'America/Coral_Harbour' ,'America/Detroit' ,'America/Fort_Wayne' ,'America/Grand_Turk' ,'America/Guayaquil' ,'America/Havana' ,'America/Indianapolis' ,'America/Iqaluit' ,'America/Jamaica' ,'America/Lima' ,'America/Louisville' ,'America/Montreal' ,'America/Nassau' ,'America/New_York' ,'America/Nipigon' ,'America/Panama' ,'America/Pangnirtung' ,'America/Port-au-Prince' ,'America/Resolute' ,'America/Thunder_Bay' ,'America/Toronto' ,'Canada/Eastern' ,'America/Caracas' ,'America/Anguilla' ,'America/Antigua' ,'America/Aruba' ,'America/Asuncion' ,'America/Barbados' ,'America/Blanc-Sablon' ,'America/Boa_Vista' ,'America/Campo_Grande' ,'America/Cuiaba' ,'America/Curacao' ,'America/Dominica' ,'America/Eirunepe' ,'America/Glace_Bay' ,'America/Goose_Bay' ,'America/Grenada' ,'America/Guadeloupe' ,'America/Guyana' ,'America/Halifax' ,'America/La_Paz' ,'America/Manaus' ,'America/Marigot' ,'America/Martinique' ,'America/Moncton' ,'America/Montserrat' ,'America/Port_of_Spain' ,'America/Porto_Acre' ,'America/Porto_Velho' ,'America/Puerto_Rico' ,'America/Rio_Branco' ,'America/Santiago' ,'America/Santo_Domingo' ,'America/St_Barthelemy' ,'America/St_Kitts' ,'America/St_Lucia' ,'America/St_Thomas' ,'America/St_Vincent' ,'America/Thule' ,'America/Tortola' ,'America/Virgin' ,'Antarctica/Palmer' ,'Atlantic/Bermuda' ,'Atlantic/Stanley' ,'Brazil/Acre' ,'Brazil/West' ,'Canada/Atlantic' ,'Chile/Continental' ,'America/St_Johns' ,'Canada/Newfoundland' ,'America/Araguaina' ,'America/Bahia' ,'America/Belem' ,'America/Buenos_Aires' ,'America/Catamarca' ,'America/Cayenne' ,'America/Cordoba' ,'America/Fortaleza' ,'America/Godthab' ,'America/Jujuy' ,'America/Maceio' ,'America/Mendoza' ,'America/Miquelon' ,'America/Montevideo' ,'America/Paramaribo' ,'America/Recife' ,'America/Rosario' ,'America/Santarem' ,'America/Sao_Paulo' ,'Antarctica/Rothera' ,'Brazil/East' ,'America/Noronha' ,'Atlantic/South_Georgia' ,'Brazil/DeNoronha' ,'America/Scoresbysund' ,'Atlantic/Azores' ,'Atlantic/Cape_Verde' ,'Africa/Abidjan' ,'Africa/Accra' ,'Africa/Bamako' ,'Africa/Banjul' ,'Africa/Bissau' ,'Africa/Casablanca' ,'Africa/Conakry' ,'Africa/Dakar' ,'Africa/El_Aaiun' ,'Africa/Freetown' ,'Africa/Lome' ,'Africa/Monrovia' ,'Africa/Nouakchott' ,'Africa/Ouagadougou' ,'Africa/Sao_Tome' ,
        'Africa/Timbuktu' ,	'Africa/Addis_Ababa',	'Africa/Algiers',
        'Africa/Asmara',	'Africa/Bangui',	'Africa/Blantyre',	'Africa/Brazzaville',	'Africa/Bujumbura',
        'Africa/Cairo',	'Africa/Ceuta',	'Africa/Dar_es_Salaam',	'Africa/Djibouti',	'Africa/Douala',	'Africa/Gaborone',	'Africa/Harare',
        'Africa/Johannesburg'	,'Africa/Juba',	'Africa/Kampala',	'Africa/Khartoum',
        'Africa/Kigali',	'Africa/Kinshasa',	'Africa/Lagos',	'Africa/Libreville',
        'Africa/Lome',	'Africa/Luanda',	'Africa/Lubumbashi',	'Africa/Lusaka',
        'Africa/Malabo',	'Africa/Maputo',	'Africa/Maseru',	'Africa/Mbabane',
        'Africa/Mogadishu',	'Africa/Monrovia',	'Africa/Nairobi',	'Africa/Ndjamena',
        'Africa/Niamey',	'Africa/Porto-Novo',	'Africa/Tripoli',	'Africa/Tunis',	'Africa/Windhoek','America/Danmarkshavn' ,'Atlantic/Canary' ,'Atlantic/Faeroe' ,'Atlantic/Faroe' ,'Atlantic/Madeira' ,'Atlantic/Reykjavik' ,'Atlantic/St_Helena' ,'Europe/Belfast' ,'Europe/Dublin' ,'Europe/Guernsey' ,'Europe/Isle_of_Man' ,'Europe/Jersey' ,'Europe/Lisbon' ,'Europe/London' ,'Africa/Algiers' ,'Africa/Bangui' ,'Africa/Brazzaville' ,'Africa/Ceuta' ,'Africa/Douala' ,'Africa/Kinshasa' ,'Africa/Lagos' ,'Africa/Libreville' ,'Africa/Luanda' ,'Africa/Malabo' ,'Africa/Ndjamena' ,'Africa/Niamey' ,'Africa/Porto-Novo' ,'Africa/Tunis' ,'Africa/Windhoek' ,'Arctic/Longyearbyen' ,'Atlantic/Jan_Mayen' ,'Europe/Amsterdam' ,'Europe/Andorra' ,'Europe/Belgrade' ,'Europe/Berlin' ,'Europe/Bratislava' ,'Europe/Brussels' ,'Europe/Budapest' ,'Europe/Copenhagen' ,'Europe/Gibraltar' ,'Europe/Ljubljana' ,'Europe/Luxembourg' ,'Europe/Madrid' ,'Europe/Malta' ,'Europe/Monaco' ,'Europe/Oslo' ,'Europe/Paris' ,'Europe/Podgorica' ,'Europe/Prague' ,'Europe/Rome' ,'Europe/San_Marino' ,'Europe/Sarajevo' ,'Europe/Skopje' ,'Europe/Stockholm' ,'Europe/Tirane' ,'Europe/Vaduz' ,'Europe/Vatican' ,'Europe/Vienna' ,'Europe/Warsaw' ,'Europe/Zagreb' ,'Europe/Zurich' ,'Africa/Blantyre' ,'Africa/Bujumbura' ,'Africa/Cairo' ,'Africa/Gaborone' ,'Africa/Harare' ,'Africa/Johannesburg' ,'Africa/Kigali' ,'Africa/Lubumbashi' ,'Africa/Lusaka' ,'Africa/Maputo' ,'Africa/Maseru' ,'Africa/Mbabane' ,'Africa/Tripoli' ,'Asia/Amman' ,'Asia/Beirut' ,'Asia/Damascus' ,'Asia/Gaza' ,'Asia/Istanbul' ,'Asia/Jerusalem' ,'Asia/Nicosia' ,'Asia/Tel_Aviv' ,'Europe/Athens' ,'Europe/Bucharest' ,'Europe/Chisinau' ,'Europe/Helsinki' ,'Europe/Istanbul' ,'Europe/Kaliningrad' ,'Europe/Kiev' ,'Europe/Mariehamn' ,'Europe/Minsk' ,'Europe/Nicosia' ,'Europe/Riga' ,'Europe/Simferopol' ,'Europe/Sofia' ,'Europe/Tallinn' ,'Europe/Tiraspol' ,'Europe/Uzhgorod' ,'Europe/Vilnius' ,'Europe/Zaporozhye' ,'Africa/Addis_Ababa' ,'Africa/Asmara' ,'Africa/Asmera' ,'Africa/Dar_es_Salaam' ,'Africa/Djibouti' ,'Africa/Kampala' ,'Africa/Khartoum' ,'Africa/Mogadishu' ,'Africa/Nairobi' ,'Antarctica/Syowa' ,'Asia/Aden' ,'Asia/Baghdad' ,'Asia/Bahrain' ,'Asia/Kuwait' ,'Asia/Qatar' ,'Europe/Moscow' ,'Europe/Volgograd' ,'Indian/Antananarivo' ,'Indian/Comoro' ,'Indian/Mayotte' ,'Asia/Tehran' ,'Asia/Baku' ,'Asia/Dubai' ,'Asia/Muscat' ,'Asia/Tbilisi' ,'Asia/Yerevan' ,'Europe/Samara' ,'Indian/Mahe' ,'Indian/Mauritius' ,'Indian/Reunion' ,'Asia/Kabul' ,'Asia/Aqtau' ,'Asia/Aqtobe' ,'Asia/Ashgabat' ,'Asia/Ashkhabad' ,'Asia/Dushanbe' ,'Asia/Karachi' ,'Asia/Oral' ,'Asia/Samarkand' ,'Asia/Tashkent' ,'Asia/Yekaterinburg' ,'Indian/Kerguelen' ,'Indian/Maldives' ,'Asia/Calcutta' ,'Asia/Colombo' ,'Asia/Kolkata' ,'Asia/Katmandu' ,'Antarctica/Mawson' ,'Antarctica/Vostok' ,'Asia/Almaty' ,'Asia/Bishkek' ,'Asia/Dacca' ,'Asia/Dhaka' ,'Asia/Novosibirsk' ,'Asia/Omsk' ,'Asia/Qyzylorda' ,'Asia/Thimbu' ,'Asia/Thimphu' ,'Indian/Chagos' ,'Asia/Rangoon' ,'Indian/Cocos' ,'Antarctica/Davis' ,'Asia/Bangkok' ,'Asia/Ho_Chi_Minh' ,'Asia/Hovd' ,'Asia/Jakarta' ,'Asia/Krasnoyarsk' ,'Asia/Phnom_Penh' ,'Asia/Pontianak' ,'Asia/Saigon' ,'Asia/Vientiane' ,'Indian/Christmas' ,'Antarctica/Casey' ,'Asia/Brunei' ,'Asia/Choibalsan' ,'Asia/Chongqing' ,'Asia/Chungking' ,'Asia/Harbin' ,'Asia/Hong_Kong' ,'Asia/Irkutsk' ,'Asia/Kashgar' ,'Asia/Kuala_Lumpur' ,'Asia/Kuching' ,'Asia/Macao' ,'Asia/Macau' ,'Asia/Makassar' ,'Asia/Manila' ,'Asia/Shanghai' ,'Asia/Singapore' ,'Asia/Taipei' ,'Asia/Ujung_Pandang' ,'Asia/Ulaanbaatar' ,'Asia/Ulan_Bator' ,'Asia/Urumqi' ,'Australia/Perth' ,'Australia/West' ,'Australia/Eucla' ,'Asia/Dili' ,'Asia/Jayapura' ,'Asia/Pyongyang' ,'Asia/Seoul' ,'Asia/Tokyo' ,'Asia/Yakutsk' ,'Australia/Adelaide' ,'Australia/Broken_Hill' ,'Australia/Darwin' ,'Australia/North' ,'Australia/South' ,'Australia/Yancowinna' ,'Antarctica/DumontDUrville' ,'Asia/Sakhalin' ,'Asia/Vladivostok' ,'Australia/ACT' ,'Australia/Brisbane' ,'Australia/Canberra' ,'Australia/Currie' ,'Australia/Hobart' ,'Australia/Lindeman' ,'Australia/Melbourne' ,'Australia/NSW' ,'Australia/Queensland' ,'Australia/Sydney' ,'Australia/Tasmania' ,'Australia/Victoria' ,'Australia/LHI' ,'Australia/Lord_Howe' ,'Asia/Magadan' ,'Antarctica/McMurdo' ,'Antarctica/South_Pole' ,'Asia/Anadyr' ,'Asia/Kamchatka'
    );
@endphp
    <div class="flex flex-wrap mb-6" id="tabs">
        <div class="w-full">
            <ul wire:ignore class="tab-head flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-white bg-blue-500"
                        onclick="changeActiveTab(event,'tab-general')" href="#general" id="#general">
                        <i class="fa fa-space-shuttle text-base mr-1"></i> General
                    </a>
                </li>
                <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800"
                        onclick="changeActiveTab(event,'tab-socialLinks')" href="#socialLinks" id="#socialLinks">
                        <i class="fa fa-cog text-base mr-1"></i> Socail & Apps Links
                    </a>
                </li>
                {{-- <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                        <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800" onclick="changeActiveTab(event,'tab-socialConfigs')" href="#socialConfigs" id="#socialConfigs">
                            <i class="fa fa-cog text-base mr-1"></i> Socail Config
                        </a>
                    </li> --}}
                <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800"
                        onclick="changeActiveTab(event,'tab-search')" href="#search" id="#search">
                        <i class="fa fa-cog text-base mr-1"></i> Search Method
                    </a>
                </li>
                <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800"
                        onclick="changeActiveTab(event,'tab-api')" href="#api" id="#api">
                        <i class="fa fa-cog text-base mr-1"></i> Api Keys
                    </a>
                </li>
                <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800"
                        onclick="changeActiveTab(event,'tab-email')" href="#email" id="#email">
                        <i class="fa fa-cog text-base mr-1"></i> E-Mail
                    </a>
                </li>
                <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800"
                        onclick="changeActiveTab(event,'tab-pushNotification')" href="#pushNotification"
                        id="#pushNotification">
                        <i class="fa fa-cog text-base mr-1"></i> Push Notification
                    </a>
                </li>
                <li class="mr-2 mb-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal text-blue-500 bg-white dark:text-gray-300 dark:bg-gray-800"
                        onclick="changeActiveTab(event,'tab-other')" href="#other" id="#other">
                        <i class="fa fa-cog text-base mr-1"></i> Others
                    </a>
                </li>
            </ul>
            <div wire:poll
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded dark:text-gray-400 dark:bg-gray-800">
                <div class="px-4 py-5 flex-auto dark:text-gray-400 dark:bg-gray-800">
                    <div class="tab-content tab-space dark:text-gray-400 dark:bg-gray-800">
                        <div wire:ignore.self class="block" id="tab-general">
                            <x-form method="post" :action="route('admin.settings.generalConfig')" has-file>
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    <x-inputs.text :label="__('crud.admin.settings.Site_Name')" name="site_title"
                                        value="{{ config('constants.site_title') ?? '' }}"></x-inputs.text>

                                    <div class="w-full px-4 mb-4 md:mb-0 md:w-1/2">
                                        <div class="mb-6">
                                            <x-inputs.partials.label name="timezone" :label="__('crud.admin.settings.timezone')"></x-inputs.partials.label>
                                            <div class="relative" wire:ignore>
                                                <select class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300" id="timezone" onclick="openDropList()" name="timezone">
                                                    <option {{ config('constants.timezone') == "Asia/Kolkata" ? "selected" : "" }} value="Asia/Kolkata">Asia/Kolkata</option>
                                                    @foreach ($timezones as $item)
                                                        <option @if(Config::get('constants.timezone')==$item) selected @endif value="{{$item}}">{{$item}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        /* Search Input Field Background */
                                        /* .select2-search { background-color: #00f; } */
                                        /* Search Input Field */
                                        /* .select2-search input { background-color: #00f; } */
                                        /* Select List Background */
                                        /* .select2-results { background-color: #00f; } */
                                        /* .select2-container--default .select2-selection--single{
                                            background-color: #000;
                                        } */
                                    </style>

                                    {{-- <x-inputs.select :label="__('crud.admin.settings.timezone')" name="timezone" space="md:w-1/2">
                                        <option {{ config('constants.timezone') == "Asia/Kolkata" ? "selected" : "" }} value="Asia/Kolkata">Asia/Kolkata</option>
                                        @foreach ($timezones as $item)
                                            <option @if(Config::get('constants.timezone')==$item) selected @endif value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </x-inputs.select> --}}

                                    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            <x-inputs.partials.label name="site_logo"
                                                :label="__('crud.inputs.site_logo')">
                                            </x-inputs.partials.label>
                                            <img class="h-20" src="{{ url('storage/'.config('constants.site_logo')) }}"
                                                alt="" width="">
                                            <input
                                                class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                                                type="file" name="site_logo" value="" id="site_logo" />
                                        </div>
                                    </div>

                                    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            <x-inputs.partials.label name="site_icon"
                                                :label="__('crud.inputs.site_icon')">
                                            </x-inputs.partials.label>
                                            <img class="h-20" src="{{ url('storage/'.config('constants.site_icon')) }}"
                                                alt="" width="">
                                            <input
                                                class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                                                type="file" name="site_icon" value="" id="site_icon" />
                                        </div>
                                    </div>

                                    <x-inputs.number space="md:w-1/2" :label="__('crud.inputs.contact_number')"
                                        name="contact_number" value="{{ config('constants.contact_number') ?? '' }}">
                                    </x-inputs.number>

                                    <x-inputs.email space="md:w-1/2" :label="__('crud.inputs.email')" name="site_email"
                                        value="{{ config('constants.site_email') ?? '' }}"></x-inputs.email>

                                    <x-inputs.text space="md:w-1/2" :label="__('crud.inputs.site_copyright')"
                                        name="site_copyright" value="{{ config('constants.site_copyright') ?? '' }}">
                                    </x-inputs.text>
                                    @if (config('constants.demo_mode') == "0")
                                    <x-inputs.select :label="__('crud.admin.settings.demo_mode')" name="demo_mode">
                                        <option {{ config('constants.demo_mode') == "1" ? "selected" : "" }} value="1">
                                            Enabled</option>
                                        <option {{ config('constants.demo_mode') == "0" ? "selected" : "" }} value="0">
                                            Disabled</option>
                                    </x-inputs.select>
                                    @endif

                                    <div class="px-4 flex text-red-500 text-sm mb-3 font-semibold">
                                        * Note: Use Transparent PNG image format to get best of the site icons.
                                    </div>
                                    <div class="w-full px-4 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            <button type="submit"
                                                class="right-0 float-right inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                                type="submit">{{ __('crud.general.update') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </x-form>
                        </div>
                        <div wire:ignore.self class="hidden dark:text-gray-400 dark:bg-gray-800" id="tab-socialLinks">
                            <x-form method="post" :action="route('admin.settings.storeSocialLinks')">
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    {{-- For User --}}
                                    {{-- Android App Link --}}
                                    <x-inputs.text
                                        :label="__('crud.admin.users.name').' '.__('crud.admin.settings.store_link_android_user')"
                                        name="store_link_android_user"
                                        value="{{ config('constants.store_link_android_user') ?? '' }}"></x-inputs.text>
                                    {{-- Android App Version --}}
                                    <x-inputs.text
                                        :label="__('crud.admin.users.name').' '.__('crud.admin.settings.version_android_user')"
                                        name="version_android_user"
                                        value="{{ config('constants.version_android_user') ?? '' }}"></x-inputs.text>
                                    {{-- IOS App Link --}}
                                    <x-inputs.text
                                        :label="__('crud.admin.users.name').' '.__('crud.admin.settings.store_link_ios_user')"
                                        name="store_link_ios_user"
                                        value="{{ config('constants.store_link_ios_user') ?? '' }}"></x-inputs.text>
                                    {{-- IOS App Version --}}
                                    <x-inputs.text
                                        :label="__('crud.admin.users.name').' '.__('crud.admin.settings.version_ios_user')"
                                        name="version_ios_user"
                                        value="{{ config('constants.version_ios_user') ?? '' }}">
                                    </x-inputs.text>
                                    {{-- For Provider --}}
                                    {{-- Android App Link --}}
                                    <x-inputs.text
                                        :label="__('crud.admin.providers.name').' '.__('crud.admin.settings.store_link_android_user')"
                                        name="store_link_android_provider"
                                        value="{{ config('constants.store_link_android_provider') ?? '' }}">
                                    </x-inputs.text>
                                    {{-- Android App Version --}}
                                    <x-inputs.text
                                        :label="__('crud.admin.providers.name').' '.__('crud.admin.settings.version_android_user')"
                                        name="version_android_provider"
                                        value="{{ config('constants.version_android_provider') ?? '' }}">
                                    </x-inputs.text>
                                    {{-- IOS App Link --}}
                                    <x-inputs.text
                                        :label="__('crud.admin.providers.name').' '.__('crud.admin.settings.store_link_ios_user')"
                                        name="store_link_ios_provider"
                                        value="{{ config('constants.store_link_ios_provider') ?? '' }}"></x-inputs.text>
                                    {{-- IOS App Version --}}
                                    <x-inputs.text
                                        :label="__('crud.admin.providers.name').' '.__('crud.admin.settings.version_ios_user')"
                                        name="version_ios_provider"
                                        value="{{ config('constants.version_ios_provider') ?? '' }}"></x-inputs.text>
                                    {{-- Facebook Link --}}
                                    <x-inputs.text :label="__('crud.admin.settings.facebook_link')" name="facebook_link"
                                        value="{{ config('constants.facebook_link') ?? '' }}"></x-inputs.text>
                                    {{-- Instagram Link --}}
                                    <x-inputs.text :label="__('crud.admin.settings.instagram_link')"
                                        name="instagram_link" value="{{ config('constants.instagram_link') ?? '' }}">
                                    </x-inputs.text>
                                    {{-- Twitter Link --}}
                                    <x-inputs.text :label="__('crud.admin.settings.twitter_link')" name="twitter_link"
                                        value="{{ config('constants.twitter_link') ?? '' }}"></x-inputs.text>
                                    {{-- <x-inputs.text :label="" name="demo_mode"
                                        value="{{ config('constants.demo_mode') ?? '' }}"></x-inputs.text> --}}
                                </div>

                                {{-- <div class="flex text-red-500 text-sm mb-3 font-semibold">
                                        * Note: Include the full URL for all links including http:// or https://. If the links are not provided properly they might not work as expected.
                                    </div> --}}
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                        type="submit">{{ __('crud.general.update') }}</button>
                                </div>
                            </x-form>
                        </div>
                        <!-- <div class="hidden dark:text-gray-400 dark:bg-gray-800" id="tab-socialConfigs">
                                <x-form method="post" :action="route('admin.settings.storeSocialConfig')">
                                    <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                        {{-- Social Login --}}
                                        <x-inputs.status :label="__('crud.admin.settings.social_login')" name="social_login" :status="config('constants.social_login')">
                                        </x-inputs.status>
                                        {{-- Facebook Public Key --}}
                                        <x-inputs.text :label="__('crud.admin.settings.fb_public_key')" name="fb_public_key" value="{{ config('constants.fb_public_key') ?? '' }}"></x-inputs.text>
                                        {{-- Facebook Secret Key --}}
                                        <x-inputs.password :label="__('crud.admin.settings.fb_secret_key')" name="fb_secret_key" value="{{ config('constants.fb_secret_key') ?? '' }}"></x-inputs.password>
                                        {{-- Facebook Redirect URL --}}
                                        <x-inputs.text :label="__('crud.admin.settings.fb_redirect_url')" name="fb_redirect_url" value="{{ config('constants.fb_redirect_url') ?? '' }}"></x-inputs.text>
                                        {{-- Google Public Key --}}
                                        <x-inputs.text :label="__('crud.admin.settings.google_public_key')" name="google_public_key" value="{{ config('constants.google_public_key') ?? '' }}"></x-inputs.text>
                                        {{-- Google Secret Key --}}
                                        <x-inputs.password :label="__('crud.admin.settings.google_secret_key')" name="google_secret_key" value="{{ config('constants.google_secret_key') ?? '' }}"></x-inputs.password>
                                        {{-- Google Redirect URL --}}
                                        <x-inputs.text :label="__('crud.admin.settings.google_redirect_url')" name="google_redirect_url" value="{{ config('constants.google_redirect_url') ?? '' }}"></x-inputs.text>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm" type="submit">{{ __('crud.general.update') }}</button>
                                    </div>
                                </x-form>
                            </div>
                            -->
                        <div wire:ignore.self class="hidden dark:text-gray-400 dark:bg-gray-800" id="tab-search">
                            <x-form method="post" :action="route('admin.settings.storeSearch')">
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    {{-- Provider Accept Timeout --}}
                                    <x-inputs.text :label="__('crud.admin.settings.provider_accept_timeout')"
                                        name="provider_accept_timeout"
                                        value="{{ config('constants.provider_accept_timeout') ?? '' }}"></x-inputs.text>
                                    {{-- Provider Search Radius --}}
                                    <x-inputs.text :label="__('crud.admin.settings.provider_search_radius')"
                                        name="provider_search_radius"
                                        value="{{ config('constants.provider_search_radius') ?? '' }}"></x-inputs.text>
                                    {{-- Distance Map --}}
                                    <x-inputs.select :label="__('crud.admin.settings.distance_map')"
                                        name="distance_map">
                                        <option {{ config('constants.distance_map') == "kms" ? "selected" : "" }}
                                            value="kms">Kms</option>
                                        <option {{ config('constants.distance_map') == "miles" ? "selected" : "" }}
                                            value="miles">Miles</option>
                                    </x-inputs.select>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                        type="submit">{{ __('crud.general.update') }}</button>
                                </div>
                            </x-form>
                        </div>
                        <div wire:ignore.self class="hidden dark:text-gray-400 dark:bg-gray-800" id="tab-api">
                            <x-form method="post" :action="route('admin.settings.storeApi')">
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    {{-- Google Map Key --}}
                                    <x-inputs.text :label="__('crud.admin.settings.google_map_key')" name="map_key"
                                        value="{{ config('constants.map_key') ?? '' }}"></x-inputs.text>
                                        <x-inputs.text :label="__('crud.admin.settings.google_server_map_key')" name="server_map_key"
                                        value="{{ config('constants.server_map_key') ?? '' }}"></x-inputs.text>
                                    {{-- Facebook App Version --}}
                                    {{-- <x-inputs.text :label="__('crud.admin.settings.fb_app_version')" name="fb_app_version" value="{{ config('constants.fb_app_version') ?? '' }}">
                                    </x-inputs.text> --}}
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                        type="submit">{{ __('crud.general.update') }}</button>
                                </div>
                            </x-form>
                        </div>
                        <div wire:ignore.self class="hidden dark:text-gray-400 dark:bg-gray-800" id="tab-email">
                            <x-form method="post" :action="route('admin.settings.storeEmail')">
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    {{-- Send Mail --}}
                                    <x-inputs.status :label="__('crud.admin.settings.send_mail')" name="send_mail"
                                        :status="config('constants.send_mail')"></x-inputs.status>
                                    {{-- Mail Driver --}}
                                    <x-inputs.select :label="__('crud.admin.settings.mail_driver')" name="mail_driver">
                                        <option {{ config('constants.mail_driver') == "smtp" ? "selected" : "" }} value="smtp">SMTP
                                        </option>
                                        <option {{ config('constants.mail_driver') == "mailgun" ? "selected" : "" }} value="mailgun">
                                            Mailgun</option>
                                    </x-inputs.select>
                                    <x-inputs.text :label="__('crud.admin.settings.mail_host')" name="mail_host"
                                        :value="config('constants.mail_host', '')"></x-inputs.text>
                                    <x-inputs.number :label="__('crud.admin.settings.mail_port')" name="mail_port"
                                        :value="config('constants.mail_port', '')"></x-inputs.number>
                                    <x-inputs.text :label="__('crud.admin.settings.mail_username')" name="mail_username"
                                        :value="config('constants.mail_username', '')"></x-inputs.text>
                                    <x-inputs.password :label="__('crud.admin.settings.mail_password')"
                                        name="mail_password" :value="config('constants.mail_password', '')"></x-inputs.password>
                                    <x-inputs.text :label="__('crud.admin.settings.mail_encryption')"
                                        name="mail_encryption" :value="config('constants.mail_encryption', '')"></x-inputs.text>
                                    <x-inputs.text :label="__('crud.admin.settings.mail_from_address')"
                                        name="mail_from_address" :value="config('constants.mail_from_address', '')"></x-inputs.text>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                        type="submit">{{ __('crud.general.update') }}</button>
                                </div>
                                <div class="px-4 flex text-red-500 text-sm mb-3 font-semibold">
                                    * Change These Settings Very Carefully. These Settings Can Break Cache Your Application.
                                </div>
                            </x-form>
                        </div>
                        <div wire:ignore.self class="hidden dark:text-gray-400 dark:bg-gray-800"
                            id="tab-pushNotification">
                            <x-form method="post" :action="route('admin.settings.storePushNotification')">
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    <x-inputs.select :label="__('crud.admin.settings.ios_push_environment')"
                                        name="ios_push_environment">
                                        <option
                                            {{ config('constants.ios_push_environment') == "Development" ? "selected" : "Development" }}
                                            value="Development">Development</option>
                                        <option
                                            {{ config('constants.ios_push_environment') == "Production" ? "selected" : "Production" }}
                                            value="Production">Production</option>
                                    </x-inputs.select>

                                    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            <x-inputs.partials.label name="ios_push_user_permission"
                                                :label="__('crud.admin.settings.ios_push_user_permission')">
                                            </x-inputs.partials.label>
                                            <input
                                                class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                                                type="file" name="ios_push_user_permission" value=""
                                                id="ios_push_user_permission" />
                                        </div>
                                    </div>

                                    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                                        <div class="mb-6">
                                            <x-inputs.partials.label name="ios_push_provider_permission"
                                                :label="__('crud.admin.settings.ios_push_provider_permission')">
                                            </x-inputs.partials.label>
                                            <input
                                                class="appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300"
                                                type="file" name="ios_push_provider_permission" value=""
                                                id="ios_push_provider_permission" />
                                        </div>
                                    </div>

                                    <x-inputs.password :label="__('crud.admin.settings.ios_push_password')"
                                        name="ios_push_password" :value="config('constants.ios_push_password', '')">
                                    </x-inputs.password>

                                    <x-inputs.password :label="__('crud.admin.settings.android_push_key')"
                                        name="android_push_key" :value="config('constants.android_push_key', '')">
                                    </x-inputs.password>

                                    <x-inputs.password :label="__('crud.admin.settings.android_sender_key')"
                                        name="android_sender_key"
                                        value="{{ config('constants.android_sender_key') ?? '' }}"></x-inputs.password>

                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                        type="submit">{{ __('crud.general.update') }}</button>
                                </div>
                            </x-form>
                        </div>
                        <div class="hidden dark:text-gray-400 dark:bg-gray-800" id="tab-other" wire:ignore.self>
                            <x-form method="post" :action="route('admin.settings.storeOthers')">
                                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                                    {{-- Rental --}}
                                    <x-inputs.status :label="__('crud.admin.settings.rental')" name="rental"
                                        :status="config('constants.rental')"></x-inputs.status>
                                    {{-- Referral --}}
                                    <x-inputs.status :label="__('crud.admin.settings.referral')" name="referral"
                                        :status="config('constants.referral')"></x-inputs.status>
                                    {{-- Out station --}}
                                    <x-inputs.status :label="__('crud.admin.settings.outstation')" name="outstation"
                                        :status="config('constants.outstation')"></x-inputs.status>
                                    {{-- Referral Count --}}
                                    <x-inputs.number :label="__('crud.admin.settings.referral_count')"
                                        name="referral_count" value="{{ config('constants.referral_count') ?? '' }}">
                                    </x-inputs.number>
                                    {{-- Referral Amount --}}
                                    <x-inputs.number :label="__('crud.admin.settings.referral_amount')"
                                        name="referral_amount" value="{{ config('constants.referral_amount') ?? '' }}">
                                    </x-inputs.number>
                                    {{-- OTP Verfication --}}
                                    <x-inputs.status :label="__('crud.admin.settings.otp_verification')"
                                        name="ride_otp" :status="config('constants.ride_otp')"></x-inputs.status>
                                    {{-- Single Request --}}
                                    <x-inputs.status :label="__('crud.admin.settings.broadcast_request')"
                                        name="broadcast_request" :status="config('constants.broadcast_request')">
                                    </x-inputs.status>
                                    {{-- Manual Assignment --}}
                                    <x-inputs.status :label="__('crud.admin.settings.manual_request')"
                                        name="manual_request" :status="config('constants.manual_request')">
                                    </x-inputs.status>
                                    {{-- Track Distance --}}
                                    <x-inputs.status :label="__('crud.admin.settings.track_distance')"
                                        name="track_distance" :status="config('constants.track_distance')">
                                    </x-inputs.status>
                                    {{-- Toll Verification --}}
                                    <x-inputs.status :label="__('crud.admin.settings.ride_toll')" name="ride_toll"
                                        :status="config('constants.ride_toll')"></x-inputs.status>
                                    {{-- Booking Id Prefix --}}
                                    <x-inputs.text :label="__('crud.admin.settings.booking_id_prefix')"
                                        name="booking_id_prefix"
                                        value="{{ config('constants.booking_id_prefix') ?? '' }}"></x-inputs.text>
                                    {{-- Outstation Base km --}}
                                    <x-inputs.number :label="__('crud.admin.settings.outstation_base_km')"
                                        name="outstation_base_km"
                                        value="{{ config('constants.outstation_base_km') ?? '' }}"></x-inputs.number>
                                    {{-- Limit Messages --}}
                                    <x-inputs.text :label="__('crud.admin.settings.limit_message')" name="limit_message"
                                        value="{{ config('constants.limit_message') ?? '' }}"></x-inputs.text>
                                    {{-- Currency Prefix --}}
                                    {{-- <x-inputs.text :label="__('crud.admin.settings.booking_id_prefix')" name="booking_id_prefix" value="{{ config('constants.booking_id_prefix') ?? '' }}">
                                    </x-inputs.text> --}}
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm"
                                        type="submit">{{ __('crud.general.update') }}</button>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('endScripts')
        <script>
            $(document).ready(function() {
                $('#timezone').select2();
                var a = document.querySelector('#select2-timezone-container');
                a.className += ' appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300';
                $('#select2-timezone-container').click(function() {
                    var b = document.querySelector('.select2-dropdown.select2-dropdown--below');
                    b.style.top = "15px";
                    b.className += ' appearance-none w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none dark:bg-gray-700 dark:text-gray-300';
                    var c = document.querySelector('.select2-search__field');
                    c.className += ' appearance-none text-xs font-semibold leading-none bg-gray-50 rounded dark:bg-gray-700 dark:text-gray-300';
                });
            });
        </script>
    @endpush
</div>