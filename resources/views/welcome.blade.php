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