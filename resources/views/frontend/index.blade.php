@extends('frontend.layouts.master')

{{--@section('title', $data['title'])--}}

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/main-page.css') }}">
@endsection

@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-6">
					<div class="video">
						<video style="width: 100%; height: 100%;" controls="controls" poster="{{ asset('img/defaults/video_poster.jpg') }}">
							<source src="{{ asset('videos/bhub_video.mp4') }}">
						</video>
					</div>
					<div class="finds-wrap">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<button type="button" class="btn find-an-investor"><a href="{{ route('front-startup.create') }}" target="_blank" title="Найти инвестора">найти инвестора</a></button>
							</div>
							<div class="col-lg-6 col-md-12">
								<button type="button" class="btn find-an-employer"><a href="{{ route('front.freelancer.create') }}" target="_blank" title="Найти работадателя">найти работадателя</a></button>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="col-md-1"></div> -->
				<div class="col-md-6">
					<div class="news">
						<h1 class="news-title">Новости</h1>
						<div class="news-inner">
							{{ $latest_post->body }}
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>	
</div>
<section class="investros-and-employers-section">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="iae-section-left-inner">
						<h1 class="iae-title">для <span>инвесторов</span> и <span>работадателей</span></h1>
						<p class="iae-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
						<div class="finds-wrap">
							<div class="row">
								<div class="col-lg-6 col-md-12">
									<a href="{{ route('front-startup.index') }}" class="btn find-an-investor">инвест проекты</a>
								</div>
								<div class="col-lg-6 col-md-12">
									<a href="{{ route('front.freelancer.index') }}" class="btn find-an-employer">найти фрилансера</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- dd -->	
				<div class="col-md-4">
					<div class="iae-section-right-inner">

					</div>
				</div>		
			</div>
		</div>
	</div>
</section>
@if (isset($partners) && $partners->count())
	<section class="our-partners">
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="title-our-partners">наши <span>партнеры</span></h1>
					</div>
					@foreach ($partners as $partner)
						<div class="col-lg-3 col-md-6 col-sm-12">
							<a href="{{ $partner->link ?? '' }}" class="d-lock our-prtners-owl"><img src="{{ asset($partner->image) }}" width="219" height="92" alt="{{ $partner->title }}" /></a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@endif
@endsection