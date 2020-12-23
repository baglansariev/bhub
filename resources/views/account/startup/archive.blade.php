@extends('layouts.app')

@section('content')
    <div class="alerts mt-3 mb-3">
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
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Телефон</th>
            <th scope="col">Цена</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @if ($startups->count())
            @foreach($startups as $startup)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a href="{{ route('account.startup.edit', $startup->id) }}">{{ $startup->title }}</a>
                    </td>
                    <td>{{ $startup->phone }}</td>
                    <td>{{ $startup->price }}</td>
                    <td>
                        <div class="dropdown show">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink_{{ $loop->iteration }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_{{ $loop->iteration }}">
                                <a class="dropdown-item" href="{{ route('account.startup.edit', $startup->id) }}">Редактировать</a>
                                <form action="{{ route('account.startup.destroy', $startup->id) }}" method="post">
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
                <th colspan="6" class="text-center">У вас пока нет архивных стартапов</th>
            </tr>
        @endif

        </tbody>
    </table>

    {{ $startups->links() }}

@endsection