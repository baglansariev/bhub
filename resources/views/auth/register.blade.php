@extends('layouts.auth')

@section('content')
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Регистрация</h3>
                <p>Регистрация нового пользователя.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" required placeholder="Ф.И.О." value="{{ old('name') }}">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg @error('phone') is-invalid @enderror" type="phone" name="phone" required placeholder="Телефон" value="{{ old('phone') }}">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" required placeholder="E-mail" value="{{ old('email') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" type="password" name="password" required placeholder="Пароль">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password-confirm" class="form-control form-control-lg" required name="password_confirmation" type="password"  placeholder="Подтверждение пароля">
                </div>
                @if (isset($roles) && $roles->count())
                    <div class="form-group">
                        <span>Кто вы?</span>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <label class="custom-control custom-radio">
                                    <input type="radio" name="role_id" class="custom-control-input" @if($role->id == 7) checked @endif value="{{ $role->id }}"><span class="custom-control-label">{{ $role->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Зарегистрироваться</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Уже есть аккаунт? <a href="{{ route('login') }}" class="text-secondary">Войти</a></p>
            </div>
        </div>
    </form>
@endsection
