@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Income Details
    </div>
    <div class="card-body">
      <h5 class="card-title">Income Details</h5>
      <p class="card-text">View your Income Data</p>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
              <div class="card">
                <div class="card-body">
                  <h6 class="lead">Income Details : </h6>
                  <ul>
                      <li><p>Name : {{$income->name}}</p></li>
                      <li><p> Category : {{$income->cat}}</p></li>
                      <li><p> Amount : {{$income->amount}}</p></li>
                      <li><p>Date Created : {{$income->created_at}}</p></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
        <a href="/income/index" class="btn btn-primary mt-4">Back to Income Index</a>
      
    </div>
</div>

@endsection