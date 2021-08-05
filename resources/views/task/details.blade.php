@section('content')
@extends('layouts.app')

<div class="card">
  <div class="card-header">
    Task Data
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-12 col-md-6">
            <p class="text-success">{{session('mssg')}}</p>
            <h5 class="card-text">Task Title : </h5>
            <ul>
                <li>{{$task->title}}</li>
            </ul>
            <h6 class="card-text">Task Urgency : </h6>
            <ul>
                <li>{{$task->urgency}}</li>
            </ul>
            <h6 class="card-text">Task Starting Time : {{$task->clock}}</h6>
            <h6 class="card-text">Expected Task End Time : {{$task->endclock}} </h6>
            <h6 class="card-text">Task Status : {{$task->status}}</h6>
            <a href="/task/details/done/{{$task->id}}" class="btn btn-success mt-3">Mark as Done</a>
            <h5 class="card-title mt-5">Add a new Task Log</h5>
            <form action="/task/details/addlog/" method="POST">
                @csrf
                <input type="hidden" name="projid" value="{{$task->id}}" required>
                <input type="hidden" name="cat" value="task">
                <label class="form-label" for="date">Date : </label>
                <input class="form-control" type="date" name="date" required>
                <label class="form-label mt-2 "for="title">Log Title : </label>
                <input type="text" class="form-control" name="title">
                <label class="form-label mt-2 "for="log" required>Log Contents : </label>
                <textarea name="log" id="" cols="30" rows="10" class="form-control" required></textarea>
                <button class="btn btn-success mt-3">Add new Task Log</button>
                <a href="/task/index" class="btn btn-primary mt-3">Back to Task Index</a>
            </form>
        </div>
        <div class="col-12 col-md-6">
            <h5 class="card-title mt-3 mb-4">Task Logs : </h5>
            <div class="accordion" id="accordionExample">
                @foreach($logs as $log)
                @if($log->projid == $task->id && $log->cat == "task")
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