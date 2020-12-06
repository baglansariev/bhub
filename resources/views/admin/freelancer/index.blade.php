@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Фрилансеры</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('freelancers.create') }}"> Добавить фрилансера</a>
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
        <th>Имя</th>
        <th>Позиция</th>
        <th width="250px">Действие</th>
    </tr>
    @foreach ($freelancers as $freelancer)
    <tr>
      <td>{{ $freelancer->name }}</td>
      <td>{{ $freelancer->position }}</td>
      <td>
        <form action="{{ route('freelancers.destroy',$freelancer->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('freelancers.show',$freelancer->id) }}"><i class="fas fa-eye"></i></a>

            <a class="btn btn-primary" href="{{ route('freelancers.edit',$freelancer->id) }}"><i class="far fa-edit"></i></a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
        </form>
    </td>
</tr>
@endforeach
</table>

@endsection