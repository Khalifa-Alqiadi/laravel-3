@extends('admin.layout.master')
@section('showusers')
<h1 class="text-center">Manage User</h1>
    <div class="container">
        <div class="table-responsive">
            <table class="main-table manage-members text-center table table-bordered">
                <tr>
                    <td>#ID</td>
                    <td>Avatar</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Control</td>
                </tr>

                @foreach($users as $user)
                <tr>
                    <td>1</td>
                    <td class='avatar-img'>
                        <img src='image/ {{ $user->avatar}}' alt=''> 
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUser{{$user->id}}">
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a href="" class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#deleteUser{{$user->id}}">
                            <i class='fa fa-close'></i> Delete
                        </a>
                        @if($user->is_active == 1)
                            <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#activeUser{{$user->id}}">
                                <i class='fa fa-check'></i> Active
                            </a>
                        @else
                            <a href="" class='btn btn-danger activate' data-bs-toggle="modal" data-bs-target="#activeUser{{$user->id}}">
                                <i class='fa fa-close'></i> noActive
                            </a>
                        @endif
                        
                    </td>
                </tr>
                <div class="modal fade user" id="editUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="edit_admin_user" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="userid" value="{{$user->id}}">
                                    <!-- Start UserName -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="username" value="{{$user->name}}" class="form-control" autocomplete="off" required="required" placeholder="Username To Login Into Shop">
                                        </div>
                                    </div>
                                    <!-- End UserName -->
                                    <!-- Start Email -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" name="email" value="{{$user->email}}" class="form-control" required="required" placeholder="Email Must Be Valid">
                                        </div>
                                    </div>
                                    <!-- End Email -->
                                    <!-- Start Avatar Field -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-2 col-form-label">User Avatar</label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="file" name="avatar" value="{{$user->avatar}}" class="form-control">
                                        </div>
                                    </div>
                                    <!-- End Avatar Field -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Save User" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="deleteUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="delete_admin_user" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="userid" value="{{$user->id}}">
                                    <h2>Are You Sure!</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Delete User" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="activeUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="active_admin_user" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Status User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="userid" value="{{$user->id}}">
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
        <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>
    <div class="modal fade user" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add_admin_user" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Start UserName -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="username" class="form-control" autocomplete="off" required="required" placeholder="Username To Login Into Shop">
                            </div>
                        </div>
                        <!-- End UserName -->
                        <!-- Start Email -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="text" name="email" class="form-control" required="required" placeholder="Email Must Be Valid">
                            </div>
                        </div>
                        <!-- End Email -->
                        <!-- Start Password -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="password" name="password" class="password form-control" autocomplete="new-password" required="required" placeholder="Password Must Be Hard & Complex">
                                <i class="show-pass fa fa-eye fa-1x"></i>
                            </div>
                        </div>
                        <!-- End Password -->
                        <!-- Start Avatar Field -->
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">User Avatar</label>
                            <div class="col-sm-10 col-md-9">
                                <input type="file" name="avatar" class="form-control">
                            </div>
                        </div>
                        <!-- End Avatar Field -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save User" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
