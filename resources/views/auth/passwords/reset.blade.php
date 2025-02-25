@extends('layouts.app')

@section('content')
    <!-- Content area start -->
    <div class="contact-bg overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form content box start -->
                    <div class="form-content-box">
                        <!-- logo -->
                        <a href="" class="clearfix alpha-logo">
                            <br><br><br><br>
                        </a>
                        <!-- details -->
                        <div class="details">
                            <h2><span class="fa fa-key"></span> </h2>
                            <h3>Reset Your Password</h3>
                            <!-- Form start -->
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <input id="email" type="email" class="input-text @error('email') is-invalid @enderror"
                                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email Address" spellcheck="false">
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
                                <div class="form-group">
                                    <input id="password" type="password" class="input-text @error('password')
                                        is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                    @error('pasword')
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
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="input-text"
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="Retype Password">
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn-md btn-theme btn-block">Save Changes</button>
                                </div>
                            </form>
                            <!-- Form end -->
                        </div>
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content area end -->
@endsection
