@section('content')
@extends('layouts.app')

<div class="card">
    <h5 class="card-header">Expense's Data</h5>
    <div class="card-body">
      <h5 class="card-title">Manage Expense's Data's</h5>
      <p class="card-text text-success">{{session('mssg')}}</p>
      <p class="card-text">You can manage Create, Update, Delete Your Expense Datas Here.</p>
      <h5 class="card-title">Total Expense This Year</h5>
      <ul>
        <li>{{$expensesum}}</li>
      </ul>
      <h5 class="card-title">Total Expense This Month</h5>
      <ul>
        <li>{{$expensethismonth}}</li>
      </ul>
      <h5 class="card-title">Average Expense This Year</h5>
      <ul>
        <li>{{$expenseavg}}</li>
      </ul>
      <div class="float-end mb-4 mt-1">
        <a href="/" class="btn btn-primary">Back To Home</a>
        <a href="/expense/create" class="btn btn-success">Add a new Expense data</a>
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
        @foreach($expenses as $expense)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-center">{{$expense->name}}
            </td>
            <td>{{$expense->cat}}</td>
            <td>{{$expense->amount}}</td>
            <td>
                <div class="text-center align-content-center">
                    <a href="/expense/details/{{$expense->id}}" class="btn btn-sm btn-primary">Details</a>
                    <a href="/expense/edit/{{$expense->id}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/expense/delete/{{$expense->id}}" class="btn btn-sm btn-danger sm-mt-3">Delete</a> 
                </div>
            </td>
        </tr>
        @endforeach
      </table>
      {{$expenses->links()}}
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
    var totalexpense = <?php echo json_encode($totalexpensemonthly) ?>;
    var businessexpense = <?php echo json_encode($totalexpensebusiness) ?>;
    var personalexpense = <?php echo json_encode($totalexpensepersonal) ?>;
    
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          label: 'Total Expenses',
          fill: false,
          lineTension: 0,
          backgroundColor: "red",
          borderColor: "red",
          data: totalexpense
        },
        {
          label: 'Business Expenses',
          fill: false,
          lineTension: 0,
          backgroundColor: "green",
          borderColor: "green",
          data: businessexpense
        },
        {
          label: 'Personal Expenses',
          fill: false,
          lineTension: 0,
          backgroundColor: "blue",
          borderColor: "blue",
          data: personalexpense
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