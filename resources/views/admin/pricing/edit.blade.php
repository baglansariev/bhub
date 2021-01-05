@extends('layouts.admin')

@section('scripts')
    <script src="{{ asset('panel/libs/js/pricings.js') }}"></script>
@endsection

@section('content')

    <div class="card">
        <h5 class="card-header">Изменеие тарифа</h5>
        <div class="card-body">
            <form id="userForm" method="post" enctype="multipart/form-data" action="{{ route('pricing.update', $pricing->id) }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="inputTitle">Название</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputTitle" placeholder="Название" value="{{ $pricing->title ?? '' }}" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <h3 class="mt-4 mb-4">Тарифные планы</h3>
                <hr>
                <div class="pr-plans">
                    <div class="form-row">
                        @if ($pricing->plans->count())
                            @foreach($pricing->plans as $plan)
                                <div class="col-md-4 pr-plan-container" id="plan_{{ $loop->iteration }}">
                                    <div class="pr-plan p-4">
                                        <div class="form-group">
                                            <label for="planTitle{{ $loop->iteration }}">Название</label>
                                            <input type="text" id="planTitle{{ $loop->iteration }}" class="form-control" value="{{ $plan->title }}" name="plans[{{ $loop->index }}][title]" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="planPrice{{ $loop->iteration }}">Цена</label>
                                            <input type="number" id="planPrice{{ $loop->iteration }}" class="form-control" name="plans[{{ $loop->index }}][price]" value="{{ $plan->price ?? '' }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="planTop{{ $loop->iteration }}">Время в топе (дней)</label>
                                            <input type="number" id="planTop{{ $loop->iteration }}" class="form-control" name="plans[{{ $loop->index }}][on_top]" value="{{ $plan->on_top ?? '' }}" required>
                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <label for="planLimit{{ $loop->iteration }}">Лимит объявлений</label>--}}
{{--                                            <input type="number" id="planLimit{{ $loop->iteration }}" class="form-control" name="plans[{{ $loop->index }}][limit]" value="{{ $plan->limit ?? '' }}">--}}
{{--                                        </div>--}}
                                        <div class="form-group">
                                            <label for="planSortOrder{{ $loop->iteration }}">Порядок</label>
                                            <input type="number" id="planSortOrder{{ $loop->iteration }}" class="form-control" name="plans[{{ $loop->index }}][sort_order]" value="{{ $plan->sort_order ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <div class="card">
                                                <div class="card-header">
                                                    <span>Преимущества</span>
                                                </div>
                                                <div class="card-body">
                                                    <div class="plan-advantages" id="adv_{{ $loop->iteration }}">
                                                        @if (isset($plan->advantages) && !empty($plan['advantages']))
                                                            @php($index = $loop->index)
                                                            @foreach(unserialize($plan['advantages']) as $advantage)
                                                                <div class="plan-advantage d-flex">
                                                                    <input type="text" name="plans[{{ $index }}][advantages][]" class="form-control mr-2" value="{{ $advantage }}">
                                                                    <button type="button" class="rm-advantage btn-sm btn btn-danger">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button class="add-advantage btn btn-success btn-sm" type="button" data-target="#adv_{{ $loop->iteration }}" data-index="{{ $loop->index }}">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="plans[{{ $loop->index }}][p_id]" value="{{ $plan->id }}">
                                        <div class="plan-del-btn d-flex justify-content-center">
                                            <button type="button" class="rm-plan btn btn-sm btn-danger" data-target="#plan_{{ $loop->iteration }}" data-plan_id="{{ $plan->id }}">удалить</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <hr>
                <div class="deleted-plans"></div>
                <div class="plan-actions mb-3 mt-3 d-flex justify-content-center">
                    <button type="button" class="btn-success btn add-plan">Добавить план</button>
                </div>
                <div class="row pt-2 pt-sm-5 mt-1">
                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-space btn-primary">Сохранить</button>
                            <a href="{{ route('pricing.index') }}" class="btn btn-space btn-secondary">Отмена</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection