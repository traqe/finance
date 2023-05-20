@extends('layouts.app', ['page' => 'Decision Support', 'pageSlug' => 'decision_support', 'section' => 'decision_support'])

@section('content')
<div class="container" id="Decision-Dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div id="stats">
                        <div class="row">
                            <div class="col-md-3">
                                <div style="background-color: coral;" class="card">
                                    <div class="card-header">
                                        <div>
                                            <h4><strong>Total # of Transactions:</strong></h4>
                                        </div>
                                        <div>
                                            <h4><strong>( {{count($transactions)}} )</strong></h4>
                                        </div>
                                        <div class="card" style="background-color:white;">
                                            <h5 class="pt-1 pl-1">
                                                <strong>
                                                    Consider looking for more clients to enhance revenue.
                                                </strong>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div style="background-color: rgb(140, 238, 43);" class="card">
                                    <div class="card-header">
                                        <div>
                                            <h4><strong>Sales Decision Panel:</strong></h4>
                                        </div>
                                        <div>
                                            <h4><strong># ( {{count($sales)}} )</strong></h4>
                                        </div>
                                        <div class="card" style="background-color:white;">
                                            @if((count($clients) > count($sales)) OR (count($sales)/count($clients) <=2)) <h5 class="pt-1 pl-1" style="color:red;"><strong>Your Client-to-Sale ratio is not looking good!</strong></h5>
                                                @else
                                                <h5 class="pt-1 pl-1" style="color:green;"><strong>Your Client-to-Sale ratio is not looking good!</strong></h5>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div style="background-color: rgb(73, 223, 214);;" class="card ">
                                    <div class="card-header">
                                        <div>
                                            <h4><strong>Payment Frequency:</strong></h4>
                                        </div>
                                        <div>
                                            <h4><strong>{{count($payments) / count($providers)}}</strong></h4>
                                        </div>
                                        <div class="card" style="background-color:white;">
                                            @if(count($payments) / count($providers) > 1 ) <h5 class="pt-1 pl-1" style="color:red;"><strong>Revise frequency of payment made to service providers.</strong></h5>
                                            @else
                                            <h5 class="pt-1 pl-1" style="color:green;"><strong>Your frequency of payment against providers is good.</strong></h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div style="background-color: rgb(107, 114, 214);" class="card ">
                                    <div class="card-header">
                                        <div>
                                            <h4><strong>Payment Methods:</strong></h4>
                                        </div>
                                        <div>
                                            <h4><strong>Latest: {{$latest_method->name}}
                                                </strong></h4>
                                        </div>
                                        <div class="card" style="background-color:white;">
                                            <h5 class="pt-1 pl-1" style="color:red;"><strong>Consider using more advantegeous currency.</strong></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card ">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    ---
                                </div>
                                <div class="col-md-6">
                                    ---
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-1 mb-4 bg-success text-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-5">
                                    <h5><strong>Income Summary: {{$currency->sign}} {{$income->sum('amount') * $currency->index }}</strong></h5>
                                    <br>
                                    <h5><strong>Highest Income: {{$currency->sign}} {{$income->max('amount') * $currency->index}}</strong></h5>
                                    <h5><strong>Lowest Income: {{$currency->sign}} {{$income->min('amount') * $currency->index}}</strong></h5>
                                </div>
                                <div class="col-md-5">
                                    <h5><strong>Sales Summary: {{$currency->sign}} {{ $sales->sum('total_amount') * $currency->index}}</strong></h5>
                                    <br>
                                    <h5><strong>Highest Sale: {{$currency->sign}} {{$sales->max('total_amount') * $currency->index}}</strong></h5>
                                    <h5><strong>Lowest Sale: {{$currency->sign}} {{$sales->min('total_amount') * $currency->index}}</strong></h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-1 mb-4 bg-danger text-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5><strong>Payments Summary: {{$currency->sign}} {{ -$payments->sum('amount') * $currency->index }}</strong></h5>
                                    <br>
                                    <h5><strong>Highest Payment: {{$currency->sign}} {{-$payments->max('amount') * $currency->index}}</strong></h5>
                                    <h5><strong>Lowest Payment: {{$currency->sign}} {{-$payments->min('amount') * $currency->index}}</strong></h5>
                                </div>
                                <div class="col-md-6">
                                    <h5><strong>Expenses Summary: {{$currency->sign}} {{ -$expenses->sum('amount') * $currency->index}}</strong></h5>
                                    <br>
                                    <h5><strong>Highest Income: {{$currency->sign}} {{-$expenses->max('amount') * $currency->index}}</strong></h5>
                                    <h5><strong>Lowest Income: {{$currency->sign}} {{-$expenses->min('amount') * $currency->index}}</strong></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-1 mb-4 text-white">
                        <div class="card-header">
                            <div class="row">
                                <!--{{ $sale_count = 0 }}
                                @foreach($sales as $sale)
                                @if($sale->finalized_at)
                                {{$sale_count += 1}}
                                @endif
                                @endforeach-->
                                <div class="col-md-6">
                                    <h5><strong>Finalized sales: {{ $sale_count }}</strong></h5>
                                    <h5><strong>Total Amount from Sales: {{$currency->sign}}{{ $sales->sum('total_amount') * $currency->index }}</strong></h5>
                                    <a href="{{ route('sales.index') }}" class="btn btn-sm btn-primary text-black">Manage Sales</a>
                                </div>
                                <div class="col-md-6">
                                    <h5><strong>No. of Clients: {{ count($clients) }}</strong></h5>
                                    <h5><strong>Highest Sale from Client: {{$currency->sign}}{{ -$clients->min('balance') * $currency->index }} </strong></h5>
                                    <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary text-black">Manage Clients</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-1 mb-4 text-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <h5><strong>Balance:</strong></h5>
                                </div>
                                <div class="col-md-3">
                                    @if($balance->last()->overall_balance > 0)
                                    <h5 style="color:blue"><strong>{{$currency->sign}} {{$balance->last()->overall_balance * $currency->index}}</strong></h5>
                                    @else
                                    <h5 style="color:red"><strong>{{$currency->sign}} {{$balance->last()->overall_balance * $currency->index }}</strong></h5>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <h5><strong>Injections:</strong></h5>
                                </div>
                                <div class="col-md-3">
                                    <!--{{$injeciton_sum = 0}}
                                    @foreach($balance as $injection)
                                    @if($injection->profit_loss == 1)
                                    {{$injeciton_sum += $injection->amount}}
                                    @endif
                                    @endforeach-->
                                    <h5 style="color: green;"><strong>{{$currency->sign}} {{$injeciton_sum * $currency->index}}</strong></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <h5><strong>Deductions:</strong></h5>
                                </div>
                                <div class="col-md-3">
                                    <!--{{$deduction_sum = 0}}
                                    @foreach($balance as $deduction)
                                    @if($injection->profit_loss == 0)
                                    {{$deduction_sum += $deduction->amount}}
                                    @endif
                                    @endforeach-->
                                    <h5 style="color:red;"><strong>-{{$currency->sign}} {{$deduction_sum * $currency->index}}</strong></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection