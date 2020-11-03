@extends('frontend.layouts.master')

@section('title', 'News on click')

@section('styles')
	<link rel="stylesheet" type="text/css" href="css/news.css">
@section('content')
<section class="news-on-click-wrapper">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="watch-the-video">
						<div class="bnt-play-video">
							<img src="img/play-video.png" width="59" height="51">
							<p>смотреть видео</p>
						</div>
					</div>
					<div class="advertising">
						<h2>Реклама</h2>
					</div>
					<div class="advertising-text">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="quiz-block">
						<h1 class="h1-title">Опрос</h1>
						<div class="row">
							<div class="col-md-9">
								<p class="quiz-title"><span class="quiz-circle"></span><span class="quiz-title-sp">опросник</span></p>
							</div>
							<div class="col-md-9">
								<p class="quiz-title"><span class="quiz-circle"></span><span class="quiz-title-sp">опросник</span></p>
							</div>
							<div class="col-md-9">
								<p class="quiz-title"><span class="quiz-circle"></span><span class="quiz-title-sp">опросник</span></p>
							</div>
							<div class="col-md-9">
								<p class="quiz-title"><span class="quiz-circle"></span><span class="quiz-title-sp">опросник</span></p>
							</div>
						</div>
					</div>
					<div class="discussion">
						<h1 class="h1-title">Обсуждение</h1>
						<div class="discussion-content">
							<span>написал</span>
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