@extends('frontend.layouts.master')


@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/news.css') }}">
@endsection

@section('content')
<section class="news-on-click-wrapper">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="watch-the-video">
						<iframe src="{{ parseYoutubeVideo($post->video) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="advertising">
						<h2>Реклама</h2>
					</div>
					<div class="advertising-text">
						<p>{{ $post->body }}</p>
					</div>
				</div>
				<div class="col-md-6">
					@if(isset($quiz) && !empty($quiz))
					<div class="quiz-block">
						<h1 class="h1-title">Опрос</h1>
						<form id="form-quiz-user-answer" action="{{route('ajaxQuizUserAnswer')}}" method="POST">
							@csrf
							<input type="hidden" name="user_id" value="{{(auth()->user()) ? auth()->user()->id : '' }}">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
									<p class="quiz-title">{{ $quiz->question }}</p>
									<div class="container-quiz-answers">
										@foreach($quiz['quiz_answers'] as $answer)
										<p class="quiz-title">
											<label data-id="{{$answer->id}}" class="quiz-circle" for="btn-radio-{{$answer->id}}"></label>
											<!-- <span class="quiz-title-sp"></span> -->
											{{ $answer->answer }}
											<input type="radio" name="quiz_answers_id" class="form-check-input form-check-input-answer" id="btn-radio-{{$answer->id}}" value="{{$answer->id}}" required>
											&nbsp;
										</p>
											@if(\App\Models\QuizUserAnswer::getAnswerCount($answer->id) > 0)
												<span id="quizUserAnswerCount-{{$answer->id}}" class="quizUserAnswerCount" data-user-answer-count="{{\App\Models\QuizUserAnswer::getAnswerCount($answer->id)}}">{{\App\Models\QuizUserAnswer::getAnswerCount($answer->id)}} человек ответили</span>
											@endif	
										@endforeach	
									</div>
								</div>
							</div>
							<div class="form-group">
								@if(auth()->user())
								<button type="submit" class="btn btn-primary btn-sending-quiz-answer">Отправить</button>
								@else
								<h3 class="alert alert-warning" role="alert">Авторизуйтесь для участия в опросе.</h3>
								@endif
							</div>
						</form>
					</div>
					@endif
					<div class="discussion">
						<h1 class="h1-title">Обсуждение</h1>
						<div class="discussion-content">
							<!-- <span>написал</span> -->
							@comments(['model' => $post])
						</div>
					</div>
					<div class="to-write">
						<button type="button" name="btn-to-write" class="btn btn-to-write">написать...</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@if (session()->has('msg_success'))
<script>
	$.sweetModal({
		content: '<p style="color: #252525;">{!! session()->get('msg_success') !!}</p>',
		icon: $.sweetModal.ICON_SUCCESS
	});
</script>
@endif

@if(session()->has('msg_error'))
<script>
	$.sweetModal({
		content: '{!! session()->get('msg_error') !!}',
		icon: $.sweetModal.ICON_SUCCESS
	});
</script>
@endif

<!-- Не переность данный скрипт, иначе конфликтует со скриптом лайков, т.к. они подключаются сюда как кусок, и в нем уже используется section scripts -->
<script type="text/javascript" src="{{ asset('js/quiz.js') }}"></script>
@endsection