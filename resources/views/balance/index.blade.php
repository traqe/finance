@extends('layouts.app', ['page' => 'Balance', 'pageSlug' => 'balance', 'section' => 'balance'])

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card p-1 mb-4 bg-success text-white">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3><strong>Balance &rightarrow;</strong></h3>
                    </div>
                    <div class="col-md-6">
                        <h3> <strong>{{ $currency->sign }} {{ $current->overall_balance * $currency->index }}</strong></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-5">
                        <a href="{{ route('balance.create') }}" class="btn btn-md btn-primary">Inject or Deduct</a>
                    </div>
                    <div class="col-md-7">
                        <h4><strong>You can directly inject or deduct into your overall balance <br> This can be generated from savings or from unaccounted expenses</strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ session('success') }}
</div>
@endif
@if(session('successUpdate'))
<div class="alert alert-warning alert-dismissible" role="alert">
    {{ session('successUpdate') }}
</div>
@endif
@if(session('deleteSuccess'))
<div class="alert alert-danger alert-dismissible" role="alert">
    {{ session('deleteSuccess') }}
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Injection/Deduction History</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">Date of Transaction</th>
                            <th scope="col">Name</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Injection/Deduction</th>
                        </thead>
                        <tbody>
                            @foreach ($balances as $balance)
                            <tr>
                                <td>{{ date('d-m-y', strtotime($balance->created_at)) }}</td>
                                <td>{{ $balance->name }}</td>
                                <td>{{ $balance->reference }}</td>
                                <td>{{ $balance->type }}</td>
                                <td>{{ $balance->amount }}</td>
                                @if($balance->profit_loss == 1)
                                <td>Injection</td>
                                @else
                                <td>Deduction</td>
                                @endif
                                </td>
                                <td>
                                    <a href="{{ route('balance.edit', $balance->id) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Transaction">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('balance.delete', $balance->id ) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link" title="Delete Transaction">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </form>
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
@endsection