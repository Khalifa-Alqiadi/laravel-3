<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    public function showUsers(User $user){
        $user = DB::table('users')->get();
        return view('admin.users.adminUsers', ['users' => $user]);
    }
    public function addUser(){
        return view('admin.users.users?do=Add');
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
        if($u->save())
        return redirect()->route('users')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }
    function updateUser(Request $request){
        
        $id = $request->userid;
        $name = $request->username;
        $email = $request->email;
        $file = $request->hasFile('avatar');
        $newFile = $request->file('avatar');
        $name_path = $newFile->store('image');
        $update=DB::table('users')
                ->where('id', $id)
                ->update(['name' => $name, 'email' => $email, 'avatar' => $name_path]);
        if($update != NULL){
        return redirect('adminUsers')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function deleteUser(Request $request){
        $id = $request->userid;
        $stmt = DB::table('users')->where('id', $id)->delete();
        if($stmt != NULL){
            return redirect('adminUsers')
                ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function activeUser(Request $request){
        $userid = $request->userid;
        $users = DB::table('users')->where('id', $userid)->get();
        foreach($users as $user){
            if($user->is_active == 1){
                $active = DB::table('users')->where('id', $user->id)->update(['is_active' => 0]);
            }else{
                $active = DB::table('users')->where('id', $user->id)->update(['is_active' => 1]);
            }
        }
        return redirect('adminUsers')
            ->with(['success'=>'user created successful']);
    }
}
