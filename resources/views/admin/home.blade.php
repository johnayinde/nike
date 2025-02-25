@php
    $page="dashboard";
@endphp
@extends('layouts.admin')

@section('content')
    <div id=page-wrapper>
        <div class=content>
            <div class=content-header>
                <div class=header-icon>
                    <i class=pe-7s-monitor></i>
                </div>
                <div class=header-title>
                    <h1>Dashboard</h1>
                    <small>Nike Lake Site Admin</small>
                    <ol class=breadcrumb>
                        <li><a href={{url('/admin/home')}}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Dashboard</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="statistic-box statistic-filled-3">
                        <h2><span class=count-number>{{$count_users}}</h2>
                        <div class=small>Guests</div>
                        <i class="pe-7s-user statistic_icon"></i>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="statistic-box statistic-filled-3">
                        <h2><span class=count-number>{{$count_bookings}}</h2>
                        <div class=small>Total Bookings </div>
                        <i class="pe-7s-users statistic_icon"></i>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="statistic-box statistic-filled-3">
                        <h2><span class=count-number>{{$count_unposted}}</h2>
                        <div class=small>Bookings Not Posted</div>
                        <i class="pe-7s-albums statistic_icon"></i>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="statistic-box statistic-filled-3">
                        <h2><span class=count-number>{{$count_messages}}</h2>
                        <div class=small>Messages </div>
                        <i class="pe-7s-comment statistic_icon"></i>
                    </div>
                </div>

            </div>
            <div class=row>


                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
                    <div class="panel panel-bd lobidisable">
                        <div class=panel-heading>
                            <div class=panel-title>
                                <i class=ti-email></i>
                                <h4>Recent Messages</h4>
                            </div>
                        </div>
                        <div class=panel-body>
                            <div class=message_inner>
                                <div class=message_widgets>
                                    @forelse($messages as $message)
                                        <a href="{{ url('/admin/messages') }}">
                                            <div class=inbox-item>
                                                <div class=inbox-item-img><img src="{{asset('admin/assets/dist/img/avatar.png')}}" class=img-circle alt=""></div>
                                                <strong class=inbox-item-author>{{$message->name}}</strong>
                                                <span class=inbox-item-date>{{$message->created_at}}</span>
                                                <p class=inbox-item-text>{{$message->message}}</p>
                                                <span class="profile-status available pull-right"></span>
                                            </div>
                                        </a>
                                    @empty
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="statistic-box statistic-filled-3">
                                                <h4><i class="pe-7s-smile"></i> There are no messages yet</h4>
                                                <div class=small>You will be notified when new messages arrive <i class="pe-7s-comment"></i></div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
                    <div class="panel panel-bd lobidisable">
                        <div class=panel-heading>
                            <div class=panel-title>
                                <i class=ti-archive></i>
                                <h4>Calender</h4>
                            </div>
                        </div>
                        <div class=panel-body>
                            <div class=monthly_calender>
                                <div class=monthly id=m_calendar></div>
                            </div>
                        </div>
                        <div class=panel-footer>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
