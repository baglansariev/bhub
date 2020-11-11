@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- ============================================================== -->
                <!-- login page  -->
                <!-- ============================================================== -->
                <div class="splash-container">
                    <div class="card ">
                        <div class="card-header text-center">
                            <a class="form-logo d-flex justify-content-center align-items-center" href="{{ route('home') }}">
{{--                                <img class="logo-img" src="{{ asset('images/template/main_logo_black.png') }}" alt="logo">--}}
                                <span>BHUB PANEL</span>
                            </a>
                            <span class="splash-description">Введите данные для входа.</span>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" id="username" name="email" type="text" placeholder="E-mail" value="{{ old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Пароль">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Запомнить меня</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Войти</button>
                            </form>
                        </div>
                        <div class="card-footer bg-white p-0  d-flex justify-content-center">
                            <!--<div class="card-footer-item card-footer-item-bordered">
                                <a href="#" class="footer-link">Регистрация</a>
                            </div>-->
                            <div class="card-footer-item card-footer-item-bordered">
                                <a href="#" class="footer-link">Забыл пароль</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- end login page  -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
@endsection
