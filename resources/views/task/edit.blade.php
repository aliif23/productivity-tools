@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Edit Task
    </div>
    <div class="card-body">
      <h5 class="card-title">Edit Your Task</h5>
      <p class="card-text">Edit your Task Datas</p>
      <div class="row">
          <div class="col-12 col-sm-8 col-lg-6">
            <form action="/task/edittask/{{$task->id}}" method="POST">
                @csrf
                <label for="title" class="form-label mt-2">Task Title</label>
                <input type="text" name="title" class="form-control" value = "{{$task->title}}">
                <label for="details" class="form-label mt-2">Task Overview</label>
                <input type="text" name="details" class="form-control" value="{{$task->details}}">
                <label for="clock" class="form-label mt-2">Task Start Time :</label>
                <input type="time" name="clock" class="form-control" value="{{$task->clock}}">
                <label for="endclock" class="form-label mt-2">Task End Time :</label>
                <input type="time" name="endclock" class="form-control" value="{{$task->endclock}}">
                <label for="day" class="mt-2 form-label">Day of Task : </label>
                <select name="day" id="day" class="form-control">
                    @if($task->day == "Monday")
                    <option value="Monday" selected>Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    @elseif($task->day == "Tuesday")
                    <option value="Monday" >Monday</option>
                    <option value="Tuesday" selected>Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    @elseif($task->day == "Wednesday")
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday" selected>Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    @elseif($task->day == "Thursday")
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday" selected>Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    @elseif($task->day == "Friday")
                    <option value="Monday" >Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday" selected>Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    @elseif($task->day == "Saturday")
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday" selected>Saturday</option>
                    <option value="Sunday">Sunday</option>
                    @elseif($task->day == "Sunday")
                    <option value="Monday" >Monday</option>
                    <option value="Tuesday" selected>Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday" selected>Sunday</option>
                    @endif
                </select>
                <label for="urgency" class="mt-2 form-label">Task Urgency : </label>
                <select name="urgency" id="urgency" class="form-control">
                    @if($task->urgency == "Urgent")
                    <option value="Urgent" selected>Urgent</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Not-Urgent">Not-Urgent</option>
                    @elseif($task->urgency == "Moderate")
                    <option value="Urgent">Urgent</option>
                    <option value="Moderate" selected>Moderate</option>
                    <option value="Not-Urgent">Not-Urgent</option>
                    @elseif($task->urgency == "Not-Urgent")
                    <option value="Urgent">Urgent</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Not-Urgent" selected>Not-Urgent</option>
                    @endif
                </select>
                <div class="mt-3 float-end">
                    <button class="btn btn-warning" type="submit">Edit Task</button>
                    <a class="btn btn-primary" href="/task/index">Back to Index</a>
                </div>
              </form>
          </div>
      </div>
    </div>
</div>


@endsection