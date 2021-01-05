@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Список всех категорий стартапов</h5>
                    <div class="card-actions">
                        @if (canDo('add_startup_categories'))
                            <a href="{{ route('startup-category.create') }}" class="btn btn-success">Добавить</a>
                        @endif
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
                                <th>Количество записей</th>
                                <th>Дата создания</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($categories->count())
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if (canDo('edit_startup_categories'))
                                                <a href="{{ route('startup.edit', $category->id) }}">{{ $category->name }}</a>
                                            @else
                                                <span>{{ $category->name }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $category->code }}</td>
                                        <td>{{ $category->startups->count() }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td class="d-flex">
                                            @if (canDo('edit_startup_categories'))
                                                <a href="{{ route('startup-category.edit', $category->id) }}" class="btn btn-warning mr-1">Изменить</a>
                                            @endif
                                            @if (canDo('delete_startup_categories'))
                                                    <form action="{{ route('startup-category.destroy', $category->id) }}" method="post">
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
                                    <td colspan="7" class="text-center">Пока еще нет категорий</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        @if ($categories->count())
                            {{ $categories->links() }}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection