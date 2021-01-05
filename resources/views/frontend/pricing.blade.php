<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тарифные планы</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('pricing/css/pricing-plan.css') }}">
</head>
<body>
<main>
    @if (isset($pricing))
        <div class="container">
            <h5 class="text-center pricing-table-subtitle">ТАРИФНЫЙ ПЛАН</h5>
            <h1 class="text-center pricing-table-title">{{ $pricing->title ?? '' }}</h1>
            <div class="row">
                @if ($pricing->plans->count())
                    @php($class = 'pricing-plan-basic')
                    @foreach($pricing->plans as $plan)
                        @if ($loop->iteration%2 == 0) @php($class = 'pricing-plan-pro') @endif
                        @if ($loop->iteration%3 == 0) @php($class = 'pricing-plan-enterprise') @endif
                        <div class="col-md-4">
                            <div class="card pricing-card {{ $class }}">
                                <div class="card-body">
                                    <i class="mdi mdi-wallet-giftcard pricing-plan-icon"></i>
                                    <p class="pricing-plan-title">{{ $plan->title ?? '' }}</p>
                                    <h3 class="pricing-plan-cost ml-auto">₸ {{ $plan->price ?? '' }}</h3>
                                    @if (isset($plan->advantages) && !empty($plan->advantages))
                                        <ul class="pricing-plan-features">
                                            @foreach(unserialize($plan->advantages) as $advantage)
                                                <li>{{ $advantage }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if (isset($startup))
                                        <form action="{{ route('pricing.startup.pay') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="startup_id" value="{{ $startup->id }}">
                                            <input type="hidden" name="pricing_plan_id" value="{{ $plan->id }}">
                                            <button type="submit" class="btn pricing-plan-purchase-btn">Купить</button>
                                        </form>
                                    @endif
                                    @if (isset($freelancer))
                                        <form action="{{ route('pricing.freelancer.pay') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="freelancer_id" value="{{ $freelancer->id }}">
                                            <input type="hidden" name="pricing_plan_id" value="{{ $plan->id }}">
                                            <button type="submit" class="btn pricing-plan-purchase-btn">Купить</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
</main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
