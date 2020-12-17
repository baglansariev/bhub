@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<div class="pull-left">
					<h2>Ответы</h2>
				</div>
				<div class="pull-right">
					<a class="btn btn-success" href="{{ route('quiz-answers.create') }}"> Добавить ответ</a>
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

				<table class="table table-striped mb-3">
					<thead>
						<tr>
							<th scope="row">No</th>
							<th scope="row">Ответ</th>
						</tr>
					</thead>
					@foreach ($quiz as $quiz)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>
							<div class="accordion accordion-quiz-answers" id="accordionExample-{{$quiz->id}}">
								<div class="card">
									<div class="card-header" id="headingOne">
										<h2 class="mb-0">
											<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne-{{$quiz->id}}" aria-expanded="true" aria-controls="collapseOne">
												{{$quiz->question}}
											</button>
											<span>Действие</span>
										</h2>
									</div>
									@foreach($quiz->quiz_answers as $answer)
									<div id="collapseOne-{{$answer->quiz_id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample-{{$answer->quiz_id}}">
										<div class="card-body">
											<ul class="quiz-answer-accordion">
												<li>
													{{ $answer->answer }}
													<a href="#">
														<form action="{{ route('quiz-answers.destroy',$answer->id) }}" method="POST">

															<a class="btn btn-primary" href="{{ route('quiz-answers.edit',$answer->id) }}"><i class="far fa-edit"></i></a>

															@csrf
															@method('DELETE')

															<button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
														</form>
													</a>
												</li>
											</ul>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</td>
						<!-- <td>
							<form action="{{ route('quiz-answers.destroy',$answer->id) }}" method="POST">

								<a class="btn btn-info" href="{{ route('quiz-answers.show',$answer->id) }}"><i class="fas fa-eye"></i></a>

								<a class="btn btn-primary" href="{{ route('quiz-answers.edit',$answer->id) }}"><i class="far fa-edit"></i></a>

								@csrf
								@method('DELETE')

								<button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
							</form>
						</td> -->
					</tr>
					@endforeach
				</table>

			</div>
		</div>
	</div>
</div>

@endsection