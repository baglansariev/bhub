@extends('layouts.admin')


@section('content')

<div class="card">
    <h5 class="card-header">{{ $Freelancer->name }}</h5>
    <div class="card-body">
        <form id="userForm" method="post" enctype="multipart/form-data" action="{{ route('freelancers.update', $Freelancer->id) }}">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Имя:</label>
                        <input type="text" name="name" class="form-control" placeholder="Имя" value="{{ $Freelancer->name }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Позиция:</label>
                        <input type="text" name="position" class="form-control" placeholder="Позиция" value="{{ $Freelancer->position }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <div class="form-group">
                        <label>Статус:</label>
                        <!-- <input type="text" name="status" class="form-control" placeholder="Статус" value="{{ $Freelancer->status }}"> -->
                        <select name="status" id="" class="form-control">
                            <option value="0" @if($Freelancer->status == 0) selected @endif>0 - В ожидании</option>
                            <option value="1" @if($Freelancer->status == 1) selected @endif>1 - Активный</option>
                            <option value="2" @if($Freelancer->status == 2) selected @endif>2 - В Архиве</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Фото:</label>
                        <input type="file" name="img" class="form-control" placeholder="Фото">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="category_id">Категория:</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row pt-2 pt-sm-5 mt-1">
                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary">Сохранить</button>
                        <a href="{{ route('freelancers.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection