@extends('layouts.app')

@section('content')

    <form action="{{ route('account.freelancer.update', $freelancer->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="startupName">Ф.И.О.</label>
                    <input type="text" id="startupName" class="form-control" name="name" value="{{ $freelancer->name ?? '' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="startupTitle">Позиция</label>
                    <input type="text" id="startupTitle" class="form-control" name="position" value="{{ $freelancer->position ?? '' }}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="startupInsta">Instagram</label>
                    <input type="text" id="startupInsta" class="form-control" name="instagramm" value="{{ $freelancer->instagramm ?? '' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="startupFb">Facebook</label>
                    <input type="text" id="startupFb" class="form-control" name="facebook" value="{{ $freelancer->facebook ?? '' }}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                @if ($categories->count())
                    <div class="form-group">
                        <label for="freelancerCategory">Категория</label>
                        <select name="category_id" class="form-control" id="freelancerCategory">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($freelancer->category_id == $category->id) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                    <div class="form-group">
                        <label for="startupPhone">Телефон</label>
                        <input type="text" id="startupPhone" class="form-control" name="phone" value="{{ $freelancer->phone ?? '' }}">
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" id="image" name="img" class="form-control mb-3 @error('image') is-invalid @enderror">
                    <div id="img_change">
                        @if (isset($freelancer->img) && !empty($freelancer->img))
                            <img src="{{ asset($freelancer->img) }}" alt="">
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
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="startupShortDesc">Характеристика</label>
                    <textarea name="characteristic" id="startupChar" class="form-control @error('characteristic') is-invalid @enderror" placeholder="Характеристика" required>{{ $freelancer->characteristic }}</textarea>
                    @error('characteristic')
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
                    <label for="startupFullDesc">Описание</label>
                    <textarea name="description" id="startupFullDesc" class="form-control @error('description') is-invalid @enderror" placeholder="Описание" required>{{ $freelancer->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <hr>
        <h3 class="mb-3">Портфолио</h3>
        @if ($freelancer->portfolio->count())
            <div class="user-portfolios">
                @foreach($freelancer->portfolio as $portfolio)
                    <div class="form-row" id="portfolioRow{{ $loop->iteration }}">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputTitle{{ $loop->iteration }}">Заголовок</label>
                                <input type="text" name="portfolios[{{ $loop->index }}][title]" class="form-control" id="inputTitle{{ $loop->iteration }}" value="{{ $portfolio->title ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputUrl{{ $loop->iteration }}">Ссылка</label>
                                <input type="text" name="portfolios[{{ $loop->index }}][url]" class="form-control" id="inputUrl{{ $loop->iteration }}" value="{{ $portfolio->url ?? '' }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputImg{{ $loop->iteration }}">Изображение</label>
                                <input type="file" name="portfolios[{{ $loop->index }}][img]" class="form-control showable-img" id="inputImg{{ $loop->iteration }}">

                                <div class="img_change">
                                    @if (isset($portfolio->img) && !empty($portfolio->img))
                                        <img src="{{ asset($portfolio->img) }}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="portfolios[{{ $loop->index }}][p_id]" value="{{ $portfolio->id }}">
                        <div class="portfolio-del col-sm-12 d-flex justify-content-center pb-3 mb-3">
                            <button type="button" class="btn btn-danger portfolioDel" data-target="#portfolioRow{{ $loop->iteration }}" data-p_id="{{ $portfolio->id }}">Убрать</button>
                        </div>
                    </div>
                @endforeach
            </div>
        <div class="deleted_portfolios"></div>
            <div class="portfolio-add-actions mb-3 mt-3 d-flex justify-content-center">
                <button type="button" class="btn btn-success addPortfolioRow">Добавить еще</button>
            </div>
        @endif
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-actions d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-2">Сохранить</button>
                    <a href="{{ route('account.freelancer.index') }}" class="btn btn-danger">Отменить</a>
                </div>
            </div>
        </div>
    </form>

@endsection