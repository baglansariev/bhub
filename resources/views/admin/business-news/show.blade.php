@extends('layouts.admin')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Просмотр бизнес поста</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('business-news.index') }}"> <i class="fas fa-step-backward"></i></a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Заголовок:</strong>
                {{ $BusinessNews->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Описание:</strong>
                {{ $BusinessNews->body }}
            </div>
        </div>
    </div>

@endsection