<div class="header-wrapper">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="nav-wrapper">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarText">
					<div class="navbar-logo">
						<a href="/"><img src="img/logo.png" alt="Qhub_logo" width="126" height="60"></a>
					</div>
					<div class="navbar-wrapper">
						<ul class="navbar-nav">
							<li class="nav-item {{Request::is('/') ? 'active' : '' }}">
								<a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item {{Request::is('business-news') ? 'active' : '' }}">
								<a class="nav-link" href="/business-news">Бизнес новости</a>
							</li>
							<li class="nav-item {{ Request::is('startups','all','business','commercial-property') ? 'active' : '' }}">
								<!-- Start  desktop dropdown version-->
								<div class="dropdown">
									<a class="nav-link nav-link-desktop" href="/startups">стартапы</a>
									<div class="dropdown-content">
										<a href="/all">все</a>
										<a href="/startups">стартапы</a>
										<a href="/business">бизнес</a>
										<a href="/commercial-property" class="last">коммерческая недвижимость</a>
									</div>
								</div>
								<!-- Start mobile dropdown version-->
								<a class="nav-link nav-link-mobile dropdown-toggle" data-toggle="dropdown" href="/freelancers">стартапы</a>
								<div class="dropdown-menu megamenu megamenu-mobile">
									<ul>
											<li><a href="/all">все</a></li>
											<li><a href="/startups">стартапы</a></li>
											<li><a href="/business">бизнес</a></li>
											<li><a href="/commercial-property" class="last">коммерческая недвижимость</a></li>
										</ul>
								</div>
							</li>
							<li class="nav-item {{ Request::is('freelancers','employee') ? 'active' : '' }}">
								<!-- Start desktop dropdown version -->
								<div class="dropdown">
									<a class="nav-link nav-link-desktop" href="/freelancers">Фрилансеры</a>
									<div class="dropdown-content mega-menu">
										<ul class="mega-menu-first-block">
											<li><a href="/all">все</a></li>
											<li><a href="/startups">иллюстрации</a></li>
											<li><a href="/business">Реклама</a></li>
											<li><a href="/commercial-property" class="last">Тексты</a></li>
										</ul>
										<ul>
											<li><a href="/all">Дизайн</a></li>
											<li><a href="/startups">вебразработчики</a></li>
											<li><a href="/business">Продвижение</a></li>
											<li><a href="/commercial-property" class="last">еще</a></li>
										</ul>
									</div>
								</div>
								<!-- Start mobile dropdown version -->
								<a class="nav-link nav-link-mobile dropdown-toggle" data-toggle="dropdown" href="/freelancers">Фрилансеры</a>
								<div class="dropdown-menu megamenu megamenu-mobile">
									<ul class="megamenu-mobile-inner">
										<li><a href="/all">все</a></li>
										<li><a href="/startups">иллюстрации</a></li>
										<li><a href="/business">Реклама</a></li>
										<li><a href="/commercial-property" class="last">Тексты</a></li>
									</ul>
									<ul class="megamenu-mobile-inner">
										<li><a href="/all">Дизайн</a></li>
										<li><a href="/startups">вебразработчики</a></li>
										<li><a href="/business">Продвижение</a></li>
										<li><a href="/commercial-property" class="last">еще</a></li>
									</ul>
								</div>
							</li>
						</ul>
					</div>

					<span class="navbar-text btnSign">
						<button class="btn" type="button">Вход</button>
					</span>
				</div>	
			</div>
		</nav>
		<div class="row">
			@if (Route::current()->getName() == "home")
				<div class="col-md-12 col-sm-12">
					<div class="place-name">
						<h1>Би<span>з</span>нес</h1>
						<h2>платформа</h2>
					</div>
				</div>
				<div class="col-md-12 col-sm-12">
					<div class="place-desc">
						<p><strong>фриланс</strong></p>
						<p><strong>новости</strong></p>
						<p><strong>поиск и подбор инвестиций</strong></p>
					</div>
				</div>
			@else
				<div class="col-md-12 col-sm-12">
					<div class="place-name-second-pages">
						<h2 class="place-name-second-pages-title">@if(isset($title)) {{ $title }} @endif</h2>
						{{ Request::is('all') }}
					</div>
				</div>
			@endif
		</div>
	</div>
</div>