@extends('layouts.admin')


@section('content')

    <div class="card">
        <h5 class="card-header">Новый пользователь</h5>
        <div class="card-body">
            <form id="userForm" method="post" enctype="multipart/form-data" action="{{ route('user.store') }}">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputUserName">Ф.И.О</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputUserName" placeholder="Ф.И.О" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputUserEmail">E-mail</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputUserEmail" placeholder="E-mail" value="{{ old('email') }}" required>
                            @error('email')
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
                            <label for="inputUserPassword">Пароль</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputUserPassword" placeholder="Пароль" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputUserConfirm">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" class="form-control" id="inputUserConfirm" placeholder="Подтверждение пароля" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        @if ($roles->count())
                            <div class="form-group">
                                <label for="inputUserRole">Группа</label>
                                <select name="role_id" id="inputUserRole" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
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
                            <a href="{{ route('user.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection