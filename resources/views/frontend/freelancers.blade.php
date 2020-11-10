@extends('frontend.layouts.master')

@section('title', $data["title"])

@section('styles')
	<link rel="stylesheet" type="text/css" href="css/freelance.css">
@endsection

@section('content')
<section class="freelance-wrapper">
	<div class="container">
		<h1 class="freelance-title"><span>лучшие</span> работники</h1>
		<p class="freelance-info-text">Внизу список достойнейших людей, которые доказали все делом и т.д.</p>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-2">
				<div class="categories-wrapper">
					<h3 class="categories-title">Категории</h3>
					<ul class="freelance-categories-lists">
						<li><a href="#">Разработчики мобильных приложений</a></li>
						<li><a href="#">Веб-разработчики</a></li>
						<li><a href="#">IT-специалисты</a></li>
						<li><a href="#">Разработчики игр</a></li>
						<li><a href="#">Веб-дизайнеры</a></li>
						<li><a href="#">СММ-специалисты</a></li>
						<li><a href="#">Маркетологи</a></li>
						<li><a href="#">Бухгалтеры</a></li>
						<li><a href="#">Экономисты и финансисты</a></li>
						<li><a href="#">3Д графика</a></li>
						<li><a href="#">2Д и 3Д анимация</a></li>
						<li><a href="#">Дизайн и Арт</a></li>
						<li><a href="#">Видео и Фотосъемка</a></li>
						<li><a href="#">Обучение и консультация</a></li>
						<li><a href="#">Оптимизация(SEO)</a></li>
					</ul>		
				</div>
			</div>
			<div class="col-lg-8 offset-lg-1 col-md-9 offset-md-0 col-sm-9">
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<a href="/employee" target="_blank" title="" style="display: block;">
								<div class="inner-card-block">
									<img src="img/freelancer.png" align="Adilet" title="Adilet">
									<h5 class="freelancer-name">Adilet</h5>
									<p class="freelancer-position">Computer Sience</p>
								</div>
								<div class="freelance-social">
									<a href="#" class="facebook-icon" target="_blank" title="facebook"></a>
									<a href="#" class="instagramm-icon" target="_blank" title="instagramm"></a>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<div class="inner-card-block">
								<img src="img/freelancer.png">
								<h5 class="freelancer-name">Adilet</h5>
								<p class="freelancer-position">Computer Sience</p>
							</div>
							<div class="freelance-social">
								<a href="#" class="facebook-icon"></a>
								<a href="#" class="instagramm-icon"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection