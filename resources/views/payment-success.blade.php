@extends('layouts.app')

@php
    $page = 'payment-success';
@endphp

@section('content')
    <!-- Sub banner -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Payment Successful</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Payment Success</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Success Content -->
    <div class="content-area-5 login-page d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10"></div>
                <!-- Success Message -->
                <div class="alert alert-success text-center" style="padding: 30px; border-radius: 10px;">
                    <i class="fa fa-check-circle" style="font-size: 80px; color: #28a745; margin-bottom: 20px;"></i>
                    <h2>Payment Successful!</h2>
                    <p class="lead">Your booking has been confirmed and paid successfully.</p>
                    <p>Confirmation email sent to <strong>{{ $user->email }}</strong></p>
                </div>

                <!-- Booking Details -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Booking Details</h4>
                    </div>
                    <div class="card-body" style="padding: 30px;">
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Reference:</strong></div>
                            <div class="col-md-8"><span class="badge badge-primary">{{ $booking->ref_num }}</span></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Guest Name:</strong></div>
                            <div class="col-md-8">{{ $user->first_name }} {{ $user->last_name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Email:</strong></div>
                            <div class="col-md-8">{{ $user->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Phone:</strong></div>
                            <div class="col-md-8">{{ $user->phone }}</div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Room Type:</strong></div>
                            <div class="col-md-8">{{ $booking->room }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Number of Rooms:</strong></div>
                            <div class="col-md-8">{{ $booking->num_of_rooms }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Check-in:</strong></div>
                            <div class="col-md-8">{{ \Carbon\Carbon::parse($booking->checkin)->format('F j, Y') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Check-out:</strong></div>
                            <div class="col-md-8">{{ \Carbon\Carbon::parse($booking->checkout)->format('F j, Y') }}
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Total Amount Paid:</strong></div>
                            <div class="col-md-8">
                                <h4 class="text-success">₦{{ number_format($booking->amount, 2) }}</h4>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Status:</strong></div>
                            <div class="col-md-8"><span class="badge badge-success">{{ $booking->payment_status }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="text-center mt-4 mb-5">
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg">
                        <i class="fa fa-home"></i> Go to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
