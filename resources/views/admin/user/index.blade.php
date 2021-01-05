@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Список всех пользователей</h5>
                <div class="card-actions">
                    @can('manage', auth()->user())
                        <a href="{{ route('user.create') }}" class="btn btn-success">Добавить</a>
                    @endcan
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
                                <th>Имя</th>
                                {{--<th>Img</th>--}}
                                <th>E-mail</th>
                                <th>Группа</th>
                                <th>Дата создания</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count())
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($user->isCreator() && !$user->isCreator(Auth::user()->email))
                                                <span>{{ $user->name }}</span>
                                            @else
                                                @can('manage', auth()->user())
                                                    <a href="{{ route('user.edit', $user->id) }}">{{ $user->name }}</a>
                                                @else
                                                    <span>{{ $user->name }}</span>
                                                @endcan
                                            @endif
                                        </td>
                                       {{-- <td>{{ $user->image }}</td> --}}
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name ?? 'без группы' }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td class="d-flex">
                                            @if ($user->isCreator() && !$user->isCreator(Auth::user()->email))
                                                <i style="color: #888;">Действие запрещено</i>
                                            @else
                                                @can('manage', auth()->user())
                                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning mr-1">Изменить</a>
                                                    @if (!$user->isAuthUser())
                                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger">Удалить</button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <i style="color: #888;">Действие запрещено</i>
                                                @endcan
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Пока еще нет пользователей</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if ($users->count())
                        {{ $users->links() }}
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@endsection