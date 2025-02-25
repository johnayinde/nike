@php
    $page = 'about';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>All Facilities</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Features</li>
                    <li class="active">All Facilities</li>
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
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Villas</a></h1>
                            <p>
                                The self-catering villas consist of five three-bedroom duplexes and five two-bedroom
                                bungalows. All villas are tastefully furnished for long term residency
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Tennis Courts</a></h1>
                            <p>
                                We have two standard tennis courts for your fitness and recreational
                                periods<br><br><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Well Equipped Gym</a></h1>
                            <p>
                                A well equipped Gym for your all round body fitness. With this, you will surely enjoy
                                your routine exercise<br><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Basket Ball Court</a></h1>
                            <p>
                                We have a basket ball court that you can relax, entertain, and relieve yourself of any form of stress or pain. You can also learn how to play and make new friends.You will have a lot of experience about our hotel after visiting and lots of good stories to tell
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Swimming Pool</a></h1>
                            <p>
                                Our Olympic sized swimming pool with accompanying children splash pool for your family and friends
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Gift/Curio Shop</a></h1>
                            <p>
                                We have a Gift/Curio Shop where you can buy any sort of gift and surprise your loved
                                ones
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Boutique</a></h1>
                            <p>
                                Our top class boutique have got you covered, with available stock ranging from hats,
                                shirts, belts to trousers, shoes, etc. you have all you need
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Bookshop</a></h1>
                            <p>
                                You can get your newspapers, novels, magazines and other
                                published text materials at our well stocked bookshop<br><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Massage Therapy Centre</a></h1>
                            <p>
                                Relax your mind with super nice massage from our professionals
                                who has years of experience to provide the best of service<br><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Business Centre</a></h1>
                            <p>
                                Print, photocopy, laminate &amp; bind your documents at our well
                                equipped business center. We also offer other exclusive services like typing,
                                document editing, etc. at our business center
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Free Wi-Fi</a></h1>
                            <p>
                                Every one needs internet access especially in our ever evolving
                                society of internet powered activities and businesses. Having
                                this in mind we have made provison for free wifi access for our
                                guests
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="events-box">
                        <div class="events-box-content">
                            <h1><a href="#">Volley Ball Court</a></h1>
                            <p>
                                A standard volley ball court is available to all volley ball
                                lovers and for everyone to play, spectate and maintain body
                                fitness<br><br><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Events section 2end -->
@endsection
