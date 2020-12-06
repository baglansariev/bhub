@extends('frontend.layouts.master')

@section('title', $data["title"])
{{--@section('title', $data["post"]->title)--}}

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/news.css') }}">
@section('content')
<section class="news-on-click-wrapper">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="watch-the-video">
						<div class="bnt-play-video">
							<img src="{{ asset('img/play-video.png') }}" width="59" height="51">
							<p>смотреть видео</p>
						</div>
					</div>
					<div class="advertising">
						<h2>Реклама</h2>
					</div>
					<div class="advertising-text">
						<p>{{ $data['post']->body }}</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="quiz-block">
						<h1 class="h1-title">Опрос</h1>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p class="quiz-title"><span class="quiz-circle"></span><span class="quiz-title-sp">опросник</span></p>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p class="quiz-title"><span class="quiz-circle"></span><span class="quiz-title-sp">опросник</span></p>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p class="quiz-title"><span class="quiz-circle"></span><span class="quiz-title-sp">опросник</span></p>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<p class="quiz-title"><span class="quiz-circle"></span><span class="quiz-title-sp">опросник</span></p>
							</div>
						</div>
					</div>
					<div class="discussion">
						<h1 class="h1-title">Обсуждение</h1>
						<div class="discussion-content">
							<!-- <span>написал</span> -->
							@comments(['model' => $data['post']])
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
@endsection