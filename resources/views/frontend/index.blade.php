@extends('frontend.layouts.master')

@section('title', $data['title'])

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/main-page.css') }}">
@endsection

@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-6">
					<div class="video">
						<h1>ВИДЕО</h1>
					</div>
					<div class="finds-wrap">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<button type="button" class="btn find-an-investor"><a href="/find-an-investor" target="_blank" title="Найти инвестора">найти инвестора</a></button>
							</div>
							<div class="col-lg-6 col-md-12">
								<button type="button" class="btn find-an-employer"><a href="/find-an-employer" target="_blank" title="Найти работадателя">найти работадателя</a></button>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="col-md-1"></div> -->
				<div class="col-md-6">
					<div class="news">
						<h1 class="news-title">News</h1>
						<div class="news-inner">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem nobis reprehenderit commodi ut itaque dolores deleniti et libero, eveniet temporibus dignissimos non magnam tempore sint sed, facilis soluta quia quod.
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem nobis reprehenderit commodi ut itaque dolores deleniti et libero, eveniet temporibus dignissimos non magnam tempore sint sed, facilis soluta quia quod.
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem nobis reprehenderit commodi ut itaque dolores deleniti et libero, eveniet temporibus dignissimos non magnam tempore sint sed, facilis soluta quia quod.
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>	
</div>
<section class="investros-and-employers-section">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="iae-section-left-inner">
						<h1 class="iae-title">для <span>инвесторов</span> и <span>работадателей</span></h1>
						<p class="iae-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
						<div class="finds-wrap">
							<div class="row">
								<div class="col-lg-6 col-md-12">
									<button type="button" class="btn find-an-investor">инвест проекты</button>
								</div>
								<div class="col-lg-6 col-md-12">
									<button type="button" class="btn find-an-employer">найти фрилансера</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- dd -->	
				<div class="col-md-4">
					<div class="iae-section-right-inner">

					</div>
				</div>		
			</div>
		</div>
	</div>
</section>
<section class="our-partners">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="title-our-partners">наши <span>партнеры</span></h1>
				</div>	
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="our-prtners-owl"><img src="img/our-partner.png" width="219" height="92" /></div>
				</div>	
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="our-prtners-owl"><img src="img/our-partner.png" width="219" height="92" /></div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="our-prtners-owl"><img src="img/our-partner.png" width="219" height="92" /></div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="our-prtners-owl"><img src="img/our-partner.png" width="219" height="92" /></div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection