@section('content')
@extends('layouts.app')

<div class="card">
    <h5 class="card-header">Staff's Data</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-6">
          <h5 class="card-title">Manage Staff Data's</h5>
          <p class="card-text text-success">{{session('mssg')}}</p>
          <p class="card-text">You can manage Create, Update, Delete staff Data here.</p>
          <p class="card-text">Total Staff : {{$totalstaff}}</p>
          <p class="card-text">Total Project Manager : {{$totalpm}}</p>
          <p class="card-text">Total Developer : {{$totaldev}}</p>
          <p class="card-text">Total Designer : {{$totaldes}}</p>
        </div>
        <div class="col-12 col-md-6">
          <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
      </div>
      <div class="float-end mb-4 mt-4">
        <a href="/" class="btn btn-primary">Back To Home</a>
        <a href="/staff/createstaff" class="btn btn-success">Add a new Staff Data</a>
      </div>
      <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Picture : </th>
            <th>Name : </th>
            <th>Role : </th>
            <th width = 30%>Action : </th>
        </tr>
        @foreach($staffs as $staff)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">
                <img src="/img/staff/{{$staff->gambar}}" alt="" class="img-fluid" style="width: 70px">
            </td>
            <td>{{$staff->name}}</td>
            <td>{{$staff->role}}</td>
            <td>
                <div class="text-center align-content-center">
                    <a href="/staff/details/{{$staff->id}}" class="btn btn-sm btn-primary">Details</a>
                    <a href="/staff/edit/{{$staff->id}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/staff/delete/{{$staff->id}}" class="btn btn-sm btn-danger sm-mt-3">Delete</a> 
                </div>
            </td>
        </tr>
        @endforeach
      </table>
      {{$staffs->links()}}
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script>
    var xValues = ["Project Manager","Developer","Designer"];
    var yValues = [{{$totalpm}},{{$totaldev}},{{$totaldes}}];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];
    
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Stratek Staff Pie Chart"
        }
      }
    });
    </script>

    <script>

      const paginate = document.querySelector('.pagination');
      paginate.classList.add('justify-content-center')


    </script>

@endsection