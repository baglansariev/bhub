@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Просмотр опроса</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('quiz.index') }}"> <i class="fas fa-step-backward"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Опрос:</strong>
            {{ $quiz->question }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>К какой новости привязано:</strong>
            {{ $quiz_post->title }}
        </div>
    </div>
</div>

@endsection