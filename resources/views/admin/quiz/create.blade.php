@extends('layouts.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Новый опрос</h5>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('quiz.index') }}"> <i class="fas fa-step-backward"></i></a>
    </div>
    <div class="card-body">
        <form action="{{ route('quiz.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Вопрос:</label>
                        <input type="text" name="question" class="form-control" placeholder="Вопрос опроса" value="{{ old('question') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        {{ Form::label('post_id', 'Бизнес новости:') }}
                        {{ Form::select('post_id', $posts, null, ['class' => 'form-control', 'placeholder' => 'Выбор новостей...']) }}
                    </div>
                </div>
            </div>
            <div class="row pt-2 pt-sm-5 mt-1">
                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Внимание!</strong> Заполните обязательные поля<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection