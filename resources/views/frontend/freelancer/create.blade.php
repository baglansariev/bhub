@extends('frontend.layouts.master')

@section('scripts')
    <script src="{{ asset('js/portfolio.js') }}"></script>
@endsection

@section('content')

    <section class="add-new-freelancer pb-5 pt-5" style="background-color: #f8f8f8;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ route('front.freelancer.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startupName">Ф.И.О.</label>
                                    <input type="text" id="startupName" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startupTitle">Позиция</label>
                                    <input type="text" id="startupTitle" class="form-control" name="position">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startupInsta">Instagram</label>
                                    <input type="text" id="startupInsta" class="form-control" name="instagramm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startupFb">Facebook</label>
                                    <input type="text" id="startupFb" class="form-control" name="facebook">
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
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="startupPhone">Телефон</label>
                                    <input type="text" id="startupPhone" class="form-control" name="phone" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Изображение</label>
                                    <input type="file" id="image" name="img" class="form-control mb-3 @error('image') is-invalid @enderror">
                                    <div id="img_change"></div>
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
                                    <textarea name="characteristic" id="startupChar" class="form-control @error('characteristic') is-invalid @enderror" placeholder="Характеристика" required></textarea>
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
                                    <textarea name="description" id="startupFullDesc" class="form-control @error('description') is-invalid @enderror" placeholder="Описание" required></textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="mb-3 text-black-50">Портфолио</h3>
                        <div class="user-portfolios"></div>
                        <div class="portfolio-add-actions mb-3 mt-3 d-flex justify-content-center">
                            <button type="button" class="btn btn-success addPortfolioRow">Добавить портфолио</button>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12">
                                <div class="form-actions d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-2">Сохранить</button>
                                    <a href="{{ route('account.freelancer.index') }}" class="btn btn-danger">Отменить</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection