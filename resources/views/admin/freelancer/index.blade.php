@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Список всех фрилансеров</h5>
                <div class="card-actions">
                    <a href="{{ route('freelancers.create') }}" class="btn btn-success">Добавить фрилансера</a>
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
                                <th>Позиция</th>
                                <th>Статус</th>
                                <th>Дата создания</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($freelancers->count())
                                @foreach($freelancers as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->position }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <form action="{{ route('freelancers.destroy',$user->id) }}" method="POST">

                                                <a class="btn btn-primary" href="{{ route('freelancers.edit',$user->id) }}"><i class="far fa-edit"></i></a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Пока еще нет фрилансеров</td>
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
