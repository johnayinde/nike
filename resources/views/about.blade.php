@php
    $page = 'about';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>About Us</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">About Us</li>
                </ul><br>
                <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- About Institute start -->
    <div class="about-institute content-area-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <br>
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
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="about-text">
                        <!-- title -->
                        <div class="main-title-2">
                            <h1>About Landmark Nike Lake Resort</h1>
                        </div>
                        <!-- paragraph -->
                        <p align="justify">
                            Landmark Nike Lake Resort is situated on the banks of Nike Lake in Enugu Nigeria. Enjoy the perfect business getaway with breathtaking views in a very secure and tranquil setting.

                            Landmark Nike Lake Resort is a short fifteen minutes drive from the airport and only ten minutes from the city centre.<br><br>

                            You will find at this serene resort everything you need to make your stay a memorable one. The resort has 210 well appointed rooms and suites, suitable for all tastes and budgets.

                            All rooms overlook the well manicured gardens or the lake and each room provides the comfort and luxury that is expected from an international three star hotel.<br><br>

                            Nearest Airport: Akanu Ibiam Airport 15km away
                            City Centre: 10 minutes from city centre...
                        </p>
                        <!-- btn -->
                        <a href="#" data-toggle="modal" data-target="#about_nike" class="btn btn-sm btn-theme">Read More</a>
                        <a href="{{ url('/booking') }}" class="btn btn-theme btn-sm">Book Now</a>

                        <!-- Modal success -->
                        <div class="modal fade" id="about_nike" role="dialog" style="z-index:100000;">
                            <div class="modal-dialog modal-md modal-default">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="color: #262D60;">
                                            <i class="fa fa-building-o"></i> About Landmark Nike Lake Resort
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- paragraph -->
                                        <p align="left">
                                            Landmark Nike Lake Resort is situated on the banks of Nike Lake in Enugu Nigeria. Enjoy the perfect business getaway with breathtaking views in a very secure and tranquil setting.

                                            Landmark Nike Lake Resort is a short fifteen minutes drive from the airport and only ten minutes from the city centre.<br><br>

                                            You will find at this serene resort everything you need to make your stay a memorable one. The resort has 210 well appointed rooms and suites, suitable for all tastes and budgets.

                                            All rooms overlook the well manicured gardens or the lake and each room
                                            provides the comfort and luxury that is expected from an international 3.5
                                            star hotel.<br><br>

                                            <b>Nearest Airport:</b> Akanu Ibiam Airport, 15km away from the resort<br><br>
                                            <b>City Centre:</b> We are located 10 minutes away from city centre.
                                            <br><br>
                                            <b>OUR VISION:</b> Our vision is to become a beacon to be looked upon in
                                            the world wide hospitality industry.<br><br>

                                            <b>OUR MISSION:</b> Our mission is to provide timely and quality service by
                                            adopting industrial best practice that creates pleasurable experience
                                            .<br><br>
                                            <b>ABOUT THE CITY</b><br>
                                            Enugu state, otherwise known as "The coal city", is located in south eastern region of Nigeria and is reputed for its teaching hospital which saw the world’s first open heart surgery. The ground on which the hotel is built is rich with history. The city’s main streets, Okpara Avenue and Ogui Rd, offer everything from shops, fashion, banks, eateries, and the stadium, alongside all the attraction of a typical Nigerian trading hub.
                                            <br><br>
                                            <b>TOWNS AND ACTIVITIES</b><br>
                                            <!-- ul -->
                                            <i class="fa fa-check-square-o" style="color:#0081ff"></i> Ohum Spiritual
                                            Water
                                            Falls
                                            45km
                                            away<br>
                                            <i class="fa fa-check-square-o" style="color:#0081ff"></i> Milken Hill 8km away<br>
                                            <i class="fa fa-check-square-o" style="color:#0081ff"></i> National Museum 10km away<br>
                                            <i class="fa fa-check-square-o" style="color:#0081ff"></i> Shopping and banking facilities 10
                                            minutes drive<br>
                                            <i class="fa fa-check-square-o" style="color:#0081ff"></i> Enugu golf club – 18 hole golf course – 12km away
                                        </p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--modal close-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Institute end -->

    <!-- Counters strat -->
    <div class="counters">
        <h1>Hotel Statistics</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 bordered-right">
                    <div class="counter-box">
                        <h1 class="counter">596714</h1>
                        <h5>Guests</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 bordered-right">
                    <div class="counter-box">
                        <h1 class="counter">201</h1>
                        <h5>Rooms</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 bordered-right">
                    <div class="counter-box">
                        <h1 class="counter">12</h1>
                        <h5>Suites</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="counter-box counter-box-2">
                        <h1 class="counter">1953767</h1>
                        <h5>Meals Served</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counters end -->

    <!-- Testimonial secion start -->
    <div class="testimonials-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div id="carouse3-example-generic" class="carousel slide" data-ride="carousel">
                            <h1>Testimonials</h1>
                            <div class="carousel-inner" role="listbox">
                                <div class="item content active clearfix">
                                    <div class="item-inner">
                                        <div class="text">
                                            <sup>
                                                <i class="fa fa-quote-left"></i>
                                            </sup>
                                            It was my first time in Nike Lake Resort, Enugu, even though I'd known of it since my university days. It did not disappoint. I love the space (as is with resorts). I took a walk by the lake (good romantic walk if you're coupled). Quite nice service. I sense it could do with more patronage. Enugu has good roads so access was fine. Got there as the South African dance troupe, Umoja, was having morning rehearsals. Love the dance. Well done, Nike Lake Resort
                                            <sub>
                                                <i class="fa fa-quote-right"></i>
                                            </sub>
                                        </div>
                                        <h4>Micheal</h4>
                                    </div>
                                </div>
                                <div class="item content clearfix">
                                    <div class="item-inner">
                                        <div class="text">
                                            <sup>
                                                <i class="fa fa-quote-left"></i>
                                            </sup>
                                            One of the most luxurious and beautiful hotels in enugu, owned by enugu state government, the hotel is now back to its glory, nice eco environment by the lakeshore, serene environment, nice rooms, comfy beds, nice customer service, security network, swimming pool.
                                            <sub>
                                                <i class="fa fa-quote-right"></i>
                                            </sub>
                                        </div>
                                        <h4>Emma Williams</h4>
                                    </div>
                                </div>
                                <div class="item content clearfix">
                                    <div class="item-inner">
                                        <div class="text">
                                            <sup>
                                                <i class="fa fa-quote-left"></i>
                                            </sup>
                                            Event hall, swimming pool, bar mini market, lake speed boat, great customer services live performance 🙌💪💪💪🙌 gused by politicians. Car park good security system 👍👌😁😁😁😁😁😁😁 great place to work and have fun with family and friends
                                            <sub>
                                                <i class="fa fa-quote-right"></i>
                                            </sub>
                                        </div>
                                        <h4>Amikable</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carouse3-example-generic" role="button" data-slide="prev">
                            <span class="slider-mover-left t-slider-l" aria-hidden="true">
                                <i class="fa fa-angle-left"></i>
                            </span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carouse3-example-generic" role="button" data-slide="next">
                            <span class="slider-mover-right t-slider-r" aria-hidden="true">
                                 <i class="fa fa-angle-right"></i>
                            </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial secion end -->

    <!-- Intro section start -->
    <div class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div class="intro-text">
                        <h3>Your Comfort</h3>
                        <p>Is our number one priority</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme hidden-xs hidden-sm">Book a Reservation
                        Now</a>
                    <a href="{{url('/booking')}}" class="btn btn-sm btn-theme hidden-md hidden-lg">Book a Reservation
                        Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- intro section end -->
@endsection
