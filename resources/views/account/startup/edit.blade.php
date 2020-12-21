@extends('layouts.app')

@section('content')

    <form action="{{ route('account.startup.update', $startup->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="startupTitle">Заголовок</label>
                    <input type="text" id="startupTitle" class="form-control" name="title" value="{{ $startup->title ?? '' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="startupTitle">Телефон</label>
                    <input type="text" id="startupTitle" class="form-control" name="phone" value="{{ $startup->phone ?? '' }}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                @if ($categories->count())
                    <div class="form-group">
                        <label for="startupCategory">Категория</label>
                        <select name="startup_category_id" class="form-control" id="startupCategory">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" id="image" name="image" class="form-control mb-3 @error('image') is-invalid @enderror">
                    <div id="img_change">
                        @if (isset($startup->image) && !empty($startup->image))
                            <img src="{{ asset($startup->image) }}" alt="">
                        @endif
                    </div>
                    @error('image')
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
                    <label for="startupVideo">Ссылка на видео (Youtube)</label>
                    <input type="text" id="startupVideo" name="video" class="form-control @error('video') is-invalid @enderror" placeholder="Ссылка на видео" value="{{ $startup->video }}">
                    @error('video')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="startupPrice">Цена</label>
                    <input type="number" id="startupPrice" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Цена" value="{{ $startup->price }}" required>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="startupShortDesc">Короткое описание</label>
                    <textarea name="short_desc" id="startupShortDesc" class="form-control @error('short_desc') is-invalid @enderror" placeholder="Короткое описание" required>{{ $startup->short_desc }}</textarea>
                    @error('short_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="startupFullDesc">Полное описание</label>
                    <textarea name="full_desc" id="startupFullDesc" class="form-control @error('full_desc') is-invalid @enderror" placeholder="Полное описание" required>{{ $startup->full_desc }}</textarea>
                    @error('full_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-actions d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-2">Сохранить</button>
                    <a href="{{ route('account.startup.index') }}" class="btn btn-danger">Отменить</a>
                </div>
            </div>
        </div>
    </form>

@endsection