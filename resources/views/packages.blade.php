@php
    $page = 'features';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Day Delegate Packages</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Features</li>
                    <li class="active">Day Delegate Packages</li>
                </ul><br>
                <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Pricing tables 2 start -->
    <div class="pricing-tables-2 content-area" style="margin-top:-55px;">
        <div class="container">
            <div class="main-title">
                <h1>THE DAY DELEGATE PACKAGES</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="pricing-1">
                        <div class="title">SILVER DAY DELEGATE PACKAGE<br><sub>(Minimum of 20 persons)</sub></div>
                        <div class="price-for-user">
                            <div class="price"><sup>&#x20A6;</sup><span class="dolar">15,000</span><br>
                                <small class="month">per delegate per day</small>
                            </div>
                        </div>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Two 750ml mineral water per delegate and one soft drink
                                    for lunch</li>
                                <li class="list-group-item">The venue hire, note pad and pen</li>
                                <li class="list-group-item">Lunch (silver menu option)</li>
                                <li class="list-group-item">Morning and afternoon coffee/tea break (silver menu option)</li>
                                <li class="list-group-item">Free standard AV equipment, flip chart, projector</li>
                                <li class="list-group-item">Book and pay before event date and get further 10% discount on room rate</li>
                                <li class="list-group-item">One complimentary room for every 20 booked</li>
                                <li class="list-group-item"><br></li>
                            </ul>
                        </div>
                        <div class="button"><a href="#" class="btn btn-theme pricing-btn" data-toggle="modal" data-target="#conference">Get started</a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="pricing-1">
                        <div class="title">GOLDEN DAY DELEGATE PACKAGE<br><sub>(Minimum of 20 persons)</sub></div>
                        <div class="price-for-user">
                            <div class="price"><sup>&#x20A6;</sup><span class="dolar">17,500</span><br>
                                <small class="month">per delegate per day</small>
                            </div>
                        </div>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Two 750ml mineral water per delegate and one soft drink
                                    for lunch</li>
                                <li class="list-group-item">The venue hire, note pad and pen</li>
                                <li class="list-group-item">Lunch (golden menu option)</li>
                                <li class="list-group-item">Morning and afternoon coffee/tea break (golden menu option)
                                </li>
                                <li class="list-group-item">Free standard AV equipment, flip chart, projector</li>
                                <li class="list-group-item">Book and pay before event date and get further 10% discount on room rate</li>
                                <li class="list-group-item">One complimentary room for every 20 booked</li>
                                <li class="list-group-item"><br></li>
                            </ul>
                        </div>
                        <div class="button"><a href="#" class="btn btn-theme pricing-btn" data-toggle="modal" data-target="#conference">Get started</a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="pricing-1">
                        <div class="title">PLATINUM DAY DELEGATE PACKAGE<br><sub>(Minimum of 20 persons)</sub></div>
                        <div class="price-for-user">
                            <div class="price"><sup>&#x20A6;</sup><span class="dolar">25,000</span><br>
                                <small class="month">per delegate per day</small>
                            </div>
                        </div>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Welcome/arrival coffee break</li>
                                <li class="list-group-item">Two 750ml mineral water per delegate and one soft drink
                                    for lunch</li>
                                <li class="list-group-item">The venue hire, note pad and pen</li>
                                <li class="list-group-item">Lunch (platinum menu option)</li>
                                <li class="list-group-item">Morning and afternoon coffee/tea break (platinum menu option)
                                </li>
                                <li class="list-group-item">Free standard AV equipment, flip chart, projector</li>
                                <li class="list-group-item">Book and pay before event date and get further 10% discount on room rate</li>
                                <li class="list-group-item">One complimentary room for every 20 booked</li>
                            </ul>
                        </div>
                        <div class="button"><a href="#" class="btn btn-theme pricing-btn" data-toggle="modal" data-target="#conference">Get started</a></div>
                    </div>
                </div>
                <div class="text-center"><em style="color:#026690;">Price is per delegate per day inclusive of 7.5% VAT and 10% service charge</em></div>
            </div>
        </div>
    </div>
    <!-- Pricing tables 2 end -->
@endsection
