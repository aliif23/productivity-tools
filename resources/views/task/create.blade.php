@section('content')
@extends('layouts.app')

<div class="card">
    <div class="card-header">
      Add Task
    </div>
    <div class="card-body">
      <h5 class="card-title">Add New Task</h5>
      <p class="card-text">Insert your Task Datas</p>
      <div class="row">
          <div class="col-12 col-sm-8 col-lg-6">
            <form action="/task/createtask" method="POST">
                @csrf
                <label for="title" class="form-label mt-2">Task Title</label>
                <input type="text" name="title" class="form-control">
                <label for="details" class="form-label mt-2">Task Overview</label>
                <input type="text" name="details" class="form-control">
                <label for="clock" class="form-label mt-2">Task Start Time :</label>
                <input type="time" name="clock" class="form-control">
                <label for="endclock" class="form-label mt-2">Task End Time :</label>
                <input type="time" name="endclock" class="form-control">
                <label for="day" class="mt-2 form-label">Day of Task : </label>
                <select name="day" id="day" class="form-control">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
                <label for="urgency" class="mt-2 form-label">Task Urgency : </label>
                <select name="urgency" id="urgency" class="form-control">
                    <option value="Urgent">Urgent</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Not-Urgent">Not-Urgent</option>
                </select>
                <div class="mt-3 float-end">
                    <button class="btn btn-success" type="submit">Create Task</button>
                    <button class="btn btn-danger" type="reset">Reset Data</button>
                    <a class="btn btn-primary" href="/task/index">Back to Index</a>
                </div>
              </form>
          </div>
      </div>
    </div>
</div>


@endsection