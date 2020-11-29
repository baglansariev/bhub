@extends('layouts.admin')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактировать бизнес пост</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('business-news.index') }}"> <i class="fas fa-step-backward"></i></a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Внимание!</strong> Пожалуйста, проверьте код поля ввода<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('business-news.update',$BusinessNews->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Заголовок:</strong>
                    <input type="text" name="title" value="{{ $BusinessNews->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>ЧПУ:</strong>
                    <input type="text" name="slug" value="{{ $BusinessNews->slug }}" class="form-control" placeholder="ЧПУ">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Картинка:</strong>
                    <input type="file" name="img" value="{{ $BusinessNews->img }}" class="form-control" placeholder="Картинка">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Описание:</strong>
                    <textarea class="form-control" style="height:150px" name="body" placeholder="Description">{{ $BusinessNews->body }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
   
    </form>

@endsection