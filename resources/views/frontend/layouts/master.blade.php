@inject('header', 'App\Http\Controllers\Partials\HeaderController')
@inject('footer', 'App\Http\Controllers\Partials\FooterController')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>BHub | {{ $title ?? '' }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-4.5.3/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.sweet-modal.css') }}" />

	@yield('styles')

	<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-4.5.3/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
	<script src="https://kit.fontawesome.com/8298cc323a.js" crossorigin="anonymous"></script>
	<script src="{{ asset('js/jquery.sweet-modal.js') }}"></script>
</head>
<body>
<!--========================================================
                              HEADER
=========================================================-->
	<header>
		{!! $header->show(['title' => $title ?? '']) !!}
	</header>
<!--========================================================
                              CONTENT
=========================================================-->
	@yield('content')
	
<!--========================================================
                              FOOTER
=========================================================-->
    <section class="footer">
    	{!! $footer->show(['footer' => $data ?? '']) !!}
	</section>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

  @yield('scripts')

</body>
</html>