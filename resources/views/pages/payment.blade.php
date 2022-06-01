@extends('basePage')
@section('content')

    <div class="headingWrap">
        <h3 class="headingTop text-center">Select Your Payment Method</h3>
        <p class="text-center">Choose a radio button from here </p>
    </div>

    <br>
    <br>

    <div class="row equal-container">

        <form action="{{url('/order-place')}}" method="post">
            {{csrf_field()}}

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-toggle="buttons">
                <div class="aboutus-box-score equal-elem ">
                    <b class="box-score-title">Bkash <span><input type="radio" class="btn" name="payment_gateway"
                                                                  value="bkash" checked> </span></b>
                    <span class="sub-title">Pay with an easy payment</span>
                    <img src="{{asset('frontend/images/payment/bkash.png')}}" style="height: 200px;width: 100%">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-toggle="buttons">
                <div class="aboutus-box-score equal-elem ">
                    <b class="box-score-title">Nagad <span><input type="radio" class="btn" name="payment_gateway"
                                                                  value="nagad"> </span></b>
                    <span class="sub-title">Pay with an easy payment</span>
                    <img src="{{asset('frontend/images/payment/nagad.png')}}">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="aboutus-box-score equal-elem ">
                    <b class="box-score-title">COD <span><input type="radio" class="btn" name="payment_gateway"
                                                                 value="COD"> </span> </b>
                    <span class="sub-title">Pay with an easy payment</span>
                    <img src="{{asset('frontend/images/payment/cod.png')}}">
                </div>
            </div>

            <div class="summary-item shipping-method" >
                <button href="#" type="submit" class="btn btn-medium">Pay now </button>
            </div>


        </form>
    </div>

@endsection
