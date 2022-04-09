@extends('admin.layout.master')
@section('showcompanies')
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
                    <td>Control</td>
                </tr>

                @foreach($companies as $company)
                <tr>
                    <td>1</td>
                    <td class='avatar-img'>
                        <img src='images/ {{ $company->avatar}}' alt=''> 
                    </td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->bio}}</td>
                    <td>{{$company->address}}</td>
                    <td>
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editCompany{{$company->id}}">
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a href="" class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#deleteCompany{{$company->id}}">
                            <i class='fa fa-close'></i> Delete
                        </a>
                        @if($company->is_active == 1)
                            <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#activeCompany{{$company->id}}">
                                <i class='fa fa-check'></i> Active
                            </a>
                        @else
                            <a href="" class='btn btn-danger activate' data-bs-toggle="modal" data-bs-target="#activeCompany{{$company->id}}">
                                <i class='fa fa-close'></i> noActive
                            </a>
                        @endif
                        
                    </td>
                </tr>
                <div class="modal fade user" id="editCompany{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="edit_admin_company" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="companyid" value="{{$company->id}}">
                                    <!-- Start Name -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Company Name</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="name" value="{{$company->name}}" class="form-control" autocomplete="off" required="required" placeholder="name company">
                                        </div>
                                    </div>
                                    <!-- End Name -->
                                    <!-- Start Bio -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Bio Company</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="bio" value="{{$company->bio}}" class="form-control" required="required" placeholder="Bio Company">
                                        </div>
                                    </div>
                                    <!-- End Bio -->
                                    <!-- Start Address -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Address Company</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="address" value="{{$company->address}}" class="form-control" required="required" placeholder="Address Company">
                                        </div>
                                    </div>
                                    <!-- End Address -->
                                    <!-- Start Avatar Field -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Company Avatar</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="file" name="avatar" value="{{$company->avatar}}" class="form-control">
                                        </div>
                                    </div>
                                    <!-- End Avatar Field -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Save Company" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="deleteCompany{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="delete_admin_company" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Company</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="companyid" value="{{$company->id}}">
                                    <h2>Are You Sure!</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Delete Company" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="activeCompany{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="active_admin_company" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Status Company</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="companyid" value="{{$company->id}}">
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
        <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCompany">
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>
    <div class="modal fade user" id="addCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add_admin_company" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Start Name -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Company Name</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="name" class="form-control" autocomplete="off" required="required" placeholder="Name Company">
                            </div>
                        </div>
                        <!-- End Name -->
                        <!-- Start Bio -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Bio Company</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="bio" class="form-control" required="required" placeholder="Bio Company">
                            </div>
                        </div>
                        <!-- End Bio -->
                        <!-- Start Address -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Address Company</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="address" class="form-control" autocomplete="new-password" required="required" placeholder="Address Company">
                            </div>
                        </div>
                        <!-- End Address -->
                        <!-- Start Avatar Field -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Company Avatar</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>
                        <!-- End Avatar Field -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save Company" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
