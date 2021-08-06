@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Task Scheduler
    </div>
    <div class="card-body">
     <div class="row">
       <div class="col-12">
        <h5 class="card-title">Task Scheduler Management App</h5>
        <p class="card-text">In this app, you can manage your activities.</p>
        <h5 class="card-text">Tasks Completed This Week : {{$tasksdone}}</h5>
        <ul>
          <li>Not-Urgent Tasks Done : {{$tasksdone1}}</li>
          <li>Moderate Tasks Done : {{$tasksdone2}}</li>
          <li>Urgent Tasks Done : {{$tasksdone3}}</li>
        </ul>
        <p class="text-success">{{session('mssg')}}</p>
       </div>
     </div>
      <div class="row">
        <div class="col-12 col-lg-6">
          <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="col-12 col-lg-6">
          <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
        </div>
      </div>
      <div class="float-end my-4">
        <a href="/task/create" class="btn btn-success">Add new Task</a>
        <a href="/" class="btn btn-primary">Back To Home</a>
      </div>
      <table class="table table-bordered">
          <tr>
              <th>No : </th>
              <th>Title : </th>
              <th>Day : </th>
              <th>Urgency : </th>
              <th>Status : </th>
              <th>Action : </th>
          </tr>
          @foreach($tasks as $task)
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$task->title}}</td>
              <td>{{$task->day}}</td>
              <td>{{$task->urgency}}</td>
              <td>{{$task->status}}</td>
              <td class="text-center">
                  <a href="/task/details/{{$task->id}}" class="btn btn-primary">Details</a>
                  <a href="/task/edit/{{$task->id}}" class="btn btn-warning">Edit</a>
                  <a href="/task/delete/{{$task->id}}" class="btn btn-danger">Delete</a>
              </td>
          </tr>
          @endforeach
      </table>
      {{$tasks->links()}}
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
  var days = ["Morning", "Tuesday", "Wednesday", "Thursday", "Friday","Saturday","Sunday"];
  var barColors = ["red", "green","blue","orange","brown","purple","pink"];
  var weekdata = {{json_encode($weekdata)}};

  var urgency = ["Not-Urgent","Moderate","Urgent"];
  var pieColors = ["green","blue","red"];
  var taskurgency = {{json_encode($taskurgencies)}}

  var chart = document.getElementById('myChart');
  var myChart = new Chart(chart, {
    type: "bar",
    data: {
      labels: days,
      datasets: [{
        label : "Tasks",
        backgroundColor: barColors,
        data: weekdata
      }]
    },
    options : {
      title : {
        display: true,
        text: "This Week Tasks To-Do"
      }
    }
  });

  var chart2 = document.getElementById('myChart2')
  var chart2 = new Chart("myChart2", {
  type: "pie",
  data: {
    labels: urgency,
    datasets: [{
      backgroundColor: pieColors,
      data: taskurgency
    }]
  },
  options: {
    title: {
      display: true,
      text: "This Week Tasks Urgencies (To-Do)"
    }
  }
});

</script>
<script>

  const paginate = document.querySelector('.pagination');
  paginate.classList.add('justify-content-center')


</script>



@endsection