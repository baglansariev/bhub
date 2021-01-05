@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
        	<div class="card-header d-flex justify-content-between align-items-center">
        		<h5>Категории фрилансеров</h5>
                <div class="card-actions">
                	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                		Добавить категорию
                	</button>
                </div>
        	</div>
        	<div class="card-body">
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
                <div class="table-responsive">
                	<table class="table table-striped table-bordered first">
                		<thead>
                            <tr>
                                <th>#</th>
                                <th>Наименование категории</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->count())
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
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
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Пока еще нет категорий</td>
                                </tr>
                            @endif
                        </tbody>
                	</table>
                </div>
        	</div>
        </div>
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
				<div class="form-row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="inputTitle">Наименование:</label>
							<input id="inputTitle" type="text" name="title" class="form-control" placeholder="Заголовок">
						</div>
					</div>
					<div class="col-sm-12">
						@if (isset($pricings) && $pricings->count())
							<div class="form-group">
								<label for="selectPricing">Тариф:</label>
								<select name="pricing_id" id="selectPricing" class="form-control">
									<option value="0">Нет</option>
									@foreach($pricings as $pricing)
										<option value="{{ $pricing->id }}">{{ $pricing->title }}</option>
									@endforeach
								</select>
							</div>
						@endif
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