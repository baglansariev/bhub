<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <title>BHub | @yield('title')</title> -->
	<title>BHub | {{ $data["title"] ?? '' }}</title>
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
	<script src="https://kit.fontawesome.com/8298cc323a.js" crossorigin="anonymous"></script>
	<script src="{{ asset('js/jquery.sweet-modal.js') }}"></script>
</head>
<body>
<!--========================================================
                              HEADER
=========================================================-->
	<header>
		@include('frontend.partials._header', ['title' => $data['title']])
	</header>
<!--========================================================
                              CONTENT
=========================================================-->
	@yield('content')
	
<!--========================================================
                              FOOTER
=========================================================-->
    <section class="footer">
    	@include('frontend.partials._footer')
	</section>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

  @yield('scripts')

</body>
</html>