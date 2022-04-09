<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{
    //
    public function showCompanies(){
        $stmt = DB::table('companies')->get();
        return view('admin.companies.adminCompanies', ['companies' => $stmt]);
    }
    public function insertCompany(Request $request){

        Validator::validate($request->all(),[
            'name'=>['required','unique:companies,name'],
            'bio'=>['required'],
            'address'=>['required'],
            'avatar'=>['required'],

        ],[
            'name.required'=>'name is required',
            'name.unique'=>'there is an name in the table',
            'bio.required'=>'bio is required',
            'address.required'=>'address is required',
            'avatar.required'=>'image is required',
        ]);

        $name=$request->name;
        $bio= $request->bio;
        $address =$request->address;
        $file = $request->hasFile('avatar');
        $newFile = $request->file('avatar');
        $name_path = $newFile->store('images');
        $stmt = DB::table('companies')
                    ->insert([
                        'name'      => $name,
                        'bio'       => $bio,
                        'address'   => $address,
                        'avatar'    => $name_path
                    ]);
        if($stmt)
        return redirect()->route('admin.companies.adminCompanies')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }
    function editCompanies(Request $request){
        
        $id = $request->companyid;
        $name = $request->name;
        $bio = $request->bio;
        $address = $request->address;
        $file = $request->hasFile('avatar');
        $newFile = $request->file('avatar');
        $name_path = $newFile->store('images');
        $update=DB::table('companies')
                ->where('id', $id)
                ->update(['name' => $name, 'bio' => $bio, 'address' => $address, 'avatar' => $name_path]);
        if($update != NULL){
        return redirect('adminCompanies')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function deleteCompanies(Request $request){
        $id = $request->companyid;
        $stmt = DB::table('companies')->where('id', $id)->delete();
        if($stmt != NULL){
            return redirect('adminCompanies')
                ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function activeCompanies(Request $request){
        $id = $request->companyid;
        $companies = DB::table('companies')->where('id', $id)->find($id);
        // foreach($companies as $company){
            if($companies->is_active == 1){
                $active = DB::table('companies')->where('id', $companies->id)->update(['is_active' => 0]);
            }else{
                $active = DB::table('companies')->where('id', $companies->id)->update(['is_active' => 1]);
            }
        // }
        return redirect('adminCompanies')
            ->with(['success'=>'user created successful']);
    }
}
