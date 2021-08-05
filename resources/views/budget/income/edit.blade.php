@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Edit Income
    </div>
    <div class="card-body">
      <h5 class="card-title">Edit Income</h5>
      <p class="card-text">Edit your Income Data</p>

      <form action="/income/editincome/{{$income->id}}" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
              <div class="card">
                <div class="card-body">
                    <label for="name" class="form-label" id="name">Income Name : </label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{$income->name}}">
                    <label for="cat" class="form-label mt-3">Income Category : </label>
                    <select name="cat" id="" class="form-control" required>
                        @if($income->cat == "Business")
                            <option value="Business" selected>Business</option>
                            <option value="Personal">Personal</option>
                        @elseif($income->cat == "Personal")
                            <option value="Business">Business</option>
                            <option value="Personal" selected>Personal</option>
                        @endif
                    </select>
                    <label for="amount" class="form-label mt-3">Income Amount : </label>
                    <input type="text" name="amount" class="form-control" value="{{$income->amount}}">
                </div>
              </div>
            </div>
        </div>
        <button class="btn btn-warning mt-4" type="submit">Edit Income</button>
        <a href="/income/index" class="btn btn-primary mt-4">Back to Income Index</a>
      </form>
      
    </div>
</div>

@endsection