@php
    $page = 'features';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Conferencing &amp; Events</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Features</li>
                    <li class="active">Conferencing &amp; Events</li>
                </ul><br>
                <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Events section 2 start -->
    <div class="events-secion-2 content-area">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="recent-news-theme">

                        </div>
                        <div class="events-box-content">
                            <h1><a href="#">Convention Hall</a></h1>
                            <p>
                                The convention hall is providing ideal venue for your AGM's and conferences all year
                                round<br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="recent-news-theme">

                        </div>
                        <div class="events-box-content">
                            <h1><a href="#">Omenala Bush Bar</a></h1>
                            <p>
                                Omenala bush bar is one of our numerous Event venues. It has a cool lakeside view
                                with native consumables and a calm well ventilated environment
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="recent-news-theme">

                        </div>
                        <div class="events-box-content">
                            <h1><a href="#">Conferencing Equipment</a></h1>
                            <p>
                                We provide state of the art conference equipment to take care of all your
                                conferencing technical needs<br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="recent-news-theme">

                        </div>
                        <div class="events-box-content">
                            <h1><a href="#">Picnic Area</a></h1>
                            <p>
                                Set out for your relaxation. This area will surely give you a good feeling about
                                nature and its beauty
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="recent-news-theme">

                        </div>
                        <div class="events-box-content">
                            <h1><a href="#">Soccer Field</a></h1>
                            <p>
                                We have a standard football field for your physical health needs and
                                exercises<br><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="recent-news-theme">

                        </div>
                        <div class="events-box-content">
                            <h1><a href="#">Children's Park</a></h1>
                            <p>
                                We provide recreation park seating for family and friends. Your kids will totally
                                enjoy this place because they'll get the fun they deserve
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="recent-news-theme">

                        </div>
                        <div class="events-box-content">
                            <h1><a href="#">Villa View</a></h1>
                            <p>
                                The villas were purposely placed with enough space to give you the best views for your
                                delight and offering distinct choices for weddings and lodging
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="recent-news-theme">

                        </div>
                        <div class="events-box-content">
                            <h1><a href="#">Boardrooms</a></h1>
                            <p>
                                We provide boardrooms for your break - away meetings. A specially decorated room
                                designed to serve your executive purposes
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Events section 2end -->

    <!-- Intro section start -->
    <div class="intro-section" style="margin-top: -19.8px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div class="intro-text">
                        <h3>Your Comfort</h3>
                        <p>Is our number one priority</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme hidden-xs hidden-sm">Book a Reservation Now</a>
                    <a href="{{url('/booking')}}" class="btn btn-sm btn-theme hidden-md hidden-lg">Book a Reservation Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- intro section end -->
@endsection
