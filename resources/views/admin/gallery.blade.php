@php
    $page="gallery";
@endphp

@extends('layouts.admin')

@section('content')
    <div id=page-wrapper>
        <div class=content>
            <div class=content-header>
                <div class=header-icon>
                    <i class=pe-7s-photo></i>
                </div>
                <div class=header-title>
                    <h1>Gallery</h1>
                    <small>Nike Lake Site Admin</small>
                    <ol class=breadcrumb>
                        <li><a href={{url('/admin/home')}}><i class=pe-7s-home></i> Home</a></li>
                        <li class=active>Gallery</li>
                    </ol>
                </div>
            </div>
            <div class=row>
                <div class="col-sm-12">
                    <div class="panel panel-bd">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4><button type="button" class="btn btn-primary" id="btnMode" data-toggle="modal" data-target="#newimage"><i class="fa fa-plus"></i> Uplod New Image</button></h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                    <br>
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Uploaded On</th>
                                        <th>Uploaded By</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($images as $image)
                                        <tr class="tr">
                                            <td></td>
                                            <td><img style="object-fit: cover;" src="{{asset('storage/'.$image->image)}}" width="100px" height="100px" alt="{{$image->title}}"></td>
                                            <td>{{$image->title}}</td>
                                            <td>{{$image->created_at}}</td>
                                            <td>{{$image->user->first_name}} {{$image->user->last_name}}</td>
                                            <td>
                                                <div class="btn-group m-b-5">
                                                    <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary">Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#" data-toggle="modal" data-target="#{{$image->id}}"><i class="fa fa-pencil"></i> Edit</a>
                                                        </li>
                                                        <li><a href="#" data-toggle="modal" data-target="#{{$image->id}}delete" name="delete" id="delete"><i class="fa fa-trash-o"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{$image->id}}delete" role="dialog">
                                            <div class="modal-dialog modal-md modal-danger">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><i class="fa fa-warning"></i>&nbsp;
                                                            &nbsp; Are you sure you want to delete this image?</h4>
                                                    </div>
                                                    <div class="modal-body" align="center">
                                                        <h5>If you choose to delete this record, it will be permanently deleted and can not be recovered</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="delete_img/{{ $image->id }}/{{$image->image}}" title="Delete"><button type="button" class="btn btn-danger">Yes, Delete</button></a>
                                                        <button type="button" title="Cancel" class="btn btn-success" data-dismiss="modal">No, Don't Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Modal end --}}

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{$image->id}}" role="dialog">
                                            <div class="modal-dialog modal-md modal-info">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-pencil"></i> Update Image Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('gallery_update', $image->id, $image->image) }}" role="form" method="POST" id="" novalidate enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <!--<input type="hidden" name="__method" value="PATCH">-->
                                                            <!--Social Buttons-->
                                                            <div class="">
                                                                <strong>Enter New Image Details Below</strong><hr>
                                                            </div>
                                                            <div class="form-group" align="center">
                                                                <div class="input-group">
                                                                    <div class="form-group col-md-12">
                                                                        <img src="{{asset('storage/'.$image->image)}}" width="200px" height="200px" class="img-thumbnail img-responsive center-block" id="img_update">
                                                                    </div>
                                                                    <label class="btn btn-transparent btn-primary btn-file btn-lg center-block" style="overflow:hidden;white-space:normal;text-overflow:clip;width:70%;">
                                                                        Insert Image File<input class="form-control @error('image')
                                                                            is-invalid @enderror" name="image" value="{{ old('image') }}" required type="file" accept="image/*" onchange="loadFile(event)" name="image" id="image_update" style="display:none;" multiple>
                                                                    </label>
                                                                </div>
                                                                @error('image')
                                                                <span class="label label-danger-outline m-r-15" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <input type="hidden" value="{{$image->image}}" required name="old_image">
                                                            <div class="form-group">
                                                                <label class="control-label">Title</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                                    <input id="title_update" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $image->title }}" required autocomplete="title" autofocus placeholder="Enter Image Title Here" maxlength="35">
                                                                </div>
                                                                @error('title')
                                                                <span class="label label-danger-outline m-r-15" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div align="center">
                                                                <button type="submit" class="btn btn-success btn-lg" name="admin"
                                                                        id="update">Upload</button>
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

    <!-- New Image Modal -->
    <div class="modal fade" id="newimage" role="dialog">
        <div class="modal-dialog modal-md modal-info">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-user-plus"></i> Image Upload</h4>
                </div>
                <div class="modal-body">
                    <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('gallery') }}" id="" novalidate>@csrf
                    <!--Social Buttons-->
                        <div class="">
                            <strong>Enter New Image Details Below</strong><hr>
                        </div>
                        <div class="form-group" align="center">
                            <div class="input-group">
                                <div class="form-group col-md-12">
                                    <img src="{{asset('admin/images/image.jpg')}}" width="200px" height="200px" class="img-thumbnail
                                    img-responsive center-block" id="img">
                                </div>
                                <label class="btn btn-transparent btn-primary btn-file btn-lg center-block" style="overflow:hidden;white-space:normal;text-overflow:clip;width:70%;">
                                    Insert Image File<input class="form-control @error('image')
                                        is-invalid @enderror" name="image" value="{{ old('image') }}" required type="file" accept="image/*" onchange="loadFilem(event)" name="image" id="image" style="display:none;" multiple>
                                </label>
                            </div>
                            @error('image')
                            <span class="label label-danger-outline m-r-15" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Enter Image Title Here" maxlength="35">
                            </div>
                            @error('title')
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


