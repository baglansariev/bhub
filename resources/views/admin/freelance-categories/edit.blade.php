@extends('layouts.admin')


@section('content')

    <div class="card">
        <h5 class="card-header"><strong>Категория:</strong>&nbsp;{{ $FreelanceCategory->title }}</h5>
        <div class="card-body">
            <form id="userForm" method="post" enctype="multipart/form-data" action="{{ route('freelance-categories.update',$FreelanceCategory->id) }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputUserName"><strong>Наименование категории</strong></label>
                            <input type="text" name="title" value="{{ $FreelanceCategory->title }}" class="form-control" placeholder="Title">
                
                            @error('title')
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
                            <a href="{{ route('user.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection