@extends('layouts.admin')


@section('content')

    <div class="card">
        <h5 class="card-header">Изменение категории</h5>
        <div class="card-body">
            <form id="userForm" method="post" enctype="multipart/form-data" action="{{ route('startup-category.update', $category->id) }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputName">Название</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Название" value="{{ $category->name }}" required>
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputUserCode">Код</label>
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="inputUserCode" placeholder="Код" value="{{ $category->code }}" required>
                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputUserPricing">Тариф</label>
                            <select name="pricing_id" id="inputUserPricing" class="form-control">
                                <option value="0">Нет</option>
                                @if (isset($pricings) && $pricings->count())
                                    @foreach($pricings as $pricing)
                                        <option value="{{ $pricing->id }}" @if($category->pricing_id == $pricing->id) selected @endif>{{ $pricing->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row pt-2 pt-sm-5 mt-1">
                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-space btn-primary">Сохранить</button>
                            <a href="{{ route('startup-category.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection