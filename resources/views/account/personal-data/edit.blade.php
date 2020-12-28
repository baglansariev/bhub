@extends('layouts.app')

@section('content')
<form action="{{ route('account.freelancer.update', $user->id) }}" method="post" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="_method" value="PUT">
	<div class="form-row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="startupName">Ф.И.О.</label>
				<input type="text" id="startupName" class="form-control" name="name" value="{{ $user->name ?? '' }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="startupTitle">Телефон</label>
				<input type="text" id="startupTitle" class="form-control" name="position" value="{{ $user->phone ?? '' }}">
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="startupInsta">Email</label>
				<input type="text" id="startupInsta" class="form-control" name="instagramm" value="{{ $user->email ?? '' }}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="image">Изображение</label>
				<input type="file" id="image" name="img" class="form-control mb-3 @error('image') is-invalid @enderror">
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
				<input type="password" class="form-control" id="userPassword">
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
				<a href="{{ route('account.freelancer.index') }}" class="btn btn-danger">Отменить</a>
			</div>
		</div>
	</div>
</form>

@endsection