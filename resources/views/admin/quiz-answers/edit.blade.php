@extends('layouts.admin')


@section('content')

<div class="card">
    <h5 class="card-header">Изменение ответа</h5>
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
        <form id="quizForm" method="post" enctype="multipart/form-data" action="{{ route('quiz-answers.update', $quizAnswer->id) }}">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName">Ответ</label>
                        <input type="text" name="answer" class="form-control @error('answer') is-invalid @enderror" id="inputAnswer" placeholder="Название опроса" value="{{ $quizAnswer->answer }}" required>
                        <input type="hidden" name="id" value="{{ $quizAnswer->id }}">
                        @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row pt-2 pt-sm-5 mt-1">
                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" class="btn btn-space btn-primary">Сохранить</button>
                        <a href="{{ route('quiz-answers.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection