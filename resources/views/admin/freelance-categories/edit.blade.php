@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="container">

		@if ($errors->any())
		<div class="alert alert-danger">
			<strong>Внимание!</strong> Пожалуйста, проверьте код поля ввода<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		
		<form action="{{ route('freelance-categories.update',$FreelanceCategory->id) }}" method="POST">
			@csrf
			@method('PUT')

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Наименование категории:</strong>
						<input type="text" name="title" value="{{ $FreelanceCategory->title }}" class="form-control" placeholder="Title">
					</div>
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2">
					<div class="form-group">
						<strong>Действие</strong>
						<button type="submit" class="form-control btn btn-primary">Сохранить</button>
					</div>
				</div>
			</div>

		</form>
	</div>
</div>
@endsection