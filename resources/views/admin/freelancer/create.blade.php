@extends('layouts.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Новый фрилансер</h5>
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
                            <option value="0">В ожидании</option>
                            <option value="1">Активный</option>
                            <option value="2">В архиве</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Facebook:</label>
                        <input type="text" name="facebook" class="form-control" placeholder="facebook">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Instagramm:</label>
                        <input type="text" name="instagramm" class="form-control" placeholder="Instagramm">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::label('category_id', 'Категории:') }}
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Выбор категории']) }}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Фото:</label>
                        <input type="file" name="img" class="form-control" placeholder="Фото">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="characteristic">Характеристики:</label>
                        <textarea name="characteristic" placeholder="Характеристики" class="form-control" style="min-height: 150px;"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="description">Описание:</label>
                        <textarea name="description" placeholder="Описание" class="form-control" style="min-height: 150px;"></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <h3 class="mr-3">Портфолио</h3>
            <div class="form-row freelancer-portfolios"></div>
            <div class="deleted-portfolios"></div>
            <div class="freelancer-portfolios-actions text-center">
                <button class="btn btn-success addPortfolio" type="button">Добавить портфолио</button>
            </div>
            <div class="row pt-2 pt-sm-5 mt-1">
                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" class="btn btn-primary mr-2">Сохранить</button>
                        <a class="btn btn-danger" href="{{ route('freelancers.index') }}"> Отменить</a>
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