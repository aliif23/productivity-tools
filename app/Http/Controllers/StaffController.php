<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{

    public function index(){

        $paginatestaffs = Paginator::useBootstrap();

        $staffs = Staff::paginate(5);


        $totalstaff = Staff::select(DB::raw("COUNT(*) as TotalStaff"))
            ->value('TotalStaff');
        
        $totaldev = Staff::select(DB::raw("COUNT(*) as TotalDev"))
            ->where('role','LIKE','%Dev%')
            ->value('TotalDev');

        $totalpm = Staff::select(DB::raw("COUNT(*) as TotalPm"))
        ->where('role','=','Project Manager')
        ->value('TotalPm');

        $totaldes = Staff::select(DB::raw("COUNT(*) as TotalDesi"))
            ->where('role','LIKE','%Desi%')
            ->value('TotalDesi');


        return view('project.staffindex',[
            "staffs" => $staffs,
            "totalstaff" => $totalstaff,
            "totaldev" => $totaldev,
            "totalpm" => $totalpm,
            "totaldes" => $totaldes
        ]);

    }
    public function create(Request $request){
        $staff = new Staff();

        $staff->name = request('name');
        $staff->role = request('role');
        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('img/staff/',$filename);
        $staff->gambar = $filename;

        $staff->save();

        return redirect('/staff/index')->with('mssg','New Data Added');
    }

    public function show($id){
        $staff = Staff::findOrFail($id);
       

        return view('project.edit.staff',[
            "staff"=>$staff
        ]);

    }

    public function showdetails($id){
        $staff = Staff::findOrFail($id);
        $projects = Project::all();

        return view('project.details.staff',[
            "staff" => $staff,
            "projects" => $projects
        ]);
    }

    public function edit(Request $request, $id){
        $staff = Staff::findOrFail($id);
        $staff->name = request('name');
        $staff->role = request('role');
        $file = $request->file('gambar');
        if($request->hasfile('gambar')){
            $destination = 'img/staff/'.$staff->gambar;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('img/staff/',$filename);
            $staff->gambar = $filename;
        }

        $staff->update();
        return redirect('/staff/index')->with('mssg','Data Edited');

    }

    public function destroy($id){
        $staff = Staff::findOrFail($id);

        $staff->delete();
        return redirect('/staff/index')->with('mssg','Data Deleted');
    }
}
