@extends('frontend.layouts.master')


@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/startup.css') }}">
@endsection

@section('content')
<section class="startups-wrapper">
	<div class="container">
		<div class="come-back-block">
			<a href="/startups" class="come-back-btn">< Вернуться назад</a>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="startup-item">
					<h1 class="startup-item-title">{{ $startup->title }}</h1>
					<div class="startup-desc">
						<h4 class="startup-desc-title">Инфо</h4>
						<div class="startup-desc-block">
							<p class="startup-desc-text">{{ $startup->short_desc }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="phone-block">
					<h2 class="phone-block-title">номер телефона:<br class="br-mobile"><span>&nbsp; {{ $startup->phone ?? '' }}</span></h2>
					<div class="startup-logo-wrapper" style="background-image: url({{ asset($startup->image) }})"></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="startup-video">
						@if (isset($startup->video) && !empty($startup->video))
							<iframe src="{{ $startup->video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						@else
							<h1 class="startup-video-title">без видео</h1>
						@endif
					</div>
				</div>
				<div class="col-md-6">
					<div class="startup-full-description">
						<h4 class="startup-full-description-title">описание</h4>
						<p class="startup-full-description-text">{{ $startup->full_desc }}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection