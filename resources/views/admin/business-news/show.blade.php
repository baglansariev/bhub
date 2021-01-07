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
   <br>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            {{--@comments(['model' => $BusinessNews])--}}
            <div class="form-group">
                @if(isset($BusinessNews->comment) && !empty($BusinessNews->comment) && count($BusinessNews->comment) > 0)
                <strong>Комментарии к данной статье:</strong>
                <ul>
                @if(isset($BusinessNews->comment) && !empty($BusinessNews->comment))        
                    @foreach($BusinessNews->comment as $comment)
                    <li>
                        <strong>Комментарий № {{$loop->iteration}}:</strong> 
                        <p class="bNewsComment">&nbsp;&nbsp;&nbsp;{{ $comment->comment }}</p>
                        <p class="bNewsComment"><b>Автор:</b><span>&nbsp;{{ $comment->user_data->name }}</span></p>
                        <p class="bNewsComment"><b>Телефон:&nbsp;</b><span>{{ $comment->user_data->phone }}</span></p>
                        <p class="bNewsComment"><b>Email:&nbsp;</b><span>{{ $comment->user_data->email }}</span></p>
                        <p class="bNewsComment"><b>Дата:&nbsp;</b><span>{{ $comment->created_at }}</span></p>
                    </li>
                    @endforeach
                @endif
                </ul>
                @endif
            </div>
            
        </div>
    </div>

@endsection