<!doctype html>

<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="../admin_assets/assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    {{-- Dynamic Title --}}
    <title>@yield('title', 'Sneat Dashboard') | Admin Panel</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('admin_assets/assets/img/favicon/favicon.ico') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- Added Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Added DataTables CSS CDN -->
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/demo.css') }}" />

    <link rel="stylesheet"
        href="{{ asset('admin_assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" />


    @stack('styles')

    <script src="{{ asset('admin_assets/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/config.js') }}"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('admin.partials.sidebar')
            <div class="layout-page">

                @include('admin.partials.navbar')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    @include('admin.partials.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="{{ asset('admin_assets/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/vendor/js/menu.js') }}"></script>

    <script src="{{ asset('admin_assets/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script src="{{ asset('admin_assets/assets/js/main.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    @stack('scripts')

</body>

</html>
