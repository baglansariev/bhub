@extends('frontend.layouts.master')

@section('title', $data["title"])

@section('styles')

@endsection

@section('content')
<section class="find-an-investor-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<a href="#" class="find-an-investor-categories" title="Стартап" blank="_blank">
					<img src="https://via.placeholder.com/450x333" alt="">
					<h3 class="find-an-investor-categories-title">Стартап</h3>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<a href="#" class="find-an-investor-categories" title="Инвест.проект" blank="_blank">
					<img src="https://via.placeholder.com/450x333" alt="">
					<h3 class="find-an-investor-categories-title">Инвест.проект</h3>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<a href="#" class="find-an-investor-categories" title="Продажа бизнеса" blank="_blank">
					<img src="https://via.placeholder.com/450x333" alt="">
					<h3 class="find-an-investor-categories-title">Продажа бизнеса</h3>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<a href="#" class="find-an-investor-categories" title="Коммерческая недвижимость" blank="_blank">
					<img src="https://via.placeholder.com/450x333" alt="">
					<h3 class="find-an-investor-categories-title">Коммерческая недвижимость</h3>
				</a>
			</div>
		</div>
	</div>
</section>
@endsection