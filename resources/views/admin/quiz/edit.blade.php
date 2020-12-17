@extends('layouts.admin')


@section('content')

<div class="card">
    <h5 class="card-header">Изменение опроса</h5>
    <div class="card-body">
        @if (session()->has('msg_success'))
        <div class="card-alert alert alert-success alert-dismissible fade show" role="alert">
            {!! session()->get('msg_success') !!}
            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </a>
        </div>
        @endif

        @if (session()->has('msg_error'))
        <div class="card-alert alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('msg_error') }}
            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </a>
        </div>
        @endif
        <form id="quizForm" method="post" enctype="multipart/form-data" action="{{ route('quiz.update', $quiz->id) }}">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Название опроса</label>
                        <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="inputName" placeholder="Название опроса" value="{{ $quiz->question }}" required>
                        <input type="hidden" name="id" value="{{ $quiz->id }}">
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputPostName">Привязанная новость</label>
                        <input type="text" name="post_id" class="form-control" id="inputPostName" placeholder="{{ $quiz_post->title }}" value="{{ $quiz_post->title }}" readonly>
                        <input type="hidden" name="post_id" value="{{ $quiz_post->id }}">
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @if(isset($posts) && !empty($posts))
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputPostsName">Привязать к другой новости</label>
                        <select id="inputPostsName" name="select_post_id" class="form-control">
                            <option value="">Выбрать пост...</option>
                            @foreach($posts as $post)
                            <option value="{{ $post->id }}">{{ $post->title }}</option>
                            @endforeach
                        </select>
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @endif
            </div>
            <div class="row pt-2 pt-sm-5 mt-1">
                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary">Сохранить</button>
                        <a href="{{ route('quiz.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection