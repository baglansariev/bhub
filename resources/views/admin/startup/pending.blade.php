@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Список всех стартапов</h5>
                    <div class="card-actions">
{{--                        <a href="{{ route('startup.create') }}" class="btn btn-success">Добавить</a>--}}
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('msg_success'))
                        <div class="card-alert alert alert-success alert-dismissible fade show" role="alert">
                            {!! session()->get('msg_success') !!}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                    @endif

                    @if (session()->has('msg_error'))
                        <div class="card-alert alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('msg_error') }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Телефон</th>
                                    <th>Категория</th>
                                    <th>Статус</th>
                                    <th>Дата создания</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($startups->count())
                                @foreach($startups as $startup)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('startup.edit', $startup->id) }}">{{ $startup->title }}</a>
                                        </td>
                                        <td>{{ $startup->phone }}</td>
                                        <td>{{ $startup->category->name ?? 'без группы' }}</td>
                                        <td>{{ $startup->status == 0 ? 'Ожидает' : '' }}</td>
                                        <td>{{ $startup->created_at }}</td>
                                        <td class="d-flex">
                                            <div class="table-actions dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton_{{ $loop->iteration }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Действия
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_{{ $loop->iteration }}">
                                                    <form action="{{ route('startup.approve', $startup->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item">Подтвердить</button>
                                                    </form>
                                                    <a href="{{ route('startup.edit', $startup->id) }}" class="dropdown-item">Изменить</a>
                                                    <form action="{{ route('startup.destroy', $startup->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="dropdown-item">Удалить</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">Пока еще нет стартапов</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        @if ($startups->count())
                            {{ $startups->links() }}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection