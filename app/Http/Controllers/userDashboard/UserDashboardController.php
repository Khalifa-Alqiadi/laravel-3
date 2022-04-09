<?php

namespace App\Http\Controllers\userDashboard;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
session_start();
class UserDashboardController extends Controller
{
    //
    function showUserDashboard(){
        
        $users = DB::table('users')->get();
        // $experience = DB::table('experience')->get();
        // $qualifcations = DB::table('qualifcations')->get();
        // $courses = DB::table('courses')->get();
        $skills = User::with('userSkill')->where('id', $_SESSION['userid'])->get();
        $experience = User::with('userExperience')->where('id', $_SESSION['userid'])->get();
        $qualifcations = User::with('userQualifcation')->where('id', $_SESSION['userid'])->get();
        $courses = User::with('userCourse')->where('id', $_SESSION['userid'])->get();
        return view('userDashboard.layout.userDashboard', [
            'users'     => $users,
            'skills'    => $skills,
            'experience'    => $experience,
            'qualifcations'    => $qualifcations,
            'courses'    => $courses,
        ]);
    }
    function insertSkillUserDashboard(Request $request){
        $userid = $request->userid;
        $name = $request->name;
        $percent = $request->percent;
        $skill = DB::table('skills')->insert([
            'name'      => $name,
            'percent'   => $percent,
            'user_id'   => $userid
        ]);
        if($skill)
        return redirect()->route('userDashboard')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);
    }
    function editSkillUserDashboard(Request $request){
        $id = $request->skillid;
        $name = $request->name;
        $percent = $request->percent;
        $editSkill = DB::table('skills')
                        ->where('id', $id)
                        ->update([
                            'name'      => $name,
                            'percent'   => $percent
                        ]);
        if($editSkill)
        return redirect()->route('userDashboard')
        ->with(['success'=>'user updated successful']);
        return back()->with(['error'=>'can not create user']);
    }
    function deleteSkillUserDashboard(Request $request){
        $id = $request->skillid;
        $delete = DB::table('skills')->where('id', $id)->delete();
        if($delete)
        return redirect()->route('userDashboard')
        ->with(['success'=>'user deleted successful']);
        return back()->with(['error'=>'can not create user']);
    }

    function insertExperienceUserDashboard(Request $request){
        $userid = $request->userid;
        $name = $request->name;
        $years = $request->years;
        $experience = DB::table('experience')->insert([
            'name'      => $name,
            'years'   => $years,
            'user_id'   => $userid
        ]);
        if($experience){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> inserted successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function editExperienceUserDashboard(Request $request){
        $id = $request->experienceid;
        $name = $request->name;
        $years = $request->years;
        $editExperience = DB::table('experience')
                        ->where('id', $id)
                        ->update([
                            'name'      => $name,
                            'years'   => $years
                        ]);
        if($editExperience)
        return redirect()->route('userDashboard')
        ->with(['success'=>'user updated successful']);
        return back()->with(['error'=>'can not create user']);
    }
    function deleteExperienceUserDashboard(Request $request){
        $id = $request->experienceid;
        $deleteExperience = DB::table('experience')->where('id', $id)->delete();
        if($deleteExperience)
        return redirect()->route('userDashboard')
        ->with(['success'=>'user deleted successful']);
        return back()->with(['error'=>'can not create user']);
    }
    function insertQualifcationsUserDashboard(Request $request){
        $userid = $request->userid;
        $name = $request->name;
        $depart = $request->depart;
        $university = $request->university;
        $qualifcations = DB::table('qualifcations')->insert([
            'name'      => $name,
            'depart'   => $depart,
            'university'   => $university,
            'user_id'   => $userid
        ]);
        if($qualifcations){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> inserted successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function editQualifcationsUserDashboard(Request $request){
        $qualifid = $request->qualifid;
        $name = $request->name;
        $depart = $request->depart;
        $university = $request->university;
        $qualifcations = DB::table('qualifcations')->where('id', $qualifid)->update([
            'name'      => $name,
            'depart'   => $depart,
            'university'   => $university,
        ]);
        if($qualifcations){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> Updated successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }

    function deleteQualifcationsUserDashboard(Request $request){
        $id = $request->qualifid;
        $qualifcations = DB::table('qualifcations')->where('id', $id)->delete();
        if($qualifcations){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> Deleted successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function addCoursesUser(Request $request){
        $userid = $request->userid;
        $name = $request->name;
        $courses = DB::table('courses')->insert([
            'name'      => $name,
            'user_id'   => $userid
        ]);
        if($courses){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> inserted successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }

    function editCoursesUser(Request $request){
        $courseid = $request->courseid;
        $name = $request->name;
        $courses = DB::table('courses')->where('id', $courseid)->update(['name'      => $name ]);
        if($courses){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> Updated successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function deleteCoursesUser(Request $request){
        $id = $request->courseid;
        $courses = DB::table('courses')->where('id', $id)->delete();
        if($courses){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> Deleted successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect('userDashboard');
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }

}
