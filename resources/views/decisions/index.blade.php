@extends('layouts.app', ['page' => 'Decision Support', 'pageSlug' => 'decision_support', 'section' => 'decision_support'])

@section('content')
<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="img_nature_wide.jpg" style="width:100%">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="img_snow_wide.jpg" style="width:100%">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="img_mountains_wide.jpg" style="width:100%">
        <div class="text">Caption Three</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>
<div id="dots" style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>
<!--after slideshow-->
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
                                <!--{{ $client_count = 0 }}
                                @foreach($clients as $client)
                                {{$client_count += 1}}
                                @endforeach-->
                                <div class="col-md-6">
                                    <h5><strong>No. of Clients: {{ $client_count }}</strong></h5>
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
                                <div class="col-md-6">
                                    <h3><strong></strong></h3>
                                </div>
                                <div class="col-md-6">
                                    <h3> <strong></strong></h3>
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
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 4000); // Change image every 2 seconds
    }
</script>