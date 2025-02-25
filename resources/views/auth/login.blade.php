@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="">
        <div class="container">
            <br><br>
        </div>
    </div>
    <!-- Sub Banner end -->

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
                            <div class="footer">
                                <span>
                                    Don't have an account? <a href="{{ route('register') }}">Register here</a>
                                </span>
                            </div>
                            <h2><span class="fa fa-lock"></span> </h2>
                            <h3>Login your account</h3>
                            <!-- Form start -->
                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                @error('email')
                                <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                    <strong>{{ $message }} Please check your details and try again</strong>
                                </span>
                                @enderror
                                @error('pasword')
                                <span class="invalid-feedback" role="alert" style="color: #d70303;">
                                    <strong>{{ $message }} Please check your details and try again</strong>
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
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content area end -->
@endsection
