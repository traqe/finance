@extends('layouts.app', ['page' => 'Create Balance', 'pageSlug' => 'balance', 'section' => 'balance'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Inject or Make Deduction</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('balance.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('balance.store') }}" autocomplete="on">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Balance Information</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">Name</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('name') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('reference') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-reference">Reference</label>
                                <input type="text" name="reference" id="input-reference" class="form-control form-control-alternative{{ $errors->has('reference') ? ' is-invalid' : '' }}" placeholder="Reference" value="{{ old('reference') }}" required>
                                @include('alerts.feedback', ['field' => 'reference'])
                            </div>
                            <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-type">Type</label>
                                <input type="text" name="type" id="input-type" class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" placeholder="Type" value="{{ old('type') }}" required>
                                @include('alerts.feedback', ['field' => 'type'])
                            </div>
                            <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-amount">Amount</label>
                                <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="Amount" value="{{ old('amount') }}" required>
                                @include('alerts.feedback', ['field' => 'amount'])
                            </div>
                            <div class="form-group{{ $errors->has('profit_loss') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-profit_loss">Inject or Deduction</label><br>
                                <select name="profit_loss" id="input-profit_loss" class="form-control form-control-alternative{{ $errors->has('profit_loss') ? ' is-invalid' : '' }}" required>
                                    <option value="1" selected>Injection</option>
                                    <option value="0">Deduction</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'profit_loss'])
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection