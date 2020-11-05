@extends('frontend.layouts.master')

@section('title', $data["title"])

@section('styles')
	<link rel="stylesheet" type="text/css" href="css/startups.css">
@endsection

@section('content')
<section class="startups-main-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="startups-main-categories">
					<a href="#" title="Категории" class="startups-main-title">Категории</a>
				</div>
			</div>
			<div class="col-lg-8 col-md-6 col-sm-12">
				<div class="startups-main-all">
					<a href="#" title="Все" class="startups-main-title">Все</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<div class="startups-main-route-wrapper startups-main-route-wrapper-first"><a href="#" class="startups-main-route">инвестору</a></div>
				<div class="startups-main-route-wrapper"><a href="#" class="startups-main-route">предпринимателю</a></div>
			</div>
			<div class="col-lg-8 col-md-12">
				<div class="top">
					<h3 class="top-title">ТОП</h3>
					<div class="row">
						<div class="col-md-6">
							<a href="/startup" target="_blank" title style="display: block;">
								<div class="startups-main-top-startups">
								<p class="startups-main-top-startups-name">название</p>
								<p class="startups-main-top-startups-summ">сумма</p>
							</div>
							</a>
						</div>	
						<div class="col-md-6">
							<div class="startups-main-top-startups">
								<p class="startups-main-top-startups-name">название</p>
								<p class="startups-main-top-startups-summ">сумма</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="startups-main-top-startups">
								<p class="startups-main-top-startups-name">название</p>
								<p class="startups-main-top-startups-summ">сумма</p>
							</div>
						</div>	
						<div class="col-md-6">
							<div class="startups-main-top-startups">
								<p class="startups-main-top-startups-name">название</p>
								<p class="startups-main-top-startups-summ">сумма</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection