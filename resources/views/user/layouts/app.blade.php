<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turkey Travel Website</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-papb+X6Q6X0+6XQ6X0+6XQ6X0+6XQ6X0+6XQ6X0+6XQ6X0+6XQ6X0+6XQ6X0+6XQ6X0+6XQ6X0+6XQ6X0+6XQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- Common CSS for all pages --}}
    <link rel="stylesheet" href="{{ asset('css/user_css/bg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_css/sitecolor.css') }}">
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
