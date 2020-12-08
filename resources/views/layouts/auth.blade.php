<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'BHUB' }}</title>
    <link rel="shortcut icon" href="{{ asset('images/template/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.5.3/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/vendor/fonts/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/libs/css/style.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">--}}
    <script src="{{ asset('panel/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('panel/vendor/fonts/fontawesome/js/all.min.js') }}"></script>
</head>
<body>
    <main>
        <header class="auth-header bg-white mb-5 p-3">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-6">
                        <div class="auth-main-logo">
                            <a href="/">
                                <span style="font-size: 20px;">BHUB</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="auth-actions d-flex justify-content-end">
                            <a href="{{ route('register') }}">Регистрация</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content', 'Default Content')
    </main>

    <script src="{{ asset('js/bootstrap-4.5.3/bootstrap.min.js') }}"></script>
    <script src="{{ asset('panel/libs/js/main-js.js') }}"></script>
</body>
</html>