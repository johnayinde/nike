@php
    $page = 'rooms';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Executive Suite</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Rooms</li>
                    <li class="active">Executive Suite</li>
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
                            <h3>Executive Suite</h3>
                        </div>
                        <div class="pull-right">
                            <h3><span>&#x20A6;130,000 / Night</span></h3>
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
                                        <div class="item active">
                                            <img src="{{asset('img/room/executive/1.jpg')}}" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/executive/2.jpg')}}" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/executive/3.jpg')}}" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/executive/4.jpg')}}" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/executive/5.jpg')}}" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/executive/6.jpg')}}" class="thumb-preview" alt="Chevrolet Impala">
                                        </div>
                                        <div class="item">
                                            <img src="{{asset('img/room/executive/7.jpg')}}" class="thumb-preview" alt="Chevrolet Impala">
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
                                        <img src="{{asset('img/room/executive/1.jpg')}}" alt="Chevrolet Impala">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="1" class="">
                                        <img src="{{asset('img/room/executive/2.jpg')}}" alt="Chevrolet Impala">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="2" class="">
                                        <img src="{{asset('img/room/executive/3.jpg')}}" alt="Chevrolet Impala">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="2" class="">
                                        <img src="{{asset('img/room/executive/4.jpg')}}" alt="Chevrolet Impala">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="2" class="">
                                        <img src="{{asset('img/room/executive/5.jpg')}}" alt="Chevrolet Impala">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="2" class="">
                                        <img src="{{asset('img/room/executive/6.jpg')}}" alt="Chevrolet Impala">
                                    </li>
                                    <li data-target="#carousel-custom" data-slide-to="2" class="">
                                        <img src="{{asset('img/room/executive/7.jpg')}}" alt="Chevrolet Impala">
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
                                                            <li>
                                                                <i class="fa fa-pencil-square-o"></i>Writing Desk
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="fa fa-glass"></i>Separate Lounge and Bar
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-square"></i>Fridge
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-cutlery"></i>Kitchenette
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-coffee"></i>Coffee/Tea Station
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-bed"></i>Double Room
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-graph-line-screen"></i>Flat
                                                                Screen TV
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-parking"></i>Free Parking Space
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-phone-receiver"></i>Telephone
                                                            </li>
                </ul><br>
            </div>
        </div>
    </div>
                                            <!-- Rooms features end -->
                                        </div>
                                        <!-- btn -->
                                        <div class="text-center"><br><br>
                                            <a href="{{url('/booking')}}" data-toggle="modal" data-target="#about_nike" class="btn btn-sm
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
    </div>
    <!-- Rooms detail section end -->
@endsection
