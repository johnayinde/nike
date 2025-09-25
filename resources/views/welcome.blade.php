@extends('layouts.app')
    @php
        $page = 'home';
    @endphp
    @section('slider')
        <!-- Banner start -->
        <div class="banner banner-2">
            <div class="banner-inner">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item">
                            <img src="{{asset('img/banner/banner-slider-2.jpg')}}" alt="banner-slider-6">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInLeft delay-05s"><span>Exquisite</span> View</h1>
                                    <p data-animation="animated fadeInLeft delay-1s">We are Landmark Nike Lake Resort</p>
                                    <a href="{{ url('/booking') }}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('img/banner/banner-slider-5.jpg')}}" alt="banner-slider-5">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInLeft delay-05s"><span>Luxury</span> & Class</h1>
                                    <p data-animation="animated fadeInLeft delay-1s">That touch of luxury with class</p>
                                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{url('/about')}}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('img/banner/banner-slider-3.jpg')}}" alt="banner-slider-3">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInDown delay-05s"><span>World Class</span> Convention Hall</h1>
                                    <p data-animation="animated fadeInUp delay-1s">We have more than it takes to cover all your conventional activities and gatherings</p>
                                    <a href="#" data-toggle="modal" data-target="#conference" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{ url('/conferencing') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('img/banner/banner-slider-1.jpg')}}" alt="banner-slider-2">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInLeft delay-05s"><span>World Class</span> Rooms</h1>
                                    <p data-animation="animated fadeInUp delay-05s">Relax and feel the touch of class in our exotic rooms</p>
                                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item active">
                            <img src="{{asset('img/banner/banner-slider-6.jpg')}}" alt="banner-slider-1">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInLeft delay-05s"><span>Welcome to</span> Landmark Nike Lake Resort</h1>
                                    <p data-animation="animated fadeInLeft delay-1s">Offering the world class hospitality with a touch of class</p>
                                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('img/banner/banner-slider-0.jpg')}}" alt="banner-slider-1">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInLeft delay-05s"><span>Ensuring </span> Safety</h1>
                                    <p data-animation="animated fadeInLeft delay-1s">Security at its best</p>
                                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('img/banner/banner-slider-7.jpg')}}" alt="banner-slider-1">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInLeft delay-05s"><span>Lake</span> View</h1>
                                    <p data-animation="animated fadeInLeft delay-1s">Have fun and explore</p>
                                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('img/banner/banner-slider-8.jpg')}}" alt="banner-slider-1">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInLeft delay-05s"><span>Lake View</span> Restaurant</h1>
                                    <p data-animation="animated fadeInLeft delay-1s">Our satisfying restaurants will give you the best</p>
                                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('img/banner/banner-slider-9.jpg')}}" alt="banner-slider-1">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInLeft delay-05s"><span>Top Class</span> Events Hosting</h1>
                                    <p data-animation="animated fadeInLeft delay-1s">We wil give you a memorable event</p>
                                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('img/banner/banner-slider-10.jpg')}}" alt="banner-slider-1">
                            <div class="carousel-caption banner-slider-inner banner-top-align">
                                <div class="banner-content text-center">
                                    <h1 data-animation="animated fadeInLeft delay-05s"><span>Luxury </span> Suites</h1>
                                    <p data-animation="animated fadeInLeft delay-1s">We deliver only the best</p>
                                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
                                    <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="slider-mover-left" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="slider-mover-right" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Banner end -->
    @endsection

    @section('content')
        <!-- Search area box 2 -->
            <!-- Start Modal -->
                <div class="modal fade" id="xmas_modal" tabindex="-1" aria-labelledby="cart_modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <i class="fa fa-info-circle"></i> NOTICE
                                </h5>
                            </div>
                            <div class="modal-body">
                               <div class="col-md-6">
                                   <img src="{{asset('img/xmas.png')}}" class="img-responsive">
                               </div>
                               <div class="col-md-6">
                                   <img src="{{asset('img/xmas2.png')}}" class="img-responsive">
                               </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-12"><br></div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
         <!-- Modal end -->
         
         @if(!session('something'))
            <script>
	            $(document).ready(function(){
	                //$("#xmas_modal").modal("show");
	            });
        	</script>
         @endif
        
        <div class="search-area-box-2 search-area-box-6">
            <div class="container">
                <div class="search-contents">
                    <form method="POST" action="{{ route('search') }}">
                        @csrf
                        <div class="row search-your-details">
                            <div class="col-lg-3 col-md-3">
                                <div class="search-your-rooms mt-20">
                                    <h3 class="hidden-xs hidden-sm">Search</h3>
                                    <h2 class="hidden-xs hidden-sm">Your <span>Rooms</span></h2>
                                    <h2 class="hidden-lg hidden-md">Search Your <span>Rooms</span></h2>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="checkin" id="searcheckin" class="btn-default datepicker @error('checkin') is-invalid @enderror" placeholder="Check In" readonly value="{{ old('checkin') }}" required>
                                            @error('checkin')
                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            <script !src="">
                                                $(document).ready(function(){
                                                    $("#searcheckin").css("border", "1px red solid");
                                                });
                                            </script>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="checkout" id="searcheckout" class="btn-default datepicker @error('checkout') is-invalid @enderror" placeholder="Check Out" readonly value="{{ old('checkout') }}" required>
                                            @error('checkout')
                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            <script !src="">
                                                $(document).ready(function(){
                                                    $("#searcheckout").css("border", "1px red solid");
                                                });
                                            </script>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields form-control-2 @error('room') is-invalid @enderror" name="room" id="searchroom" required>
                                                <option value="">--Select Room--</option>
                                                <option value="Superior Room">Superior Room (King Size Bed)</option>
                                                <option value="Superior Room (Double)">
                                                    Superior Room(Double) (King Size Bed)
                                                </option>
                                                <option value="Executive Suite">Executive Suite (King Size Bed)</option>
                                                <option value="Diplomatic Suite">Diplomatic Suite (King Size Bed)</option>
                                                <option value="Presidential Suite">
                                                    Presidential Suite (King Size Bed)
                                                </option>
                                            </select>
                                            @error('room')
                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            <script !src="">
                                                $(document).ready(function(){
                                                    $("#searchroom").css("border", "1px red solid");
                                                });
                                            </script>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields form-control-2 @error('rooms') is-invalid @enderror" name="rooms" required id="searchnum_of_rooms">
                                                <option value="">--Select Number of Rooms--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            @error('rooms')
                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            <script !src="">
                                                $(document).ready(function(){
                                                    $("#searchnum_of_rooms").css("border", "1px red solid");
                                                });
                                            </script>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="search-button btn-theme" id="searchnow">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Search area box 2 end -->

        <!-- Nike Lake Resort start -->
        <div class="hotel-alpha content-area-12" style="margin-top: -50px;">
            <div class="container">
                <div class="row" align="left">
                    <div class="col-lg-5 col-md-6">
                        <br><br><br><br>
                        <div class="hotels-detail-slider simple-slider">
                            <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                <div class="carousel-outer">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item">
                                            <img src="{{asset('img/about/about-2.jpg')}}" class="img-preview img-responsive" alt="about-2">
                                        </div>
                                        <div class="item active left">
                                            <img src="{{asset('img/about/about-3.jpg')}}" class="img-preview img-responsive" alt="about-3">
                                        </div>
                                        <div class="item next left">
                                            <img src="{{asset('img/about/about-1.jpg')}}" class="img-preview img-responsive" alt="about-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lg-offset-1 col-md-6">
                        <div class="text">
                            <!-- <h5>Hotel Bayview</h5> -->
                            <h1>Welcome To Landmark Nike Lake Resort</h1>
                            <p>Landmark Nike Lake Resort is situated on the banks of Nike Lake in Enugu Nigeria. Enjoy the perfect business getaway with breathtaking views in a very secure and tranquil setting. A short fifteen minutes drive from the airport and only ten minutes from the city centre. All rooms overlook the well manicured gardens or the lake and each room provides the comfort and luxury that is expected from an international three star hotel....</p>
                            <br>
                            <a href="{{ url('/about') }}" class="btn btn-outline2 btn-md">View Details</a>
                            <a href="{{ url('/booking') }}" class="btn btn-theme btn-md">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nike Lake Resort end -->

        <!-- Hotel section start -->
        <div class="content-area hotel-section chevron-icon">
            <div class="overlay" style="background-color:#fffefe;padding-top:60px;margin-top:-30px;">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title">
                        <h1>Our Rooms</h1>
                        <p>Some of our rooms include these</p>
                    </div>
                    <div class="row">
                        <div class="carousel our-partners slide" id="ourPartners3">
                            <div class="col-lg-12 mb-30">
                                <a class="right carousel-control" href="#ourPartners3" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                                <a class="right carousel-control" href="#ourPartners3" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a>
                            </div>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="hotel-box">
                                            <!--header -->
                                            <div class="header clearfix" style="position: relative;">
                                                <img src="{{asset('img/room/img-1.jpg')}}" alt="img-1" class="img-responsive">
                                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
                                            </div>
                                            <!-- Detail -->
                                            <div class="detail clearfix">
                                                <div class="pr">
                                                    ₦75,000 / Night
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-full"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <h3>
                                                    <a href="{{url('/superior')}}">Superior Room</a>
                                                </h3>
                                                <!-- <h5 class="location">
                                                    <a href="#">
                                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                                    </a>
                                                </h5> -->
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="hotel-box">
                                            <!--header -->
                                            <div class="header clearfix" style="position: relative;">
                                                <img src="{{asset('img/room/img-2.jpg')}}" alt="img-2" class="img-responsive">
                                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
                                            </div>
                                            <!-- Detail -->
                                            <div class="detail clearfix">
                                                <div class="pr">
                                                    ₦150,000 / Night
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <h3>
                                                    <a href="{{url('/executive')}}">Executive Suite</a>
                                                </h3>
                                                <!-- <h5 class="location">
                                                    <a href="#">
                                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                                    </a>
                                                </h5> -->
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="hotel-box">
                                            <!--header -->
                                            <div class="header clearfix" style="position: relative;">
                                                <img src="{{asset('img/room/img-3.jpg')}}" alt="img-4" class="img-responsive">
                                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
                                            </div>
                                            <!-- Detail -->
                                            <div class="detail clearfix">
                                                <div class="pr">
                                                    ₦200,000 / Night
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-full"></i>
                                                    </div>
                                                </div>
                                                <h3>
                                                    <a href="{{url('/diplomatic')}}">Diplomatic Suite</a>
                                                </h3>
                                                <!-- <h5 class="location">
                                                    <a href="#">
                                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                                    </a>
                                                </h5> -->
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="hotel-box">
                                            <!--header -->
                                            <div class="header clearfix" style="position: relative;">
                                                <img src="{{asset('img/room/img-4.jpg')}}" alt="img-3" class="img-responsive">
                                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
                                            </div>
                                            <!-- Detail -->
                                            <div class="detail clearfix">
                                                <div class="pr">
                                                    ₦300,000  / Night
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <h3>
                                                    <a href="presidential">Presidential Suite</a>
                                                </h3>
                                                <!-- <h5 class="location">
                                                    <a href="#">
                                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                                    </a>
                                                </h5> -->
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hotel section end -->
        <!-- Our facilties section start -->
        <div class="our-facilties-section content-area-3">
            <div class="overlay">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title">
                        <h1>Our Facilties</h1>
                        <p>At Landmark Nike Lake Resort, every detail is designed to make your stay effortless, relaxing, and unforgettable. From sunrise to sunset, and every moment in between, you’ll find comfort, convenience, and care at every turn.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                            <div class="services-box-2 media">
                                <div class="media-left">
                                    <i class="flaticon-school-call-phone-reception"></i>
                                </div>
                                <div class="media-body">
                                    <h3>24-hour Electricity</h3>
                                    <p>Your comfort never pauses here. With constant power and standby generators, every moment remains, uninterrupted.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                            <div class="services-box-2 media">
                                <div class="media-left">
                                    <i class="flaticon-graph-line-screen"></i>
                                </div>
                                <div class="media-body">
                                    <h3>Friendly Cost</h3>
                                    <p>Beautifully furnished  rooms, plush bedding, and thoughtful amenities, all at rates that let you enjoy more, for less.</p>
                                </div>
                            </div>
                        </div>
                        {{--<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                            <div class="services-box-2 media">
                                <div class="media-left">
                                    <i class="flaticon-weightlifting"></i>
                                </div>
                                <div class="media-body">
                                    <h3>Gym</h3>
                                    <p>We have well equipped gyms to keep you fit at all times, our gyms are easily accessible to all guests</p>
                                </div>
                            </div>
                        </div>--}}
                        <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                            <div class="services-box-2 media">
                                <div class="media-left">
                                    <i class="flaticon-parking"></i>
                                </div>
                                <div class="media-body">
                                    <h3>Free Parking</h3>
                                    <p>Stress-Free Parking. Our secure, spacious parking is always available, at no extra cost, so you can focus on your getaway.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                            <div class="services-box-2 media">
                                <div class="media-left">
                                    <i class="flaticon-wifi-connection-signal-symbol"></i>
                                </div>
                                <div class="media-body">
                                    <h3>Free Wi-Fi</h3>
                                    <p>Stay Connected, Whether you’re sharing memories with loved ones or handling business on the go, our high-speed Wi-Fi keeps you connected everywhere in the resort, without interruptions.</p>
                                </div>
                            </div>
                        </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                            <div class="services-box-2 media">
                                <div class="media-left">
                                    <i class="flaticon-room-service"></i>
                                </div>
                                <div class="media-body">
                                    <h3>Room Service</h3>
                                    <p>Why step out when comfort can come to you? Our warm, attentive team is at your service 24/7, ready to deliver meals, refreshments, or any special request right to your door.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- Our facilties section end -->

        <!-- Landmark Locations section start -->
        <div class="landmark-locations-section content-area-3" style="background-color: #f8f9fa; padding: 80px 0;">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>Landmark Locations</h1>
                    <p>Landmark is more than just Landmark Nike Lake Resort — you can also experience our signature blend of business, leisure, and lifestyle across multiple destinations.</p>
                </div>
                <div class="row">
                    <!-- Landmark Lagos -->
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                        <div class="location-card" style="background: #fff; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); margin-bottom: 30px; overflow: hidden;">
                            <div class="location-image" style="position: relative; height: 200px; overflow: hidden;">
                                <img src="{{asset('img/lagos.jpg')}}" alt="Landmark Lagos" style="width: 100%; height: 100%; object-fit: cover;">
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
                            </div>
                            <div class="location-content" style="padding: 20px;">
                                <h3 style="color: #333; margin-bottom: 10px; font-size: 20px;">Landmark Lagos</h3>
                                <div class="status-badge" style="background: #28a745; color: white; padding: 5px 12px; border-radius: 15px; font-size: 12px; display: inline-block; margin-bottom: 10px;">
                                    Opened and fully operating
                                </div>
                                <p style="color: #666; font-size: 14px; line-height: 1.5; margin-bottom: 15px;">
                                    Experience luxury and comfort in the heart of Lagos. Our flagship location offers world-class amenities and exceptional service in Nigeria's commercial capital.
                                </p>
                                <a href="https://www.landmarkafrica.com/locations/Landmark%20Lagos" class="btn btn-theme btn-sm" target="_blank">Visit Website</a>
                            </div>
                        </div>
                    </div>

                    <!-- Landmark Port Harcourt -->
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-08s">
                        <div class="location-card" style="background: #fff; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); margin-bottom: 30px; overflow: hidden;">
                            <div class="location-image" style="position: relative; height: 200px; overflow: hidden;">
                                <img src="https://landmark-assets-bucket.s3.eu-central-1.amazonaws.com/lma_website/location/cover_image/01JMHWDYWMTEHV71HVNK3TSDER.jpg" alt="Landmark Port Harcourt" style="width: 100%; height: 100%; object-fit: cover;">
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
                            </div>
                            <div class="location-content" style="padding: 20px;">
                                <h3 style="color: #333; margin-bottom: 10px; font-size: 20px;">Landmark Port Harcourt</h3>
                                <div class="status-badge" style="background: #ffc107; color: #333; padding: 5px 12px; border-radius: 15px; font-size: 12px; display: inline-block; margin-bottom: 10px;">
                                    Coming soon
                                </div>
                                <p style="color: #666; font-size: 14px; line-height: 1.5; margin-bottom: 15px;">
                                    Get ready for the Landmark experience in the Garden City. Our Port Harcourt location will bring the same luxury and excellence you expect from the Landmark brand.
                                </p>
                                <button class="btn btn-outline2 btn-sm" disabled>Coming Soon</button>
                            </div>
                        </div>
                    </div>

                    <!-- Landmark Abia -->
                    <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-12s">
                        <div class="location-card" style="background: #fff; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); margin-bottom: 30px; overflow: hidden;">
                            <div class="location-image" style="position: relative; height: 200px; overflow: hidden;">
                                <img src="https://landmark-assets-bucket.s3.eu-central-1.amazonaws.com/lma_website/eco_system/lagos_event_center.webp" alt="Landmark Abia" style="width: 100%; height: 100%; object-fit: cover;">
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3);"></div>
                            </div>
                            <div class="location-content" style="padding: 20px;">
                                <h3 style="color: #333; margin-bottom: 10px; font-size: 20px;">Landmark Abia</h3>
                                <div class="status-badge" style="background: #ffc107; color: #333; padding: 5px 12px; border-radius: 15px; font-size: 12px; display: inline-block; margin-bottom: 10px;">
                                    Coming soon
                                </div>
                                <p style="color: #666; font-size: 14px; line-height: 1.5; margin-bottom: 15px;">
                                    Discover the upcoming Landmark experience in Abia State. We're bringing our renowned hospitality and premium amenities to this vibrant location.
                                </p>
                                <button class="btn btn-outline2 btn-sm" disabled>Coming Soon</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom message -->
                <div class="row">
                    <div class="col-md-12 text-center" style="margin-top: 30px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #e9e9e9 100%); color: black; padding: 25px; border-radius: 10px; display: inline-block;">
                            <h4 style="margin: 0; font-weight: 600;">And that's just the beginning!</h4>
                            <p style="margin: 10px 0 0; font-size: 16px;">We're bringing Landmark to even more cities near you!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Landmark Locations section end -->

        <!-- Things To Do section start -->
        <div class="things-to-do-section content-area-3" style="background-color: #ffffff; padding: 80px 0;">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>Things To Do At Landmark Nike Lake Resort</h1>
                    <p>Discover endless ways to relax, explore, and create unforgettable memories during your stay with us.</p>
                </div>
                <div class="row">
                    <!-- Boat Rides -->
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp delay-04s">
                        <div class="services-box-2 media" style="margin-bottom: 40px;">
                            <div class="media-left">
                                <i class="fa fa-ship" style="font-size: 2.5em; color: #4a90e2; background: rgba(74, 144, 226, 0.1); padding: 20px; border-radius: 50%; width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;"></i>
                            </div>
                            <div class="media-body">
                                <h3>Boat Rides</h3>
                                <p>Hop on a boat and just let the water carry you. It's one of those simple joys you never forget.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pool Time -->
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp delay-08s">
                        <div class="services-box-2 media" style="margin-bottom: 40px;">
                            <div class="media-left">
                                <i class="fa fa-tint" style="font-size: 2.5em; color: #00bcd4; background: rgba(0, 188, 212, 0.1); padding: 20px; border-radius: 50%; width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;"></i>
                            </div>
                            <div class="media-body">
                                <h3>Pool Time</h3>
                                <p>Dip your toes, dive right in, or lounge with a drink by your side—it's your call.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kids' Area -->
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp delay-12s">
                        <div class="services-box-2 media" style="margin-bottom: 40px;">
                            <div class="media-left">
                                <i class="fa fa-child" style="font-size: 2.5em; color: #ff6b6b; background: rgba(255, 107, 107, 0.1); padding: 20px; border-radius: 50%; width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;"></i>
                            </div>
                            <div class="media-body">
                                <h3>Kids' Area</h3>
                                <p>The kids get their own little world to play and laugh, while you get a moment to breathe.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Walking Trails -->
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp delay-16s">
                        <div class="services-box-2 media" style="margin-bottom: 40px;">
                            <div class="media-left">
                                <i class="fa fa-tree" style="font-size: 2.5em; color: #4caf50; background: rgba(76, 175, 80, 0.1); padding: 20px; border-radius: 50%; width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;"></i>
                            </div>
                            <div class="media-body">
                                <h3>Walking Trails</h3>
                                <p>Take a slow walk, listen to the birds, and let the fresh air do the rest.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Picnic -->
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp delay-20s">
                        <div class="services-box-2 media text-start" style="margin-bottom: 40px;">
                            <div class="media-left" style="margin: 0 auto; float: none;">
                                <i class="fa fa-cutlery" style="font-size: 2.5em; color: #ff9800; background: rgba(255, 152, 0, 0.1); padding: 20px; border-radius: 50%; width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;"></i>
                            </div>
                            <div class="media-body">
                                <h3>Picnic</h3>
                                <p style="max-width: 600px; margin: 0 auto;">Spread out a blanket, unpack your favourites, and just enjoy being together.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="row">
                    <div class="col-md-12 text-center" style="margin-top: 40px;">
                        <div style="background: linear-gradient(135deg, #ffffff 0%, #e9e9e9 100%); padding: 30px; border-radius: 10px;">
                            <h4 style="color: #333; margin-bottom: 15px;">Ready to Create Memories?</h4>
                            <p style="color: #666; margin-bottom: 20px;">Book your stay today and experience all these amazing activities and more!</p>
                            <a href="{{ url('/booking') }}" class="btn btn-theme btn-lg">Book Your Stay Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Things To Do section end -->

        <!-- Initialize datepickers with blocked dates -->
        <script type="text/javascript">
            // Centralized datepicker initialization function for search form
            function initializeSearchDatepickers() {
                // Define blocked dates (August 20-28, 2025)
                var blockedDates = [];
                for (var d = new Date(2025, 7, 20); d <= new Date(2025, 7, 28); d.setDate(d.getDate() + 1)) {
                    blockedDates.push(new Date(d));
                }

                function isDateBlocked(date) {
                    return blockedDates.some(function(blockedDate) {
                        return date.getTime() === blockedDate.getTime();
                    });
                }

                // Initialize search check-in datepicker
                $('#searcheckin').datepicker('destroy').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight: true,
                    startDate: '+1d',
                    autoclose: true,
                    beforeShowDay: function(date) {
                        if (isDateBlocked(date)) {
                            return false; // Completely disable the date
                        }
                        return true;
                    }
                });

                // Initialize search check-out datepicker
                $('#searcheckout').datepicker('destroy').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight: true,
                    startDate: '+2d',
                    autoclose: true,
                    beforeShowDay: function(date) {
                        if (isDateBlocked(date)) {
                            return false; // Completely disable the date
                        }
                        return true;
                    }
                });
            }

            $(document).ready(function() {
                // Initialize search datepickers with blocked dates
                initializeSearchDatepickers();
            });
        </script>

        <!-- Ad Popup Modal -->
<div id="adModalOverlay" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.7); z-index:9999; display:flex; justify-content:center; align-items:center;">
    <div id="adModalContent" style="position:relative; background:transparent; border-radius:8px; box-shadow:0 2px 16px rgba(0,0,0,0.2); display:flex; flex-direction:column; align-items:center;">
        <button id="adModalClose" style="position:absolute; top:-18px; right:-18px; background:#fff; border:none; border-radius:50%; width:36px; height:36px; font-size:22px; color:#333; cursor:pointer; box-shadow:0 2px 8px rgba(0,0,0,0.2);">&times;</button>
        <img src="{{ asset('img/leasing.png') }}" alt="Ad" style="max-width:90vw; max-height:80vh; border-radius:8px; box-shadow:0 2px 16px rgba(0,0,0,0.3); background:#fff; display:block; margin:auto;" />
    </div>
</div>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#adModalOverlay').fadeIn(200);
        }, 500);
        // Close on close button
        $('#adModalClose').on('click', function(e) {
            $('#adModalOverlay').fadeOut(200);
        });
        // Close on clicking outside the image (on overlay only)
        $('#adModalOverlay').on('click', function(e) {
            if (e.target === this) {
                $(this).fadeOut(200);
            }
        });
        // Prevent click inside modal content from closing
        $('#adModalContent').on('click', function(e) {
            e.stopPropagation();
        });
    });
</script>

    @endsection

