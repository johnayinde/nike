@php
    $page = 'guests';
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
                    <h1>Guests</h1>
                    <small>Admin Account</small>
                    <ol class=breadcrumb>
                        <li><a href={{ url('/admin/home') }}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Guests</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newguest"><i class="fa fa-user-plus"></i> Add New Guest</button></h4>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Registration Time</th>
                                    @if(Auth::User()->is_admin == 1)<th>Action</th>@endif
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($guests as $guest)
                                    <tr class="tr">
                                        <td></td>
                                        <td>{{$guest->first_name}} {{$guest->last_name}}</td>
                                        <td>{{$guest->email}}</td>
                                        <td>{{$guest->phone}}</td>
                                        <td>{{$guest->created_at}}</td>
                                        @if(Auth::User()->is_admin == 1)
                                            <td>
                                                <div class="btn-group m-b-5">
                                                    <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary">Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
    {{--                                                    <li><a href="#" data-toggle="modal" data-target="#{{$admin->id}}"><i class="fa fa-pencil"></i> Edit</a>--}}
                                                        </li>
                                                        <li><a href="#" data-toggle="modal" data-target="#{{$guest->id}}delete" name="delete" id="delete"><i class="fa fa-trash-o"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$guest->id}}delete" role="dialog">
                                        <div class="modal-dialog modal-md modal-danger">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fa fa-warning"></i>&nbsp;&nbsp; Are you sure you want to delete {{$guest->first_name}} {{$guest->last_name}}</h4>
                                                </div>
                                                <div class="modal-body" align="center">
                                                    <h5>If you choose to delete this record, it will be permanently deleted and can not be recovered</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('delete_guest', $guest->id) }}" title="Delete"><button type="button" class="btn btn-danger">Yes, Delete</button></a>
                                                    <button type="button" title="Cancel" class="btn btn-success" data-dismiss="modal">No, Don't Delete</button>
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
        <div class="modal fade" id="newguest" role="dialog">
            <div class="modal-dialog modal-lg modal-info">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-user-plus"></i> New User</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="{{ route('new_guest') }}" id="" >
                        @csrf
                        <!--Social Buttons-->
                            <div class="">
                                <strong>Enter New Guest Details Below</strong><hr>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">First Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="Enter Guest First Name Here">
                                </div>
                                @error('first_name')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="first_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Enter Guest Last Nmae Here">
                                </div>
                                @error('last_name')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Guest First Name Here">
                                </div>
                                @error('email')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Enter Guest Last Nmae Here">
                                </div>
                                @error('phone')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
                                </div>
                                @error('password')
                                <span class="label label-danger-outline m-r-15" role="alert">
                                  <strong class="update_error">{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Repeat Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-type Password">
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
