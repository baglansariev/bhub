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

<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Ф.И.О</th>
			<th scope="col">Телефон</th>
			<th scope="col">Email</th>
			<th scope="col">Дата создания</th>
			<th scope="col">Аватар</th>
		</tr>
	</thead>
	<tbody>

		@if (isset($user) && !empty($user))
		<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->phone }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->created_at }}</td>
			<td><img src="{{ asset('/') . $user->image }}" width="50" height="50" style="max-width: 100%; object-fit: contain;"></td>
		</tr>
		@endif
	</tbody>
</table>


@endsection