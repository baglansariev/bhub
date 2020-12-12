@extends('layouts.admin')

@section('content')

<div class="card">
    <h5 class="card-header">Новое портфолио</h5>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('portfolios.index') }}"> <i class="fas fa-step-backward"></i></a>
    </div>
    <div class="card-body">
        <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Наименование:</label>
                        <input type="text" name="title" class="form-control" placeholder="Наименование" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>slug:</label>
                        <input type="text" name="slug" class="form-control" placeholder="slug" value="{{ old('slug') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Ссылка:</label>
                        <input type="text" name="url" class="form-control" placeholder="Ссылка" value="{{ old('url') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-4">
                    <div class="form-group">
                        <div class="input-group hdtuto control-group lst increment" >
                            <input type="file" name="img[]" class="myfrm form-control">
                            <div class="input-group-btn"> 
                                <button class="btn btn-success" type="button"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="clone" style="display: none">
                            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                <input type="file" name="img[]" class="myfrm form-control">
                                <div class="input-group-btn"> 
                                    <button class="btn btn-danger" type="button"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <div class="form-group">
                        <label>Выбор фрилансера</label>
                        <select name="freelancer_id" class="form-control">
                            @foreach($freelancers as $id => $freelancer)
                            <option value="{{ $freelancer->id }}">{{ $freelancer->name . ' - ' . $freelancer->position }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row pt-2 pt-sm-5 mt-1">
                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Внимание!</strong> Заполните обязательные поля<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto.control-group.lst").remove();
      });
    });
</script>
@endsection