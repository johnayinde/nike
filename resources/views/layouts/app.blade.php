<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var
            f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N63MS48');
    </script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- End Google Tag Manager -->
    @php
        if(isset($page) && $page == 'about'){
            ?>
                <title>Nike Lake Resort - About</title>
            <?php
        }
        else if(isset($page) && $page == 'rooms'){
            ?>
                <title>Nike Lake Resort - Rooms</title>
            <?php
        }
        else if(isset($page) && $page == 'facilities'){
            ?>
                <title>Nike Lake Resort - Facilities &amp; Packages</title>
            <?php
        }
        else if(isset($page) && $page == 'gallery'){
            ?>
                <title>Nike Lake Resort - Gallery</title>
            <?php
        }
        else if(isset($page) && $page == 'blog'){
            ?>
                <title>Nike Lake Resort - Blog</title>
            <?php
        }
        else if(isset($page) && $page == 'booking'){
            ?>
                <title>Nike Lake Resort - Booking</title>
            <?php
        }
        else if(isset($page) && $page == 'contact'){
            ?>
                <title>Nike Lake Resort - Contact</title>
            <?php
        }
        else{
            ?>
                <title>Nike Lake Resort - Home</title>
            <?php
        }
    @endphp

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-submenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.min.css')}}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('css/skins/blue-light-2.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">

    <!-- Fonts -->
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700')}}">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/ie10-viewport-bug-workaround.css')}}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="{{asset('js/ie8-responsive-file-warning.js')}}"></script><![endif]-->
    <script src="{{asset('js/ie-emulation-modes-warning.js')}}"></script>

    <!-- HTML5 shim and Respond.js')}} for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="{{asset('js/html5shiv.min.js')}}"></script>
    <script  src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
    <style type="text/css" media="screen">
        table {
            counter-reset: row-num 0;
        }
        table tr.tr {
            counter-increment: row-num;
        }
        table tr.tr td:first-child::before {
            content: counter(row-num) ". ";
        }
    </style>
</head>
<body>
    <script src="{{asset('js/jquery-2.2.0.min.js')}}"></script>

    @yield('slider')
    <!-- Main header start -->
    <header class="main-header main-header-2 main-header-3" style="background-color: #1b1e21;">
        <!-- Top header start -->
        <header class="top-header top-header-3 hidden-xs" id="">
            <div class="container" style="display:block;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                        <div class="list-inline">
                            <li>
                                <a href="https://web.facebook.com/nikelakeresort" target="_blank" class="facebook">
                                    <i class="fa fa-facebook"></i> Facebook
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/nikelakeresort" target="_blank" class="twitter">
                                    <i class="fa fa-twitter"></i> Twitter
                                </a>
                            </li>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                        <ul class="social-list clearfix pull-right">
                            <li>
                                <a class="sign-in" href="https://webmail-b140.web-hosting.com" target="_blank">
                                    <i class="fa fa-envelope-o"></i> Staff Mail
                                </a>
                            </li>
                            @guest
                                <li>
                                    <a href="{{route('login')}}" class="sign-in"><i class="fa fa-key"></i> Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{route('register')}}" class="sign-in"><i class="fa fa-user-plus"></i> Register</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a class="sign-in" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                <li>
                                    <a @if(Auth::User()->is_admin != Null)href="{{url('/admin/home')}}" target="_blank"@else href="#" data-toggle="modal" data-target="#user_info" @endif class="sign-in"><i class="fa fa-user-circle"></i> {{ Auth::User()->first_name }} {{ Auth::User()->last_name }}</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Top header end -->
        <div class="container"  style="width:100%;">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span style="color:#00c2f9;font-size:7px;position:relative;top:-6px;">MENU</span>
                    </button>
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{asset('img/logos/white-logo.png')}}" alt="logo" />
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                    <ul class="nav navbar-nav">
                        <li class="@php if (isset($page) && $page == 'home'){echo 'active';} @endphp">
                            <a href="{{ url('/') }}">
                                Home
                            </a>
                        </li>

                        <li class="dropdown @php if (isset($page) && $page == 'about'){echo 'active';} @endphp">
                            <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                                About Us<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/about') }}">Who We Are</a></li>
                                <li><a href="{{ url('/facilities') }}">Our Facilities</a></li>
                            </ul>
                        </li>

                        <li class="dropdown @php if (isset($page) && $page == 'rooms'){echo 'active';} @endphp">
                            <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                                Rooms<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/superior') }}">Superior Room (King Size Bed)</a></li>
                                <li><a href="{{ url('/superior_double') }}">Superior Room(Double) (King Size Bed)</a></li>
                                <li><a href="{{ url('/executive') }}">Executive Suite (King Size Bed)</a></li>
                                <li><a href="{{ url('/diplomatic') }}">Diplomatic Suite (King Size Bed)</a></li>
                                <li><a href="{{ url('/presidential') }}">Presidential Suite (King Size Bed)</a></li>
                            </ul>
                        </li>

                        <li class="dropdown @php if (isset($page) && $page == 'features'){echo 'active';} @endphp">
                            <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                                Eventives<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/conferencing') }}">Conferencing &amp; Event Venues</a></li>
                                <li><a href="{{ url('/packages') }}">Day Delegate Packages</a></li>
                                <li><a href="{{ url('/menus') }}">Meals &amp; Menus</a></li>
                            </ul>
                        </li>

                        <li class="@php if (isset($page) && $page == 'gallery'){echo 'active';} @endphp">
                            <a href="{{ url('/gallery') }}" aria-expanded="false">
                                Gallery
                            </a>
                        </li>

                        <li class="@php if (isset($page) && $page == 'blog'){echo 'active';} @endphp">
                            <a href="{{ url('/blog') }}" aria-expanded="false">
                                Blog
                            </a>
                        </li>

                        <li class="dropdown @php if (isset($page) && $page == 'booking'){echo 'active';} @endphp">
                            <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                                Book a Reservation<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a  href="{{ url('/booking') }}">Rooms &amp; Suites</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#conference">Conferencing &amp; Event</a></li>
                            </ul>
                        </li>

                        <li class="dropdown @php if (isset($page) && $page == 'contact'){echo 'active';} @endphp">
                            <a href="{{ url('/contact') }}" aria-expanded="false">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" style="padding-right: 50px;">
                        @guest
                            <li>
                                <a href="{{route('login')}}" class="btn-navbar btn btn-sm btn-white-sm-outline btn-round">
                                    <i class="fa fa-arrow-circle-o-right"></i> Nike Select Login
                                </a>
                            </li>
                        @endguest
                        <li>
                            <a href="{{route('booking')}}" class="btn-navbar btn btn-sm btn-white-sm-outline btn-round">
                                <i class="fa fa-ticket"></i> Book Now
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- /.navbar-collapse -->
                <!-- /.container -->
            </nav>

            <div class="header-search animated fadeInDown" style="width:98%;">
                <form class="form-inline">
                    <input type="text" class="form-control" id="searchKey" placeholder="Search...">
                    <div class="search-btns">
                        <button type="submit" class="btn btn-default">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </header><br>
    <!-- Main header end -->

    @yield('content')

    <!-- Footer start -->
    <footer class="main-footer clearfix">
        <div class="container">
            <!-- Footer info-->
            <div class="footer-info">
                <div class="row">
                    <!-- About us -->
                    <div class="col-lg-5 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="footer-logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{asset('img/logos/white-logo.png')}}" alt="white-logo">
                                </a>
                                <em style="color:#fb9b74;"> &nbsp;Where Great Minds Meet...</em>
                            </div>
                            <p>
                                Nike Lake Resort is situated on the banks of Nike Lake in Enugu Nigeria. Enjoy the
                                perfect business getaway with breathtaking views in a very secure and tranquil
                                setting. Nike Lake Resort is a short fifteen minutes drive from the airport and only
                                ten minutes from the city centre...
                            </p>
                            <p>
                                <a href="{{ url('/about') }}" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                            </p>
                        </div>
                    </div>
                    <!-- Newsletter -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item newsletter">
                            <div class="main-title-2">
                                <h1>Quick Links</h1>
                            </div>
                            <div class="">
                                <ul class="personal-info">
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/about') }}">About Us</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/gallery') }}">Gallery</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/blog') }}">Blog</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/login') }}">Login</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/register') }}">Register</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ url('/booking') }}">Book Reservation</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="https://webmail-b140.web-hosting.com" target="_blank">Staff Mail</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Us -->
                    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-item">
                            <div class="main-title-2">
                                <h1>Contact Us</h1>
                            </div>
                            <ul class="personal-info">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    Nike Lake Road, Abakpa Nike, P.M.B. 01193, Enugu state Nigeria,
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    Email:<a href="mailto:info@nikelakeresorthotel.com">guestrelations@nikelakeresorthotel.com</a>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    Phone 1: <a href="tel:+234 805 055 7000 ">+234 805 055 7000 </a>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    Phone 2: <a href="tel:+234 805 755 7000">+234 805 755 7000 </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <ul class="social-list">
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="https://web.facebook.com/nikelakeresort" target="_blank" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="https://twitter.com/nikelakeresort" target="_blank"  class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Copy right start -->
    <div class="copy-right">
        <div class="container">
            &copy; @php echo date('Y'); @endphp <a href="http://osystems.com/" target="_blank">Nike Lake Resort</a>.
            Designed
            by O-systems.
        </div>
    </div>
    <!-- Copy end right-->
    @guest

    @else
        <!-- Modal success -->
        <div class="modal fade" id="user_info" role="dialog" style="z-index:100000;">
            <div class="modal-dialog modal-lg modal-default">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color: green;">
                            <i class="fa fa-user-circle"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" id="following" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true" style="border-radius:0px;"></span>
                                    <div class="hidden-xs">Profile</div>
                                </button>
                            </div>
                            <div class="btn-group" role="group" style="border-radius:0px;">
                                <button type="button" id="stars" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="fa fa-files-o" aria-hidden="true" style="border-radius:0px;"></span>
                                    <div class="hidden-xs">My Orders</div>
                                </button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" id="following" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="fa fa-key" aria-hidden="true" style="border-radius:0px;"></span>
                                    <div class="hidden-xs">Change Password</div>
                                </button>
                            </div>
                        </div>

                        <div class="well" style="border-radius:0px;">
                            <div class="tab-content">
                                <div class="tab-pane fade in" id="tab3">
                                    <div class="table-responsive" style="overflow: scroll;height: 400px;">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">DATE</th>
                                                    <th scope="col">REF NUMBER</th>
                                                    <th scope="col">DESCRIPTION</th>
                                                    <th scope="col">CHECKIN</th>
                                                    <th scope="col">CHECKOUT</th>
                                                    <th scope="col">AMOUNT</th>
                                                    <th scope="col">ORDER STATUS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if($bookings)
                                                @foreach($bookings as $booking)
                                                    <tr class="tr">
                                                        <td></td>
                                                        <td>{{$booking->created_at->format('d/m/Y')}}</td>
                                                        <td>{{$booking->raveref}}</td>
                                                        <td>{{$booking->num_of_rooms}} {{$booking->room}}</td>
                                                        <td>{{date("d/m/Y", strtotime($booking->checkin))}}</td>
                                                        <td>{{date("d/m/Y", strtotime($booking->checkout))}}</td>
                                                        <td>&#x20A6; {{number_format($booking->amount)}}</td>
                                                        <td>{{$booking->order_status}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade in active" id="tab1">
                                    <form method="post" action="{{route('update_profile')}}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row search-your-details">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="text" name="fname" required disabled id="profile_fname" class="btn-default form-control" placeholder="First Name" value="{{Auth::User()->first_name}}">
                                                        </div>
                                                    </div>
                                                    @error('fname')
                                                        <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        <script !src="">
                                                            $(document).ready(function(){
                                                                $("#profile_fname").css("border", "1px red solid");
                                                            });
                                                        </script>
                                                    @enderror
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="text" name="lname" required disabled id="profile_lname" class="btn-default form-control" placeholder="Last Name" value="{{Auth::User()->last_name}}">
                                                        </div>
                                                        @error('lname')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#profile_lname").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="email" name="email" required disabled id="profile_email" class="btn-default form-control" placeholder="Email" value="{{Auth::User()->email}}">
                                                        </div>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#profile_email").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="text" name="phone" required disabled id="profile_phone" class="btn-default form-control" placeholder="Phone" value="{{Auth::User()->phone}}">
                                                        </div>
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#profile_phone").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <button type="button" onclick="enableFunction()" class="search-button btn-theme" id="edit_profile">Cick Here to Edit Profile</button>
                                                            <button type="submit" class="search-button btn-theme" id="save_changes">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade in" id="tab2">
                                    <form method="post" action="{{route('password')}}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row search-your-details">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="password" name="password" required id="new_password" class="btn-default form-control" placeholder="Enter New Password" value="" minlength="8">
                                                        </div>
                                                        @error('new_password')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#new_password").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="password" name="password_confirmation" required id="c_new_password" class="btn-default form-control" placeholder="Enter Password Again" value="" minlength="8">
                                                        </div>
                                                        @error('c_new_password')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#c_new_password").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="search-button btn-theme" id="save_pwd">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--modal close-->
    @endguest

    <!-- Modal success -->
    <div class="modal fade" id="success_modal" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

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
                    <p>{{session('success')}} </p>`
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->
    <!-- Modal success -->
    <div class="modal fade" id="update_modal" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

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
                    <p>{{session('updated')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->
    <!-- Modal success -->
    <div class="modal fade" id="something" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: green;">
                        <i class="fa fa-check-circle"></i> Room is Available!
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h1 style="color: green;"><i class="fa fa-check-circle-o"></i><br></h1>
                    <p>{{session('something')}} </p>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/booking') }}"><button type="button" class="btn btn-primary">Book Now</button></a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->
    <!-- Modal success -->
    <div class="modal fade" id="nothing" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: maroon;">
                        <i class="fa fa-close"></i> Room Unavailable
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h1 style="color: maroon;"><i class="fa fa-window-close"></i><br></h1>
                    <p>{{session('nothing')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->

    <!-- Modal success -->
    <div class="modal fade" id="alert_one" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-sm modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: maroon;">
                        <i class="fa fa-warning"></i> Error
                    </h4>
                </div>
                <div class="modal-body">
                    <p id="error_message"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->

    <!-- Modal success -->
    <div class="modal fade" id="conference" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #0361b4;">
                        <i class="fa fa-birthday-cake"></i> Conferencing &amp; Events Booking
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h4 id=""><b>Contact us for your Conferences & Events Reservation</b></h4>
                    <p><a href="tel:+2348068814994" class="btn btn-theme btn-lg"><i class="fa fa-phone"></i> +234 806 881 4994</a></p>
                    <p><a href="https://wa.me/2348068814994" class="btn btn-theme btn-lg"><i class="fa fa-whatsapp"></i> Chat on WhatsApp</a></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->

    <!-- Js files-->
    <script src="{{asset('js/jquery-2.2.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-submenu.js')}}"></script>
    <script src="{{asset('js/jquery.mb.YTPlayer.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.js')}}"></script>
    <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/jquery.filterizr.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
    <!-- Custom javascript -->

    <script type="text/javascript">

        var width = $(window).width();
        $(document).ready(function(){
            if (width < 768) {
                $('.navbar-collapse').css("background-color", "#000");
                //alert('d');
                // $('.navbar-collapse').css("display", "block");
            }
        });

        new WOW().init();


        $(document).ready(function() {
            $(".btn-pref .btn").click(function () {
                $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
                // $(".tab").addClass("active"); // instead of this do the below
                $(this).removeClass("btn-default").addClass("btn-primary");
            });
        });

        $('#searcheckout').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight:'TRUE',
            startDate: '+2d',
            autoclose: true,
        })
        $('#searcheckin').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight:'TRUE',
            startDate: '+1d',
            autoclose: true,
        })

        $('#checkin_date').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight:'TRUE',
            startDate: '+1d',
            autoclose: true
        })

        $('#searchnow').click(function(){
            let checkin = $("#searcheckin").datepicker("getDate");

            let checkout = $("#searcheckout").datepicker("getDate");
            let diffDaysm = Math.round((checkout-checkin) / (1000 * 60 * 60 * 24));

            if(checkin == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You did not enter your Checkin Date";
                return false
            }
            else if(checkout == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You did not enter your Checkout Date";
                return false
            }
            else if(diffDaysm == 0){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your Checkin Date cannot be same with your " +
                    "Checkout Date";
                return false
            }
            else if(diffDaysm < 0){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your Checkin Date cannot come after your " +
                    "Checkout Date";
                return false
            }
        });

    </script>

    <script>
        $('#save_changes').hide();

        function enableFunction() {
            $('#save_changes').show();
            $('#edit_profile').hide();
            document.getElementById("profile_fname").disabled = false;
            document.getElementById("profile_lname").disabled = false;
            document.getElementById("profile_email").disabled = false;
            document.getElementById("profile_phone").disabled = false;
        }

        var password = document.getElementById("new_password")
            , confirm_password = document.getElementById("c_new_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

    </script>

    @if($errors->has('email') || $errors->has('password')))
    <script type="text/javascript" charset="utf-8" async defer>
        if(document.getElementById("email_msg").innerHTML != 'The email has already been taken.' ){
            $(window).load(function(){
                $("#login_modal").modal("show");
                $("#email_msg").hide();
            });
        }
        else{
            $('#step2').show('');
            $('#step1').hide('');
            $('#step2_button').removeClass("disabled");
            $('#step1_button').removeClass("active");
            $('#step2_button').addClass("active");
        }
    </script>
    @endif

    @if(session()->has('modal_id'))
        <script type="text/javascript" charset="utf-8" async defer>
            $(window).load(function(){
                $("#{{Session::get('modal_id')}}").modal("show");
            });
        </script>
    @endif

    @if(session()->has('success'))
        <script type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
                $("#success_modal").modal("show");
            });
        </script>
    @endif

    @if(session()->has('updated'))
        <script type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
                $("#update_modal").modal("show");
            });
        </script>
    @endif

    @if(session()->has('nothing'))
        <script type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
                $("#nothing").modal("show");
            });
        </script>
    @endif
    @if(session()->has('something'))
        <script type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
                $("#something").modal("show");
            });
        </script>
    @endif

    <script id="dsq-count-scr" src="//nikelakeresorthotel-com.disqus.com/count.js" async></script>

    </body>
</html>
