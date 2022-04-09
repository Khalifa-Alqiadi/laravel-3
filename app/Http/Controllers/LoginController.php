<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function loginUser(Request $request){

        Validator::validate($request->all(),[
            'username'=>['required','min:3','max:10'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','min:5'],

        ],[
            'username.required'=>'this field is required',
            'username.min'=>'can not be less than 3 letters', 
            'email.unique'=>'there is an email in the table',
            'email.required'=>'this field is required',
            'email.email'=>'incorrect email format',
            'password.required'=>'password is required',
            'password.min'=>'password should not be less than 3',
        ]);

        $u=new User();
        $u->name=$request->username;
        $u->password=sha1($request->password);
        $u->email=$request->email;
        if($u->save())
        return redirect()->route('/')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }
    function login(Request $request){
        $name =$request->username;
        $password = $request->password;
        $pass = sha1($password);
        $user = DB::table('users')->where('name', $name)->where('password', $pass)->get();
        foreach($user as $u){
            session_start();
            $_SESSION['user'] = $u->name;
            $_SESSION['userid'] = $u->id;
            $userSession = $_SESSION['user'];
            $userIdSession = $_SESSION['userid'];
        }
        return view('layout.home', ['userSession'=> $userIdSession]);
    }
}
