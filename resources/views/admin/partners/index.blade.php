@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Список всех партнеров</h5>
                    <div class="card-actions">
                        <a href="{{ route('partner.create') }}" class="btn btn-success">Добавить</a>
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
                                <th>Изображение</th>
                                <th>Название</th>
                                <th>Дата создания</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($partners->count())
                                @foreach($partners as $partner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($partner->image) }}" alt="" class="td-image">
                                        </td>
                                        <td>{{ $partner->title }}</td>
                                        <td>{{ $partner->created_at }}</td>
                                        <td>
                                            <a href="{{ route('partner.edit', $partner->id) }}" class="btn btn-warning mr-1 d-inline">Изменить</a>
                                            <form action="{{ route('partner.destroy', $partner->id) }}" method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
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
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection