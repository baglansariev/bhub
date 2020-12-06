@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="container">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
			Добавить категорию
		</button>	
	</div>
</div>

<div class="row">
	<div class="container">
		@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		@endif
		<table class="table-bordered">
			<thead>
				<tr>
					<th>Наименование категории</th>
					<th width="250px">Действие</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<td>{{ $category->title }}</td>
					<td>
						<form action="{{ route('freelance-categories.destroy',$category->id) }}" method="POST">

							<a class="btn btn-primary" href="{{ route('freelance-categories.edit',$category->id) }}"><i class="far fa-edit"></i></a>

							@csrf
							@method('DELETE')

							<button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>			
	</div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{ route('freelance-categories.store') }}" method="POST">
    		@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Категория фрилансеров</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Наименование:</strong>
							<input type="text" name="title" class="form-control" placeholder="Заголовок">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Добавить</button>
			</div>
			</form>
		</div>
	</div>
</div>

@endsection