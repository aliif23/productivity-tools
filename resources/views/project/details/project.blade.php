@section('content')
@extends('layouts.app')

<div class="card">
  <div class="card-header">
    Project Data
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-12 col-md-6">
            <p class="text-success">{{session('mssg')}}</p>
            <h5 class="card-title">Project Name : {{$project->name}}</h5>
            <h6 class="card-text">PIC : </h6>
            <ul>
                <li>{{$project->pic}}</li>
            </ul>
            <h6 class="card-text">Project Category : </h6>
            <ul>
                <li>{{$project->cat}}</li>
            </ul>
            <h6 class="card-text">Project Price : {{$project->price}}</h6>
            <h6 class="card-text">Project Core Team : </h6>
            <ul>
                <li>Lead Engineer : {{$project->eng}}</li>
                <li>UI/UX Designer : {{$project->desi}}</li>
            </ul>
            <a href="/project/status/done/{{$project->id}}" class="btn btn-success mb-3">Mark as Done</a>
            <h5 class="card-title">Add a new Project Log</h5>
            <form action="/project/postlog/" method="POST">
                @csrf
                <input type="hidden" name="projid" value="{{$project->id}}">
                <label class="form-label" for="date">Date : </label>
                <input class="form-control" type="date" name="date">
                <label class="form-label mt-2 "for="title">Log Title : </label>
                <input type="text" class="form-control" name="title">
                <label class="form-label mt-2 "for="log">Log Contents : </label>
                <textarea name="log" id="" cols="30" rows="10" class="form-control"></textarea>
                <button class="btn btn-success mt-3">Add new Project Log</button>
                <a href="/project/index" class="btn btn-primary mt-3">Back to Project Index</a>
            </form>
        </div>
        <div class="col-12 col-md-6">
            <h5 class="card-title mt-3 mb-4">Project Logs : </h5>
            <div class="accordion" id="accordionExample">
                @foreach($logs as $log)
                @if($log->projid == $project->id && $log->cat == "project")
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$loop->iteration}}">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse{{$loop->iteration}}">
                        {{$log->date}}
                      </button>
                    </h2>
                    <div id="collapse{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading{{$loop->iteration}}" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <p class="fw-bold">{{$log->title}}</p>
                        <form action="" method="POST">
                          @csrf
                          <textarea name="log" id="" cols="30" rows="10" class="form-control">{{$log->log}}</textarea>
                        </form>
                      </div>
                    </div>
                  </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
  </div>
</div>


@endsection