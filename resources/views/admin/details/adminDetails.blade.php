@extends('admin.layout.master')
@section('showdetails')
<h1 class="text-center">Manage Details</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="main-table manage-members text-center table table-bordered">
                <tr>
                    <td>#ID</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Job Name</td>
                    <td>Control</td>
                </tr>

                @foreach($details as $detail)
                <tr>
                    <td>1</td>
                    <td>{{$detail->title}}</td>
                    <td>{{$detail->description}}</td>
                    <td>{{$detail->name}}</td>
                    <td>
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editDetail{{$detail->id}}">
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a href="" class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#deleteDetail{{$detail->id}}">
                            <i class='fa fa-close'></i> Delete
                        </a>
                        @if($detail->is_active == 1)
                            <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#activeDetail{{$detail->id}}">
                                <i class='fa fa-check'></i> Active
                            </a>
                        @else
                            <a href="" class='btn btn-danger activate' data-bs-toggle="modal" data-bs-target="#activeDetail{{$detail->id}}">
                                <i class='fa fa-close'></i> noActive
                            </a>
                        @endif
                        
                    </td>
                </tr>
                <div class="modal fade user" id="editDetail{{$detail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="edit_admin_detail" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="detailid" value="{{$detail->id}}">
                                    <!-- Start Title -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Detail Titel</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="title" value="{{$detail->title}}" class="form-control"required="required" placeholder="title detail">
                                        </div>
                                    </div>
                                    <!-- End Title -->
                                    <!-- Start Bio -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Description Detail</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="descrip" value="{{$detail->description}}" class="form-control" required="required" placeholder="Description Detail">
                                        </div>
                                    </div>
                                    <!-- End Detail -->
                                    <!-- Start Job Name -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Job Name</label>
                                        <div class="col-sm-10 col-md-9">
                                            <select name="job" id="" class="form-control">
                                                <option value="">.....</option>
                                                @foreach($jobs as $job)
                                                    <option value="{{$job->id}}">{{$job->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Job Name -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Update Detail" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="deleteDetail{{$detail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="delete_admin_detail" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="detailid" value="{{$detail->id}}">
                                    <h2>Are You Sure!</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Delete Detail" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="activeDetail{{$detail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="active_admin_detail" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Status Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="detailid" value="{{$detail->id}}">
                                    <h2>Are You Sure!</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Update Status" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </table>
        </div>
        <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addDetail">
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>
    <div class="modal fade user" id="addDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add_admin_detail" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Start Title -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Detail Title</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="title" class="form-control" required="required" placeholder="Title Detail">
                            </div>
                        </div>
                        <!-- End Title -->
                        <!-- Start Description -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Description Detail</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="descrip" class="form-control" required="required" placeholder="Description Detail">
                            </div>
                        </div>
                        <!-- End Description -->
                        <!-- Start Job Name -->
                        <div class="mb-2 row">
                        <label class="col-sm-2 col-form-label">Job Name</label>
                        <div class="col-sm-10 col-md-9">
                            <select name="job" id="" class="form-control">
                                <option value="">.....</option>
                                @foreach($jobs as $job)
                                    <option value="{{$job->id}}">{{$job->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- End Job Name -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save Detail" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
