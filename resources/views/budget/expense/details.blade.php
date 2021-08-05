@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Expense Details
    </div>
    <div class="card-body">
      <h5 class="card-title">Expense Details</h5>
      <p class="card-text">View your Expense Data</p>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
              <div class="card">
                <div class="card-body">
                  <h6 class="lead">Expense Details : </h6>
                  <ul>
                      <li><p>Name : {{$expense->name}}</p></li>
                      <li><p> Category : {{$expense->cat}}</p></li>
                      <li><p> Amount : {{$expense->amount}}</p></li>
                      <li><p>Date Created : {{$expense->created_at}}</p></li>
                      
                  </ul>
                </div>
              </div>
            </div>
        </div>
        <a href="/expense/index" class="btn btn-primary mt-4">Back to Expense Index</a>
      
    </div>
</div>

@endsection