@extends('frontend.layouts.master')

@section('title', $data["title"])

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/employee.css') }}">
@endsection

@section('content')
<section class="employee-wrapper">
	<div class="inner-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="circle-photo">
						<img src="img/employee.png" width="398" height="399">
					</div>
				</div>
				<div class="col-md-7 offset-md-1">
					<div class="characteristic">
						<h2 class="employee-title">характеристики</h2>
						<div class="characteristic-content">
							<p class="employee-text">красава</p>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="employee-description">
						<h2 class="employee-title">описание</h2>
						<p class="employee-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>	
					</div>
				</div>
				<div class="col-md-4">
					<div class="employee-adversiting">
						<h3 class="">реклама</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="portfolio-wrapper">
	<div class="container">
		<h1 class="portfolio-title">портфолио</h1>
		<div class="row">
			<div class="col-md-3">
				<div class="portfolio-inner">
					
				</div>
			</div>
			<div class="col-md-3">
				<div class="portfolio-inner">
					
				</div>
			</div>
			<div class="col-md-3">
				<div class="portfolio-inner">
					
				</div>
			</div>
			<div class="col-md-3">
				<div class="portfolio-inner">
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection