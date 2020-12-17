@extends('frontend.layouts.master')


@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/startups.css') }}">
@endsection

@section('content')
<section class="startups-main-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="startups-main-categories">
					<a href="#" title="Категории" class="startups-main-title">Категории</a>
				</div>
			</div>
			<div class="col-lg-8 col-md-6 col-sm-12">
				<div class="startups-main-all">
					<a href="#" title="Все" class="startups-main-title">Все</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="startups-main-route-wrapper startups-main-route-wrapper-first"><a href="#" class="startups-main-route">инвестору</a></div>
				<div class="startups-main-route-wrapper"><a href="{{ route('front-startup.create') }}" class="startups-main-route">предпринимателю</a></div>
			</div>
			<div class="col-lg-8 col-md-12">
				<div class="alerts mt-4 mb-5">
					@if (session()->has('msg_success'))
						<div class="card-alert alert alert-success alert-dismissible fade show" role="alert">
							{!! session()->get('msg_success') !!}
							<a href="#" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</a>
						</div>
					@endif

					@if (session()->has('msg_error'))
						<div class="card-alert alert alert-danger alert-dismissible fade show" role="alert">
							{{ session()->get('msg_error') }}
							<a href="#" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</a>
						</div>
					@endif
				</div>
				@if ($top_startups->count())
					<div class="top">
						<h3 class="top-title">ТОП</h3>
						<div class="row">
							@foreach($top_startups as $top_startup)
								<div class="col-md-6">
									<a href="/startup" class="startup-link" target="_blank">
										<div class="startups-main-top-startups" style="background-image: url({{ asset($top_startup->image) }})">
											<p class="startups-main-top-startups-name">{{ $top_startup->title }}</p>
											<p class="startups-main-top-startups-summ">{{ $top_startup->price }}</p>
										</div>
									</a>
								</div>
							@endforeach
						</div>
					</div>
				@endif
			</div>
		</div>
		<hr class="mb-5 mt-5">
		@if ($startups->count())
			<div class="row">
				<div class="col-sm-12">
					<h3 class="top-title">Все стартапы</h3>
				</div>
			</div>
			<div class="row">
				@foreach($startups as $startup)
					<div class="col-md-4">
						<a href="/startup" class="startup-link" target="_blank">
							<div class="startups-main-top-startups" style="background-image: url({{ asset($startup->image) }})">
								<p class="startups-main-top-startups-name">{{ $startup->title }}</p>
								<p class="startups-main-top-startups-summ">{{ $startup->price }}</p>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		@else
		@endif
	</div>
</section>
@endsection