@extends('layouts.app')

@section('content')
<div class="alerts mt-3 mb-3">
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

@if (isset($user) && !empty($user) && is_null($user->email_verified_at))
<div class="alert alert-warning" role="alert">
  Ваш email {{ $user->email }} не подтвержден. На Ваш указанный при регистрации email была отправлена ссылка для подтверждения.
  <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
  	@csrf
  	<button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Кликните здесь что бы отпавить повторно ссылку на подтверждение') }}</button>.
  </form>
</div>
@endif


<form action="{{ route('account.personalDataUpdate', $user->id) }}" method="post" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="_method" value="PUT">
	<div class="form-row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="userName">Ф.И.О.</label>
				<input type="text" id="userName" class="form-control" name="name" value="{{ $user->name ?? '' }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="userPhone">Телефон</label>
				<input type="phone" id="userPhone" class="form-control" name="phone" value="{{ $user->phone ?? '' }}">
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="userEmail">Email</label>
				<input type="text" id="userEmail" class="form-control" name="email" value="{{ $user->email ?? '' }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="image">Изображение</label>
				<input type="file" id="image" name="image" class="form-control mb-3 @error('image') is-invalid @enderror">
				<div id="img_change">
					@if (isset($user->image) && !empty($user->image))
					<img src="{{ asset($user->image) }}" alt="">
					@endif
				</div>
				@error('image')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="userPassword">Пароль</label>
				<input type="password" class="form-control" id="userPassword" name="password">
				@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
				<div class="form-group">
					<label for="password-confirm">Подтверждение пароля</label>
					<input id="password-confirm" class="form-control" name="password_confirmation" type="password"  placeholder="">
				</div>
			</div>
		</div>
		<!-- <div class="col-md-6">
			<div class="form-group">
				<label for="VerifyUserEmail">Подтверждение email</label>
				<input type="email" name="VerifyUserEmail" class="form-control" id="VerifyUserEmail">
			</div>
		</div> -->
	</div>
	<hr>
	<div class="form-row">
		<div class="col-sm-12">
			<div class="form-actions d-flex justify-content-end">
				<button type="submit" class="btn btn-primary mr-2">Сохранить</button>
				<a href="{{ route('account.personalData') }}" class="btn btn-danger">Отменить</a>
			</div>
		</div>
	</div>
</form>

@endsection