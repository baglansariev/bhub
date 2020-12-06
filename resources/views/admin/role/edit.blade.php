@extends('layouts.admin')


@section('content')

    <div class="card">
        <h5 class="card-header">Изменение группы {{ $role->name }}</h5>
        <div class="card-body">
            <form id="userForm" method="post" enctype="multipart/form-data" action="{{ route('role.update', $role->id) }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputUserName">Название</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputUserName" placeholder="Ф.И.О" value="{{ $role->name }}" required>
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputUserEmail">Код</label>
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="inputUserEmail" placeholder="Код" value="{{ $role->code }}" required>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        @if ($permissions->count())
                            <div class="form-group">
                                <label for="" class="mb-3">Доступы</label>
                                <div class="card form-card">
                                    <div class="card-body">
                                        @foreach($permissions as $permission)
                                            @if ($role->permissions->count() && in_array($permission->id, $role->permissions()->pluck('id')->toArray()))
                                                <label class="custom-control custom-checkbox">
                                                    <input name="permissions[]" checked type="checkbox" class="custom-control-input" value="{{ $permission->id }}"><span class="custom-control-label">{{ $permission->name }}</span>
                                                </label>
                                            @else
                                                <label class="custom-control custom-checkbox">
                                                    <input name="permissions[]" type="checkbox" class="custom-control-input" value="{{ $permission->id }}"><span class="custom-control-label">{{ $permission->name }}</span>
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row pt-2 pt-sm-5 mt-1">
                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-space btn-primary">Изменить</button>
                            <a href="{{ route('role.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection