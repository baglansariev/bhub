@extends('layouts.admin')


@section('content')

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Список всех групп</h5>
                    <div class="card-actions">
                        <a href="{{ route('role.create') }}" class="btn btn-success">Добавить</a>
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
                                <th>Код</th>
                                <th>Дата создания</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($roles->count())
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($role->isSystemRole())
                                                <span>{{ $role->name }}</span>
                                            @else
                                                <a href="{{ route('role.edit', $role->id) }}">{{ $role->name }}</a>
                                            @endif
                                        </td>
                                        <td>{{ $role->code }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        <td class="d-flex">
                                            @if ($role->isSystemRole())
                                                <i style="color: #888;">Действие запрещено</i>
                                            @else
                                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning mr-1">Изменить</a>
                                                <form action="{{ route('role.destroy', $role->id) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Пока еще нет групп</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection