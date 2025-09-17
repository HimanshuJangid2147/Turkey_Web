<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    {{-- Custom CSS for full-height sidebar and top padding --}}
    <link href="{{ asset('css/admin_css/main.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    {{-- Include the separate navbar file --}}
    @include('admin.partials.navbar')

    {{-- Main Container (Sidebar & Content) --}}
    <div class="d-flex flex-grow-1">

        {{-- Include the separate sidebar file --}}
        @include('admin.partials.sidebar')

        {{-- Main Content Area --}}
        <main class="flex-grow-1 p-4 main-content">
            @yield('content')
        </main>

    </div>

    {{-- Include the separate footer file --}}
    @include('admin.partials.footer')
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    {{-- Sidebar Toggle Script --}}
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const body = document.body;
            if (window.innerWidth >= 992) {
                body.classList.toggle('sidebar-collapsed');
            }
        });
    </script>
</body>

</html>
