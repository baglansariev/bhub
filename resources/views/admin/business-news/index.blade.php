@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="pull-left">
                        <h2>Бизнес новости</h2>
                    </div>
                    <div class="pull-right">
                        @if (canDo('add_news'))
                            <a class="btn btn-success" href="{{ route('business-news.create') }}"> Добавить бизнес новость</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-striped mb-3">
                        <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th scope="row">Заголовок</th>
                            <th scope="row">Описание</th>
                            <th scope="row" width="250px">Действие</th>
                        </tr>
                        </thead>
                        @foreach ($news as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->body }}</td>
                                <td>
                                    <form action="{{ route('business-news.destroy',$item->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('business-news.show',$item->id) }}"><i class="fas fa-eye"></i></a>

                                        @if (canDo('edit_news'))
                                            <a class="btn btn-primary" href="{{ route('business-news.edit',$item->id) }}"><i class="far fa-edit"></i></a>
                                        @endif

                                        @csrf
                                        @method('DELETE')

                                        @if (canDo('delete_news'))
                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {!! $news->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection