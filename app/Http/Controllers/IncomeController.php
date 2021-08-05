<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class IncomeController extends Controller
{
    public function index(){
        Paginator::useBootstrap();

        $incomes = Income::paginate(5);

        $bulanke = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

        $incometotal = Income::select(DB::raw("SUM(amount) as totals"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totals');

        $incomepersonal = Income::select(DB::raw("SUM(amount) as totals1"))
            ->where('cat','=','Personal')
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totals1');

        $incomebusiness = DB::table('incomes')
            ->where('cat','=','Business')
            ->whereYear('created_at',date('Y'))
            ->select(DB::raw('SUM(amount) as totals2'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totals2');

        $months = Income::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $monthsbusiness = Income::select(DB::raw("Month(created_at) as month"))
            ->where('cat','=','Business')
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $monthspersonal = Income::select(DB::raw("Month(created_at) as month"))
            ->where('cat','=','Personal')
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        
          
        

        $totalincomemonthly = array(0,0,0,0,0,0,0,0,0,0,0,0);

        $totalincomepersonal = array(0,0,0,0,0,0,0,0,0,0,0,0);

        $totalincomebusiness = array(0,0,0,0,0,0,0,0,0,0,0,0);


        foreach($months as $index => $month){
            $totalincomemonthly[$month - 1] = $incometotal[$index];
            
        }

        foreach($monthsbusiness as $index => $month){
            $totalincomebusiness[$month - 1] = $incomebusiness[$index];
        }

        foreach($monthspersonal as $index => $month){
            $totalincomepersonal[$month - 1] = $incomepersonal[$index];
        }

        // dd($totalincomemonthly,$totalincomebusiness,$totalincomepersonal);

        $incomesum = Income::select(DB::raw("SUM(amount) as totals"))
        ->whereYear('created_at',date('Y'))
        ->value('totals');

        $incomethismonth = Income::select(DB::raw("SUM(amount) as totals"))
        ->whereMonth('created_at',date('m'))
        ->value('totals');

        $incomeavg = Income::select(DB::raw("SUM(amount)/12 as totals"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->value('totals');

        return view('budget.income.index',[
            "incomes" => $incomes,
            "totalincomemonthly" => $totalincomemonthly,
            "totalincomepersonal" => $totalincomepersonal,
            "totalincomebusiness" => $totalincomebusiness,
            "bulanke" => json_encode($bulanke,JSON_NUMERIC_CHECK),
            "incomesum" => $incomesum,
            "incomethismonth" => $incomethismonth,
            "incomeavg" =>  $incomeavg
        ]);
    }

    public function create(){
        
        return view('budget.income.create');
    }

    public function createpost(){

        $income = new Income();

        $income->name = request('name');
        $income->cat = request('cat');
        $income->amount = request('amount');

        $income->save();

        return redirect('/income/index')->with('mssg','Income Data Created');
    }

    public function show($id){
        $income = Income::findOrFail($id);

        return view('budget.income.details',[
            'income' => $income
        ]);
    }

    public function edit($id){
        $income = Income::findOrFail($id);

        return view('budget.income.edit',[
            'income' => $income
        ]);
    }

    public function editpost($id){
        $income = Income::findOrFail($id);

        $income->name = request('name');
        $income->cat = request('cat');
        $income->amount = request('amount');

        $income->update();
        return redirect('/income/index')->with('mssg','Income Data Edited');
    }

    public function destroy($id){
        $income = Income::findOrFail($id);

        $income->delete();

        return redirect('/income/index')->with('mssg','Income Data Deleted');
    }
}
