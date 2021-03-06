<div class="menu-list">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="d-xl-none d-lg-none" href="#">Панель</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav flex-column">
                <li class="nav-divider">
                    Меню
                </li>
                <li class="nav-item ">
                    <a class="nav-link active" href="{{ route('admin') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="link-title">Панель управления</span>
                    </a>
                </li>
                <li class="nav-item">
                @if (canDo('see_news'))
                    <li class="nav-item">

                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-3">
                            <i class="fas fa-newspaper mr-1"></i>
                            <span class="link-title">Бизнес новости</span>
                        </a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('business-news.index') }}">Все новости</a>
                                </li>
                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a class="nav-link" href="{{ route('main-news') }}">Главные новости</a>--}}
                                {{--                                </li>--}}
                            </ul>
                        </div>

                    </li>
                @endif
                    @if (canDo('see_freelancers'))
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                        <i class="fa fa-fw fa-user-circle mr-1"></i>
                        <span class="link-title">Фрилансеры</span>
                    </a>
                    <div id="submenu-3" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            @if (canDo('see_freelancer_categories'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/freelance-categories">Категория фрилансеров</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/freelancers')}}">Все фрилансеры</a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-2">
                        <i class="fas fa-plug mr-2"></i>
                        <span class="link-title">Модули</span>
                    </a>
                    <div id="submenu-1" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('partner.index') }}">Партнеры</a>
                            </li>
                        </ul>
                    </div>
                @if (canDo('see_questions'))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5">
                            <i class="fas fa-question-circle mr-2"></i>
                            <span class="link-title">Опросник</span>
                        </a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/quiz">Вопросы</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/quiz-answers">Ответы</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5">--}}
{{--                        <i class="fas fa-fw fa-chart-bar mr-1"></i>--}}
{{--                        <span class="link-title">Статистика</span>--}}
{{--                    </a>--}}
{{--                    <div id="submenu-5" class="collapse submenu" style="">--}}
{{--                        <ul class="nav flex-column">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="general-table.html">General Tables</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="data-tables.html">Data Tables</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
                @if (canDo('see_startups'))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7">
                            <i class="fa fa-fw fa-rocket mr-1"></i>
                            <span class="link-title">Стартапы</span>
                        </a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('startup.index') }}">Все стартапы</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('startup.pending') }}">Ожидающие</a>
                                </li>
                                @if (canDo('edit_startup_categories'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('startup-category.index') }}">Категории</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
                @if (canDo('see_pricings'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pricing.index') }}">
                            <i class="fas fa-tags mr-1"></i>
                            <span class="link-title">Тарифы</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts.index') }}">
                        <i class="fas fa-tags mr-1"></i>
                        <span class="link-title">Контакты</span>
                    </a>
                </li>
                @can('see', auth()->user())
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6">
                        <i class="fas fa-users mr-1"></i>
                        <span class="link-title">Пользователи</span>
                    </a>
                    <div id="submenu-6" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">Все пользователи</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('role.index') }}">Группы</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
            </ul>
        </div>
    </nav>
</div>