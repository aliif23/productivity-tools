@section('content')
@extends('layouts.app')

<div class="card">
    <h5 class="card-header">Income Datas</h5>
    <div class="card-body">
      <h5 class="card-title">Manage Income Data's</h5>
      <p class="card-text text-success">{{session('mssg')}}</p>
      <p class="card-text">You can manage Create, Update, Delete Your Income Datas Here.</p>
      <h5 class="card-title">Total Income This Year</h5>
      <ul>
        <li>{{$incomesum}}</li>
      </ul>
      <h5 class="card-title">Total Income This Month</h5>
      <ul>
        <li>{{$incomethismonth}}</li>
      </ul>
      <h5 class="card-title">Average Income This Year</h5>
      <ul>
        <li>{{$incomeavg}}</li>
      </ul>
      <div class="float-end mb-4 mt-1">
        <a href="/" class="btn btn-primary">Back To Home</a>
        <a href="/income/create" class="btn btn-success">Add a new Income data</a>
      </div>
      <canvas id="myChart" class="my-4" style="width:100%;max-width:600px"></canvas>
      <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Name : </th>
            <th>Category : </th>
            <th>Amount : </th>
            <th width = 30%>Action : </th>
        </tr>
        @foreach($incomes as $income)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">{{$income->name}}
            </td>
            <td>{{$income->cat}}</td>
            <td>{{$income->amount}}</td>
            <td>
                <div class="text-center align-content-center">
                    <a href="/income/details/{{$income->id}}" class="btn btn-sm btn-primary">Details</a>
                    <a href="/income/edit/{{$income->id}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/income/delete/{{$income->id}}" class="btn btn-sm btn-danger sm-mt-3">Delete</a> 
                </div>
            </td>
        </tr>
        @endforeach
      </table>
      {{$incomes->links()}}
    </div>
  </div>
  <script
  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
  </script>
  <script>

    const paginate = document.querySelector('.pagination');
    paginate.classList.add('justify-content-center')


</script>
  <script>
    var xValues = <?php echo $bulanke ?>;
    var totalincome = <?php echo json_encode($totalincomemonthly) ?>;
    var businessincome = <?php echo json_encode($totalincomebusiness) ?>;
    var personalincome = <?php echo json_encode($totalincomepersonal) ?>;
    
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          label: 'Total Incomes',
          fill: false,
          lineTension: 0,
          backgroundColor: "green",
          borderColor: "green",
          data: totalincome
        },
        {
          label: 'Business Incomes',
          fill: false,
          lineTension: 0,
          backgroundColor: "pink",
          borderColor: "pink",
          data: businessincome
        },
        {
          label: 'Personal Incomes',
          fill: false,
          lineTension: 0,
          backgroundColor: "blue",
          borderColor: "blue",
          data: personalincome
        }]
      },
      options: {
        legend: {display: true,
          align : 'end'},
        scales: {
          yAxes: [{ticks: {min: 1000, max:5000000}}],
        }
      }
    });
    </script>
    

@endsection