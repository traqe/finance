@extends('layouts.app', ['page' => 'Currencies', 'pageSlug' => 'currencies', 'section' => 'transactions'])

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-md-5">
        <div class="card p-1 pl-3 mb-4 text-white">
            <div class="card-header">
                <div class="row">
                    <form action="{{route('currencies.select')}}" method="post" class="d-inline">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group{{ $errors->has('currency_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-currency_name">Select Preferred Currency</label><br>
                                    <select name="currency_name" id="input-currency_name" class=" bg-white form-control form-control-alternative{{ $errors->has('currency_name') ? ' is-invalid' : '' }}" required>
                                        <option value="" disabled selected>Select Currency</option>
                                        @foreach($currencies as $select_currency)
                                        <option value="{{$select_currency->id}}">{{$select_currency->name}}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'currency_name'])
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2 pt-4">
                                <button type="submit" class="btn btn-sm btn-primary" title="Select Currency">
                                    Select
                                </button>
                            </div>
                        </div>
                    </form>
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
                    <div class="col-8">
                        <h4 class="card-title">Currencies</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('currencies.create') }}" class="btn btn-sm btn-primary">Add Currency</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">Selected</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Name</th>
                            <th scope="col">Symbol</th>
                            <th scope="col">Index</th>

                        </thead>
                        <tbody>
                            @foreach ($currencies as $currency)
                            <tr>
                                @if($currency->selected == 1)
                                <td> &#9989; </td>
                                @else
                                <td></td>
                                @endif
                                <td>{{ date('d-m-y', strtotime($currency->created_at)) }}</td>
                                <td>{{ $currency->name }}</td>
                                <td>{{ $currency->sign }}</td>
                                <td>{{ $currency->index }}</td>

                                <td>
                                    <a href="{{ route('currencies.edit', $currency->id) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Currency">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('currencies.delete', $currency->id ) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link" title="Delete Transaction">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </form>
                                </td>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection