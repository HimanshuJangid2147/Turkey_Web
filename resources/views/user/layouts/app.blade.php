<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turkey Travel Website</title>
    <link rel="icon" href="{{ asset('icons/Satguru.gif') }}" type="image/x-icon">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    {{-- Font Awesome Icons - Using Kit for better reliability --}}
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.0.1/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@7.0.1/css/fontawesome.min.css">

    {{-- Fallback CDN for Font Awesome if Kit fails to load --}}
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /></noscript>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- Common CSS for all pages --}}
    <link rel="stylesheet" href="{{ asset('css/user_css/bg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/sitecolor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/footer.css') }}">

    {{-- Page-specific CSS --}}
    @stack('styles')
</head>

<body class="bg-light d-flex flex-column min-vh-100">
    <header>
        @include('user.partials.navbar')
    </header>
    <main class="flex-grow-1">
        {{-- Include Breadcrumb --}}
        <section class="breadcrumb-section">
            @include('user.partials.breadcrum')
        </section>
        @yield('content')
    </main>
    <footer>
        @include('user.partials.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/user/layout.js') }}"></script>

    @stack('scripts')
</body>

</html>
