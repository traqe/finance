@extends('layouts.app', ['page' => 'New Currency', 'pageSlug' => 'currencies', 'section' => 'transactions'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">New Currency</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('currencies.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('currencies.store') }}" autocomplete="off">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Currency Information</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-title">Name</label>
                                <input type="text" name="name" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Currency Name" value="" required autofocus>
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-amount">Sign</label>
                                <input type="text" step=".01" name="sign" id="input-amount" class="form-control form-control-alternative" placeholder="Symbol" value="" min="0" required>
                                @include('alerts.feedback', ['field' => 'sign'])

                            </div>

                            <div class="form-group{{ $errors->has('reference') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-reference">1 USD Conversion Rate</label>
                                <input type="text" name="index" id="input-reference" class="form-control form-control-alternative{{ $errors->has('reference') ? ' is-invalid' : '' }}" placeholder="Conversion Rate" value="">
                                @include('alerts.feedback', ['field' => 'index'])
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
<script>
    new SlimSelect({
        select: '.form-select'
    })
</script>
@endpush('js')