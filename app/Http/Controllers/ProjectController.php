<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Project;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        Paginator::useBootstrap();

        $projects = Project::paginate(5);

        $totalweb = Project::select(DB::raw("SUM(price) as Totals"))
        ->where('cat','Web Development')
        ->where('status','Done')
        ->value('Totals');

        $totalvtour = Project::select(DB::raw("SUM(price) as Totals"))
        ->where('cat','Virtual Tour Development')
        ->where('status','Done')
        ->value('Totals');

        $totalerp = Project::select(DB::raw("SUM(price) as Totals"))
        ->where('cat','LIKE','%ERP%')
        ->where('status','Done')
        ->value('Totals');

        $ongoing = Project::select(DB::raw("COUNT(*) as ongoing"))
        ->where('status','=','Ongoing')
        ->value('ongoing');

        $done = Project::select(DB::raw("COUNT(*) as done"))
        ->where('status','=','Done')
        ->value('done');

        $doneweb = Project::select(DB::raw("COUNT(*) as doneweb"))
        ->where('cat','Web Development')
        ->where('status','Done')
        ->value('doneweb');

        $donevtour = Project::select(DB::raw("COUNT(*) as donevtour"))
        ->where('cat','Virtual Tour Development')
        ->where('status','Done')
        ->value('donevtour');

        $doneerp = Project::select(DB::raw("COUNT(*) as doneerp"))
        ->where('cat','ERP Development')
        ->where('status','Done')
        ->value('doneerp');

        $ongweb = Project::select(DB::raw("COUNT(*) as ongweb"))
        ->where('cat','Web Development')
        ->where('status','Ongoing')
        ->value('ongweb');

        $ongvtour = Project::select(DB::raw("COUNT(*) as ongvtour"))
        ->where('cat','Virtual Tour Development')
        ->where('status','Ongoing')
        ->value('ongvtour');

        $ongerp = Project::select(DB::raw("COUNT(*) as ongerp"))
        ->where('cat','ERP Development')
        ->where('status','Ongoing')
        ->value('ongerp');

        $projectearnings = Project::select(DB::raw("SUM(price) as Total"))
            ->where('status','=','Done')
            ->value('Total');
        

        // dd($developer);

        $datas = [$totalweb,$totalvtour,$totalerp];

        return view('project.projectindex',[
            "projects" => $projects,
            "datas" => $datas,
            "ongoing" => $ongoing,
            "ongweb" => $ongweb,
            "ongvtour" => $ongvtour,
            "ongerp" => $ongerp,
            "done" => $done,
            "doneweb" => $doneweb,
            "donevtour" => $donevtour,
            "doneerp" => $doneerp,
            "projectearnings" => $projectearnings
        ]);

    }

    public function create(){
        $staffs = Staff::all();

        $developers = Staff::select('name AS name')
        ->where('role','LIKE','%Dev%')
        ->pluck('name');

        return view('project.create.project',[
            "staffs" => $staffs,
            "developers" => $developers
        ]);

    }

    public function createproject(){
        $project = new Project();

        $project->name = request('name');
        $project->pic = request('pic');
        $project->cat = request('cat');
        $project->price = request('price');
        $project->eng = request('eng');
        $project->desi = request('desi');
        $project->startdate = request('startdate');
        $project->enddate = request('enddate');

        $project->save();

        return redirect('/project/index')->with('mssg','New Project Added');
    }

    public function edit($id){
        $staffs = Staff::all();
        $project = Project::findOrFail($id);

        return view('project.edit.project',[
            "staffs" => $staffs,
            "project" => $project
        ]);

    }

    public function editproject($id){
        $project = Project::findOrFail($id);

        $project->name = request('name');
        $project->pic = request('pic');
        $project->cat = request('cat');
        $project->price = request('price');
        $project->eng = request('eng');
        $project->desi = request('desi');
        $project->startdate = request('startdate');
        $project->enddate = request('enddate');

        $project->update();

        return redirect('/project/index')->with('mssg','Project Updated');

    }

    public function projectdetails($id){
        $project = Project::findOrFail($id);

        $logs = Log::all();

        return view('project.details.project',[
            "project" => $project,
            "logs" => $logs
        ]);
    }

    public function newlog(){
        $log = new Log();

        $log->projid = request('projid');
        $log->date = request('date');
        $log->title = request('title');
        $log->log = request('log');
        $log->cat = "project";

        $log->save();

        return redirect('/project/details/'.$log->projid)->with('mssg','New Project Log Added');

    }

    public function done($id){
        $project = Project::findOrFail($id);

        $project->status = "Done";

        $project->update();

        return redirect('/project/index')->with('mssg','Project Status Updated');
    }

    public function destroy($id){
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect('/project/index')->with('mssg','Project Deleted');

    }
}
