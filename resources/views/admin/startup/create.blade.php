@extends('layouts.admin')


@section('content')

    <div class="card">
        <h5 class="card-header">Новый стартап</h5>
        <div class="card-body">
            <form id="userForm" method="post" enctype="multipart/form-data" action="{{ route('startup.store') }}">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputUserName">Название</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputUserName" placeholder="Название" value="{{ old('title') }}" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputUserPhone">Телефон</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="inputUserPhone" placeholder="Телефон" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        @if ($categories->count())
                            <div class="form-group">
                                <label for="inputUserRole">Категория</label>
                                <select name="startup_category_id" id="inputUserRole" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label for="inputPrice">Цена</label>
                            <input type="text" id="inputPrice" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Цена" required>
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputShortDesc">Инфо</label>
                            <textarea name="short_desc" id="inputShortDesc" class="form-control">{{ old('short_desc') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputFullDesc">Описание</label>
                            <textarea name="full_desc" id="inputFullDesc" class="form-control">{{ old('full_desc') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="inputVideo">Ссылка на видео</label>
                        <input type="text" id="inputVideo" name="video" class="form-control" placeholder="Ссылка на видео" value="{{ old('video') }}">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Изображение</label>
                            <input type="file" id="image" name="image" class="form-control mb-3">
                            <div id="img_change"></div>
                            @error('image')
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
                            <button type="submit" class="btn btn-space btn-primary">Добавить</button>
                            <a href="{{ route('startup.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection