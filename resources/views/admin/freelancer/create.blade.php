@extends('layouts.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Новый фрилансер</h5>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('freelancers.index') }}"> <i class="fas fa-step-backward"></i></a>
    </div>
    <div class="card-body">
        <form action="{{ route('freelancers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Имя:</label>
                        <input type="text" name="name" class="form-control" placeholder="Имя" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Позиция:</label>
                        <input type="text" name="position" class="form-control" placeholder="Позиция" value="{{ old('position') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Статус:</label>
                        <!-- <input type="text" name="status" class="form-control" placeholder="Статус" value="{{ old('status') }}"> -->
                        <select name="status" id="" class="form-control">
                            <option value="0">0 - Не активный</option>
                            <option value="1">1 - Активный</option>
                            <option value="2">2 - В ожидании</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-3">
                    <div class="form-group">
                        <label>Фото:</label>
                        <input type="file" name="img" class="form-control" placeholder="Фото">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Facebook:</label>
                        <input type="text" name="facebook" class="form-control" placeholder="facebook">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Instagramm:</label>
                        <input type="text" name="instagramm" class="form-control" placeholder="Instagramm">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="form-group">
                        {{ Form::label('category_id', 'Категории:') }}
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Выбор категории']) }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="characteristic">Характеристики:</label>
                        <textarea name="characteristic" placeholder="Характеристики" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="description">Описание:</label>
                        <textarea name="description" placeholder="Описание" class="form-control"></textarea>
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