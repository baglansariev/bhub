@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="pull-left">
                    <h2>Портфолио</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('portfolios.create') }}"> Добавить портфолио</a>
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

                <table class="table table-striped mb-3">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th scope="row">Наименование</th>
                            <th scope="row">id фрилансера</th>
                            <th scope="row">Имя фрилансера</th>
                            <th scope="row">Ссылка</th>
                            <th scope="row" width="250px">Действие</th>
                        </tr>
                    </thead>
                    @foreach ($portfolios as $portfolio)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->freelancer_id }}</td>
                        <td>{{ $portfolio->freelancer->name }}</td>
                        <td>{{ $portfolio->url }}</td>
                        <td>
                            <form action="{{ route('portfolios.destroy',$portfolio->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('portfolios.show',$portfolio->id) }}"><i class="fas fa-eye"></i></a>

                                <a class="btn btn-primary" href="{{ route('portfolios.edit',$portfolio->id) }}"><i class="far fa-edit"></i></a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>

@endsection