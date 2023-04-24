@extends('layouts.app', ['page' => 'Edit Currency', 'pageSlug' => 'currency', 'section' => 'currency'])

@section('content')
<div class="card-body">
    <form method="post" action="{{ route('currencies.update', Request('id')) }}" autocomplete="on">
        @csrf
        {{method_field('PUT')}}
        <h6 class="heading-small text-muted mb-4">Currency Information</h6>
        <div class="pl-lg-4">
            <input hidden type="text" name="id" id="input-id" class="" value="{{ $currency->id }}">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">Name</label>
                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ $currency->name }}" required autofocus>
                @include('alerts.feedback', ['field' => 'name'])
            </div>
            <div class="form-group{{ $errors->has('sign') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-sign">Symbol</label>
                <input type="text" name="sign" id="input-sign" class="form-control form-control-alternative{{ $errors->has('sign') ? ' is-invalid' : '' }}" placeholder="sign" value="{{ $currency->sign }}" required>
                @include('alerts.feedback', ['field' => 'sign'])
            </div>
            <div class="form-group{{ $errors->has('index') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-index">index</label>
                <input index="text" name="index" id="input-index" class="form-control form-control-alternative{{ $errors->has('index') ? ' is-invalid' : '' }}" placeholder="index" value="{{ $currency->index }}" required>
                @include('alerts.feedback', ['field' => 'index'])
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection