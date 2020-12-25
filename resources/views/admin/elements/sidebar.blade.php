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
                        <i class="fa fa-fw fa-user-circle"></i>
                        <span class="link-title">Панель управления</span>
                    </a>
                </li>
                <li class="nav-item">
                    <li class="nav-item">

                        <a class="nav-link" href="/admin/business-news">
                            <i class="fab fa-fw fa-wpforms mr-1"></i>
                            <span>Бизнес новости</span>
                        </a>
                    </li>
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                        <i class="fa fa-fw fa-rocket mr-1"></i>
                        <span class="link-title">Фрилансеры</span>
                    </a>
                    <div id="submenu-3" class="collapse submenu" style="">
                        <ul class="nav flex-column">
                             <li class="nav-item">
                                <a class="nav-link" href="/admin/freelance-categories">Категория фрилансеров</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/freelancers')}}">Все фрилансеры</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/portfolios')}}">Портфолио</a>
                            </li>
                        </ul>
                    </div>
{{--                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">--}}
{{--                        <i class="fa fa-fw fa-rocket mr-1"></i>--}}
{{--                        <span class="link-title">Модули</span>--}}
{{--                    </a>--}}
{{--                    <div id="submenu-2" class="collapse submenu" style="">--}}
{{--                        <ul class="nav flex-column">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">Услуги</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="general.html">Портфолио</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="carousel.html">Клиенты</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="listgroup.html">Страницы</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="typography.html">Меню</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="accordions.html">Accordions</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="tabs.html">Tabs</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4">--}}
{{--                        <i class="fab fa-fw fa-wpforms mr-1"></i>--}}
{{--                        <span class="link-title">Блог</span>--}}
{{--                    </a>--}}
{{--                    <div id="submenu-4" class="collapse submenu" style="">--}}
{{--                        <ul class="nav flex-column">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="form-elements.html">Form Elements</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="form-validation.html">Parsely Validations</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="multiselect.html">Multiselect</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('startup-category.index') }}">Категории</a>
                            </li>
                        </ul>
                    </div>
                </li>
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
            </ul>
        </div>
    </nav>
</div>