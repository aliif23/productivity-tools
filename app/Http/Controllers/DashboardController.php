<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Staff;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function dashboard(){

        $bulanke = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

        $ongoingprojects = Project::select(DB::raw("COUNT(*) as Total"))
            ->where('status','=','Ongoing')
            ->pluck('Total');
        
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

        // dd($totaldes);
        
        $completedprojects = Project::select(DB::raw("COUNT(*) as Total"))
            ->where('status','=','Done')
            ->pluck('Total');
        
        $projectearnings = Project::select(DB::raw("SUM(price) as Total"))
            ->where('status','=','Done')
            ->pluck('Total');

        // dd($ongoingprojects[0]);

        $expensetotal = Expense::select(DB::raw("SUM(amount) as totals"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totals');

        $incometotal = Income::select(DB::raw("SUM(amount) as totals"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totals');

        $monthsexpense = Expense::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $monthsincome = Income::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        
        $incomeavg = Income::select(DB::raw("SUM(amount)/12 as totals"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->value('totals');
        
        $expenseavg = Expense::select(DB::raw("SUM(amount)/12 as totals"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->value('totals');

        $incomesum = Income::select(DB::raw("SUM(amount) as totals"))
        ->whereYear('created_at',date('Y'))
        ->value('totals');

        $expensesum = Expense::select(DB::raw("SUM(amount) as totals"))
        ->whereYear('created_at',date('Y'))
        ->value('totals');

        $mondaymorningtasks = Task::all()
        ->where('endclock','>=','00:00')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','09:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Monday');

        $mondayafternoontasks = Task::all()
        ->where('endclock','>=','09:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','15:30')
        ->where('status','=',"Ongoing")
        ->where('day','=','Monday');

        $mondayeveningtasks = Task::all()
        ->where('endclock','>=','15:31')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','20:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Monday');

        $mondaynighttasks = Task::all()
        ->where('endclock','>=','20:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','23:59')
        ->where('status','=',"Ongoing")
        ->where('day','=','Monday');
        
        $tuesdaymorningtasks = Task::all()
        ->where('endclock','>=','00:00')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','09:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Tuesday');

        $tuesdayafternoontasks = Task::all()
        ->where('endclock','>=','09:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','15:30')
        ->where('status','=',"Ongoing")
        ->where('day','=','Tuesday');

        $tuesdayeveningtasks = Task::all()
        ->where('endclock','>=','15:31')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','20:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Tuesday');

        $tuesdaynighttasks = Task::all()
        ->where('endclock','>=','20:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','23:59')
        ->where('status','=',"Ongoing")
        ->where('day','=','Tuesday');  

        $wednesdaymorningtasks = Task::all()
        ->where('endclock','>=','00:00')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','09:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Wednesday');

        $wednesdayafternoontasks = Task::all()
        ->where('endclock','>=','09:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','15:30')
        ->where('status','=',"Ongoing")
        ->where('day','=','Wednesday');

        $wednesdayeveningtasks = Task::all()
        ->where('endclock','>=','15:31')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','20:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Wednesday');

        $wednesdaynighttasks = Task::all()
        ->where('endclock','>=','20:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','23:59')
        ->where('status','=',"Ongoing")
        ->where('day','=','Wednesday');  

        $thursdaymorningtasks = Task::all()
        ->where('endclock','>=','00:00')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','09:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Thursday');

        $thursdayafternoontasks = Task::all()
        ->where('endclock','>=','09:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','15:30')
        ->where('status','=',"Ongoing")
        ->where('day','=','Thursday');

        $thursdayeveningtasks = Task::all()
        ->where('endclock','>=','15:31')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','20:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Thursday');

        $thursdaynighttasks = Task::all()
        ->where('endclock','>=','20:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','23:59')
        ->where('status','=',"Ongoing")
        ->where('day','=','Thursday');  

        $fridaymorningtasks = Task::all()
        ->where('endclock','>=','00:00')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','09:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Friday');

        $fridayafternoontasks = Task::all()
        ->where('endclock','>=','09:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','15:30')
        ->where('status','=',"Ongoing")
        ->where('day','=','Friday');

        $fridayeveningtasks = Task::all()
        ->where('endclock','>=','15:31')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','20:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Friday');

        $fridaynighttasks = Task::all()
        ->where('endclock','>=','20:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','23:59')
        ->where('status','=',"Ongoing")
        ->where('day','=','Friday');  

        $saturdaymorningtasks = Task::all()
        ->where('endclock','>=','00:00')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','09:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Saturday');

        $saturdayafternoontasks = Task::all()
        ->where('endclock','>=','09:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','15:30')
        ->where('status','=',"Ongoing")
        ->where('day','=','Saturday');

        $saturdayeveningtasks = Task::all()
        ->where('endclock','>=','15:31')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','20:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Saturday');

        $saturdaynighttasks = Task::all()
        ->where('endclock','>=','20:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','23:59')
        ->where('status','=',"Ongoing")
        ->where('day','=','Saturday');  

        $sundaymorningtasks = Task::all()
        ->where('endclock','>=','00:00')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','09:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Sunday');

        $sundayafternoontasks = Task::all()
        ->where('endclock','>=','09:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','15:30')
        ->where('status','=',"Ongoing")
        ->where('day','=','Sunday');

        $sundayeveningtasks = Task::all()
        ->where('endclock','>=','15:31')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','20:00')
        ->where('status','=',"Ongoing")
        ->where('day','=','Sunday');

        $sundaynighttasks = Task::all()
        ->where('endclock','>=','20:01')
        // ->where('created_at', '>', now()->startOfWeek())
        // ->where('created_at', '<', now()->endOfWeek())
        ->where('endclock','<=','23:59')
        ->where('status','=',"Ongoing")
        ->where('day','=','Sunday'); 

        $currongprojects = Project::all()
        ->where('status','=','Ongoing');

        $staffs = Staff::all();
        
        $developers = Staff::select('name AS name')
        ->where('role','LIKE','%Dev%')
        ->pluck('name');
        

        
        // dd($incomeavg);
        
        $totalexpensemonthly = array(0,0,0,0,0,0,0,0,0,0,0,0);

        $totalincomemonthly = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach($monthsexpense as $index => $month){
            $totalexpensemonthly[$month - 1] = $expensetotal[$index];
            
        }

        foreach($monthsincome as $index => $month){
            $totalincomemonthly[$month - 1] = $incometotal[$index];
            
        }

        // dd($totalexpensemonthly,$totalincomemonthly);

        return view('welcome',[
            "ongoingprojects" => $ongoingprojects,
            "completedprojects" => $completedprojects,
            "projectearnings" => $projectearnings,
            "totalexpensemonthly" => $totalexpensemonthly,
            "totalincomemonthly" => $totalincomemonthly,
            "bulanke" => $bulanke,
            "incomeavg" => $incomeavg,
            "expenseavg" => $expenseavg,
            "incomesum" => $incomesum,
            "expensesum" => $expensesum,
            "totalstaff" => $totalstaff,
            "totaldev" => $totaldev,
            "totalpm" => $totalpm,
            "totaldes" =>$totaldes,
            "currongprojects" => $currongprojects,
            "mondaymorningtasks" => $mondaymorningtasks,
            "mondayafternoontasks" => $mondayafternoontasks,
            "mondayeveningtasks" => $mondayeveningtasks,
            "mondaynighttasks" => $mondaynighttasks,
            "tuesdaymorningtasks" => $tuesdaymorningtasks,
            "tuesdayafternoontasks" => $tuesdayafternoontasks,
            "tuesdayeveningtasks" => $tuesdayeveningtasks,
            "tuesdaynighttasks" => $tuesdaynighttasks,
            "wednesdaymorningtasks" => $wednesdaymorningtasks,
            "wednesdayafternoontasks" => $wednesdayafternoontasks,
            "wednesdayeveningtasks" => $wednesdayeveningtasks,
            "wednesdaynighttasks" => $wednesdaynighttasks,
            "thursdaymorningtasks" => $thursdaymorningtasks,
            "thursdayafternoontasks" => $thursdayafternoontasks,
            "thursdayeveningtasks" => $thursdayeveningtasks,
            "thursdaynighttasks" => $thursdaynighttasks,
            "fridaymorningtasks" => $fridaymorningtasks,
            "fridayafternoontasks" => $fridayafternoontasks,
            "fridayeveningtasks" => $fridayeveningtasks,
            "fridaynighttasks" => $fridaynighttasks,
            "saturdaymorningtasks" => $saturdaymorningtasks,
            "saturdayafternoontasks" => $saturdayafternoontasks,
            "saturdayeveningtasks" => $saturdayeveningtasks,
            "saturdaynighttasks" => $saturdaynighttasks,
            "sundaymorningtasks" => $sundaymorningtasks,
            "sundayafternoontasks" => $sundayafternoontasks,
            "sundayeveningtasks" => $sundayeveningtasks,
            "sundaynighttasks" => $sundaynighttasks,
            "staffs" => $staffs,
            "developers" => $developers
                
        ]);
    }

    public function createtask(){
        $task = new Task();

        $task->title = request('title');
        $task->clock = request('clock');
        $task->day = request('day');
        $task->details = request('details');
        $task->urgency = request('urgency');
        $task->cat = "task";
        $task->endclock = request('endclock');

        $task->save();

        return redirect('/#task')->with('mssg','New Task Added');
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
        $project->status = "Ongoing";

        $project->save();

        return redirect('/')->with('mssg','New Project Added');
    }
}
