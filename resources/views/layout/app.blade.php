<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            @yield('title', config('constants.site_title', ''))
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="{{ asset('css/new_user_layout/tailwind.min.css') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/'.config('constants.site_icon', '')) }}">
        <script src="{{ asset('js/new_main.js') }}"></script>
    </head>
    <body class="antialiased bg-body text-body font-body">
        <div class="">
            @include('layout.nav')
            @yield('content')
            @include('layout.footer')
        </div>
    </body>
</html>