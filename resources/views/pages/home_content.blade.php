@extends('basePage')


@section('content')

    <!--MAIN SLIDE-->
    <div class="wrap-main-slide">
        <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
             data-dots="false">
            @foreach( $all_slider as $v_slider)
                <div class="item-slide">
                    <a href="#" class="link-banner banner-effect-1">

                        <img src="{{$v_slider->slider_image}}" alt="" class="img-slide overlay">
                    </a>
                    <div class="slide-info slide-2">
                        <h2 class="f-title">Kid Smart Watches</h2>
                        <span class="f-subtitle ">Compra todos tus productos Smart por.</span>

                        <a href="#" class="btn btn-danger">Shop Now</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!--BANNER-->
    <div class="wrap-banner style-twin-default">
        <div class="banner-item">
            <a href="#" class="link-banner banner-effect-1">
                <figure><img src="{{asset('frontend/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190">
                </figure>
            </a>
        </div>
        <div class="banner-item">
            <a href="#" class="link-banner banner-effect-1">
                <figure><img src="{{asset('frontend/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190">
                </figure>
            </a>
        </div>
    </div>

    <!--On Sale-->
    <div class="wrap-show-advance-info-box style-1 has-countdown">
        <h3 class="title-box">On Sale</h3>
        <div class="wrap-countdown mercado-countdown" data-expire="2022/05/25 12:34:56"></div>
        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
             data-loop="false" data-nav="true" data-dots="false"
             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>


            @foreach($product_info as $v_product)

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{URL::to('/product_details/'.$v_product->product_id)}}">
                            <figure><img src="{{URL::to($v_product->product_image)}}" width="800"
                                         height="800" alt=""></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">sale</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{URL::to('/product-details/'.$v_product->product_id)}}"
                           class="product-name"><span>{{$v_product->product_name}}</span></a>
                        <div class="wrap-price">
                            <ins><p class="product-price">৳ {{$v_product->product_price}}</p></ins>
                            <del><p class="product-price">$250.00</p></del>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

    <!--Latest Products-->
    <div class="wrap-show-advance-info-box style-1">
        <h3 class="title-box">Latest Products</h3>
        <div class="wrap-top-banner">
            <a href="#" class="link-banner banner-effect-2">
                <figure><img src="{{asset('frontend/images/digital-electronic-banner.jpg')}}" width="1170"
                             height="240" alt=""></figure>
            </a>
        </div>
        <div class="wrap-products">
            <div class="wrap-product-tab tab-style-1">
                <div class="tab-contents">
                    <div class="tab-content-item active" id="digital_1a">
                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                             data-items="5" data-loop="false" data-nav="true" data-dots="false"
                             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>


                            @foreach($product_info as $v_product)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{URL::to('/product_details/'.$v_product->product_id)}}"
                                           title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{URL::to($v_product->product_image)}}"
                                                         width="800" height="800"
                                                         alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$v_product->product_name}}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">৳ {{$v_product->product_price}}</span></div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Product Categories-->
    <div class="wrap-show-advance-info-box style-1">
        <h3 class="title-box">Product Categories</h3>
        <div class="wrap-top-banner">
            <a href="#" class="link-banner banner-effect-2">
                <figure><img src="{{asset('frontend/images/fashion-accesories-banner.jpg')}}" width="1170"
                             height="240" alt=""></figure>
            </a>
        </div>
        <div class="wrap-products">
            <div class="wrap-product-tab tab-style-1">
                <div class="tab-control">

                    @foreach($all_category_info as $v_category)
                        <a href="{{$v_category->category_id}}"
                           class="tab-control-item active ">{{$v_category->category_name}}</a>
                    @endforeach
                </div>
                <div class="tab-contents">
                    <div class="tab-content-item active" id="digital_1a">
                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                             data-items="5" data-loop="false" data-nav="true" data-dots="false"
                             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>


                            @foreach($product_info as $v_product)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{URL::to('/product_details/'.$v_product->product_id)}}"
                                           title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{URL::to($v_product->product_image)}}"
                                                         width="800" height="800"
                                                         alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$v_product->product_name}}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">৳ {{$v_product->product_price}}</span></div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>


                {{--                <div class="tab-contents">--}}
                {{--                    <div class="tab-content-item active" id="{{$v_product->category_name}}">--}}
                {{--                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"--}}
                {{--                             data-items="5" data-loop="false" data-nav="true" data-dots="false"--}}
                {{--                             data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>--}}

                {{--                            <div class="product product-style-2 equal-elem ">--}}
                {{--                                <div class="product-thumnail">--}}
                {{--                                    <a href="{{URL::to('/product-details/'.$v_product->product_id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">--}}
                {{--                                        <figure><img src="{{$v_product->product_image}}"--}}
                {{--                                                     width="800" height="800"--}}
                {{--                                                     alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>--}}
                {{--                                    </a>--}}
                {{--                                    <div class="group-flash">--}}
                {{--                                        <span class="flash-item new-label">new</span>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="wrap-btn">--}}
                {{--                                        <a href="#" class="function-link">quick view</a>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="product-info">--}}
                {{--                                    <a href="#"--}}
                {{--                                       class="product-name"><span>{{$v_product->product_name}}</span></a>--}}
                {{--                                    <div class="wrap-price"><span class="product-price">৳ {{$v_product->product_price}}</span></div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

@endsection
