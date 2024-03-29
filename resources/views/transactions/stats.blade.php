@extends('layouts.app', ['pageSlug' => 'tstats', 'page' => 'Statistics', 'section' => 'transactions'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Transaction Statistics</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-primary">
                            View Transactions
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Period</th>
                        <th>Transactions</th>
                        <th>Income</th>
                        <th>Expenses</th>
                        <th>Payments</th>
                        <th>Cash Balance</th>
                        <th>Total balance</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($transactionsperiods as $period => $data)
                        <tr>
                            <td>{{ $period }}</td>
                            <td>{{ $data->count() }}</td>
                            <td>{{$currency->sign}}{{ ($data->where('type', 'income')->sum('amount')) * $currency->index }}</td>
                            <td>{{$currency->sign}}{{ ($data->where('type', 'expense')->sum('amount')) * $currency->index }}</td>
                            <td>{{$currency->sign}}{{ ($data->where('type', 'payment')->sum('amount')) * $currency->index}}</td>
                            <td>{{$currency->sign}}{{ ($data->where('payment_method_id', optional($methods->where('name', 'Cash')->first())->id)->sum('amount')) * $currency->index }}</td>
                            <td>{{$currency->sign}}{{ ($data->sum('amount')) * $currency->index}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-tasks">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Pending Balances</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary">View Clients</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-full-width table-responsive">
                    <table class="table">
                        <thead>
                            <th>Client</th>
                            <th>Purchases</th>
                            <th>Transactions</th>
                            <th>Balance</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td><a href="{{ route('clients.show', $client) }}">{{ $client->name }}<br>{{ $client->document_type }}-{{ $client->document_id }}</a></td>
                                <td>{{ $client->sales->count() }}</td>
                                <td>{{$currency->sign}}{{($client->transactions->sum('amount')) * $currency->index }}</td>
                                <td>
                                    @if ($client->balance > 0)
                                    <span class="text-success">{{$currency->sign}}{{ ($client->balance) * $currency->index }}</span>
                                    @elseif ($client->balance < 0.00) <span class="text-danger">{{$currency->sign}}{{ ($client->balance) * $currency->index }}</span>
                                        @else
                                        {{$currency->sign}}{{ ($client->balance) * $currency->index }}
                                        @endif
                                </td>
                                <td>
                                    <a href="{{ route('clients.transactions.add', $client) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Register Transation">
                                        <i class="tim-icons icon-simple-add"></i>
                                    </a>
                                    <a href="{{ route('clients.show', $client) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="See Client">
                                        <i class="tim-icons icon-zoom-split"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-tasks">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Statistics by Methods</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('methods.index') }}" class="btn btn-sm btn-primary">View Methods</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-full-width table-responsive">
                    <table class="table">
                        <thead>
                            <th>Method</th>
                            <th>Transactions {{ $date->year }}</th>
                            <th>Balance {{ $date->year }}</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($methods as $method)
                            <tr>
                                <td><a href="{{ route('methods.show', $method) }}">{{ $method->name }}</a></td>
                                <td>{{$currency->sign}}{{ ($transactionsperiods['Year']->where('payment_method_id', $method->id)->count()) * $currency->index }}</td>
                                <td>{{$currency->sign}}{{ ($transactionsperiods['Year']->where('payment_method_id', $method->id)->sum('amount')) * $currency->index }}</td>
                                <td>
                                    <a href="{{ route('methods.show', $method) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="See Method">
                                        <i class="tim-icons icon-zoom-split"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Sales Statistics</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('sales.index') }}" class="btn btn-sm btn-primary">View Sales</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Period</th>
                        <th>Sales</th>
                        <th>Clients</th>
                        <th>Total Stock</th>
                        <th data-toggle="tooltip" data-placement="bottom" title="Average of total amount of all sales">Sales Average</th>
                        <th>Billed Amount</th>
                        <th>To Finalize</th>
                    </thead>
                    <tbody>
                        @foreach ($salesperiods as $period => $data)
                        <tr>
                            <td>{{ $period }}</td>
                            <td>{{ $data->count() }}</td>
                            <td>{{ $data->groupBy('client_id')->count() }}</td>
                            <td>{{ $data->where('finalized_at', '!=', null)->map(function ($sale) {return $sale->products->sum('qty');})->sum() }}</td>
                            <td>{{$currency->sign}}{{ ($data->avg('total_amount')) * $currency->index }}</td>
                            <td>{{ $currency->sign }}{{ ($data->where('finalized_at', '!=', null)->map(function ($sale) {return $sale->products->sum('total_amount');})->sum()) * $currency->index }}</td>
                            <td>{{ $data->where('finalized_at', null)->count() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection