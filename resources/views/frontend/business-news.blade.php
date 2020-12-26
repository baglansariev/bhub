@extends('frontend.layouts.master')

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
						<a href="{{url('business-news/' .  $latestPosts[0]->slug)}}">
							<img src="{{asset('img/business-news/')}}/{{$latestPosts[0]->img }}" align="{{$latestPosts[0]->img}}" title="{{ $latestPosts[0]->title }}">
						</a>
						<!-- <img src="https://via.placeholder.com/675x462"> -->
					</h3>
				</div>
					<div class="new-content">
						<p class="new-content-text">
							{{ $latestPosts[0]->body }}
						</p>
					</div>
					<div class="advertising">
						<h2>Реклама</h2>
					</div>
				</div>
				<div class="col-md-5 offset-md-1">
					<div class="row">
						@foreach ( $latestPosts as $item )
							@if ($loop->iteration == 1)
							    @continue
							@endif
						<div class="col-md-12">
							<a href="{{ url('business-news/' .  $item->slug) }}" title="Подробнее об '{{$item->title}}'" class="right-blocks-wrapper-link">
								<div class="right-blocks">
									<img src="/img/business-news/{{$item->img}}" alt="{{ $item->img }}">
									<h5 class="news-details-title">{{ $item->title }}</h5>
								</div>
							</a>
						</div>
						@endforeach

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
				@foreach ($news as $post)
					<div class="col-md-4">
						<a href="{{ url('business-news/' . $post->slug) }}" class="three-blocks" style="background-image: url({{ 'img/business-news/' . $post->img }})">
							<h3>{{ $post->title }}</h3>
						</a>
					</div>
				@endforeach
				<div class="col-md-4">
					<div class="three-blocks">
						<h4 class="three-blocks-title">реклама</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection