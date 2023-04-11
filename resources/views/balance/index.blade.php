@extends('layouts.app', ['page' => 'Balance', 'pageSlug' => 'balance', 'section' => 'balance'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Balance &rightarrow;</h3>
                    </div>
                    <div class="col-md-4">
                        <h3>$50.00</h3>
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
                    <div class="col-md-1">
                        <a href="#" class="btn btn-sm btn-primary">Inject</a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="btn btn-sm btn-danger">Deduct</a>
                    </div>
                    <div class="col-md-9">
                        <h4><strong>You can directly inject or deduct into your overall balance <br> This can be generated from savings or from unaccounted expenses</strong></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection