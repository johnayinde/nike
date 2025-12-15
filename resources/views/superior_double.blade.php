@php
    $page = 'rooms';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Superior Room (Double)</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Rooms</li>
                    <li class="active">Superior Room (Double)</li>
                </ul><br>
                <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Rooms detail section start -->
    <div class="content-area rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <!-- Heading courses start -->
                    <div class="heading-rooms  clearfix sidebar-widget">
                        <div class="pull-left">
                            <h3>Superior Room (Double)</h3>
                        </div>
                        <div class="pull-right">
                            <h3><span>&#x20A6;75,000 / Night</span></h3>
                        </div>
                    </div>
                    <!-- Heading courses end -->

                    <!-- sidebar start -->
                    <div class="rooms-detail-slider sidebar-widget">
                        <!--  Rooms detail slider start -->
                        <div class="rooms-detail-slider simple-slider mb-40 ">
                            <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                <div class="carousel-outer">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item">
                                            <img src="{{asset('img/room/superior_d/1.jpg')}}" class="thumb-preview" alt="Superior Room (Double)">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/superior_d/3.jpg')}}" class="thumb-preview" alt="Superior Room (Double)">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/superior_d/4.jpg')}}" class="thumb-preview" alt="Superior Room (Double)">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/superior_d/5.jpg')}}" class="thumb-preview" alt="Superior Room (Double)">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/superior_d/6.jpg')}}" class="thumb-preview" alt="Superior Room (Double)">
                                        </div>
                                        <div class="item active">
                                            <img src="{{asset('img/room/superior_d/7.jpg')}}" class="thumb-preview" alt="Superior Room (Double)">
                                        </div>
                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                    <span class="slider-mover-left t-slider-l" aria-hidden="true">
                                        <i class="fa fa-angle-left"></i>
                                    </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                    <span class="slider-mover-right t-slider-r" aria-hidden="true">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <!-- Indicators -->
                                <ol class="carousel-indicators thumbs visible-lg visible-md">
                                    <li data-target="#carousel-custom" data-slide-to="0" class="">
                                        <img src="{{asset('img/room/superior_d/1.jpg')}}" alt="Superior Room (Double)">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="2" class="">
                                        <img src="{{asset('img/room/superior_d/3.jpg')}}" alt="Superior Room (Double)">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="3" class="">
                                        <img src="{{asset('img/room/superior_d/4.jpg')}}" alt="Superior Room (Double)">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="4" class="">
                                        <img src="{{asset('img/room/superior_d/5.jpg')}}" alt="Superior Room (Double)">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="5" class="">
                                        <img src="{{asset('img/room/superior_d/6.jpg')}}" alt="Superior Room (Double)">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="6" class="">
                                        <img src="{{asset('img/room/superior_d/7.jpg')}}" alt="Superior Room (Double)">
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <!-- Rooms detail slider end -->

                        <!-- Rooms description start -->
                        <div class="panel-box course-panel-box course-description">
                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active features in" id="tab2default">
                                            <!-- Rooms features start -->
                                            <div class="rooms-features">
                                                <h3>Room Features</h3>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-air-conditioning"></i>Air conditioning
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-balcony-and-door"></i>Private Balcony
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-bath"></i>En-Suite Bathroom
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-bed"></i>Double Bed
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-graph-line-screen"></i>Flat
                                                                Screen TV
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-parking"></i>Free Parking Space
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="fa fa-coffee"></i>Coffee/Tea Station
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-pencil-square-o"></i>Writing Desk
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-phone-receiver"></i>Telephone
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rooms features end -->
                                        </div>
                                        <!-- btn -->
                                        <div class="text-center"><br><br>
                                            <a href="{{url('/booking')}}" class="btn btn-sm
                                            btn-theme">Book A Reservation Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rooms description end -->
                    </div>
                    <!-- sidebar end -->

                </div>

            </div>
        </div>
    </div>
    <!-- Rooms detail section end -->
@endsection
