@inject('header', 'App\Http\Controllers\Admin\Elements\HeaderController')
@inject('sidebar', 'App\Http\Controllers\Admin\Elements\SidebarController')
@inject('footer', 'App\Http\Controllers\Admin\Elements\FooterController')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'BHUB-PANEL' }}</title>
{{--    <link rel="shortcut icon" href="{{ asset('images/template/favicon.ico') }}" type="image/x-icon">--}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.5.3/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/vendor/fonts/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/libs/css/style.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('panel/libs/css/custom.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">--}}
    <script src="{{ asset('panel/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('panel/vendor/fonts/fontawesome/js/all.min.js') }}"></script>
</head>
<body>
<div class="dashboard-main-wrapper">
    <div class="dashboard-header">
        {!! $header->show() !!}
    </div>

    <div class="nav-left-sidebar sidebar-dark">
        {!! $sidebar->show() !!}
    </div>

    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">

            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ $title ?? 'Dashboard' }}</h2>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->

            @yield('content', 'Default Content')
        </div>

        <div class="footer">
            <div class="container-fluid">
                {!! $footer->show() !!}
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('panel/libs/js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-4.5.3/bootstrap.min.js') }}"></script>
<script src="{{ asset('panel/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('panel/libs/js/main-js.js') }}"></script>
<script src="{{ asset('panel/libs/js/custom.js') }}"></script>
</body>
</html>