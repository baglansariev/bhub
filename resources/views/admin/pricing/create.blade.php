@extends('layouts.admin')

@section('scripts')
    <script src="{{ asset('panel/libs/js/pricings.js') }}"></script>
@endsection

@section('content')

    <div class="card">
        <h5 class="card-header">Новый тариф</h5>
        <div class="card-body">
            <form id="userForm" method="post" enctype="multipart/form-data" action="{{ route('pricing.store') }}">
                @csrf
                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="inputTitle">Название</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputTitle" placeholder="Название" value="{{ old('title') }}" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h3 class="mt-4 mb-4">Тарифные планы</h3>
                <hr>
                <div class="pr-plans">
                    <div class="form-row"></div>
                </div>
                <div class="deleted-plans"></div>
                <hr>
                <div class="plan-actions mb-3 mt-3 d-flex justify-content-center">
                    <button type="button" class="btn-success btn add-plan">Добавить план</button>
                </div>
                <div class="row pt-2 pt-sm-5 mt-1">
                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-space btn-primary">Добавить</button>
                            <a href="{{ route('pricing.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection