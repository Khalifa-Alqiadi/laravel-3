<?php //session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8" />
         <title></title>
         <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/jquery.selectBoxIt.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/control.css')}}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link "  href="users">users</a></li>
                    <li class="nav-item"><a class="nav-link "  href="companies">companies</a></li>
                    <li class="nav-item"><a class="nav-link "  href="jobs">jobs</a></li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    khalifa
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../index.php">Visit Shop</a></li>
                        <li><a class="dropdown-item" href="members.php?do=Edit&userid=">
                            khalifa
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#"></a></li>
                        <li><a class="dropdown-item" href="logout.php"></a></li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        @if(isset($redirect))
            {{$redirect}}
        @endif
        <div class="container-fluid">
        
            <div class="row">
                <div class="col-sm-2 bg-white">
                    <div class="d-flex flex-column align-items-cinter justify-content-start">
                        @foreach($users as $user)
                            @if($user->id == $_SESSION['userid'])
                                <img src="images/{{$user->avatar}}" alt="" class="m-2">
                                <h2 class="mt-3">{{$user->name}}</h2>
                                <p class="mt-3">{{$user->email}}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-10">
                    <h1 class="text-center mb-5">Manage My Dashboard</h1>
                    <div class=" latest">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-users"></i> Latest  <span class="btn btn-info numbers">5</span>  Skills 
                                        <span class="toggle-info pull-right">
                                            <i class="fa fa-plus fa-lg"></i>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <ul class=" list-unstyled latest-users">
                                            @foreach($skills as $skill)
                                                
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p class="m-0">{{$skill->userSkill->name}}</p>
                                                        <p class="m-0">{{$skill->userSkill->percent}}%</p>
                                                        <p class="m-0">
                                                            <a href="" class="btn btn-primary py-0" data-bs-toggle="modal" data-bs-target="#editSkill{{$skill->userSkill->id}}">
                                                                <i class="fa fa-edit"></i>Edit   
                                                            </a>
                                                            <a href='' class='btn btn-danger py-0' data-bs-toggle="modal" data-bs-target="#deleteSkill{{$skill->userSkill->id}}">
                                                                <i class='fa fa-delete'></i> Delete
                                                            </a> 
                                                        </p>
                                                        <div class="modal fade" id="editSkill{{$skill->userSkill->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="edit_skill_user" method="post">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Skill</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="skillid" value="{{$skill->userSkill->id}}">
                                                                            <input type="text" name="name" value="{{$skill->userSkill->name}}" class="mt-3 form-control" placeholder="Enter Skill Name">
                                                                            <input type="text" name="percent" value="{{$skill->userSkill->percent}}" class="mt-3 form-control" placeholder="Enter Skill Percent">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <input type="submit" class="btn btn-primary" value="Save skill" />
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="deleteSkill{{$skill->userSkill->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="delete_skill_user" method="post">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">delete Skill</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="skillid" value="{{$skill->userSkill->id}}">
                                                                            <h2>Are you sure!</h2>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <input type="submit" class="btn btn-primary" value="Delete skill" />
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                
                                            @endforeach
                                        </ul>
                                        <button type="button" class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSkill">
                                            add kill
                                        </button>
                                        
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <i class="fa fa-tag"></i>Latest  <span class="btn btn-info numbers">5</span>  Experience
                                        <span class="toggle-info pull-right">
                                            <i class="fa fa-plus fa-lg"></i>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                    <ul class=" list-unstyled latest-users">
                                            @foreach($experience as $exper)
                                                
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p class="m-0">{{$exper->userExperience->name}}</p>
                                                        <p class="m-0">{{$exper->userExperience->years}} Years</p>
                                                        <p class="m-0">
                                                            <a href="" class="btn btn-primary py-0" data-bs-toggle="modal" data-bs-target="#editExperience{{$exper->userExperience->id}}">
                                                                <i class="fa fa-edit"></i>Edit   
                                                            </a>
                                                            <a href='' class='btn btn-danger py-0' data-bs-toggle="modal" data-bs-target="#deleteExperience{{$exper->userExperience->id}}">
                                                                <i class='fa fa-delete'></i> Delete
                                                            </a> 
                                                        </p>
                                                        <div class="modal fade" id="editExperience{{$exper->userExperience->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="edit_experience_user" method="post">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Experience</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="experienceid" value="{{$exper->userExperience->id}}">
                                                                            <input type="text" name="name" value="{{$exper->userExperience->name}}" class="mt-3 form-control" placeholder="Enter Skill Name">
                                                                            <input type="text" name="years" value="{{$exper->userExperience->years}}" class="mt-3 form-control" placeholder="Enter Skill Percent">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <input type="submit" class="btn btn-primary" value="Update experience" />
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="deleteExperience{{$exper->userExperience->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="delete_experience_user" method="post">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">delete experience</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="experienceid" value="{{$exper->userExperience->id}}">
                                                                            <h2>Are you sure!</h2>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <input type="submit" class="btn btn-primary" value="Delete experience" />
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                
                                            @endforeach
                                        </ul>
                                        <button type="button" class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExperience">
                                            add experience
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-comments-o"></i> Latest  <span class="btn btn-info numbers">5</span>  Qualifcations  
                                        <span class="toggle-info pull-right">
                                            <i class="fa fa-plus fa-lg"></i>
                                        </span>
                                    </div>
                                    <div class="card-body">

                                        <ul class=" list-unstyled latest-users">
                                            @foreach($qualifcations as $qualif)
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p class="m-0">{{$qualif->userQualifcation->name}}</p>
                                                        <p class="m-0">{{$qualif->userQualifcation->depart}} </p>
                                                        <p class="m-0">{{$qualif->userQualifcation->university}} </p>
                                                        <p class="m-0">
                                                            <a href="" class="btn btn-primary py-0" data-bs-toggle="modal" data-bs-target="#editQualifcations{{$qualif->userQualifcation->id}}">
                                                                <i class="fa fa-edit"></i>Edit   
                                                            </a>
                                                            <a href='' class='btn btn-danger py-0' data-bs-toggle="modal" data-bs-target="#deleteQualifcations{{$qualif->userQualifcation->id}}">
                                                                <i class='fa fa-delete'></i> Delete
                                                            </a> 
                                                        </p>
                                                        <div class="modal fade" id="editQualifcations{{$qualif->userQualifcation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="edit_qualifcations_user" method="post">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Qualifcations</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="qualifid" value="{{$qualif->userQualifcation->id}}">
                                                                            <input type="text" name="name" value="{{$qualif->userQualifcation->name}}" class="mt-3 form-control" placeholder="Enter Qualifcations Name">
                                                                            <input type="text" name="depart" value="{{$qualif->userQualifcation->depart}}" class="mt-3 form-control" placeholder="Enter Qualifcations Depart">
                                                                            <input type="text" name="university" value="{{$qualif->userQualifcation->university}}" class="mt-3 form-control" placeholder="Enter Qualifcations University">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <input type="submit" class="btn btn-primary" value="Update Qualifcations" />
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="deleteQualifcations{{$qualif->userQualifcation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="delete_qualifcations_user" method="post">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">delete experience</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="qualifid" value="{{$qualif->userQualifcation->id}}">
                                                                            <h2>Are you sure!</h2>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <input type="submit" class="btn btn-primary" value="Delete Qualifcations" />
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQualifcations">
                                            add Qualifcations
                                        </button>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <i class="fa fa-comments-o"></i> Latest  <span class="btn btn-info numbers">5</span>  Courses  
                                        <span class="toggle-info pull-right">
                                            <i class="fa fa-plus fa-lg"></i>
                                        </span>
                                    </div>
                                    <div class="card-body">

                                        <ul class=" list-unstyled latest-users">
                                            @foreach($courses as $course)
                                                
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p class="m-0">{{$course->userCourse->name}}</p>
                                                        <p class="m-0">
                                                            <a href="" class="btn btn-primary py-0" data-bs-toggle="modal" data-bs-target="#editCourses{{$course->userCourse->id}}">
                                                                <i class="fa fa-edit"></i>Edit   
                                                            </a>
                                                            <a href='' class='btn btn-danger py-0' data-bs-toggle="modal" data-bs-target="#deleteCourses{{$course->userCourse->id}}">
                                                                <i class='fa fa-delete'></i> Delete
                                                            </a> 
                                                        </p>
                                                        <div class="modal fade" id="editCourses{{$course->userCourse->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="edit_courses_user" method="post">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Courses</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="courseid" value="{{$course->userCourse->id}}">
                                                                            <input type="text" name="name" value="{{$course->userCourse->name}}" class="mt-3 form-control" placeholder="Enter Course Name">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <input type="submit" class="btn btn-primary" value="Update Course" />
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="deleteCourses{{$course->userCourse->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="delete_courses_user" method="post">
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">delete Course</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="courseid" value="{{$course->userCourse->id}}">
                                                                            <h2>Are you sure!</h2>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <input type="submit" class="btn btn-primary" value="Delete course" />
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourses">
                                            add Courses
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="add_skill_user" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="userid" value="{{$_SESSION['userid']}}">
                            <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Skill Name">
                            <input type="text" name="percent" class="mt-3 form-control" placeholder="Enter Skill Percent">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save skill" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addExperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="add_experience_user" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="userid" value="{{$_SESSION['userid']}}">
                            <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Experience Name">
                            <input type="text" name="years" class="mt-3 form-control" placeholder="Enter Experience Years">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save Experience" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addQualifcations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="add_qualifcations_user" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="userid" value="{{$_SESSION['userid']}}">
                            <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Qualifcations Name">
                            <input type="text" name="depart" class="mt-3 form-control" placeholder="Enter Qualifcations Departement">
                            <input type="text" name="university" class="mt-3 form-control" placeholder="Enter Qualifcations University">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save Qualifcations" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addCourses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="add_Courses_user" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Courses</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="userid" value="{{$_SESSION['userid']}}">
                            <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Courses Name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save Courses" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @yield('showusers')
        @yield('addusers')
        @yield('editusers')

        <div clase="footer">
            
        </div>
        <script src="{{ URL::asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{ URL::asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('js/jquery.selectBoxIt.min.js')}}"></script>
        <script src="{{ URL::asset('js/control.js')}}"></script>
    </body>
</html>