@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Edit Expense
    </div>
    <div class="card-body">
      <h5 class="card-title">Edit Expense</h5>
      <p class="card-text">Edit your Expense Data</p>

      <form action="/expense/editexpense/{{$expense->id}}" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
              <div class="card">
                <div class="card-body">
                    <label for="name" class="form-label" id="name">Expense Name : </label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{$expense->name}}">
                    <label for="cat" class="form-label mt-3">Expense Category : </label>
                    <select name="cat" id="" class="form-control" required>
                        @if($expense->cat == "Business")
                            <option value="Business" selected>Business</option>
                            <option value="Personal">Personal</option>
                        @elseif($expense->cat == "Personal")
                            <option value="Business">Business</option>
                            <option value="Personal" selected>Personal</option>
                        @endif
                    </select>
                    <label for="amount" class="form-label mt-3">Expense Amount : </label>
                    <input type="text" name="amount" class="form-control" value="{{$expense->amount}}">
                </div>
              </div>
            </div>
        </div>
        <button class="btn btn-warning mt-4" type="submit">Edit Expense</button>
        <a href="/expense/index" class="btn btn-primary mt-4">Back to Expense Index</a>
      </form>
      
    </div>
</div>

@endsection