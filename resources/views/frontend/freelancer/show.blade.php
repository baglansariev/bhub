@extends('frontend.layouts.master')

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
                            <img src="{{ asset($freelancer->img) }}" width="398" height="399" title="{{ $freelancer->name }}" alt="{{ $freelancer->img }}">
                        </div>
                    </div>
                    <div class="col-md-7 offset-md-1">
                        <div class="characteristic">
                            <h2 class="employee-title">характеристики</h2>
                            <div class="characteristic-content">
                                <p class="employee-text">{{ ($freelancer->characteristic) ? $freelancer->description : "Нет данных" }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="employee-description">
                            <h2 class="employee-title">описание</h2>
                            <p class="employee-text">{{ ($freelancer->description) ? $freelancer->description : "Нет данных" }}</p>
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
            @if(isset($portfolios) && !empty($portfolios))
                <h1 class="portfolio-title">портфолио</h1>
                <div class="row">
                    @forelse ($portfolios as $portfolio)
                        <div class="col-md-3">
                            <a class="portfolio-inner" style="background-image: url({{asset($portfolio->img)}})">
                                <h3>{{ $portfolio->title }}</h3>
                            </a>
                        </div>
                    @empty
                        <h2 class="c-black-title">Пользователь не внес портфолио</h2>
                @endforelse
                <!-- <div class="col-md-3">
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
			</div> -->
                </div>
            @endif
        </div>
    </section>
@endsection