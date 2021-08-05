<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class ExpenseController extends Controller
{
    public function index(){
        Paginator::useBootstrap();

        $expenses = Expense::paginate(5);

        $bulanke = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

        $expensetotal = Expense::select(DB::raw("SUM(amount) as totals"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totals');

        $expensepersonal = Expense::select(DB::raw("SUM(amount) as totals1"))
            ->where('cat','=','Personal')
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totals1');

        $expensebusiness = DB::table('expenses')
            ->where('cat','=','Business')
            ->whereYear('created_at',date('Y'))
            ->select(DB::raw('SUM(amount) as totals2'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('totals2');

        $months = Expense::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $monthsbusiness = Expense::select(DB::raw("Month(created_at) as month"))
            ->where('cat','=','Business')
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $monthspersonal = Expense::select(DB::raw("Month(created_at) as month"))
            ->where('cat','=','Personal')
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        
          
        

        $totalexpensemonthly = array(0,0,0,0,0,0,0,0,0,0,0,0);

        $totalexpensepersonal = array(0,0,0,0,0,0,0,0,0,0,0,0);

        $totalexpensebusiness = array(0,0,0,0,0,0,0,0,0,0,0,0);


        foreach($months as $index => $month){
            $totalexpensemonthly[$month - 1] = $expensetotal[$index];
            
        }

        foreach($monthsbusiness as $index => $month){
            $totalexpensebusiness[$month - 1] = $expensebusiness[$index];
        }

        foreach($monthspersonal as $index => $month){
            $totalexpensepersonal[$month - 1] = $expensepersonal[$index];
        }

        // dd($totalexpensemonthly,$totalexpensebusiness,$totalexpensepersonal);

        $expensesum = Expense::select(DB::raw("SUM(amount) as totals"))
        ->whereYear('created_at',date('Y'))
        ->value('totals');

        $expensethismonth = Expense::select(DB::raw("SUM(amount) as totals"))
        ->whereMonth('created_at',date('m'))
        ->value('totals');

        $expenseavg = Expense::select(DB::raw("SUM(amount)/12 as totals"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->value('totals');


        // dd($expensethismonth);


        return view('budget.expense.index',[
            "expenses" => $expenses,
            "totalexpensemonthly" => $totalexpensemonthly,
            "totalexpensepersonal" => $totalexpensepersonal,
            "totalexpensebusiness" => $totalexpensebusiness,
            "bulanke" => json_encode($bulanke,JSON_NUMERIC_CHECK),
            "expensesum" => $expensesum,
            "expensethismonth" => $expensethismonth,
            "expenseavg" =>  $expenseavg
        ]);
    }

    public function create(){

        return view('budget.expense.create');
    }

    public function show($id){

        $expense = Expense::findOrFail($id);

        return view('budget.expense.details',[
            "expense" => $expense
        ]);
    }

    public function post(){

        $expense = new Expense();

        $expense->name = request('name');
        $expense->cat = request('cat');
        $expense->amount = request('amount');

        $expense->save();

        return redirect('/expense/index')->with('mssg','New Expense Added');


    }

    public function edit($id){

        $expense = Expense::findOrFail($id);

        return view('budget.expense.edit',[
            "expense" => $expense
        ]);

    }

    public function editpost($id){

        $expense = Expense::findOrFail($id);

        $expense->name = request('name');
        $expense->cat = request('cat');
        $expense->amount = request('amount');

        $expense->update();

        return redirect('/expense/index')->with('mssg','Expense Data Edited');

    }

    public function destroy($id){

        $expense = Expense::findOrFail($id);

        $expense->delete();

        return redirect('/expense/index')->with('mssg','Expense Data Deleted');

    }
}
