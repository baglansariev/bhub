@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Контакты</h5>
                <div class="card-actions">
                    @if (canDo('add_contacts'))
                    <a href="{{ route('contacts.create') }}" class="btn btn-success">Добавить контакт</a>
                    @endif
                    <a href="{{ route('contacts.create') }}" class="btn btn-success">Добавить контакт</a>
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
                                <th>Номер телефона</th>
                                <th>Email</th>
                                <th>Адрес</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($contacts->count())
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>
                                    <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                                        @if (canDo('edit_freelancers'))
                                        <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}"><i class="far fa-edit"></i></a>
                                        @endif

                                        @csrf
                                        @method('DELETE')
                                        @if (canDo('delete_freelancers'))
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        @endif

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
