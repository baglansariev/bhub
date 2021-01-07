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
  
    <form action="{{ route('business-news.update',$BusinessNews->id) }}" method="POST" enctype="multipart/form-data">
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
                    <div id="img_change">
                        <img src="{{ asset('img/business-news/' . $BusinessNews->img) }}" alt="">
                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Видео ссылка на youtube:</strong>
                    <textarea class="form-control" style="height:150px" name="video" placeholder="Видео ссылка на youtube">{{ $BusinessNews->video }}</textarea>
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

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            @if(isset($BusinessNews->comment) && !empty($BusinessNews->comment) && count($BusinessNews->comment) > 0)
            <strong>Комментарии:</strong>
            @foreach($BusinessNews->comment as $comment)
            <li>
                <strong>Комментарий № {{$loop->iteration}}:</strong> 
                <p class="bNewsComment">&nbsp;&nbsp;&nbsp;{{ $comment->comment }}</p>
                <button type="button" data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}" class="btn btn-sm btn-link text-uppercase">Редактировать</button>
                
                <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('business-news-comment', $comment->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Редактировать комментарий</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="message">Редактировать комментарий:</label>
                                        <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                        <!-- <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small> -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Отмена</button>
                                    <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Обновить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
            @endif
        </div>
    </div>

@endsection