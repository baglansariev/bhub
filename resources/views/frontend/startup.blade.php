@extends('frontend.layouts.master')

@section('title', $data["title"])

@section('styles')
	<link rel="stylesheet" type="text/css" href="css/startup.css">
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
					<h1 class="startup-item-title">название</h1>
					<div class="startup-desc">
						<h4 class="startup-desc-title">Инфо</h4>
						<div class="startup-desc-block">
							<p class="startup-desc-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="phone-block">
					<h2 class="phone-block-title">номер телефона:<span>&nbsp;+7 xxx xxx xx xx</span></h2>
					<div class="startup-logo-wrapper"><h3 class="startup-logo-wrapper-title">ЛОГО</h1><img src="" class="startup-logo"></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="startup-video">
						<h1 class="startup-video-title">видео</h1>
					</div>
				</div>
				<div class="col-md-6">
					<div class="startup-full-description">
						<h4 class="startup-full-description-title">описание</h4>
						<p class="startup-full-description-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection