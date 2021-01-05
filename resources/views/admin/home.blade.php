@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Количество пользователей</h5>
                    <h2 class="mb-0">{{ $users_count }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                    <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Количество Бизнес новостей</h5>
                    <h2 class="mb-0">{{ $business_news_count }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                    <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Количество Фрилансеров</h5>
                    <h2 class="mb-0">{{ $freelancers_count }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                    <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Количество стартапов</h5>
                    <h2 class="mb-0">{{ $startups_count }}</h2>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                    <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection