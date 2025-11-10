@extends('layouts.app')
@php
    $page = 'payment';
@endphp

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Complete Your Payment</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Payment</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Payment Content start -->
    <div class="content-area-5 login-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mx-auto">
                    <div class="login-form">
                        <h3 class="text-center mb-4">Booking Payment Details</h3>
                        
                        <!-- Booking Summary Card -->
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Booking Summary</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Reference Number:</strong><br>{{ $booking->ref_num }}</p>
                                        <p><strong>Customer Name:</strong><br>{{ $user->first_name }} {{ $user->last_name }}</p>
                                        <p><strong>Email:</strong><br>{{ $user->email }}</p>
                                        <p><strong>Phone:</strong><br>{{ $user->phone }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Room Type:</strong><br>{{ $booking->room }}</p>
                                        <p><strong>Number of Rooms:</strong><br>{{ $booking->num_of_rooms }}</p>
                                        <p><strong>Check-in:</strong><br>{{ \Carbon\Carbon::parse($booking->checkin)->format('F j, Y') }}</p>
                                        <p><strong>Check-out:</strong><br>{{ \Carbon\Carbon::parse($booking->checkout)->format('F j, Y') }}</p>
                                        <p><strong>Duration:</strong><br>{{ \Carbon\Carbon::parse($booking->checkin)->diffInDays($booking->checkout) }} night(s)</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <h3 class="text-success"><strong>Total Amount: ₦{{ number_format($booking->amount, 2) }}</strong></h3>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Form -->
                        <form method="POST" action="{{ route('payment') }}">
                            @csrf
                            <input type="hidden" name="selected_room_input" value="{{ $booking->room }}">
                            <input type="hidden" name="amount" value="{{ $booking->amount }}">
                            <input type="hidden" name="checkin" value="{{ $booking->checkin }}">
                            <input type="hidden" name="checkout" value="{{ $booking->checkout }}">
                            <input type="hidden" name="num_of_rooms" value="{{ $booking->num_of_rooms }}">
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <input type="hidden" name="ref_num" value="{{ $booking->ref_num }}">

                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-theme btn-block">
                                    <i class="fa fa-credit-card"></i> Proceed to Payment
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="text-muted">
                                <i class="fa fa-lock"></i> Your payment is secure and encrypted
                            </p>
                            <p class="text-muted">
                                Need help? <a href="{{ route('contact') }}">Contact us</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Payment Content end -->
@endsection
