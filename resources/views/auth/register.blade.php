@extends('layouts.app')

@section('content')
    <!-- Content bg area start -->
    <div class="contact-bg overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form content box start -->
                    <div class="form-content-box">
                        <!-- logo -->
                        <a href="{{ url('/') }}" class="clearfix alpha-logo">
                            <br><br>
                        </a>
                        <!-- details -->
                        <div class="details">
                            <!-- Footer -->
                            <div class="footer">
                                <span>
                                    Already have an account? <a href="{{ route('login') }}">Login here</a>
                                </span>
                            </div>
                            <h2><span class="fa fa-user-plus"></span> </h2>
                            <h3>Create an account</h3>
                            <!-- Form start-->
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group text-left">
                                    <input id="first_name" type="text" class="input-text @error('first_name') is-invalid @enderror"
                                           name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name"
                                           autofocus placeholder="First Name">
                                    @error('first_name')
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
                                <div class="form-group text-left">
                                    <input id="last_name" type="text" class="input-text @error('last_name') is-invalid @enderror"
                                           name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name"
                                           autofocus placeholder="Last Name">
                                    @error('last_name')
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
                                <div class="form-group text-left">
                                    <em style="font-size:10px;color:#1b4b72;"><i class="fa
                                    fa-info-circle"></i>Your payment receipts will be sent to this email address</em>
                                    <input id="email" type="email" class="input-text @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           placeholder="Email Address">
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
                                <div class="form-group text-left">
                                    <em style="font-size:10px;color:#1b4b72;"><i class="fa
                                    fa-info-circle"></i>Ensure to enter your 11 digits phone number</em>
                                    <input id="phone" type="number" class="input-text @error('phone') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                           autofocus placeholder="Phone" minlength="11" maxlength="15">
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
                                <div class="form-group text-left">
                                    <input id="password" type="password" class="input-text @error('password')
                                        is-invalid @enderror" name="password" required autocomplete="new-password"
                                           placeholder="Password">
                                    @error('password')
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
                                <div class="form-group text-left">
                                    <input id="password-confirm" type="password" class="input-text"
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="Confirm Password">
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn-md btn-theme btn-block">Signup</button>
                                </div>
                            </form>
                            <!-- Form end-->
                        </div>
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content bg area end -->
@endsection
