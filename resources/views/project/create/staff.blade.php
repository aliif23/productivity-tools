@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Create Staff
    </div>
    <div class="card-body">
      <h5 class="card-title">Add new Staff</h5>
      <p class="card-text">Insert your new Staff Datas</p>

      <form action="/staff/createstaff/newstaff" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
              <div class="card">
                <div class="card-body">
                    <label for="name" class="form-label" id="name">Staff Name : </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <label for="role" class="form-label mt-3" id="role">Staff Role : </label>
                    <select name="role" id="role" class="form-control">
                        <option value="Project Manager">Project Manager</option>
                        <option value="UI/UX Designer">UI/UX Designer</option>
                        <option value="Full Stack Web Developer">Full Stack Web Developer</option>
                        <option value="Front End Developer">Front End Developer</option>
                        <option value="Back End Developer">Back End Developer</option>
                        <option value="Game Developer">Game Developer</option>
                    </select>
                    <label for="gambar" class="form-label mt-3">Staff Picture : </label>
                    <input type="file" class="form-control" name="gambar" required>
                    
                </div>
              </div>
            </div>
        </div>
        <button class="btn btn-success mt-4" type="submit">Add new Staff</button>
        <button class="btn btn-danger mt-4" type="reset">Reset Datas</button>
        <a href="/staff/index" class="btn btn-primary mt-4">Back to staff Index</a>
      </form>
      
    </div>
</div>

@endsection