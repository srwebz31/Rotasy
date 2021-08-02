<!DOCTYPE html>
<html :class="{ 'dark': dark }" x-data="data()" lang="en" tranaslate="no">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ url('storage/'.config('constants.site_icon')) }}" type="image/gif" sizes="16x16">
    {{-- Title Goes Here --}}
    <title>
        @yield('title', 'Agent Dasboard')
    </title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/notyf.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @livewireStyles
    {{-- Alpine --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>

    {{-- Notification --}}
    <script src="{{ asset('js/notyf.js') }}"></script>
    @livewireScripts

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{-- Main Script --}}
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('startScripts')
</head>

<body>
    <style>
        #loading {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
            z-index: 99;
            text-align: center;
        }

        #loading-image {
            position: absolute;
        }
    </style>
    {{-- <div id="loading">
            <img id="loading-image" src="{{ asset('img/loader.gif') }}" alt="Loading..." />
    </div> --}}
    <div class="min-h-screen flex bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        {{-- Aside Navigation --}}
        @include('agent.layout.aside')
        <div class="flex flex-col flex-1 w-full">

            {{-- Top Header --}}
            @include('agent.layout.header')
            <main>
                <div class="container px-6 mx-auto grid">
                    {{-- Main Content Goes Here. --}}
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        @yield('heading')
                    </h2>
                    @yield('content')
                </div>

            </main>

            {{-- Footer --}}
            @include('agent.layout.footer')
        </div>
    </div>
    {{-- Livewire Scripts --}}

    <script>
        const notyf = new Notyf({
                duration: 2500,
                position: {
                    x: 'right',
                    y: 'top',
                },
                dismissible: true,
            });
            @if($errors->any())
                @foreach($errors->all() as $error)
                    notyf.error("{{ $error }}");
                @endforeach
            @endif
            @if(session()->has('success'))
                notyf.success("{{ session()->get('success') }}");
            @endif
    </script>



    {{-- Other Scripts From Childrens --}}
    @stack('endScripts')

    <script>
        // Listening for livewire event.
        Livewire.on('livewire_success', function(msg) {
            notyf.success(msg);
        });
        Livewire.on('livewire_error', function(msg) {
            notyf.error(msg);
        });
    </script>
</body>

</html>