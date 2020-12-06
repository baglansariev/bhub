@extends('layouts.admin')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Бизнес новости</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('business-news.create') }}"> Добавить бизнес новость</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Заголовок</th>
            <th>Описание</th>
            <th width="250px">Действие</th>
        </tr>
        @foreach ($news as $item)
        <tr>
         	<td>{{ ++$i }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->body }}</td>
            <td>
                <form action="{{ route('business-news.destroy',$item->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('business-news.show',$item->id) }}"><i class="fas fa-eye"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('business-news.edit',$item->id) }}"><i class="far fa-edit"></i></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $news->links() !!}

@endsection