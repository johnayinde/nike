@extends('layouts.app')

@section('content')
    <!-- Content bg area start -->
    <div class="contact-bg" style="background-color:#fff;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Form content box start -->
                    <br><br><br><br><br>
                    <div class="">
                        <!-- logo -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ __('To serve you better, it is required that you verify your
                                email address')
                                }}</h3>
                            </div>
                            <div class="panel-body" style="background-color: #fff;">
                                <img src="{{asset('img/verify.jpg')}}" class="img-responsive" alt="verify
                                email"><br>
                            @if (session('resent'))
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
                                                    We have sent you a fresh verification link, please check your
                                                    mailbox.
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
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif
                                {{ __('Please check your mail box for a verification link, once you find the link
                                click on it to verify your email address.') }}
                                {{ __('If you did not receive our verification email, kindly click the button bellow
                                and we will send you another verification link') }}
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <br><button type="submit" class="btn btn-theme">{{ __('Click here to request
                                    another') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Form content box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content bg area end -->
@endsection
