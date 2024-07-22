<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/bef7f1d6b2.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="container-fluid bg-white p-0">
        @include('header')
        
        <article class="container-fluid p-0">

            @yield('content')

        </article>

        @include('footer')
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/myjs.js') }}"></script>
</body>
</html>