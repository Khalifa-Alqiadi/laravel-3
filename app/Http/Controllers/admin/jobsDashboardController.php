<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Company;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class jobsDashboardController extends Controller
{
    //
    public function showJobs(){
        $companies = Company::select()->get();
        $jobs = Company::with('companyJob')->where('id', 1)->get();
        return view('admin.jobs.adminJobs', [
            'jobs' => $jobs,
            'companies' => $companies
        ]);
    }
    public function insertJobsAdmin(Request $request){

        Validator::validate($request->all(),[
            'name'=>['required'],
            'descrip'=>['required'],
            'address'=>['required'],
            'start'=>['required'],
            'end'=>['required'],
            'image'=>['required'],

        ],[
            'name.required'=>'name is required',
            'descrip.required'=>'bio is required',
            'address.required'=>'address is required',
            'start.required'=>'address is required',
            'end.required'=>'address is required',
            'image.required'=>'image is required',
        ]);

        $name=$request->name;
        $descrip= $request->descrip;
        $address =$request->address;
        $start =$request->start;
        $end =$request->end;
        $company =$request->company;
        $file = $request->hasFile('image');
        $newFile = $request->file('image');
        $name_path = $newFile->store('images');
        $stmt = DB::table('jobs')
                    ->insert([
                        'name'              => $name,
                        'description'       => $descrip,
                        'address_name'      => $address,
                        'start_date'        => $start,
                        'end_date'          => $end,
                        'company_id'       => $company,
                        'image'             => $name_path
                    ]);
        if($stmt)
        return redirect()->route('admin.companies.adminJob')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }
    function editJobsAdmin(Request $request){
        
        $id = $request->jobid;
        $name=$request->name;
        $descrip= $request->descrip;
        $address =$request->address;
        $start =$request->start;
        $end =$request->end;
        $company =$request->company;
        $file = $request->hasFile('image');
        $newFile = $request->file('image');
        $name_path = $newFile->store('images');
        $update=DB::table('jobs')
                ->where('id', $id)
                ->update([
                    'name'          => $name, 
                    'description'   => $descrip, 
                    'address_name'  => $address, 
                    'start_date'    => $start, 
                    'end_date'      => $end, 
                    'company_id'   => $company, 
                    'image'         => $name_path
                ]);
        if($update != NULL){
        return redirect('adminJobs')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function deleteJobsAdmin(Request $request){
        $id = $request->jobid;
        $stmt = DB::table('jobs')->where('id', $id)->delete();
        if($stmt != NULL){
            return redirect('adminJobs')
                ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function activeJobsAdmin(Request $request){
        $id = $request->jobid;
        $jobs = DB::table('jobs')->where('id', $id)->find($id);
            if($jobs->is_active == 1){
                $active = DB::table('jobs')->where('id', $jobs->id)->update(['is_active' => 0]);
            }else{
                $active = DB::table('jobs')->where('id', $jobs->id)->update(['is_active' => 1]);
            }
        
        return redirect('adminCompanies')
            ->with(['success'=>'user created successful']);
    }

    public function showDetailsAdmin(){
        $jobs = DB::table('jobs')->get();
        $details = DB::table('details')
            ->join('jobs', 'jobs.id', '=', 'details.job_id')
            ->select('details.*', 'jobs.name')
            ->get();
        return view('admin.details.adminDetails', [
            'details' => $details,
            'jobs' => $jobs
        ]);
    }
    public function insertDetailsAdmin(Request $request){

        Validator::validate($request->all(),[
            'title'=>['required'],
            'descrip'=>['required'],
            'job'=>['required'],

        ],[
            'title.required'=>'name is required',
            'descrip.required'=>'bio is required',
            'job.required'=>'address is required',
        ]);

        $details_jobs = new Detail();
        $details_jobs->title = $request->title;
        $details_jobs->description = $request->descrip;
        $details_jobs->job_id = $request->job;
        
        if($details_jobs->save())
        return redirect()->route('adminDetails')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);

    }
    function editDetailsAdmin(Request $request){
        // $detail = new Detail();
        $id = $request->detailid;
        $detail = Detail::find($id);
        $detail->title = $request->title;
        $detail->description = $request->descrip;
        $detail->job_id = $request->job;
        if($detail->update())
        return redirect()->route('adminDetails')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);
    }
    function deleteDetailsAdmin(Request $request){
        $id = $request->detailid;
        $detail = Detail::find($id);
        if($detail->delete())
        return redirect()->route('adminDetails')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);
    }
    function activeDetailsAdmin(Request $request){
        $id = $request->detailid;
        $detail = DB::table('details')->where('id', $id)->find($id);
        if($detail->is_active == 1){
            $stmt = DB::table('details')->where('id', $detail->id)->update(['is_active' => 0]);
        }else{
            $stmt = DB::table('details')->where('id', $detail->id)->update(['is_active' => 1]);
        }

        return redirect()->route('adminDetails')
        ->with(['success'=>'user created successful']);
        return back()->with(['error'=>'can not create user']);
    }
}
