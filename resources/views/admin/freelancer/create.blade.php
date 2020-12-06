@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Добавить нового фрилансера</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('freelancers.index') }}"> <i class="fas fa-step-backward"></i></a>
        </div>
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

<form action="{{ route('freelancers.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Имя:</strong>
                <input type="text" name="name" class="form-control" placeholder="Имя">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Позиция:</strong>
                <input type="text" name="position" class="form-control" placeholder="Позиция">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Фото:</strong>
                <input type="file" name="img" class="form-control" placeholder="Фото">
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('category_id', 'Categories') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Выбор категории']) }}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </div>

</form>

@endsection