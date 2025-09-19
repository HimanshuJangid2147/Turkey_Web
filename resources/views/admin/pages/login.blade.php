<!doctype html>

<html lang="en" class="layout-wide customizer-hide" data-assets-path="{{ asset('admin_assets/assets/') }}/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin Login | {{ config('app.name') }}</title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="{{ asset('admin_assets/assets/img/favicon/favicon.ico') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin_assets/assets/vendor/css/pages/page-auth.css') }}" />

    <script src="{{ asset('admin_assets/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/config.js') }}"></script>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="{{ route('admin.login') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    {{-- You can place your SVG logo here --}}
                                </span>
                                <span class="app-brand-text demo text-heading fw-bold">Admin Panel</span>
                            </a>
                        </div>
                        <h4 class="mb-1">Welcome Back! 👋</h4>
                        <p class="mb-6">Please sign-in to your account to continue</p>

                        <form id="formAuthentication" class="mb-6" action="{{ route('admin.login') }}" method="POST">
                            @csrf

                            <div class="mb-6">
                                <label for="username" class="form-label">{{ __('Username') }}</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                                    name="username" placeholder="Enter your username" value="{{ old('username') }}"
                                    required autocomplete="username" autofocus />
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">{{ __('Password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        required autocomplete="current-password" />
                                    <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    {{-- Display password error below the input group --}}
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-8">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
        </div>
    </div>
    <script src="{{ asset('admin_assets/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/main.js') }}"></script>
</body>
</html>
