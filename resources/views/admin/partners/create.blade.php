@extends('layouts.admin')


@section('content')

    <div class="card">
        <h5 class="card-header">Новый партнер</h5>
        <div class="card-body">
            <form id="userForm" method="post" enctype="multipart/form-data" action="{{ route('partner.store') }}">
                @csrf
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPartnerName">Название</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputPartnerName" placeholder="Название" value="{{ old('title') }}" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPartnerLink">Ссылка</label>
                            <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="inputPartnerLink" placeholder="Ссылка" value="{{ old('link') }}" required>
                            @error('link')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPartnerLink">Логотип</label>
                            <input type="file" id="image" name="image" class="form-control mb-3">
                            <div id="img_change"></div>
                        </div>
                    </div>
                </div>
                <div class="row pt-2 pt-sm-5 mt-1">
                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-space btn-primary">Добавить</button>
                            <a href="{{ route('partner.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection