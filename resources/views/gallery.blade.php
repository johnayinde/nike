@php
    $page = 'gallery';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Gallery</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Gallery</li>
                </ul><br>
                <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->
    <!-- Gallery secion start -->
    <div class="content-area" style="min-height: 60vh;">
        <div class="container">
            <div class="row">
                {{$images->links()}}
                <div class="filtr-container">
                    @foreach ($images as $image)
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12  filtr-item" data-category="3, 2, 1, 4">
                            <figure class="portofolio-thumb">
                                <a href="#" data-toggle="modal" data-target="#{{$image->id}}"><img style="object-fit: cover;" width="360px" height="300px" src="{{$image->image}}" alt="{{$image->title}}"></a>
                                <figcaption>
                                    <div class="figure-content">
                                        <h3 class="title">{{$image->title}}</h3>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="{{$image->id}}" role="dialog">
                            <div class="modal-dialog modal-lg modal-danger">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><i class="fa fa-image"></i>&nbsp;&nbsp; {{$image->title}}</h4>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <img src="{{asset('admin/uploads/'.$image->image)}}" alt="{{$image->title}}" class="img-responsive">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" title="Cancel" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal end --}}
                    @endforeach
                </div>
                {{$images->links()}}
            </div>

        </div>
    </div>
    <!-- Gallery section end -->

    <!-- Intro section start -->
    <div class="intro-section" style="margin-top: -19.8px;">
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
@endsection
