@php
    $page = 'blog';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Blog</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Blog</li>
                </ul><br>
                <a href="{{url('/booking')}}" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Book Now</a>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Events section 2 start -->
    <div class="events-secion-2 content-area">
        <div class="container">

            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-6 col-xs-12">
                        <div class="blog-1">
                            <div class="blog-photo">
                                <div class="profile-user">
                                    <img src="{{asset('img/avatar/user.png')}}" alt="user">
                                </div>
                            </div>
                            <div class="detail">
                                <div class="post-meta clearfix">
                                    <ul>
                                        <li>
                                            <strong><a href="#">Posted by {{$post->user->first_name}} {{$post->user->last_name}}</a></strong>
                                        </li>
                                        <li class="mr-0">
                                            @php
                                                $time = strtotime($post->created_at);
                                            @endphp
                                            <span>{{date('M d, Y', $time)}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <h3>
                                    <a href="">{{$post->title}}</a>
                                </h3>
                                <div col-md-12><br></div>
                                <form action="{{ route('blog_details') }}" method="GET">
                                    @csrf
                                    <input type="number" value="{{$post->id}}" required autocomplete="off" name="id" readonly style="display:none;">
                                    <button type="submit" class="btn btn-sm btn-theme">Read More</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Events section 2end -->

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
