@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Create Project
    </div>
    <div class="card-body">
      <h5 class="card-title">Edit Project</h5>
      <p class="card-text">Edit your Project Datas</p>

      <form action="/project/editproject/{{$project->id}}" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
              <div class="card">
                <div class="card-body">
                    <label for="name" class="form-label" id="name">Project Name : </label>
                    <input type="text" class="form-control" value="{{$project->name}} " id="name" name="name" required >
                    <label for="pic" class="form-label mt-3" id="pic">PIC : </label>
                    <select name="pic" id="role" class="form-control">
                        @foreach($staffs as $staff)
                        @if($staff->role == "Project Manager")
                            @if($staff->name == $project->pic)
                            <option selected value="{{$staff->name}}">{{$staff->name}}</option>
                            @else
                            <option value="{{$staff->name}}">{{$staff->name}}</option>
                            @endif
                        @endif
                        @endforeach
                    </select>
                    <label for="cat" class="form-label mt-3" id="cat">Project Category : </label>
                    <input type="text" class="form-control" id="cat" name="cat" required value="{{$project->cat}}">
                    <label for="price" class="form-label mt-3" id="price">Projected Price : </label>
                    <input type="text" class="form-control" id="price" name="price" required value="{{$project->price}}">
                    <label for="eng" class="form-label mt-3" id="eng">Engineer : </label>
                    <select name="eng" id="role" class="form-control">
                        @foreach($staffs as $staff)
                            @if($staff->role == "Full Stack Web Developer" || $staff->role == "Front End Developer" ||  $staff->role == "Back End Developer" || $staff->role == "Game Developer" )
                                @if($staff->name == $project->eng)
                                <option selected value="{{$staff->name}}">{{$staff->name}}</option>
                                @else
                                <option value="{{$staff->name}}">{{$staff->name}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                    <label for="desi" class="form-label mt-3" id="desi">UI/UX Designer : </label>
                    <select name="desi" id="role" class="form-control">
                        @foreach($staffs as $staff)
                            @if($staff->role == "UI/UX Designer")
                                @if($staff->name == $project->desi)
                                <option selected value="{{$staff->name}}">{{$staff->name}}</option>
                                @else
                                <option value="{{$staff->name}}">{{$staff->name}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                    <label for="startdate" class="form-label mt-3">Start Date :</label>
                    <input type="date" name="startdate" class="form-control" value="{{$project->startdate}}">
                    <label for="enddate" class="form-label mt-3">End Date :</label>
                    <input type="date" name="enddate" class="form-control" value="{{$project->enddate}}">
                </div>
              </div>
            </div>
        </div>
        <button class="btn btn-warning mt-4" type="submit">Edit</button>
        <a href="/project/index" class="btn btn-primary mt-4">Back to Project Index</a>
      </form>
      
    </div>
</div>

@endsection