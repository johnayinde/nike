@php
    $page="messages";
@endphp

@extends('layouts.admin')

@section('content')
    <div id=page-wrapper>
        <div class=content>
            <div class=content-header>
                <div class=header-icon>
                    <i class=pe-7s-message></i>
                </div>
                <div class=header-title>
                    <h1>Messages</h1>
                    <small>Nike Lake Site Admin</small>
                    <ol class=breadcrumb>
                        <li><a href={{url('/admin/home')}}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Messages</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="col-sm-12">
                    <div class="panel panel-bd">
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
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Sent On</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($messages as $message)
                                        <tr class="tr">
                                            <td></td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->phone}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>{{$message->message}}</td>
                                            <td>{{$message->created_at}}</td>
                                            <td>
                                                <div class="btn-group m-b-5">
                                                    <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary">Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="mailto:{{$message->email}}"><i class="fa fa-reply"></i> Reply</a>
                                                        </li>
                                                        <li><a href="#" data-toggle="modal" data-target="#{{$message->id}}delete" name="delete" id="delete"><i class="fa fa-trash-o"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{$message->id}}delete" role="dialog">
                                            <div class="modal-dialog modal-md modal-danger">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><i class="fa fa-warning"></i>&nbsp;
                                                            &nbsp; Are you sure you want to delete this message?</h4>
                                                    </div>
                                                    <div class="modal-body" align="center">
                                                        <h5>If you choose to delete this record, it will be permanently deleted and can not be recovered</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="delete_msg/{{ $message->id }}}}" title="Delete"><button type="button" class="btn btn-danger">Yes, Delete</button></a>
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
        </div>
    </div>
    <!--modal close-->
@endsection


