@extends('admin.layout.master')
@section('showjobs')
<h1 class="text-center">Manage Companies</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="main-table manage-members text-center table table-bordered">
                <tr>
                    <td>#ID</td>
                    <td>Image</td>
                    <td>name</td>
                    <td>Description</td>
                    <td>Address</td>
                    <td>Company name</td>
                    <td>Start date</td>
                    <td>End date</td>
                    <td>Control</td>
                </tr>

                @foreach($jobs as $job)
                <tr>
                    <td>1</td>
                    <td class='avatar-img'>
                        <img src='images/ {{ $job->companyJob->image}}' alt=''> 
                    </td>
                    <td>{{$job->companyJob->name}}</td>
                    <td>{{$job->companyJob->description}}</td>
                    <td>{{$job->companyJob->address_name}}</td>
                    <td>{{$job->name}}</td>
                    <td>{{$job->companyJob->start_date}}</td>
                    <td>{{$job->companyJob->end_date}}</td>
                    <td>
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editJob{{$job->companyJob->id}}">
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a href="" class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#deleteJob{{$job->companyJob->id}}">
                            <i class='fa fa-close'></i> Delete
                        </a>
                        @if($job->companyJob->is_active == 1)
                            <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#activeJob{{$job->companyJob->id}}">
                                <i class='fa fa-check'></i> Active
                            </a>
                        @else
                            <a href="" class='btn btn-danger activate' data-bs-toggle="modal" data-bs-target="#activeJob{{$job->companyJob->id}}">
                                <i class='fa fa-close'></i> noActive
                            </a>
                        @endif
                        
                    </td>
                </tr>
                <div class="modal fade user" id="editJob{{$job->companyJob->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="edit_admin_job" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Job</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="jobid" value="{{$job->companyJob->id}}">
                                    <!-- Start Name -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Job Name</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="name" value="{{$job->companyJob->name}}" class="form-control" autocomplete="off" required="required" placeholder="name Job">
                                        </div>
                                    </div>
                                    <!-- End Name -->
                                    <!-- Start Description -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Description Company</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="descrip" value="{{$job->companyJob->description}}" class="form-control" required="required" placeholder="Description Job">
                                        </div>
                                    </div>
                                    <!-- End Description -->
                                    <!-- Start Address -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Address Job</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="address" value="{{$job->companyJob->address_name}}" class="form-control" required="required" placeholder="Address Job">
                                        </div>
                                    </div>
                                    <!-- End Address -->
                                    <!-- Start Company Name -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Company Name</label>
                                        <div class="col-sm-10 col-md-9">
                                            <select name="company" id="" class="form-control">
                                                <option value="">.....</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Company Name -->
                                    <!-- Start Start date -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Start Date Job</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="date" name="start" value="{{$job->companyJob->start_date}}" class="form-control" required="required" placeholder="Start Date Job">
                                        </div>
                                    </div>
                                    <!-- End Start date -->
                                    <!-- Start End date -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">End Date Job</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="date" name="end" value="{{$job->companyJob->end_date}}" class="form-control" required="required" placeholder="Start Date Job">
                                        </div>
                                    </div>
                                    <!-- End End date -->
                                    <!-- Start Image Field -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Job Image</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="file" name="image" value="{{$job->companyJob->image}}" class="form-control">
                                        </div>
                                    </div>
                                    <!-- End Avatar Field -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Save Job" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="deleteJob{{$job->companyJob->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="delete_admin_job" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Job</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="jobid" value="{{$job->companyJob->id}}">
                                    <h2>Are You Sure!</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Delete Job" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="activeJob{{$job->companyJob->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="active_admin_job" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Status Job</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="jobid" value="{{$job->companyJob->id}}">
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
        <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addJob">
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>
    <div class="modal fade user" id="addJob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add_admin_job" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Job</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Start Name -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Job Name</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="name" class="form-control" autocomplete="off" required="required" placeholder="Name Job">
                            </div>
                        </div>
                        <!-- End Name -->
                        <!-- Start Description -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Description Job</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="descrip" class="form-control" required="required" placeholder="Description Job">
                            </div>
                        </div>
                        <!-- End Description -->
                        <!-- Start Address -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Address Job</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="address" class="form-control" autocomplete="new-password" required="required" placeholder="Address Job">
                            </div>
                        </div>
                        <!-- End Address -->
                        <!-- Start Company Name -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Company Name</label>
                            <div class="col-sm-10 col-md-9">
                                <select name="company" id="" class="form-control">
                                    <option value="">.....</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- End Company Name -->
                        <!-- Start Start date -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Start Date Job</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="date" name="start" class="form-control" required="required" placeholder="Start Date Job">
                            </div>
                        </div>
                        <!-- End Start Date -->
                        <!-- Start End date -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">End Date Job</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="date" name="end" class="form-control" required="required" placeholder="End Date Job">
                            </div>
                        </div>
                        <!-- End End Date -->
                        <!-- Start Image Field -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Job Image</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <!-- End Image Field -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save Job" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
