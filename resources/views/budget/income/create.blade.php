@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Create Income
    </div>
    <div class="card-body">
      <h5 class="card-title">Add new income</h5>
      <p class="card-text">Insert your new income Data</p>

      <form action="/income/createincome" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
              <div class="card">
                <div class="card-body">
                    <label for="name" class="form-label" id="name">Income Name : </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <label for="cat" class="form-label mt-3">Income Category : </label>
                    <select name="cat" id="" class="form-control" required>
                        <option value="Business">Business</option>
                        <option value="Personal">Personal</option>
                    </select>
                    <label for="amount" class="form-label mt-3">Income Amount : </label>
                    <input type="text" name="amount" class="form-control">
                </div>
              </div>
            </div>
        </div>
        <button class="btn btn-success mt-4" type="submit">Add new Income</button>
        <button class="btn btn-danger mt-4" type="reset">Reset Datas</button>
        <a href="/expense/index" class="btn btn-primary mt-4">Back to Income Index</a>
      </form>
      
    </div>
</div>

@endsection