@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Create Project
    </div>
    <div class="card-body">
      <h5 class="card-title">Add new Project</h5>
      <p class="card-text">Insert your new Project Datas</p>

      <form action="/staff/createproject/newproject" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
              <div class="card">
                <div class="card-body">
                    <label for="name" class="form-label" id="name">Project Name : </label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <label for="pic" class="form-label mt-3" id="pic">PIC : </label>
                    <select name="pic" id="role" class="form-control">
                        @foreach($staffs as $staff)
                            @if($staff->role == "Project Manager")
                            <option value="{{$staff->name}}">{{$staff->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label for="cat" class="form-label mt-3" id="cat">Project Category : </label>
                    <select name="cat" id="" class="form-control">
                      <option value="Web Development">Web Development</option>
                      <option value="Virtual Tour Development">Virtual Tour Development</option>
                      <option value="ERP Development">ERP Development</option>
                    </select>
                    <label for="price" class="form-label mt-3" id="price">Projected Price : </label>
                    <input type="text" class="form-control" id="price" name="price" required>
                    <label for="eng" class="form-label mt-3" id="eng">Engineer : </label>
                    <select name="eng" id="role" class="form-control">
                        @foreach($developers as $developer)  
                          <option value="{{$developer}}">{{$developer}}</option>
                        @endforeach
                    </select>
                    <label for="desi" class="form-label mt-3" id="desi">UI/UX Designer : </label>
                    <select name="desi" id="role" class="form-control">
                        @foreach($staffs as $staff)
                            @if($staff->role == "UI/UX Designer")
                            <option value="{{$staff->name}}">{{$staff->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label for="startdate" class="form-label mt-3">Start Date :</label>
                    <input type="date" name="startdate" class="form-control">
                    <label for="enddate" class="form-label mt-3">End Date :</label>
                    <input type="date" name="enddate" class="form-control">
                </div>
              </div>
            </div>
        </div>
        <button class="btn btn-success mt-4" type="submit">Add new Project</button>
        <button class="btn btn-danger mt-4" type="reset">Reset Datas</button>
        <a href="/project/index" class="btn btn-primary mt-4">Back to Project Index</a>
      </form>
      
    </div>
</div>

@endsection