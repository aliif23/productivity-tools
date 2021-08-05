<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Staff;
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
            "totaldes" =>$totaldes
                
        ]);
    }
}
