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
            <div class="form-row-wrapper">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Выбор фрилансера</label>
                            <select name="freelancer_id" class="form-control" required>
                                @foreach($freelancers as $id => $freelancer)
                                <option value="" required>Выберите фрилансера...</option>
                                <option value="{{ $freelancer->id }}" required>{{ $freelancer->name . ' - ' . $freelancer->position }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Наименование:</label>
                            <div class="input-group hdtuto control-group lst increment-title" >
                                <input type="text" name="portfolio[0][title]" class="myfrm form-control" placeholder="Наименование" required>
                                <div class="input-group-btn"> 
                                    <button class="btn btn-success btn-add-title" type="button"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <!-- <div class="clone-title" style="display: none">
                                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                    <input type="text" name="title[]" class="myfrm form-control" placeholder="Наименование">
                                    <div class="input-group-btn"> 
                                        <button class="btn btn-danger btn-remove-add-title" type="button"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <input type="text" name="title" class="form-control" placeholder="Наименование" value="{{ old('title') }}"> -->
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>slug:</label>
                            <input type="text" name="portfolio[0][slug]" class="form-control" placeholder="slug" value="{{ old('slug') }}" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Ссылка:</label>
                            <input type="text" name="portfolio[0][url]" class="form-control" placeholder="Ссылка" value="{{ old('url') }}" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-6">
                        <div class="form-group">
                            <label>Фото портфолио:</label>
                            <div class="input-group hdtuto control-group lst increment-img" >
                                <input type="file" name="portfolio[0][img]" class="myfrm form-control" required>
                                <div class="input-group-btn"> 
                                    <button class="btn btn-success btn-success-img" type="button"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <!-- <div class="clone-img" style="display: none">
                                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                    <input type="file" name="img[]" class="myfrm form-control">
                                    <div class="input-group-btn"> 
                                        <button class="btn btn-danger btn-danger-img" type="button"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row-test">
                
            </div>
            <button type="button" class="btn btn-primary addmore-portfolio">Add more portfolio</button>
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
        var index = 0;
      $('.addmore-portfolio').click(function () {
            index++;
            var inputs = $('.form-row-wrapper').html();
            
            $.ajax({
                type:'get',
                url:"/ajaxPortfolio",
                data:{index:index},
                success:function(data){
                    $(".form-row-wrapper").after(data);
                }
            });       
      });  

      $(".btn-success-img").click(function(){ 
          var lsthmtl = $(".clone-img").html();
          $(".increment-img").after(lsthmtl);
      });

      $("body").on("click",".btn-danger-img",function(){ 
          $(this).parents(".hdtuto.control-group.lst").remove();
      });

      $(".btn-add-title").click(function(){ 
          var lsthmtl = $(".clone-title").html();
          $(".increment-title").after(lsthmtl);
      });

      $("body").on("click",".btn-remove-add-title",function(){ 
          $(this).parents(".hdtuto.control-group.lst").remove();
      });

    });
</script>
@endsection