@php
    $page = 'contact';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Contact Us</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Contact Us</li>
                </ul><br>
                <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Contact 1 start -->
    <div class="contact-1 content-area-6">
        <div class="container">
            <div class="main-title">
                <h1>Contact Us</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <!-- Contact form start -->
                    <div class="contact-form">
                        <form id="contact_form" action="{{route('contact_msg')}}" method="POST">
                            @csrf
                            <div class="row">
                                <input type="text" name="first-name" placeholder="don't enter anything here" autocomplete="off" {{old('first-name')}} id="first-name">
                                <script>
                                    $('#first-name').hide();
                                </script>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group fullname">
                                        <input type="text" id="fullname" name="full-name" class="input-text @error('full-name') is-invalid @enderror" placeholder="Full Name" required value="{{ old('full-name') }}">
                                        @error('full-name')
                                        <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        <script !src="">
                                            $(document).ready(function(){
                                                $("#fullname").css("border", "1px red solid");
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group enter-email">
                                        <input id="email" type="email" name="email" class="input-text @error('email') is-invalid @enderror" placeholder="Enter email" required value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        <script !src="">
                                            $(document).ready(function(){
                                                $("#email").css("border", "1px red solid");
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group number">
                                        <input type="text" id="phone" name="phone" class="input-text @error('phone') is-invalid @enderror" placeholder="Phone Number" required value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            <script !src="">
                                                $(document).ready(function(){
                                                    $("#phone").css("border", "1px red solid");
                                                });
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" id="subject" name="subject" class="input-text @error('subject') is-invalid @enderror" placeholder="Subject" required value="{{ old('subject') }}">
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            <script !src="">
                                                $(document).ready(function(){
                                                    $("#subject").css("border", "1px red solid");
                                                });
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                    <div class="form-group message">
                                        <textarea class="input-text" id="message" name="message" placeholder="Write your message" required>{{ old('message') }}</textarea>
                                        @error('message')
                                        <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        <script !src="">
                                            $(document).ready(function(){
                                                $("#message").css("border", "1px red solid");
                                            });
                                        </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                    <div class="send-btn mb-0">
                                        <button type="submit" class="btn-md btn-theme">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact form end -->
                </div>
                <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
                    <!-- Contact details start -->
                    <div class="contact-details">
                        <div class="main-title-2">
                            <h3>Contact Details</h3>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="media-body">
                                <h4>Office Address</h4>
                                <a href="https://maps.app.goo.gl/XG9mFmsjHss8qcku5" target="_blank">Nike Lake Road, Abakpa Nike, P.M.B. 01193, Enugu state Nigeria,</a>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4>Phone Number</h4>
                                <p>
                                    <a href="tel:+234 805 055 7000">Phone 1: +234 805 055 7000</a>
                                </p>
                                <p>
                                    <a href="tel:+234 805 755 7000">Phone 2: +234 805 755 7000</a>
                                </p>
                            </div>
                        </div>
                        <div class="media mb-0">
                            <div class="media-left">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <h4>Email Address</h4>
                                <p>
                                    <a href="mailto:nikelakeresort@landmarkafrica.com">nikelakeresort@landmarkafrica.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Contact details end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-1 end -->

    <div class="main-title">
        <h1>Locate Us</h1>
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.09055124445!2d7.512586799999995!3d6.510221799999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a3d22732d97f%3A0x73f5146cd90c250e!2sNike%20Lake%20Hotel%20Resort!5e0!3m2!1sen!2sng!4v1608639587909!5m2!1sen!2sng" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    <!-- Intro section start -->
    <div class="intro-section" style="margin-top: -4px;">
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

    <!-- Modal success -->
    <div class="modal fade" id="success_modal" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-sm modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: green;">
                        <i class="fa fa-check-circle"></i> Done!
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h1 style="color: green;"><i class="fa fa-check-circle-o"></i></h1>
                    <p>{{session('success')}} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->
@endsection
