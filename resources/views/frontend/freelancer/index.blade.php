@extends('frontend.layouts.master')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/freelance.css') }}">
@endsection

@section('content')
    <section class="freelance-wrapper">
        <div class="container">
            <div class="freelance-info-main">
                <h1 class="freelance-title"><span>лучшие</span> работники</h1>
                <p class="freelance-info-text">Внизу список достойнейших людей, которые доказали все делом и т.д.</p>
                <!-- Button trigger modal for freelancer profile -->
{{--                <button type="button" class="btn btn-primary btn-freelancer-profile" data-toggle="modal" data-target="{{(auth()->user()) ? '#freelanceProfile' : '#authModal' }}">--}}
{{--                    Заполнить анкету--}}
{{--                </button>--}}
                <a href="{{ route('front.freelancer.create') }}" class="btn btn-primary btn-freelancer-profile">Заполнить анткету</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2">
                    <div class="categories-wrapper">
                        <h3 class="categories-title">Категории</h3>
                        <ul class="freelance-categories-lists">
                            @foreach($categories as $category)
                                {{--<li><a href="{{ route('freelancerFilter', $category->id) }}">{{ $category->title }}</a></li>--}}
                                <li><a href="{{ url('/freelancers/' . $category->id) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1 col-md-9 offset-md-0 col-sm-9">
                    <div class="row">
                        @if ($freelancers->count())
                            @foreach($freelancers as $freelancer)
                                <div class="col-lg-3 col-md-4">
                                    <div class="freelance-card">
                                        <a href="{{ route('front.freelancer.show', $freelancer->id) }}" target="_blank" title="" style="display: block;">
                                            <div class="inner-card-block">
                                                <img src="{{ asset($freelancer->img) }}" align="Adilet" alt="{{ $freelancer->img }}" title="{{ $freelancer->name }}">
                                                <h5 class="freelancer-name">{{ $freelancer->name }}</h5>
                                                <p class="freelancer-position">{{ $freelancer->position }}</p>
                                            </div>
                                            <div class="freelance-social">
                                                <a href="{{ $freelancer->facebook ? $freelancer->facebook : '#' }}" class="facebook-icon" target="_blank" title="facebook"></a>
                                                <a href="{{ $freelancer->instagramm ? $freelancer->instagramm : '#' }}" class="instagramm-icon" target="_blank" title="instagramm"></a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-sm-12">
                                <p class="text-black-50">В данной категории пока нет фрилансеров</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for freelance profile -->
    <div class="modal fade" id="freelanceProfile" tabindex="-1" role="dialog" aria-labelledby="freelanceProfileCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('freelancers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" value="0">
                    <input type="hidden" name="type" value="freelancer-profile">
                    <input type="hidden" name="user_id" value="{{(auth()->user()) ? auth()->user()->id : ''}}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="freelanceProfileLongTitle">Анкета фрилансера</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Имя" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-gorup">
                                    <input type="text" class="form-control" name="position" placeholder="Позиция" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="instagramm" placeholder="Instagramm">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="characteristic" placeholder="Харектеристики" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="description" placeholder="Описание" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Выбор категории...</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="photo" style="color: #252525" class="common-title">Ваше фото</label>
                                    <input id="photo" type="file" class="form-control" name="img" placeholder="Фото">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <?php $portfolioIndex = 0; ?>
                            <script type="text/javascript">$portfolioIndex = 2;</script>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="photo" type="text" class="form-control" name="portfolio[0][title]" placeholder="Наименование портфолио">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="photo" type="text" class="form-control" name="portfolio[0][url]" placeholder="Ссылка">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="photo" style="color: #252525" class="common-title">Изображение портфолио</label>
                                    <input id="photo" type="file" class="form-control" name="portfolio[0][img]" placeholder="Изображение">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success add-more-portfolios-btn">портфолио&nbsp;<i class="fas fa-plus-circle"></i></button>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary btn-send-freelancer-data">Отправить данные</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for freelance auth -->
    <div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('freelancers.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="authModalLongTitle">Вы не авторизованы</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h3 class="c-black-title">Авторизуйтесь</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary">Авторизоваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal success -->
    @if (session()->has('msg_success'))
        <script>
            $.sweetModal({
                content: '{!! session()->get('msg_success') !!}',
                icon: $.sweetModal.ICON_SUCCESS
            });
        </script>
    @endif

    <!-- Modal error -->
    @if (session()->has('msg_error'))
        <script>
            $.sweetModal({
                content: '{{ session()->get('msg_error') }}',
                icon: $.sweetModal.ICON_WARNING
            });
        </script>
    @endif

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/freelancers.js') }}"></script>
@endsection