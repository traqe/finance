@extends('layouts.app', ['page' => 'Edit Balance', 'pageSlug' => 'balance', 'section' => 'balance'])

@section('content')
<div class="card-body">
    <form method="post" action="{{ route('balance.update', Request('id')) }}" autocomplete="on">
        @csrf
        {{method_field('PUT')}}
        <h6 class="heading-small text-muted mb-4">Balance Information</h6>
        <div class="pl-lg-4">
            <input hidden type="text" name="id" id="input-id" class="" value="{{ $balance->id }}">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">Name</label>
                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ $balance->name }}" required autofocus>
                @include('alerts.feedback', ['field' => 'name'])
            </div>
            <div class="form-group{{ $errors->has('reference') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-reference">Reference</label>
                <input type="text" name="reference" id="input-reference" class="form-control form-control-alternative{{ $errors->has('reference') ? ' is-invalid' : '' }}" placeholder="Reference" value="{{ $balance->reference }}" required>
                @include('alerts.feedback', ['field' => 'reference'])
            </div>
            <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-type">Type</label>
                <input type="text" name="type" id="input-type" class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" placeholder="Type" value="{{ $balance->type }}" required>
                @include('alerts.feedback', ['field' => 'type'])
            </div>
            <div class="form-group{{ $errors->has('profit_loss') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-profit_loss">Injection/Deduction</label>
                <input disabled type="text" name="profit_loss" id="input-profit_loss" class="form-control form-control-alternative{{ $errors->has('profit_loss') ? ' is-invalid' : '' }}" placeholder="Injection/Deduction" value="{{ ($balance->profit_loss == 1 ? 'Injection' : 'Deduction') }}" required>
                @include('alerts.feedback', ['field' => 'profit_loss'])
            </div>
            <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-amount">Amount</label>
                <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="Amount" value="{{ $balance->amount }}" required>
                @include('alerts.feedback', ['field' => 'amount'])
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection