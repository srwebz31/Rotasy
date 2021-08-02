<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            @yield('title')
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('storage/'.config('constants.site_icon')) }}" type="image/gif" sizes="16x16">

        <link rel="stylesheet" href="{{ asset('css/user/tailwind.min.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/user/main.js') }}"></script>

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

        {{-- Alpine --}}
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="{{ asset('js/init-alpine.js') }}"></script>

        {{-- Livewire Styles --}}
        @livewireStyles

        {{-- Notification --}}
        <script src="{{ asset('js/notyf.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/notyf.css') }}">

        @stack('frontScripts')

    </head>
    <body class="antialiased bg-body text-body font-body">
        <div class="">
            @include('user.layout.nav')

            @yield('content')

            @include('user.layout.footer')
        </div>

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

        {{-- Livewire Scripts --}}
        @livewireScripts

        {{-- Other Scripts From Childrens --}}
        @stack('endScripts')
    </body>
</html>
