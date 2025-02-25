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
            <a href="{{ url('/blog') }}" class="btn btn-theme"><i class="fa fa-arrow-circle-left"></i> Back</a>
            <div class="col-md-12"><br><br><br><br><br></div>
            @foreach($posts as $post)
                <div class="row">
                    <div class="col-md-12">
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
                                <p>
                                    @php
                                        echo $post->details;
                                    @endphp
                                </p><br>
                                <div class="col-md-12"><br><br><br><br><br></div>
                                <div class="col-md-12">
                                    <div id="disqus_thread"></div>
                                    <script>
                                        /**
                                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                                        var disqus_config = function () {
                                            this.page.url = '{{url('/blog_details')}}';  // Replace PAGE_URL with your page's canonical URL variable
                                            this.page.identifier = {{$post->id}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                        };

                                        (function() { // DON'T EDIT BELOW THIS LINE
                                            var d = document, s = d.createElement('script');
                                            s.src = 'https://nikelakeresorthotel-com.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
