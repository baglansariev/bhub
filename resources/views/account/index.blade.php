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
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Ф.И.О</th>
			<th scope="col">Email</th>
			<th scope="col">Дата создания</th>
			<th scope="col">Действие</th>
		</tr>
	</thead>
	<tbody>

		@if (isset($user) && !empty($user))
		<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->created_at }}</td>
			<td>Редактировать</td>
		</tr>
		@endif
	</tbody>
</table>


@endsection