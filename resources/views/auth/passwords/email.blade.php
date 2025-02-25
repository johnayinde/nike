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
                        <a href="{{ url('/') }}" class="clearfix alpha-logo">
                            <br><br><br><br><br><br><br>
                        </a>
                        <!-- details -->
                        <div class="details">
                            <h2><span class="fa fa-key"></span></h2>
                            <h3>Recover your password</h3>
                            @if (session('status'))
                                <!-- Modal success -->
                                <div class="modal fade" id="mail_sent" role="dialog" style="z-index:100000;">
                                    <div class="modal-dialog modal-md modal-success">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="color: green;">
                                                    <i class="fa fa-check-circle"></i> Great!
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                We have sent you an email with your password reset instructions,
                                                please check your inbox and follow the instructions to reset your
                                                password.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">OK</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--modal close-->

                                <script !src="">
                                    $(document).ready(function() {
                                        $("#mail_sent").modal("show");
                                    });
                                </script>
                            @endif
                            <!-- Form start -->
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group">
                                    <input id="email" type="email" class="input-text @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                           placeholder="Email Address" spellcheck="false">
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

                                <div class="mb-0">
                                    <button type="submit" class="btn-md btn-theme btn-block">Send Email</button>
                                </div>
                            </form>
                            <!-- Form end -->
                        </div>
                        <!-- Footer -->
                        <div class="footer">
                            <span>
                               <a href="{{ route('login') }}"> &nbsp;<i class="fa fa-key"></i> Login&nbsp; <span
                                       style="color: #ffffff;">|</span></a> <a href="{{ route('register') }}"> &nbsp;<i
                                        class="fa fa-user-plus"></i> Register</a>
                            </span>
                        </div>
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content area end -->
@endsection
