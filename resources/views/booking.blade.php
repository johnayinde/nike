@php
    $page = 'booking';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Book a Reservation</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Book a Reservation</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Booking flow start -->
    <div class="booking-flow content-area-10">
        <div class="container">
            <section style="margin-top:-80px;">
                <div class="wizard">
                    <form id="contact_form" action="{{ route('payment') }}" method="POST">
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <!-- Search area box 2 start -->
                                <div class="search-area-box-2 search-area-box-6">
                                    <div class="search-contents">
                                        <div class="row search-your-details" style="margin-top:-23px;padding-bottom:15px;padding-right:15px;padding-left:15px;">
                                            <div class="col-md-12">
                                                @guest
                                                    <a href="#" data-toggle="modal" data-target="#login_modal" class="btn search-button btn-theme" style="width:250px;">
                                                        Sign in for faster booking
                                                    </a>
                                                @endguest
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="search-your-rooms mt-20">
                                                    <br>
                                                    <h2 class="hidden-xs hidden-sm">Enter Your <span>Booking</span> Details</h2>
                                                    <h2 class="hidden-lg hidden-md">Enter Your<span> Booking Details</span></h2><br>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 col-md-7">
                                                <div class="row">
                                                    <input type="hidden" name="payment_method" value="both" /> <!-- Can be card, account, both -->
                                                    <input type="hidden" id="description" name="description" value="" /> <!-- Replace the value with your transaction description -->
                                                    <input type="hidden" name="country" value="NG" /> <!-- Replace the value with your transaction country -->
                                                    <input type="hidden" name="currency" value="NGN" /> <!-- Replace the value with your transaction currency -->
                                                    <input type="hidden" name="ref" value="@php echo uniqid().rand(0,9)
                                                    .rand(0,9).rand(0,9).date("s"); @endphp" />
                                                    <input type="hidden" name="amount" class="input-text @error('amount')
                                                        is-invalid @enderror" id="total_price" autocomplete="cc-number" value="{{ old('amount') }}">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group checkin_date">
                                                            <label>Checkin Date</label>
                                                            <input type="text" name="checkin" class="btn-default datepicker @error('checkin') is-invalid @enderror" id="checkin_date" required onchange="cost_calculator();next_date();" readonly value="{{ old('checkin') }}">
                                                            @error('checkin')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#checkin_date").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group checkout_date">
                                                            <label>Checkout Date</label>
                                                            <input type="text" name="checkout" class="btn-default datepicker @error('checkout') is-invalid @enderror" id="checkout_date" required onchange="cost_calculator();" readonly value="{{ old('checkout') }}">
                                                            @error('checkout')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#checkout_date").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group selected_room_input">
                                                            <label>Select Room</label>
                                                            <select class="btn-default country search-fields @error('selected_room_input') is-invalid @enderror"
                                                                    name="selected_room_input" id="selected_room_input" onChange="cost_calculator();">
                                                                <option value="{{ old('selected_room_input') }}">@if(old('selected_room_input')){{ old('selected_room_input') }}(King Size)@else --Select Room--@endif</option>
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
                                                            @error('selected_room_input')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#selected_room_input").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="z-index:999;">
                                                        <div class="form-group num_of_rooms">
                                                            <label>Number of Rooms</label>
                                                            <select class="btn-default country search-fields @error('num_of_rooms') is-invalid @enderror"
                                                                    name="num_of_rooms" id="num_of_rooms" onChange="cost_calculator();">
                                                                <option value="{{ old('num_of_rooms') }}">@if(old('num_of_rooms')){{ old('num_of_rooms') }}@else --Select Number of Rooms--@endif</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                            @error('num_of_rooms')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#num_of_rooms").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-5" style="margin-top:-69px;">
                                                <div class="booling-details-box booling-details-box-2 mrg-btm-30">
                                                    <h3 class="booking-heading-2" style="color: #fffacc">Your Stay</h3>

                                                    <div class="col-md-6">
                                                        <b><br>
                                                            <span><b>Check-in:</b></span><br>
                                                            <i id="checkin_display" class="checkin_display"></i><br><br>
                                                        </b>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b><br>
                                                            <span><b>Check-out:</b></span><br>
                                                            <i id="checkout_display" class="checkout_display"></i><br><br>
                                                        </b>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>
                                                            <span><b>Your Room:</b></span><br>
                                                            <i id="selected_room_display" class="selected_room_display"></i><br>
                                                        </b>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>
                                                            <span><b>Number of Rooms:</b></span><br>
                                                            <i id="num_of_rum_display" class="num_of_rum_display"></i><br><br><br>
                                                        </b>
                                                    </div>

                                                    <div class="price col-md-12 pull-right">
                                                        Net Amount: ₦ <span id="total_price_display" class="total_price_display">0.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="list-inline pull-left" style="margin-left:10px;">
                                                <li>
                                                    <button onclick="data_check();cost_calculator();" type="button" class="btn search-button btn-theme" id="save_continue">
                                                        Save and continue
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Search area box 2 end -->
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2" style="width: 100%;">
                                <div class="search-area-box-2 search-area-box-6">
                                    <div class="search-contents">
                                        <div class="row search-your-details" style="margin-top:-23px;padding-bottom:15px;padding-right:15px;padding-left:15px;">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="search-your-rooms mt-20">
                                                    <h2 class="hidden-xs hidden-sm">Enter Your <span>Contact</span> Info</h2>
                                                    <h2 class="hidden-lg hidden-md">Enter Your<span> Contact Info</span></h2><br>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 col-md-7">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group first_name">
                                                            <label> First Name</label>
                                                            <input type="text" name="firstname" class="btn-default @error('firstname') is-invalid @enderror" id="first_name" value="{{ old('firstname') }}@guest @else{{Auth::User()->first_name}}@endguest">
                                                            @error('firstname')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#first_name").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group lastname">
                                                            <label>Last Name</label>
                                                            <input type="text" name="lastname" class="btn-default @error('lastname') is-invalid @enderror" id="last_name" value="{{ old('lastname') }}@guest @else{{Auth::User()->last_name}}@endguest">
                                                            @error('lastname')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#last_name").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group email">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="btn-default @error('email') is-invalid @enderror" id="user_email" value="{{ old('email') }}@guest @else{{Auth::User()->email}}@endguest">
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                        <strong id="email_msg">{{ $message }}</strong>
                                                                    </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#user_email").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group phone">
                                                            <label>Phone Number</label>
                                                            <div class="phone-input-container" style="display: flex; align-items: center;">
                                                                <select name="country_code" id="country_code" class="btn-default" style="width: 120px; margin-right: 10px; flex-shrink: 0;" onchange="updatePhoneValidation();">
                                                                    <option value="+234" data-min="10" data-max="10" data-pattern="^[789][01]\d{8}$">🇳🇬 +234</option>
                                                                    <option value="+1" data-min="10" data-max="10" data-pattern="^\d{10}$">🇺🇸 +1</option>
                                                                    <option value="+44" data-min="10" data-max="11" data-pattern="^\d{10,11}$">🇬🇧 +44</option>
                                                                    <option value="+233" data-min="9" data-max="9" data-pattern="^\d{9}$">🇬🇭 +233</option>
                                                                    <option value="+27" data-min="9" data-max="9" data-pattern="^\d{9}$">🇿🇦 +27</option>
                                                                    <option value="+254" data-min="9" data-max="9" data-pattern="^[17]\d{8}$">🇰🇪 +254</option>
                                                                    <option value="+256" data-min="9" data-max="9" data-pattern="^[37]\d{8}$">🇺🇬 +256</option>
                                                                    <option value="+91" data-min="10" data-max="10" data-pattern="^[6-9]\d{9}$">🇮🇳 +91</option>
                                                                    <option value="+86" data-min="11" data-max="11" data-pattern="^1[3-9]\d{9}$">🇨🇳 +86</option>
                                                                    <option value="+49" data-min="10" data-max="12" data-pattern="^\d{10,12}$">🇩🇪 +49</option>
                                                                    <option value="+33" data-min="9" data-max="9" data-pattern="^\d{9}$">🇫🇷 +33</option>
                                                                    <option value="+971" data-min="8" data-max="9" data-pattern="^[2-9]\d{7,8}$">🇦🇪 +971</option>
                                                                </select>
                                                                <input type="text" name="phonenumber" class="btn-default @error('phonenumber') is-invalid @enderror" id="phone" 
                                                                       onchange="validatePhoneNumber(); cost_calculator();" 
                                                                       onkeyup="validatePhoneNumber();"
                                                                       placeholder="Enter phone number" 
                                                                       style="flex: 1;"
                                                                       value="{{ old('phonenumber') ?? (auth()->check() ? auth()->user()->phone : '') }}">
                                                                <input type="hidden" name="full_phone" id="full_phone" value="">
                                                            </div>
                                                            <small id="phone-help" class="form-text text-muted" style="margin-top: 5px;"></small>
                                                            <small id="phone-error" class="form-text" style="color: #d70303; margin-top: 5px; display: none;"></small>
                                                            @error('phonenumber')
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

                                                    <div class="col-md-12">
                                                        
                                                        <div class="ez-checkbox pull-left">
                                                            <label>
                                                                <input type="checkbox" class="ez-hide" id="iwanreg" {{ old('remember') ? 'checked' : '' }}>
                                                                I would like to create an account for faster booking next time (Optional)<br><br>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="password_control">
                                                        <div class="form-group phone">
                                                            <label>Password</label>
                                                            <input id="password" type="password" class="btn-default @error('user_password')
                                                                is-invalid @enderror" name="user_password" autocomplete="new-password"
                                                                   placeholder="Password" onchange="cost_calculator();">
                                                            @error('user_password')
                                                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            <script !src="">
                                                                $(document).ready(function(){
                                                                    $("#password").css("border", "1px red solid");
                                                                });
                                                            </script>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="c_password">
                                                        <div class="form-group phone">
                                                            <label>Confirm Password</label>
                                                            <input id="password-confirm" type="password" class="btn-default"
                                                                   name="password_confirmation" autocomplete="new-password"
                                                                   placeholder="Enter password again" onchange="cost_calculator();">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-5 col-md-5" style="margin-top:-30px;">
                                                <div class="booling-details-box booling-details-box-2 mrg-btm-30">
                                                    <h3 class="booking-heading-2" style="color: #fffacc">Your Stay</h3>

                                                    <div class="col-md-6">
                                                        <b><br>
                                                            <span><b>Check-in:</b></span><br>
                                                            <i id="checkin_display2"></i><br><br>
                                                        </b>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b><br>
                                                            <span><b>Check-out:</b></span><br>
                                                            <i id="checkout_display2"></i><br><br>
                                                        </b>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>
                                                            <span><b>Your Room:</b></span><br>
                                                            <i id="selected_room_display2"></i><br>
                                                        </b>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>
                                                            <span><b>Number of Rooms:</b></span><br>
                                                            <i id="num_of_rum_display2"></i><br><br><br>
                                                        </b>
                                                    </div>

                                                    <div class="price col-md-12 pull-right">
                                                        Net Amount: ₦ <span id="total_price_display2">0.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <ul class="list-inline pull-left">
                                                    @guest
                                                        <li><button type="button" class="btn btn-grey" id="prev-step1">Previous</button></li>
                                                    @endguest
                                                    <li>
                                                        <button onclick="data2_check();cost_calculator();" type="button" class="btn search-button btn-theme" id="save_continue2">
                                                            Save and continue
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Search area box 2 end -->
                            </div>

                            <div class="tab-pane" role="tabpanel" id="complete" style="width: 100%;">
                                <div class="booling-details-box booling-details-box-2 mrg-btm-30" style="width: 100%;">
                                    <h3 class="booking-heading-2" id="biko_confirm">Confirm Booking Details</h3>
                                    <div class="row mrg-btm-30 col-md-12" style="width: 100%;">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h4 id="selected_room_display"></h4>
                                            <div class="col-md-6">
                                                <b><br>
                                                    <span>Check In:</span> <i id="checkin_display3"></i><br><br>
                                                    <span>Check Out:</span> <i id="checkout_display3"></i><br><br>
                                                    <span>Number of Rooms:</span> <span id="selected_room_display3"></span><br><br>
                                                    <span>Number of Rooms:</span> <span id="num_of_rum_display3"></span>
                                                </b>
                                            </div>

                                            <div class="col-md-6 pull-right">
                                                <address>
                                                    <br><strong>Name: </strong><span id="name_display"></span><br><br>
                                                    <strong>Email: </strong><span id="email_display"></span><br><br>
                                                    <strong>Phone: </strong><span id="phone_display"></span>
                                                </address><br><br><br>
                                            </div>

                                            <div class="price col-md-12 pull-right">
                                                Net Amount: ₦ <span id="total_price_display3">0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 hidden-sm hidden-xs">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="checkbox">
                                    <div class="ez-checkbox pull-left">
                                        <label>
                                            <input type="checkbox" class="ez-hide" required>
                                            By proceeding you agree to have read and understood our <a href="#" data-toggle="modal" data-target="#booking_policy"><span style="color:#00c2f9">booking policy</span></a>
                                        </label>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <ul class="list-inline pull-right">
                                    @guest
                                        <li><button type="button" class="btn btn-grey" id="prev-step2">Previous</button></li>
                                    @else
                                        <li><button type="button" class="btn btn-grey" id="prev-step1">Previous</button></li>
                                    @endguest
                                    <li><button type="submit" class="btn search-button btn-theme next-step">Confirm
                                            Booking</button></li>
                                </ul><br><br><br>
                            </div>
                        </div>
                    </form>

                    <div class="wizard-inner" style="margin-top:-45px;">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active" id="step1_button">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title=""
                                   data-original-title="Step 1" aria-expanded="false">
                                <span class="round-tab">
                                    <i class="fa fa-folder-o"></i>
                                </span>
                                </a>
                                <h3 class="booking-heading">Booking Details</h3>
                            </li>
                            @guest
                                <li role="presentation" id="step2_button">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title=""
                                       data-original-title="Step 2" aria-expanded="false">
                                        <span class="round-tab">
                                            <i class="fa fa-user-o"></i>
                                        </span>
                                    </a>
                                    <h3 class="booking-heading">Guest Details</h3>
                                </li>
                            @endguest

                            <li role="presentation" id="step3_button" @guest @else style="margin-left: 20%;" @endguest>
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title=""
                                   data-original-title="Complete">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                                </a>
                                <h3 class="booking-heading">Finish</h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
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
    <div class="modal fade" id="booking_policy" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-lg modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #0082c2;">
                        <i class="fa fa-info-circle"></i> Our Booking Policy
                    </h4>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">All bookings with Nike Lake Resort are for check-in and check-out on two different days.</li>
                        <li class="list-group-item">Checkin time is 2:00pm while Check-out time is at most 12:00pm. All late departures are subject to extra fees, at the discretion of the hotel.</li>
                        <li class="list-group-item">You can check-in anytime during the allocated time-band, all the way up to the last hour of your stay. If you show up after the cut-off time, the hotel reserves the right to refuse you.</li>
                        <li class="list-group-item">Room assignments are made at check-in.</li>
                        <li class="list-group-item">All rooms are guaranteed to accommodate two guests. Extra guests are allowed at the discretion of the hotel.</li>
                        <li class="list-group-item">You should be 18 or over to book. It is the hotel’s choice to honor the booking if you do not meet age requirements.</li>
                        <li class="list-group-item">Matching name on the booking, along with matching governmental issued photo ID & credit card required at check-in.</li>
                        <li class="list-group-item">We reserve the right to charge a 'Resort fee' if necessary. Please
                            verify upon check-in.</li>
                        <li class="list-group-item">Please be aware that due to the COVID-19 pandemic, we may limit usage of some amenities & extra services. Please plan accordingly.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->

    <!-- Modal success -->
    <div class="modal fade" id="alert_four" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-sm modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: maroon;">
                        <i class="fa fa-window-close-o"></i> Failed
                    </h4>
                </div>
                <div class="modal-body" align="center">
                    <h1 style="color: maroon;"><i class="fa fa-close"></i></h1>
                    <p>Your payment failed and your reservation was canceled, please try again. If this persists contact us. Thanks</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/conact') }}"><button type="button" class="btn btn-default">Contact Us</button></a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->

    <!-- Modal success -->
    <div class="modal fade" id="login_modal" role="dialog" style="z-index:100000;">
        <div class="modal-dialog modal-md modal-default">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #00c2f9;">
                        <i class="fa fa-key"></i> Login your account
                    </h4>
                </div>
                <div class="modal-body">
                    <!-- Form content box start -->
                    <br><div class="form-content-box" style="margin-top:-20px;">
                        <!-- Form start -->
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            @error('email')
                            <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                    <strong>Incorrect Email or Password, please check your login credentials and try again</strong>
                                </span>
                            @enderror
                            <div class="col-md-12"><br></div>
                            <div class="form-group">
                                <input id="email" type="email" class="input-text @error('email')
                                    is-invalid @enderror" name="email" value="{{ old('email') }}" required
                                       autocomplete="email" autofocus placeholder="Email Address" spellcheck="false">
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="input-text @error('password')
                                    is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Remember me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="link-not-important pull-right">Forgot
                                        Password?</a>
                                    <div class="clearfix"></div>
                                @endif
                            </div>
                            <div class="mb-0">
                                <button type="submit" class="btn-md btn-theme btn-block">login</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Form content box end -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--modal close-->

    <!-- Booking flow end -->
    <script type="text/javascript">
        if($('#biko_confirm').is(":hidden")){
            $('#step2_button').addClass("disabled");
            $('#step3_button').addClass("disabled");
        }

        // Centralized datepicker initialization function
        function initializeDatepickers() {
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

            // Initialize check-in datepicker
            $('#checkin_date').datepicker('destroy').datepicker({
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

            // Initialize check-out datepicker
            $('#checkout_date').datepicker('destroy').datepicker({
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

            // Initialize general datepicker class
            $('.datepicker').not('#checkin_date, #checkout_date').datepicker('destroy').datepicker({
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
        }

        function superiorFunction() {
            document.getElementById("selected_room").innerHTML = "Superior Room";
            document.getElementById("selected_room_price").innerHTML = "75,000";
            document.getElementById("selected_room_input").value = "Superior Room";
            document.getElementById("description").value = "Superior Room";
        }
        function superior_doubleFunction() {
            document.getElementById("selected_room").innerHTML = "Superior Room (Double)";
            document.getElementById("selected_room_price").innerHTML = "75,000";
            document.getElementById("selected_room_input").value = "Superior Room (Double)";
            document.getElementById("description").value = "Superior Room (Double)";
        }
        function executiveFunction() {
            document.getElementById("selected_room").innerHTML = "Executive Suite";
            document.getElementById("selected_room_price").innerHTML = "150,000";
            document.getElementById("selected_room_input").value = "Executive Suite";
            document.getElementById("description").value = "Executive Suite";
        }
        function diplomaticFunction() {
            document.getElementById("selected_room").innerHTML = "Diplomatic Suite";
            document.getElementById("selected_room_price").innerHTML = "200,000";
            document.getElementById("selected_room_input").value = "Diplomatic Suite";
            document.getElementById("description").value = "Diplomatic Suite";
        }
        function presidentialFunction() {
            document.getElementById("selected_room").innerHTML = "Presidential Suite";
            document.getElementById("selected_room_price").innerHTML = "300,000";
            document.getElementById("selected_room_input").value = "Presidential Suite";
            document.getElementById("description").value = "Presidential Suite";
        }

        function cost_calculator() {
            let rooms = document.getElementById("num_of_rooms").value;
            let selectedroom = document.getElementById("selected_room_input").value;

            let start = $("#checkin_date").datepicker("getDate");
            let end = $("#checkout_date").datepicker("getDate");
            let diffDays = Math.round((end- start) / (1000 * 60 * 60 * 24));

            if(rooms != '' && selectedroom == 'Superior Room'){
                document.getElementById("total_price").value = 75000*rooms*diffDays;
                document.getElementById("total_price_display").innerHTML = (75000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display2").innerHTML = (75000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display3").innerHTML = (75000*rooms*diffDays).toLocaleString('en');
                document.getElementById("checkin_display").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display2").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display3").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkout_display").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display2").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display3").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("selected_room_display").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display2").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display3").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("num_of_rum_display").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display2").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display3").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("name_display").innerHTML = document.getElementById("first_name").value + " " + document.getElementById("last_name").value;
                document.getElementById("email_display").innerHTML = document.getElementById("user_email").value;
                document.getElementById("phone_display").innerHTML = document.getElementById("full_phone").value || document.getElementById("phone").value;

            }
            else if(rooms != '' && selectedroom == 'Superior Room (Double)'){
                document.getElementById("total_price").value = 75000*rooms*diffDays;
                document.getElementById("total_price_display").innerHTML = (75000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display2").innerHTML = (75000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display3").innerHTML = (75000*rooms*diffDays).toLocaleString('en');
                document.getElementById("checkin_display").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display2").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display3").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkout_display").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display2").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display3").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("selected_room_display").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display2").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display3").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("num_of_rum_display").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display2").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display3").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("name_display").innerHTML = document.getElementById("first_name").value + " " + document.getElementById("last_name").value;
                document.getElementById("email_display").innerHTML = document.getElementById("email").value;
                document.getElementById("phone_display").innerHTML = document.getElementById("phone").value;
            }
            else if(rooms != '' && selectedroom == 'Executive Suite'){
                document.getElementById("total_price").value = 150000*rooms*diffDays;
                document.getElementById("total_price_display").innerHTML = (150000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display2").innerHTML = (150000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display3").innerHTML = (150000*rooms*diffDays).toLocaleString('en');
                document.getElementById("checkin_display").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display2").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display3").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkout_display").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display2").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display3").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("selected_room_display").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display2").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display3").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("num_of_rum_display").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display2").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display3").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("name_display").innerHTML = document.getElementById("first_name").value + " " + document.getElementById("last_name").value;
                document.getElementById("email_display").innerHTML = document.getElementById("email").value;
                document.getElementById("phone_display").innerHTML = document.getElementById("phone").value;
            }
            else if(rooms != '' && selectedroom == 'Diplomatic Suite'){
                document.getElementById("total_price").value = 200000*rooms*diffDays;
                document.getElementById("total_price_display").innerHTML = (200000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display2").innerHTML = (200000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display3").innerHTML = (200000*rooms*diffDays).toLocaleString('en');
                document.getElementById("checkin_display").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display2").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display3").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkout_display").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display2").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display3").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("selected_room_display").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display2").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display3").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("num_of_rum_display").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display2").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display3").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("name_display").innerHTML = document.getElementById("first_name").value + " " + document.getElementById("last_name").value;
                document.getElementById("email_display").innerHTML = document.getElementById("email").value;
                document.getElementById("phone_display").innerHTML = document.getElementById("phone").value;
            }
            else if(rooms != '' && selectedroom == 'Presidential Suite'){
                document.getElementById("total_price").value = 300000*rooms*diffDays;
                document.getElementById("total_price_display").innerHTML = (300000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display2").innerHTML = (300000*rooms*diffDays).toLocaleString('en');
                document.getElementById("total_price_display3").innerHTML = (300000*rooms*diffDays).toLocaleString('en');
                document.getElementById("checkin_display").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display2").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkin_display3").innerHTML = document.getElementById("checkin_date").value;
                document.getElementById("checkout_display").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display2").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("checkout_display3").innerHTML = document.getElementById("checkout_date").value;
                document.getElementById("selected_room_display").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display2").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("selected_room_display3").innerHTML = document.getElementById("selected_room_input").value;
                document.getElementById("num_of_rum_display").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display2").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("num_of_rum_display3").innerHTML = document.getElementById("num_of_rooms").value;
                document.getElementById("name_display").innerHTML = document.getElementById("first_name").value + " " + document.getElementById("last_name").value;
                document.getElementById("email_display").innerHTML = document.getElementById("email").value;
                document.getElementById("phone_display").innerHTML = document.getElementById("phone").value;
            }
        }

        function data_check() {
            let selected_room = document.getElementById("selected_room_input").value;

            let checkin_check = document.getElementById("checkin_date").value;
            let checkout_check = document.getElementById("checkout_date").value;

            let checkin = $("#checkin_date").datepicker("getDate");
            let checkout = $("#checkout_date").datepicker("getDate");
            let diffDays = Math.round((checkout- checkin) / (1000 * 60 * 60 * 24));

            // Function to check if date is in blocked range
            function isDateInBlockedRange(date) {
                var startBlocked = new Date(2025, 7, 20); // August 20, 2025
                var endBlocked = new Date(2025, 7, 28);   // August 28, 2025
                return date >= startBlocked && date <= endBlocked;
            }

            let num_of_rooms = document.getElementById("num_of_rooms").value;
            let amount = document.getElementById("total_price").value;

            if(checkin_check == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You did not enter your Checkin Date";
            }
            else if(checkout_check == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You did not enter your Checkout Date";
            }
            else if(checkin && isDateInBlockedRange(checkin)){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your selected check-in date falls within a booked period (August 20-28, 2025). Please choose a different date.";
            }
            else if(checkout && isDateInBlockedRange(checkout)){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your selected check-out date falls within a booked period (August 20-28, 2025). Please choose a different date.";
            }
            else if(diffDays == 0){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your Checkin Date cannot be same with your " +
                    "Checkout Date";
            }
            else if(diffDays < 0){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your Checkin Date cannot come after your " +
                    "Checkout Date";
            }
            else if(selected_room == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You did not select any room";
            }
            else if(amount == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You need to select the number of rooms you want";
            }
            else if(num_of_rooms == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You have chosen an invalid Number of Rooms";
            }
            else{
                @guest
                    $('#step2').show('');
                    $('#step1').hide('');
                    $('#step2_button').removeClass("disabled");
                    $('#step1_button').removeClass("active");
                    $('#step2_button').addClass("active");
                @else
                    $('#complete').show('');
                    $('#step1').hide('');
                    $('#step3_button').removeClass("disabled");
                    $('#step1_button').removeClass("active");
                    $('#step3_button').addClass("active");
                @endguest
            }
        }

        function telephoneCheck(str) {
            var patt = new RegExp(/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g);
            return patt.test(str);
        }

        function emailCheck(str) {
            var patt = new RegExp(/^[\w._-]+[+]?[\w._-]+@[\w.-]+\.[a-zA-Z]{2,6}$/);
            return patt.test(str);
        }

        function data2_check() {
            let fname = document.getElementById("first_name").value;
            let lname = document.getElementById("last_name").value;

            let email = document.getElementById("user_email").value;
            let phone = document.getElementById("phone").value;

            let password = $('#password').val();
            let c_password = $('#password-confirm').val();


            if(fname == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "You did not enter your First Name";
            }
            else if(fname.length < 3){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Please enter a valid First Name";
            }
            else if(lname == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "It seems you forgot to enter your Last Name";
            }
            else if(lname.length < 3){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Please enter a valid Last Name";
            }
            else if(email == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your Email Address is required";
            }
            else if((email < 3) || emailCheck(email) == false) {
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Please enter a valid Email Address";
            }
            else if(phone == ''){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Your Pone Number is required";
            }
            else if(telephoneCheck(phone) == false){
                $('#alert_one').modal('show');
                document.getElementById("error_message").innerHTML = "Please enter a valid Phone Number";
            }
            else if($("#iwanreg").prop("checked") == true){
                if(password == '') {
                    $('#alert_one').modal('show');
                    document.getElementById("error_message").innerHTML = "Please enter a password";
                }
                else if(c_password == ''){
                    $('#alert_one').modal('show');
                    document.getElementById("error_message").innerHTML = "Please confirm your password";
                }
                else if(password.length < 8){
                    $('#alert_one').modal('show');
                    document.getElementById("error_message").innerHTML = "Your password must be up to 8 characters or more";
                }
                else if(password != c_password){
                    $('#alert_one').modal('show');
                    document.getElementById("error_message").innerHTML = "Your passwords mismatch, please check if you correctly entered the same password in the password confirmation field";
                }
                else{
                    $('#complete').show('');
                    $('#step2').hide('');
                    $('#step3_button').removeClass("disabled");
                    $('#step2_button').removeClass("active");
                    $('#step3_button').addClass("active");
                }
            }
            else{
                $('#complete').show('');
                $('#step2').hide('');
                $('#step3_button').removeClass("disabled");
                $('#step2_button').removeClass("active");
                $('#step3_button').addClass("active");
            }
        }

        function next_date() {
            let start = $("#checkin_date").datepicker("getDate", "+1d");
            if(start != null) {
                start.setDate(start.getDate(start) + 1);
            }
            $('#checkout_date').datepicker('setDate', start);
        }

        $(document).ready(function () {
            // Initialize datepickers with blocked dates
            initializeDatepickers();
            
            @guest
                $("#prev-step1").click(function () {
                    $('#step2').hide('');
                    $('#step1').show('');
                    $('#step2_button').removeClass("active");
                    $('#step1_button').addClass("active");
                });

                $("#prev-step2").click(function () {
                    $('#complete').hide('');
                    $('#step2').show('');
                    $('#step3_button').removeClass("active");
                    $('#step2_button').addClass("active");
                });
            @else
                $("#prev-step1").click(function () {
                    $('#complete').hide('');
                    $('#step1').show('');
                    $('#step_3button').removeClass("active");
                    $('#step1_button').addClass("active");
                });
            @endguest

            $('#password_control').hide('');
            $('#c_password').hide('');

            $("#iwanreg").change(function() {
                if(this.checked) {
                    $('#password_control').show('');
                    $('#c_password').show('');
                }
                else{
                    $('#password_control').hide('');
                    $('#c_password').hide('');
                }
            });

            $("#save_continue2").keyup(data2_check);
            $("#save_continue").keyup(data_check);
            $("#save_continue").keyup(cost_calculator);
        });

        $(document).ready(function () {
            $("#num_of_rooms").keyup(cost_calculator);
            $("#checkout_date").keyup(cost_calculator);
            $("#checkin_date").keyup(cost_calculator);
            $("#checkin_date").keyup(next_date);
            
            // Initialize phone validation on page load
            updatePhoneValidation();
        });

        // Phone validation functions
        function updatePhoneValidation() {
            const countrySelect = document.getElementById('country_code');
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];
            const countryCode = selectedOption.value;
            const minLength = selectedOption.getAttribute('data-min');
            const maxLength = selectedOption.getAttribute('data-max');
            
            const helpText = document.getElementById('phone-help');
            const phoneInput = document.getElementById('phone');
            
            // Update help text based on selected country
            let example = '';
            switch(countryCode) {
                case '+234': // Nigeria
                    example = 'Example: 8012345678';
                    break;
                case '+1': // USA
                    example = 'Example: 2125551234';
                    break;
                case '+44': // UK
                    example = 'Example: 2012345678';
                    break;
                case '+233': // Ghana
                    example = 'Example: 241234567';
                    break;
                case '+27': // South Africa
                    example = 'Example: 821234567';
                    break;
                case '+254': // Kenya
                    example = 'Example: 712345678';
                    break;
                case '+256': // Uganda
                    example = 'Example: 712345678';
                    break;
                case '+91': // India
                    example = 'Example: 9876543210';
                    break;
                case '+86': // China
                    example = 'Example: 13812345678';
                    break;
                case '+49': // Germany
                    example = 'Example: 1751234567';
                    break;
                case '+33': // France
                    example = 'Example: 612345678';
                    break;
                case '+971': // UAE
                    example = 'Example: 501234567';
                    break;
                default:
                    example = `Enter ${minLength}-${maxLength} digits`;
            }
            
            helpText.textContent = `${example} (${minLength}-${maxLength} digits)`;
            
            // Clear previous validation
            const errorText = document.getElementById('phone-error');
            errorText.style.display = 'none';
            phoneInput.style.border = '';
            
            // Validate current value if present
            if (phoneInput.value) {
                validatePhoneNumber();
            }
            
            // Update full phone number
            updateFullPhoneNumber();
        }

        function validatePhoneNumber() {
            const phoneInput = document.getElementById('phone');
            const countrySelect = document.getElementById('country_code');
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];
            const errorText = document.getElementById('phone-error');
            
            const phoneNumber = phoneInput.value.replace(/\D/g, ''); // Remove all non-digits
            const minLength = parseInt(selectedOption.getAttribute('data-min'));
            const maxLength = parseInt(selectedOption.getAttribute('data-max'));
            const pattern = new RegExp(selectedOption.getAttribute('data-pattern'));
            
            let isValid = true;
            let errorMessage = '';
            
            if (phoneNumber.length === 0) {
                // Empty field - clear validation
                phoneInput.style.border = '';
                errorText.style.display = 'none';
                updateFullPhoneNumber();
                return true;
            }
            
            if (phoneNumber.length < minLength) {
                isValid = false;
                errorMessage = `Phone number too short. Minimum ${minLength} digits required.`;
            } else if (phoneNumber.length > maxLength) {
                isValid = false;
                errorMessage = `Phone number too long. Maximum ${maxLength} digits allowed.`;
            } else if (!pattern.test(phoneNumber)) {
                isValid = false;
                errorMessage = 'Invalid phone number format for selected country.';
            }
            
            if (isValid) {
                phoneInput.style.border = '2px solid #28a745';
                errorText.style.display = 'none';
            } else {
                phoneInput.style.border = '2px solid #dc3545';
                errorText.textContent = errorMessage;
                errorText.style.display = 'block';
            }
            
            updateFullPhoneNumber();
            return isValid;
        }

        function updateFullPhoneNumber() {
            const phoneInput = document.getElementById('phone');
            const countrySelect = document.getElementById('country_code');
            const fullPhoneInput = document.getElementById('full_phone');
            
            const phoneNumber = phoneInput.value.replace(/\D/g, ''); // Remove all non-digits
            const countryCode = countrySelect.value;
            
            if (phoneNumber) {
                fullPhoneInput.value = countryCode + phoneNumber;
            } else {
                fullPhoneInput.value = '';
            }
        }

        // Format phone input to only allow numbers
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('phone');
            phoneInput.addEventListener('input', function(e) {
                // Allow only numbers
                this.value = this.value.replace(/\D/g, '');
            });
        });


    </script>


    @if(session()->has('failure'))
        <script type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
                $('#alert_four').modal('show');
            });
        </script>
    @endif
@endsection
