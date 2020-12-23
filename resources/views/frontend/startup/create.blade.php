@extends('frontend.layouts.master')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/startups.css') }}">
@endsection

@section('content')
    <section class="startups-main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="startups-main-categories">
                        <a href="#" title="Категории" class="startups-main-title">Категории</a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="startups-main-all">
                        <a href="#" title="Все" class="startups-main-title">Все</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="startups-main-route-wrapper startups-main-route-wrapper-first"><a href="{{ route('front-startup.index') }}" class="startups-main-route">инвестору</a></div>
                    <div class="startups-main-route-wrapper"><a href="#" class="startups-main-route">предпринимателю</a></div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="top">
                        <h3 class="top-title">Новый стартап</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('front-startup.store') }}" method="post" class="startup-form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="startupName">Заголовок</label>
                                                <input type="text" id="startupName" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Заголовок" value="{{ old('title') }}" required>
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="startupPhone">Телефон</label>
                                                <input type="text" id="startupPhone" name="phone" class="form-control  @error('phone') is-invalid @enderror" placeholder="Телефон" value="{{ old('phone') }}" required>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
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
                                                <div id="img_change"></div>
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="startupVideo">Ссылка на видео (Youtube)</label>
                                                <input type="text" id="startupVideo" name="video" class="form-control @error('video') is-invalid @enderror" placeholder="Ссылка на видео" value="{{ old('video') }}">
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
                                                <input type="number" id="startupPrice" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Цена" value="{{ old('price') }}" required>
                                                @error('price')
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
                                                <label for="startupShortDesc">Короткое описание</label>
                                                <textarea name="short_desc" id="startupShortDesc" class="form-control @error('short_desc') is-invalid @enderror" placeholder="Короткое описание" required>{{ old('short_desc') }}</textarea>
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
                                                <textarea name="full_desc" id="startupFullDesc" class="form-control @error('full_desc') is-invalid @enderror" placeholder="Полное описание" required>{{ old('full_desc') }}</textarea>
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
                                            <div class="startup-actions d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Добавить</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection