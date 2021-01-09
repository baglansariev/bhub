@extends('layouts.admin')

@section('content')

    <div class="card">
        <h5 class="card-header">Новый фрилансер</h5>
        <div class="card-body">
            <form action="{{ route('freelancers.update', $freelancer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Имя:</label>
                            <input type="text" name="name" class="form-control" placeholder="Имя" value="{{ $freelancer->name ?? '' }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Позиция:</label>
                            <input type="text" name="position" class="form-control" placeholder="Позиция" value="{{ $freelancer->position ?? '' }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label>Статус:</label>
                        <!-- <input type="text" name="status" class="form-control" placeholder="Статус" value="{{ old('status') }}"> -->
                            <select name="status" id="" class="form-control">
                                <option value="0" @if($freelancer->status == 0) selected @endif>В ожидании</option>
                                <option value="1" @if($freelancer->status == 1) selected @endif>Активный</option>
                                <option value="2" @if($freelancer->status == 2) selected @endif>В архиве</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Facebook:</label>
                            <input type="text" name="facebook" class="form-control" placeholder="facebook" value="{{ $freelancer->facebook ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Instagramm:</label>
                            <input type="text" name="instagramm" class="form-control" placeholder="Instagramm" value="{{ $freelancer->instagramm ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        @if ($categories->count())
                            <div class="form-group">
                                <label for="category">Категория</label>
                                <select name="category_id" id="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($freelancer->freelanceCategory->id == $category->id) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Фото:</label>
                            <input type="file" id="image" name="img" class="form-control mb-3">
                            <div id="img_change">
                                @if (isset($freelancer->img))
                                    <img src="{{ asset($freelancer->img) }}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="characteristic">Характеристики:</label>
                            <textarea name="characteristic" placeholder="Характеристики" class="form-control" style="min-height: 150px;">{{ $freelancer->characteristic ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description">Описание:</label>
                            <textarea name="description" placeholder="Описание" class="form-control" style="min-height: 150px;">{{ $freelancer->description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <h3 class="mr-3">Портфолио</h3>
                <div class="form-row freelancer-portfolios">
                    @if ($freelancer->portfolio->count())
                        @foreach($freelancer->portfolio as $portfolio)
                            <div class="portfolio col-md-3" id="portfolio{{ $loop->iteration }}" data-p_id="{{ $portfolio->id }}">
                                <input type="hidden" name="portfolios[{{ $loop->index }}][p_id]" value="{{ $portfolio->id }}">
                                <div class="card">
                                    <div class="card-header">
                                        <span>Портфолио №{{ $loop->iteration }}</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="pName{{ $loop->iteration }}">Наименование</label>
                                            <input type="text" class="form-control" id="pName{{ $loop->iteration }}" name="portfolios[{{ $loop->index }}][title]" value="{{ $portfolio->title ?? '' }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pSlug{{ $loop->iteration }}">Slug</label>
                                            <input type="text" class="form-control" id="pSlug{{ $loop->iteration }}" name="portfolios[{{ $loop->index }}][slug]" value="{{ $portfolio->slug ?? '' }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pUrl{{ $loop->iteration }}">Ссылка</label>
                                            <input type="text" class="form-control" id="pUrl{{ $loop->iteration }}" name="portfolios[{{ $loop->index }}][url]" value="{{ $portfolio->url ?? '' }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pImg{{ $loop->iteration }}">Изображение</label>
                                            <input type="file" class="form-control showable-img" name="portfolios[{{ $loop->index }}][img]" id="pImg{{ $loop->iteration }}">
                                            <div class="img_change">
                                                @if (isset($portfolio->img))
                                                    <img src="{{ asset($portfolio->img) }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="button" class="btn btn-danger delPortfolio" data-target="#portfolio{{ $loop->iteration }}">Убрать</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="deleted-portfolios"></div>
                <div class="freelancer-portfolios-actions text-center">
                    <button class="btn btn-success addPortfolio" type="button">Добавить портфолио</button>
                </div>
                <div class="row pt-2 pt-sm-5 mt-1">
                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-primary mr-2">Сохранить</button>
                            <a class="btn btn-danger" href="{{ route('freelancers.index') }}"> Отменить</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Внимание!</strong> Заполните обязательные поля<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection