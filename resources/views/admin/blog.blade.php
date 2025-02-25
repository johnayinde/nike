@php
    $page="blog";
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
                    <h1>Blog</h1>
                    <small>Nike Lake Site Admin</small>
                    <ol class=breadcrumb>
                        <li><a href={{url('/admin/home')}}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Blog</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="col-sm-12">
                    <div class="panel panel-bd">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4><button type="button" class="btn btn-primary" id="btnMode" data-toggle="modal" data-target="#newblog"><i class="fa fa-plus"></i> Make New Post</button></h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                    <br>
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Uploaded On</th>
                                        <th>Uploaded By</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($posts as $post)
                                        <tr class="tr">
                                            <td></td>
                                            <td>{{$post->title}}</td>
                                            <td>@php echo $post->details @endphp</td>
                                            <td>{{$post->created_at}}</td>
                                            <td>{{$post->user->first_name}} {{$post->user->last_name}}</td>
                                            <td>
                                                <div class="btn-group m-b-5">
                                                    <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary">Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#" data-toggle="modal" data-target="#{{$post->id}}"><i class="fa fa-pencil"></i> Edit</a>
                                                        </li>
                                                        <li><a href="#" data-toggle="modal" data-target="#{{$post->id}}delete" name="delete" id="delete"><i class="fa fa-trash-o"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{$post->id}}delete" role="dialog">
                                            <div class="modal-dialog modal-md modal-danger">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><i class="fa fa-warning"></i>&nbsp;
                                                            &nbsp; Are you sure you want to delete this post?</h4>
                                                    </div>
                                                    <div class="modal-body" align="center">
                                                        <h5>If you choose to delete this record, it will be permanently deleted and can not be recovered</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="blog/delete/{{ $post->id }}" title="Delete"><button type="button" class="btn btn-danger">Yes, Delete</button></a>
                                                        <button type="button" title="Cancel" class="btn btn-success" data-dismiss="modal">No, Don't Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Modal end --}}

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{$post->id}}" role="dialog">
                                            <div class="modal-dialog modal-md modal-info">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-pencil"></i> Update Post Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('blog_update', $post->id) }}" role="form" method="POST" id="" novalidate enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <!--<input type="hidden" name="__method" value="PATCH">-->
                                                            <!--Social Buttons-->
                                                            <div class="">
                                                                <strong>Enter New Post Details Below</strong><hr>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Title</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-text-background"></i></span>
                                                                    <input id="title2" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}" required autocomplete="title" autofocus placeholder="Enter Post Title Here" maxlength="35">
                                                                </div>
                                                                @error('title')
                                                                <span class="label label-danger-outline m-r-15" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Details</label>
                                                                <div class="input-group">
                                                                    <textarea id="summernote2" type="text" class="form-control @error('details') is-invalid @enderror wysihtml5" name="details" style="width:100%;" required autocomplete="details" autofocus minlength="3">{{$post->details}}</textarea>
                                                                </div>
                                                                @error('details')
                                                                    <span class="label label-danger-outline m-r-15" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div align="center">
                                                                <button type="submit" class="btn btn-success btn-lg" name="admin" id="update">Upload</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

    <!-- New Post Modal -->
    <div class="modal fade" id="newblog" role="dialog">
        <div class="modal-dialog modal-md modal-info">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-asterisk"></i> Make New Post</h4>
                </div>
                <div class="modal-body">
                    <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('upload_blog') }}" id="" novalidate>@csrf
                    <!--Social Buttons-->
                        <div class="">
                            <strong>Enter New Post Details Below</strong><hr>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-text-background"></i></span>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Enter Post Title Here" maxlength="35">
                            </div>
                            @error('title')
                            <span class="label label-danger-outline m-r-15" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Details</label>
                            <div class="input-group">
                                <textarea id="summernote" type="text" class="form-control @error('details') is-invalid @enderror wysihtml5" name="details" style="width:100%;" required autocomplete="details" autofocus placeholder="Enter Post Details Here" minlength="3">{{ old('details') }}</textarea>
                            </div>
                            @error('details')
                            <span class="label label-danger-outline m-r-15" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div align="center">
                            <button type="submit" class="btn btn-success btn-lg" name="admin" id="submit">Upload</button>
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

@endsection


