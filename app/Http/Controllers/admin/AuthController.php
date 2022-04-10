<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function listAll(){

        $users=User::where('is_active',1)
        ->where('email_verified_at','!=',NULL)
        ->orWhere('name','like','%af%')
        ->orderBy('user_id','desc')
       // ->take(2)
        ->get();
        //$user=User::find(1);
        //return response($user);
        return view('admin.users.list_users')
        ->with('allUsers',$users);
    }

    public function showLogin(){
        if(Auth::check())
        return redirect()->route($this->checkRole());
        else 
        return view('login');
    }



    public function checkRole(){
        if(Auth::user()->hasRole('admin'))
        return 'dashboard';
            else 
            return 'home';
        
    }

    public function login(Request $request){
        Validator::validate($request->all(),[
            'username'=>['required','min:3','max:50'],
            'password'=>['required','min:5']


        ],[
            'username.required'=>'this field is required',
            'password.min'=>'can not be less than 3 letters', 
           
        ]);
        $password = $request->password;
        $pass = sha1($password);
        

        if(Auth::attempt(['email'=>$request->username,'password'=>$request->password])){

            
            if(Auth::user()->hasRole('admin'))
            return redirect()->route('adminUsers');
            else 
            return redirect()->route('home');

        
        }
        else {
            return redirect()->route('showLogin')->with(['message'=>'incorerct username or password or your account is not active ']);
        }

        
    }

    public function register(Request $request){

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
        $password= $request->password;
        $u->password = sha1($password);
        $u->email=$request->email;
        $file = $request->hasFile('avatar');
        $newFile = $request->file('avatar');
        $name_path = $newFile->store('image');
        // dd(asset('/images/' . $name_path));
        $u->avatar = $name_path;
        if($u->save()){
        $u->attachRole('admin');
        return redirect()->route('users')
        ->with(['success'=>'user created successful']);
        }
        return back()->with(['error'=>'can not create user']);

    }      


    public function editUser(){
        $u=User::find(5);
        if($u->hasRole('admin'))
        {
            
        }
        else {
            
        }
    }
    public function resetPassword(){

    }
    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }

}
