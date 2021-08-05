@section('content')
@extends('layouts.app')

<div class="card">
    <h5 class="card-header">Project's Data</h5>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-12 col-lg-6">
                <h5 class="card-title">Manage Project Data's</h5>
                <p class="card-text text-success">{{session('mssg')}}</p>
                <p class="card-text">You can manage Create, Update, Delete Project Data here.</p>
                <h6>Ongoing Projects : {{$ongoing}} </h6>
                <ul>
                    <li>Web Development : {{$ongweb}}</li>
                    <li>Virtual Tour Development : {{$ongvtour}}</li>
                    <li>ERP Development : {{$ongerp}}</li>
                </ul>
                <h6>Completed Projects : {{$done}}</h6>
                <ul>
                    <li>Web Development : {{$doneweb}}</li>
                    <li>Virtual Tour Development : {{$donevtour}}</li>
                    <li>ERP Development : {{$doneerp}}</li>
                </ul>
            </div>
            <div class="col-12 col-lg-6">
                <h5 class="text-center card-title">Project Earnings Chart</h5>
                <p>Total Earnings : Rp. {{$projectearnings}}</p>
                <canvas id="chartproject" style="width:100%;max-width:600px;height:100%"></canvas>
            </div>
        </div>
      <div class="float-end mb-4 mt-1">
        <a href="/" class="btn btn-primary">Back To Home</a>
        <a href="/project/createproject" class="btn btn-success">Add a new Project Data</a>
      </div>
      <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Name : </th>
            <th>PIC : </th>
            <th>Category : </th>
            <th>Price : </th>
            <th>Status : </th>
            <th width = 30%>Action : </th>
        </tr>
        @foreach($projects as $project)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">{{$project->name}}
            </td>
            <td>{{$project->pic}}</td>
            <td>{{$project->cat}}</td>
            <td>Rp. {{$project->price}}</td>
            <td>{{$project->status}}</td>
            <td>
                <div class="text-center align-content-center">
                    <a href="/project/details/{{$project->id}}" class="btn btn-sm btn-primary">Details</a>
                    <a href="/project/edit/{{$project->id}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/project/delete/{{$project->id}}" class="btn btn-sm btn-danger sm-mt-3">Delete</a> 
                </div>
            </td>
        </tr>
        @endforeach
      </table>
      <div class="row">
          <div class="col-12">
            {{$projects->links()}}
          </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctx = document.getElementById('chartproject');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Web Development','Virtual Tour Dev','ERP Development'],
            datasets: [{
                label: 'Money Earned',
                data: <?php echo json_encode($datas) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          legend: {display: true,
          align : 'end'},
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
    </script>
    <script>

        const paginate = document.querySelector('.pagination');
        paginate.classList.add('justify-content-center')


    </script>


@endsection