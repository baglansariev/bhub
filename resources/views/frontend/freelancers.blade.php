@extends('frontend.layouts.master')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/freelance.css') }}">
@endsection

@section('content')
<section class="freelance-wrapper">
	<div class="container">
		<div class="freelance-info-main">
			<h1 class="freelance-title"><span>лучшие</span> работники</h1>
			<p class="freelance-info-text">Внизу список достойнейших людей, которые доказали все делом и т.д.</p>
			<!-- Button trigger modal for freelancer profile -->
			<button type="button" class="btn btn-primary btn-freelancer-profile" data-toggle="modal" data-target="#freelanceProfile">
				Заполнить анкету
			</button>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-2">
				<div class="categories-wrapper">
					<h3 class="categories-title">Категории</h3>
					<ul class="freelance-categories-lists">
						@foreach($categories as $category)
						{{--<li><a href="{{ route('freelancerFilter', $category->id) }}">{{ $category->title }}</a></li>--}}
						<li><a href="{{ route('freelancers', $category->id) }}">{{ $category->title }}</a></li>
						@endforeach
					</ul>		
				</div>
			</div>
			<div class="col-lg-8 offset-lg-1 col-md-9 offset-md-0 col-sm-9">
				<div class="row">
					@foreach($freelancers as $freelancer)
					<div class="col-lg-3 col-md-4">
						<div class="freelance-card">
							<a href="/employee" target="_blank" title="" style="display: block;">
								<div class="inner-card-block">
									<img src="{{ asset('img') . '/' . $freelancer->img }}" align="Adilet" alt="{{ $freelancer->img }}" title="{{ $freelancer->name }}">
									<h5 class="freelancer-name">{{ $freelancer->name }}</h5>
									<p class="freelancer-position">{{ $freelancer->position }}</p>
								</div>
								<div class="freelance-social">
									<a href="{{ $freelancer->facebook ? $freelancer->facebook : '#' }}" class="facebook-icon" target="_blank" title="facebook"></a>
									<a href="{{ $freelancer->instagramm ? $freelancer->instagramm : '#' }}" class="instagramm-icon" target="_blank" title="instagramm"></a>
								</div>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal for freelance profile -->
<div class="modal fade" id="freelanceProfile" tabindex="-1" role="dialog" aria-labelledby="freelanceProfileCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form action="{{ route('freelancers.store') }}" method="POST">
				@csrf
				<input type="hidden" name="status" value="0">
				<input type="hidden" name="type" value="freelancer-profile">
				<div class="modal-header">
					<h5 class="modal-title" id="freelanceProfileLongTitle">Анкета фрилансера</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="name" placeholder="Имя">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-gorup">
									<input type="text" class="form-control" name="position" placeholder="Позиция">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="Facebook" placeholder="Facebook">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="Instagramm" placeholder="Instagramm">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" name="characteristic" placeholder="Харектеристики"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" name="description" placeholder="Описание"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select name="category_id" id="category_id" class="form-control">
										<option value="">Выбор категории...</option>
										@foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="photo" style="color: #252525">Фото</label>
									<input id="photo" type="file" class="form-control" name="img" placeholder="Фото">
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					<button type="submit" class="btn btn-primary">Отправить данные</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal success -->
@if (session()->has('msg_success'))
<script>
	$.sweetModal({
		content: '{!! session()->get('msg_success') !!}',
		icon: $.sweetModal.ICON_SUCCESS
	});
</script>
@endif

<!-- Modal error -->
@if (session()->has('msg_error'))
<script>
	$.sweetModal({
		content: '{{ session()->get('msg_error') }}',
		icon: $.sweetModal.ICON_WARNING
	});
</script>
@endif

@endsection