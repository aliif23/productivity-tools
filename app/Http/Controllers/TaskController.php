<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    public function index(){
        Paginator::useBootstrap();
        $tasks = Task::paginate(5);

        date_default_timezone_set('Asia/Jakarta');
 
        
        $tasksdone = Task::select(DB::raw("COUNT(*) AS tasksdone"))
        ->where("status","=","Done")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("tasksdone");

        $tasksdone1 = Task::select(DB::raw("COUNT(*) AS tasksdone1"))
        ->where("status","=","Done")
        ->where("urgency","=","Not-Urgent")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("tasksdone1");

        $tasksdone2 = Task::select(DB::raw("COUNT(*) AS tasksdone2"))
        ->where("status","=","Done")
        ->where("urgency","=","Moderate")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("tasksdone2");

        $tasksdone3 = Task::select(DB::raw("COUNT(*) AS tasksdone3"))
        ->where("status","=","Done")
        ->where("urgency","=","Urgent")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("tasksdone3");

        $noturgenttask = Task::select(DB::raw("COUNT(*) AS noturgent"))
        ->where("status","=","Ongoing")
        ->where("urgency","=","Not-Urgent")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("noturgent");

        $moderatetask = Task::select(DB::raw("COUNT(*) AS moderate"))
        ->where("status","=","Ongoing")
        ->where("urgency","=","Moderate")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("moderate");

        $urgenttask = Task::select(DB::raw("COUNT(*) AS urgent"))
        ->where("status","=","Ongoing")
        ->where("urgency","=","Urgent")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("urgent");

        // dd($urgenttask);

        $mondaytask = Task::select(DB::raw("COUNT(*) AS monday"))
        ->where("day","=","Monday")
        ->where("status","=","Ongoing")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("monday");

        $tuesdaytask = Task::select(DB::raw("COUNT(*) AS tuesday"))
        ->where("day","=","Tuesday")
        ->where("status","=","Ongoing")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("tuesday");

        $wednesdaytask = Task::select(DB::raw("COUNT(*) AS wednesday"))
        ->where("day","=","Wednesday")
        ->where("status","=","Ongoing")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("wednesday");

        $thursdaytask = Task::select(DB::raw("COUNT(*) AS thursday"))
        ->where("day","=","Thursday")
        ->where("status","=","Ongoing")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("thursday");

        $fridaytask = Task::select(DB::raw("COUNT(*) AS friday"))
        ->where("day","=","Friday")
        ->where("status","=","Ongoing")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("friday");

        $saturdaytask = Task::select(DB::raw("COUNT(*) AS saturday"))
        ->where("day","=","Saturday")
        ->where("status","=","Ongoing")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("saturday");

        $sundaytask = Task::select(DB::raw("COUNT(*) AS sunday"))
        ->where("day","=","Sunday")
        ->where("status","=","Ongoing")
        ->where('created_at', '>', now()->startOfWeek())
        ->where('created_at', '<', now()->endOfWeek())
        ->whereYear('created_at',date('Y'))
        ->value("sunday");

        $weekdata = [$mondaytask , $tuesdaytask, $wednesdaytask, $thursdaytask , $fridaytask, $saturdaytask, $sundaytask];
        $taskurgencies = [$noturgenttask, $moderatetask , $urgenttask];  

        return view('task.index',[
            "tasks" => $tasks,
            "weekdata" => $weekdata,
            "taskurgencies" => $taskurgencies,
            "tasksdone" => $tasksdone,
            "tasksdone1" => $tasksdone1,
            "tasksdone2" => $tasksdone2,
            "tasksdone3" => $tasksdone3
        ]);
    }

    public function create(){

        return view('task.create');
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

        return redirect('task/index')->with('mssg','New Task Added');
    }

    public function show($id){
        $task = Task::findOrFail($id);
        $logs = Log::all();

        return view('task.details',[
            "task" => $task,
            "logs" => $logs
        ]);
        
    }

    public function donestatus($id){
        $task = Task::findOrFail($id);
        $task->status = "Done";

        $task->update();

        return redirect('task/index')->with('mssg','Task Status set as Done');
    }

    public function newlog(){
        $log = new Log();

        $log->projid = request('projid');
        $log->date = request('date');
        $log->title = request('title');
        $log->log = request('log');
        $log->cat = request('cat');

        $log->save();

        return redirect('/task/details/'.$log->projid)->with('mssg','New Task Log Added');

    }

    public function edittask($id){
        $task = Task::findOrFail($id);

        $task->title = request('title');
        $task->clock = request('clock');
        $task->day = request('day');
        $task->details = request('details');
        $task->urgency = request('urgency');
        $task->cat = "task";
        $task->endclock = request('endclock');

        $task->update();

        return redirect('task/index')->with('mssg','Task Edited');
    }

    public function destroy($id){
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect('task/index')->with('mssg','Task Deleted');
    }

    public function edit($id){

        $task = Task::findOrFail($id);
        
        return view('task/edit',[
            "task" => $task
        ]);
    }
}
