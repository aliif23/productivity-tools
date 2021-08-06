@section('content')
@extends('layouts.app')

<div class="row justify-content-center">
  <div class="col-12 col-md-10">
    <div class="card mb-4">
      <h5 class="card-header text-center">Stratek IT Project Management Tools</h5>
      <div class="card-body">
        <div class="row justify-content-center align-items-center">
          <div class="col-12 col-md-6 text-center">
            <h5 class="ms-4">Staff Overview</h5>
            <ul>
              <p>Total Staff : <?php echo ($totalstaff) ?></p>
              <ul>
                <li class ="me-4 "style="list-style: none">Total PM : {{$totalpm}}</li>
                <li class ="me-4 "style="list-style: none">Total Dev : {{$totaldev}}</li>
                <li class ="me-4 "style="list-style: none">Total Desi : {{$totaldes}}</li>
              </ul>
            </ul>
          </div>
          <div class="col-12 col-md-6 text-center">
            <h5 class="ms-4">Project Overview</h5>
            <ul>
              <p>Ongoing Projects : <?php echo ($ongoingprojects[0]) ?></p>
              <p>Completed Projects : <?php echo ($completedprojects[0]) ?></p>
              <p>Project Earnings : Rp.  <?php echo ($projectearnings[0]) ?></p>
            </ul>
          </div>
          <div class="col-5 col-sm-12 col-md-6">
              <h5 class="card-title">Manage Stratek Staffs</h5>
              <p class="card-text">Click here to Manage Stratek Staff from Project Manager, Engineer, and Designer</p>
              <a href="/staff/index" class="btn btn-primary">Manage Staffs</a>
            </div>
            <div class="col-5 text-end col-sm-12 col-md-6">
              <h5 class="card-title">Manage Stratek Projects</h5>
              <p class="card-text">Click here to Manage Stratek Projects, add Project Logs, Track Events,etc</p>
              <a href="/project/index" class="btn btn-primary">Manage Projects</a>
            </div>
        </div>
      </div>
  </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-12 col-md-10">
    <div class="card">
      <h5 class="card-header text-center"><span class="text-success">My </span><span class="text-danger">Personal </span><span class="text-success">Budgeting </span><span class="text-danger">Datas </span></h5>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h6 class="text-success">Total Income This Year : </h6>
            <ul>
              <li>Rp.{{$incomesum}}</li>
            </ul>
            <h6 class="text-success">Average Monthly Income : </h6>
            <ul>
              <li>Rp.{{$incomeavg}}</li>
            </ul>
          </div>
          <div class="col-12 col-sm-6">
            <h6 class="text-danger">Total Expenses This Year : </h6>
          <ul>
            <li>Rp.{{$expensesum}}</li>
          </ul>
            <h6 class="text-danger">Average Monthly Expenses : </h6>
          <ul>
            <li>Rp.{{$expenseavg}}</li>
          </ul>
          </div>
        </div>
        
        <div class="text-center"><canvas id="budgeting" style="" class="mb-4"></canvas></div>
        <div class="row justify-content-center align-items-center">
          <div class="col-5 text-center col-sm-12 col-md-6">
              <h5 class="card-title text-danger">My Expenses</h5>
              <p class="card-text">Click here to manage expenses data</p>
              <a href="/expense/index" class="btn btn-danger">Manage Expenses</a>
            </div>
            <div class="col-5 text-center col-sm-12 col-md-6">
              <h5 class="card-title text-success">My Incomes</h5>
              <p class="card-text">Click here to manage income data</p>
              <a href="/income/index" class="btn btn-success">Manage Incomes</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row justify-content-center mt-4">
  <div class="col-12 col-md-10">
    <div class="card">
      <div class="card-header text-center">
        <h5>Task Scheduler</h5>
      </div>
      <div class="card-body">
        <h5 class="card-title">Task Scheduler</h5>
        <p class="card-text">I use this tool to schedule tasks, projects, and Important Meeting</p>
        <div class="row">
          <div class="col-12">
            <h5 class="text-center mb-5 mt-4">This Week Tasks</h5>
            <div class="row mb-4">
              <div class="col-6 col-sm-3">
                <h6>Monday Morning Tasks</h6>
                <ul>
                  @foreach($mondaymorningtasks as $mondaymorningtask)
                  <li>{{$mondaymorningtask->title}}</li>
                  <li>{{$mondaymorningtask->clock}}</li>
                  <li>{{$mondaymorningtask->endclock}}</li>
                  <li>{{$mondaymorningtask->urgency}}</li>
                  @endforeach
                </ul>
              </div>
   
              <div class="col-6 col-sm-3">
               <h6>Monday Afternoon Tasks</h6>
               <ul>
                 @foreach($mondayafternoontasks as $mondayafternoontask)
                 <li>{{$mondayafternoontask->title}}</li>
                 <li>{{$mondayafternoontask->clock}}</li>
                 <li>{{$mondayafternoontask->endclock}}</li>
                 <li>{{$mondayafternoontask->urgency}}</li>
                 @endforeach
               </ul>
             </div>
   
             <div class="col-6 col-sm-3">
               <h6>Monday Evening Tasks</h6>
               <ul>
                 @foreach($mondayeveningtasks as $mondayeveningtask)
                 <li>{{$mondayeveningtask->title}}</li>
                 <li>{{$mondayeveningtask->clock}}</li>
                 <li>{{$mondayeveningtask->endclock}}</li>
                 <li>{{$mondayeveningtask->urgency}}</li>
                 @endforeach
               </ul>
             </div>
   
             <div class="col-6 col-sm-3">
               <h6>Monday Night Tasks</h6>
               <ul>
                 @foreach($mondaynighttasks as $mondaynighttask)
                 <li>{{$mondaynighttask->title}}</li>
                 <li>{{$mondaynighttask->clock}}</li>
                 <li>{{$mondaynighttask->endclock}}</li>
                 <li>{{$mondaynighttask->urgency}}</li>
                 @endforeach
               </ul>
             </div>
            </div>
   
            <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Tuesday Morning Tasks</h6>
               <ul>
                 @foreach($tuesdaymorningtasks as $tuesdaymorningtask)
                 <li>{{$tuesdaymorningtask->title}}</li>
                 <li>{{$tuesdaymorningtask->clock}}</li>
                 <li>{{$tuesdaymorningtask->endclock}}</li>
                 <li>{{$tuesdaymorningtask->urgency}}</li>
                 @endforeach
               </ul>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Tuesday Afternoon Tasks</h6>
              <ul>
                @foreach($tuesdayafternoontasks as $tuesdayafternoontask)
                <li>{{$tuesdayafternoontask->title}}</li>
                <li>{{$tuesdayafternoontask->clock}}</li>
                <li>{{$tuesdayafternoontask->endclock}}</li>
                <li>{{$tuesdayafternoontask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Tuesday Evening Tasks</h6>
              <ul>
                @foreach($tuesdayeveningtasks as $tuesdayeveningtask)
                <li>{{$tuesdayeveningtask->title}}</li>
                <li>{{$tuesdayeveningtask->clock}}</li>
                <li>{{$tuesdayeveningtask->endclock}}</li>
                <li>{{$tuesdayeveningtask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Tuesday Night Tasks</h6>
              <ul>
                @foreach($tuesdaynighttasks as $tuesdaynighttask)
                <li>{{$tuesdaynighttask->title}}</li>
                <li>{{$tuesdaynighttask->clock}}</li>
                <li>{{$tuesdaynighttask->endclock}}</li>
                <li>{{$tuesdaynighttask->urgency}}</li>
                @endforeach
              </ul>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Wednesday Morning Tasks</h6>
               <ul>
                 @foreach($wednesdaymorningtasks as $wednesdaymorningtask)
                 <li>{{$wednesdaymorningtask->title}}</li>
                 <li>{{$wednesdaymorningtask->clock}}</li>
                 <li>{{$wednesdaymorningtask->endclock}}</li>
                 <li>{{$wednesdaymorningtask->urgency}}</li>
                 @endforeach
               </ul>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Wednesday Afternoon Tasks</h6>
              <ul>
                @foreach($wednesdayafternoontasks as $wednesdayafternoontask)
                <li>{{$wednesdayafternoontask->title}}</li>
                <li>{{$wednesdayafternoontask->clock}}</li>
                <li>{{$wednesdayafternoontask->endclock}}</li>
                <li>{{$wednesdayafternoontask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Wednesday Evening Tasks</h6>
              <ul>
                @foreach($wednesdayeveningtasks as $wednesdayeveningtask)
                <li>{{$wednesdayeveningtask->title}}</li>
                <li>{{$wednesdayeveningtask->clock}}</li>
                <li>{{$wednesdayeveningtask->endclock}}</li>
                <li>{{$wednesdayeveningtask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Wednesday Night Tasks</h6>
              <ul>
                @foreach($wednesdaynighttasks as $wednesdaynighttask)
                <li>{{$wednesdaynighttask->title}}</li>
                <li>{{$wednesdaynighttask->clock}}</li>
                <li>{{$wednesdaynighttask->endclock}}</li>
                <li>{{$wednesdaynighttask->urgency}}</li>
                @endforeach
              </ul>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Thursday Morning Tasks</h6>
               <ul>
                 @foreach($thursdaymorningtasks as $thursdaymorningtask)
                 <li>{{$thursdaymorningtask->title}}</li>
                 <li>{{$thursdaymorningtask->clock}}</li>
                 <li>{{$thursdaymorningtask->endclock}}</li>
                 <li>{{$thursdaymorningtask->urgency}}</li>
                 @endforeach
               </ul>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Thursday Afternoon Tasks</h6>
              <ul>
                @foreach($thursdayafternoontasks as $thursdayafternoontask)
                <li>{{$thursdayafternoontask->title}}</li>
                <li>{{$thursdayafternoontask->clock}}</li>
                <li>{{$thursdayafternoontask->endclock}}</li>
                <li>{{$thursdayafternoontask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Thursday Evening Tasks</h6>
              <ul>
                @foreach($thursdayeveningtasks as $thursdayeveningtask)
                <li>{{$thursdayeveningtask->title}}</li>
                <li>{{$thursdayeveningtask->clock}}</li>
                <li>{{$thursdayeveningtask->endclock}}</li>
                <li>{{$thursdayeveningtask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Thursday Night Tasks</h6>
              <ul>
                @foreach($thursdaynighttasks as $thursdaynighttask)
                <li>{{$thursdaynighttask->title}}</li>
                <li>{{$thursdaynighttask->clock}}</li>
                <li>{{$thursdaynighttask->endclock}}</li>
                <li>{{$thursdaynighttask->urgency}}</li>
                @endforeach
              </ul>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Friday Morning Tasks</h6>
               <ul>
                 @foreach($fridaymorningtasks as $fridaymorningtask)
                 <li>{{$fridaymorningtask->title}}</li>
                 <li>{{$fridaymorningtask->clock}}</li>
                 <li>{{$fridaymorningtask->endclock}}</li>
                 <li>{{$fridaymorningtask->urgency}}</li>
                 @endforeach
               </ul>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Friday Afternoon Tasks</h6>
              <ul>
                @foreach($fridayafternoontasks as $fridayafternoontask)
                <li>{{$fridayafternoontask->title}}</li>
                <li>{{$fridayafternoontask->clock}}</li>
                <li>{{$fridayafternoontask->endclock}}</li>
                <li>{{$fridayafternoontask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Friday Evening Tasks</h6>
              <ul>
                @foreach($fridayeveningtasks as $fridayeveningtask)
                <li>{{$fridayeveningtask->title}}</li>
                <li>{{$fridayeveningtask->clock}}</li>
                <li>{{$fridayeveningtask->endclock}}</li>
                <li>{{$fridayeveningtask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Friday Night Tasks</h6>
              <ul>
                @foreach($fridaynighttasks as $fridaynighttask)
                <li>{{$fridaynighttask->title}}</li>
                <li>{{$fridaynighttask->clock}}</li>
                <li>{{$fridaynighttask->endclock}}</li>
                <li>{{$fridaynighttask->urgency}}</li>
                @endforeach
              </ul>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Saturday Morning Tasks</h6>
               <ul>
                 @foreach($saturdaymorningtasks as $saturdaymorningtask)
                 <li>{{$saturdaymorningtask->title}}</li>
                 <li>{{$saturdaymorningtask->clock}}</li>
                 <li>{{$saturdaymorningtask->endclock}}</li>
                 <li>{{$saturdaymorningtask->urgency}}</li>
                 @endforeach
               </ul>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Saturday Afternoon Tasks</h6>
              <ul>
                @foreach($saturdayafternoontasks as $saturdayafternoontask)
                <li>{{$saturdayafternoontask->title}}</li>
                <li>{{$saturdayafternoontask->clock}}</li>
                <li>{{$saturdayafternoontask->endclock}}</li>
                <li>{{$saturdayafternoontask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Saturday Evening Tasks</h6>
              <ul>
                @foreach($saturdayeveningtasks as $saturdayeveningtask)
                <li>{{$saturdayeveningtask->title}}</li>
                <li>{{$saturdayeveningtask->clock}}</li>
                <li>{{$saturdayeveningtask->endclock}}</li>
                <li>{{$saturdayeveningtask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Saturday Night Tasks</h6>
              <ul>
                @foreach($saturdaynighttasks as $saturdaynighttask)
                <li>{{$saturdaynighttask->title}}</li>
                <li>{{$saturdaynighttask->clock}}</li>
                <li>{{$saturdaynighttask->endclock}}</li>
                <li>{{$saturdaynighttask->urgency}}</li>
                @endforeach
              </ul>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Sunday Morning Tasks</h6>
               <ul>
                 @foreach($sundaymorningtasks as $sundaymorningtask)
                 <li>{{$sundaymorningtask->title}}</li>
                 <li>{{$sundaymorningtask->clock}}</li>
                 <li>{{$sundaymorningtask->endclock}}</li>
                 <li>{{$sundaymorningtask->urgency}}</li>
                 @endforeach
               </ul>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Sunday Afternoon Tasks</h6>
              <ul>
                @foreach($sundayafternoontasks as $sundayafternoontask)
                <li>{{$sundayafternoontask->title}}</li>
                <li>{{$sundayafternoontask->clock}}</li>
                <li>{{$sundayafternoontask->endclock}}</li>
                <li>{{$sundayafternoontask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Sunday Evening Tasks</h6>
              <ul>
                @foreach($sundayeveningtasks as $sundayeveningtask)
                <li>{{$sundayeveningtask->title}}</li>
                <li>{{$sundayeveningtask->clock}}</li>
                <li>{{$sundayeveningtask->endclock}}</li>
                <li>{{$sundayeveningtask->urgency}}</li>
                @endforeach
              </ul>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Sunday Night Tasks</h6>
              <ul>
                @foreach($sundaynighttasks as $sundaynighttask)
                <li>{{$sundaynighttask->title}}</li>
                <li>{{$sundaynighttask->clock}}</li>
                <li>{{$sundaynighttask->endclock}}</li>
                <li>{{$sundaynighttask->urgency}}</li>
                @endforeach
              </ul>
            </div>
           </div>
   
          </div>
        </div>
        <div class="float-end">
          <a href="/task/index" class="btn btn-primary">Manage Tasks</a>
        </div>

      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var xValues = <?php echo json_encode($bulanke) ?>;

new Chart("budgeting", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      label : "Total Expense",
      data: <?php echo json_encode($totalexpensemonthly) ?>,
      borderColor: "red",
      fill: false
    },{
      label : "Total Income",
      data: <?php echo json_encode($totalincomemonthly) ?>,
      borderColor: "green",
      fill: false
    }]
  },
  options: {
    legend: {display: true}
  }
});

  
</script>
@endsection