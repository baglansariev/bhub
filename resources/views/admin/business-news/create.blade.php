@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Добавить новый бизнес пост</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('business-news.index') }}"> <i class="fas fa-step-backward"></i></a>
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
   
<form action="{{ route('business-news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Заголовок:</strong>
                <input type="text" name="title" class="form-control" placeholder="Заголовок">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>ЧПУ:</strong>
                <input type="text" name="slug" class="form-control" placeholder="ЧПУ">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Картинка:</strong>
                <input type="file" name="img" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Видео ссылка на youtube:</strong>
                <textarea class="form-control" style="height:180px" name="video" placeholder="Видео ссылка на youtube"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Описание:</strong>
                <textarea class="form-control" style="height:280px" name="body" placeholder="Описание"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </div>
   
</form>

@endsection