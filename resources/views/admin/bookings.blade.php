@php
    $page = 'booking';
@endphp

@extends('layouts.admin')

@section('content')
    <div id=page-wrapper>
        <div class=content>
            <div class=content-header>
                <div class=header-icon>
                    <i class=pe-7s-users></i>
                </div>
                <div class=header-title>
                    <h1>Bookings</h1>
                    <small>Admin Account</small>
                    <ol class=breadcrumb>
                        <li><a href={{ url('/admin/home') }}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Bookings</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><button type="button" class="btn btn-primary" id="btnMode" data-toggle="modal" data-target="#newbooking"><i class="fa fa-plus"></i> Make New Booking</button></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                <br>
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Reference</th>
                                    <th>Description</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Posted</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr class="tr">
                                        <td></td>
                                        <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                                        <td>{{$order->created_at->format('d/m/Y')}}</td>
                                        <td style="max-width: 100px;overflow: hidden;word-break: break-word;">{{$order->raveref}}</td>
                                        <td>{{$order->num_of_rooms}} {{$order->room}}</td>
                                        <td>{{date("d/m/Y", strtotime($order->checkin))}}</td>
                                        <td>{{date("d/m/Y", strtotime($order->checkout))}}</td>
                                        <td>&#x20A6; {{number_format($order->amount)}}</td>
                                        <td style="@if($order->payment_status == 'Reversed')color:red;@elseif($order->payment_status == 'Paid')color:greenyellow;@endif">{{$order->payment_status}}</td>
                                        <td style="@if($order->order_status == 'Cancelled')color:red;@elseif($order->order_status == 'Successful' || $order->order_status == 'Active' || $order->order_status == 'Completed')color:greenyellow;@endif">{{$order->order_status}}</td>
                                        <td>
                                            @if($order->posted == 'No' && $order->payment_status  == 'Paid')
                                                <p style="color:red;"><b>No</b></p>
                                            @elseif($order->posted == 'Yes' && $order->payment_status  == 'Paid')
                                                <p style="color:yellowgreen;"><b>Yes</b></p>
                                            @else
                                                <p style="color:navajowhite;"><b><i class="fa fa-close"></i></b></p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group m-b-5">
                                                <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary" @if($order->payment_status  != 'Paid' || $order->posted  == 'Yes')disabled @endif>Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        @if($order->posted == 'No' && $order->payment_status  == 'Paid')
                                                            <a href="#" title="Post" data-toggle="modal" data-target="#{{$order->id}}"><i class="fa fa-check-circle"></i> Mark as Posted</a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if($order->payment_status == 'Paid' && $order->order_status  != 'Completed')
                                                            <a href="#" title="Post" data-toggle="modal" data-target="#{{$order->id}}cancel"><i class="fa fa-close"></i> Cancel Order</a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if($order->payment_status == 'Paid' && $order->order_status  == 'Cancelled')
                                                            <a href="#" title="Post" data-toggle="modal" data-target="#{{$order->id}}reverse"><i class="fa fa-undo"></i> Reverse Payment</a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$order->id}}" role="dialog">
                                        <div class="modal-dialog modal-md modal-primary">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fa fa-warning"></i>&nbsp;&nbsp; Are you sure you want to mark this transaction as posted?</h4>
                                                </div>
                                                <div class="modal-body" align="center">
                                                    <h5>Please ensure you have posted this transaction to your resident system before proceeding.<br></h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('post_booking', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="button" title="Cancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" title="Post" class="btn btn-primary">Proceed</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal end --}}

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$order->id}}cancel" role="dialog">
                                        <div class="modal-dialog modal-md modal-primary">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fa fa-warning"></i>&nbsp;&nbsp; Are you sure you want to mark this transaction as cancelled?</h4>
                                                </div>
                                                <div class="modal-body" align="center">
                                                    <h5>Note that you will have to return guest's payment if you cancel this order.<br></h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('cancel_booking', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="button" title="Cancel" class="btn btn-danger" data-dismiss="modal">No, Don't</button>
                                                        <button type="submit" title="Post" class="btn btn-primary">Yes, Proceed</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal end --}}

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$order->id}}reverse" role="dialog">
                                        <div class="modal-dialog modal-md modal-primary">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fa fa-warning"></i>&nbsp;&nbsp; Are you sure you want to mark this payment as returned?</h4>
                                                </div>
                                                <div class="modal-body" align="center">
                                                    <h5>Please note that you must have reversed the guest's payment to him/her before proceeding.<br></h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('unpay_booking', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="button" title="Cancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" title="Post" class="btn btn-primary">Proceed</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal end --}}
                                @endforeach
                                </tbody>
                            </table><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Image Modal -->
        <div class="modal fade" id="newbooking" role="dialog">
            <div class="modal-dialog modal-lg modal-info">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-user-plus"></i> New Booking</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="{{ route('new_booking') }}" id="" >@csrf
                        <!--Social Buttons-->
                            <div class="">
                                <strong>Enter New Booking Details Below</strong><hr>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Select Guest</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <select onChange="cost_calculator();" id="guest" type="text" class="form-control @error('guest') is-invalid @enderror" name="guest" required autofocus>
                                        <option value="">--Select Guest--</option>
                                        @foreach($guests as $guest)
                                            <option value="{{$guest->id}}">{{$guest->first_name}} {{$guest->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('guest')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Room Type</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-bed"></i></span>
                                    <select onChange="cost_calculator();" id="room" type="text" class="form-control @error('room') is-invalid @enderror" name="room" required autocomplete="room" autofocus>
                                        <option value="">--Select Room--</option>
                                        <option value="Superior Room">Superior Room</option>
                                        <option value="Superior Room (Double)">
                                            Superior Room (Double)
                                        </option>
                                        <option value="Executive Suite">Executive Suite</option>
                                        <option value="Diplomatic Suite">Diplomatic Suite</option>
                                        <option value="Presidential Suite">
                                            Presidential Suite
                                        </option>
                                    </select>
                                </div>
                                @error('room')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Checkin</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input onChange="cost_calculator();" id="checkin" type="text" class="form-control datepicker @error('checkin') is-invalid @enderror" name="checkin" value="{{ old('checkin') }}" required autocomplete="off" readonly autofocus placeholder="Enter Guest Checkin Date Here">
                                </div>
                                @error('checkin')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Checkout</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input onChange="cost_calculator();" id="checkout" type="text" class="form-control datepicker @error('checkout') is-invalid @enderror" name="checkout" value="{{ old('checkout') }}" required autocomplete="off" readonly autofocus placeholder="Enter Guest Checkout Date Here">
                                </div>
                                @error('checkout')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Number Of Rooms</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                                    <select onChange="cost_calculator();" id="rooms" class="form-control @error('rooms') is-invalid @enderror" name="rooms" autofocus>
                                        <option value="">--Select Number of Rooms--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                @error('rooms')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Amount</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input id="amount" type="text" class="form-control " name="amount" value="" required autocomplete="off" readonly autofocus placeholder="Amount Will Appear Here">
                                </div>
                            </div>
                            <div align="center">
                                <button type="submit" class="btn btn-success btn-lg" name="admin" id="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--modal close-->
    </div>
@endsection
