@extends('frontend.layouts.master')

@section('title', $data["title"])

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/news.css') }}">
@endsection

@section('content')
<section class="news-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="photo">
					<h3 class="photo-title">фото</h1>
						<!-- <img src="https://via.placeholder.com/675x462"> -->
						<img src="{{asset('img/business-news/')}}/{{$latestPost->img }}" align="{{$latestPost->img}}" title="{{ $latestPost->title }}">
					</div>
					<div class="new-content">
						<p class="new-content-text">
							{{ $latestPost->body }}
						</p>
					</div>
					<div class="advertising">
						<h2>Реклама</h2>
					</div>
				</div>
				<div class="col-md-5 offset-md-1">
					<div class="row">
						@foreach ( $news as $item )
						<div class="col-md-12">
							<a href="{{ url('business-news/' .  $item->slug) }}" title="Подробнее об '{{$item->title}}'" class="right-blocks-wrapper-link">
								<div class="right-blocks">
									<img src="/img/business-news/{{$item->img}}" alt="{{ $item->img }}">
									<h5 class="news-details-title">{{ $item->title }}</h5>
								</div>
							</a>
						</div>
						@endforeach
						<!-- <div class="col-md-12">
							<a href="/news-on-click" title="Подробнее" class="right-blocks-wrapper-link">
								<div class="right-blocks">
									<img src="https://via.placeholder.com/405x233" alt="">
									<h5 class="news-details-title">BHub бизнес платформа в Шымкенте</h5>
								</div>
							</a>
						</div>
						<div class="col-md-12">
							<a href="/news-on-click" title="Подробнее" class="right-blocks-wrapper-link">
								<div class="right-blocks">
									<img src="https://via.placeholder.com/405x233" alt="">
									<h5 class="news-details-title">BHub бизнес платформа в Казахстане</h5>
								</div>
							</a>
						</div>			
						<div class="col-md-12">
							<a href="/news-on-click" title="Подробнее" class="right-blocks-wrapper-link">
								<div class="right-blocks">
									<img src="https://via.placeholder.com/405x233" alt="">
									<h5 class="news-details-title">Новости мирового бизнеса</h5>
								</div>
							</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		<div class="all-news-line">
			<div class="container">
				<h1 class="title-all-news"><a href="#" target="_blank" title=""><span>все</span> новости</a></h1>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="three-blocks">
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="three-blocks">
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="three-blocks">
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="three-blocks">
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="three-blocks">
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="three-blocks">
						<h4 class="three-blocks-title">реклама</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection