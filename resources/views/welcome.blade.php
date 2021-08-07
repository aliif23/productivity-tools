@section('content')
@extends('layouts.app')

<div class="row justify-content-center">
  <div class="col-12 col-lg-10">
    <div class="card mb-4">
      <h5 class="card-header text-center">Stratek IT Project Management Tools</h5>
      <div class="card-body">
        <div class="row justify-content-center">
          <div class="col-12 col-md-6 text-center">
            <h5 class="ms-4">Staff Overview</h5>
            <ul>
              <p>Total Staff : <?php echo ($totalstaff) ?></p>
              <ul>
                <p class ="me-4 "style="list-style: none">Total PM : {{$totalpm}}</p>
                <p class ="me-4 "style="list-style: none">Total Dev : {{$totaldev}}</p>
                <p class ="me-4 "style="list-style: none">Total Desi : {{$totaldes}}</p>
              </ul>
            </ul>
          </div>
          <div class="col-12 col-md-6 text-center">
            <h5 class="ms-4">Project Overview</h5>
            <ul>
              <p>Ongoing Projects : <?php echo ($ongoingprojects[0]) ?></p>
              <p>Completed Projects : <?php echo ($completedprojects[0]) ?></p>
              <p>Project Earnings : Rp.  <?php echo ($projectearnings[0]) ?></p>
            </ul>
          </div>
          <div class="col-5 col-sm-12 col-md-6">
              <h5 class="card-title">Manage Stratek Staffs</h5>
              <p class="card-text">Click here to Manage Stratek Staff from Project Manager, Engineer, and Designer</p>
              <a href="/staff/index" class="btn btn-primary">Manage Staffs</a>
            </div>
            <div class="col-5 text-end col-sm-12 col-md-6">
              <h5 class="card-title">Manage Stratek Projects</h5>
              <p class="card-text">Click here to Manage Stratek Projects, add Project Logs, Track Events,etc</p>
              <a href="/project/index" class="btn btn-primary">Manage Projects</a>
            </div>
        </div>
      </div>
  </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-12 col-lg-10">
    <div class="card">
      <h5 class="card-header text-center"><span class="text-success">My </span><span class="text-danger">Personal </span><span class="text-success">Budgeting </span><span class="text-danger">Datas </span></h5>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h6 class="text-success">Total Income This Year : </h6>
            <ul>
              <li>Rp.{{$incomesum}}</li>
            </ul>
            <h6 class="text-success">Average Monthly Income : </h6>
            <ul>
              <li>Rp.{{$incomeavg}}</li>
            </ul>
          </div>
          <div class="col-12 col-sm-6">
            <h6 class="text-danger">Total Expenses This Year : </h6>
          <ul>
            <li>Rp.{{$expensesum}}</li>
          </ul>
            <h6 class="text-danger">Average Monthly Expenses : </h6>
          <ul>
            <li>Rp.{{$expenseavg}}</li>
          </ul>
          </div>
        </div>
        
        <div class="text-center"><canvas id="budgeting" style="" class="mb-4"></canvas></div>
        <div class="row justify-content-center align-items-center">
          <div class="col-5 text-center col-sm-12 col-md-6">
              <h5 class="card-title text-danger">My Expenses</h5>
              <p class="card-text">Click here to manage expenses data</p>
              <a href="/expense/index" class="btn btn-danger">Manage Expenses</a>
            </div>
            <div class="col-5 text-center col-sm-12 col-md-6">
              <h5 class="card-title text-success">My Incomes</h5>
              <p class="card-text">Click here to manage income data</p>
              <a href="/income/index" class="btn btn-success">Manage Incomes</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row justify-content-center mt-4">
  <div class="col-12 col-lg-10">
    <div class="card">
      <div class="card-header text-center">
        <h5>Task Scheduler</h5>
      </div>
      <div class="card-body">
        <h5 class="card-title">Task Scheduler</h5>
        <p class="card-text">I use this tool to schedule tasks, projects, and Important Meeting</p>
        <p class="text-success">{{session('mssg')}}</p>
        <div class="text-end">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add new Task
          </button>
        </div>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/createtask" method="POST">
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
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button submit" class="btn btn-success">Add Task</button>
                </form>
                </div>
              </div>
            </div>
          


        </div>
        <div class="row">
          <div class="col-12">
            <h5 class="text-center mb-5 mt-4" id="task">This Week Tasks</h5>
            <div class="row mb-4">
              <div class="col-6 col-sm-3">
                <h6>Monday Morning Tasks</h6>
                <div class="accordion" id="accordionExample">
                    @foreach($mondaymorningtasks as $mondaymorningtask)
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading{{$loop->iteration}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse{{$loop->iteration}}">
                          {{$mondaymorningtask->title}}
                        </button>
                      </h2>
                      <div id="collapse{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading{{$loop->iteration}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <li>{{$mondaymorningtask->title}}</li>
                          <li>{{$mondaymorningtask->clock}}</li>
                          <li>{{$mondaymorningtask->endclock}}</li>
                          <li>{{$mondaymorningtask->urgency}}</li>
                          <div class="text-end">
                            <a href="/task/donehome/{{$mondaymorningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
   
              <div class="col-6 col-sm-3">
               <h6>Monday Afternoon Tasks</h6>
               <div class="accordion" id="accordionExample1">
                  @foreach($mondayafternoontasks as $mondayafternoontask)
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading1{{$loop->iteration}}">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse1{{$loop->iteration}}">
                        {{$mondayafternoontask->title}}
                      </button>
                    </h2>
                    <div id="collapse1{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading1{{$loop->iteration}}" data-bs-parent="#accordionExample1">
                      <div class="accordion-body">
                        <li>{{$mondayafternoontask->title}}</li>
                        <li>{{$mondayafternoontask->clock}}</li>
                        <li>{{$mondayafternoontask->endclock}}</li>
                        <li>{{$mondayafternoontask->urgency}}</li>
                        <div class="text-end">
                          <a href="/task/donehome/{{$mondayafternoontask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                        </div>
                      </div>
                    </div>
                    </div>
                  @endforeach
                </div>
              </div>
   
             <div class="col-6 col-sm-3">
               <h6>Monday Evening Tasks</h6>
               <div class="accordion" id="accordionExample2">
                  @foreach($mondayeveningtasks as $mondayeveningtask)
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading2{{$loop->iteration}}">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse2{{$loop->iteration}}">
                        {{$mondayeveningtask->title}}
                      </button>
                    </h2>
                    <div id="collapse2{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading2{{$loop->iteration}}" data-bs-parent="#accordionExample2">
                      <div class="accordion-body">
                        <li>{{$mondayeveningtask->title}}</li>
                        <li>{{$mondayeveningtask->clock}}</li>
                        <li>{{$mondayeveningtask->endclock}}</li>
                        <li>{{$mondayeveningtask->urgency}}</li>
                        <div class="text-end">
                          <a href="/task/donehome/{{$mondayeveningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
             </div>
   
             <div class="col-6 col-sm-3">
               <h6>Monday Night Tasks</h6>
               <div class="accordion" id="accordionExample3">
                  @foreach($mondaynighttasks as $mondaynighttask)
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading3{{$loop->iteration}}">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse3{{$loop->iteration}}">
                        {{$mondaynighttask->title}}
                      </button>
                    </h2>
                    <div id="collapse3{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading3{{$loop->iteration}}" data-bs-parent="#accordionExample3">
                      <div class="accordion-body">
                        <li>{{$mondaynighttask->title}}</li>
                        <li>{{$mondaynighttask->clock}}</li>
                        <li>{{$mondaynighttask->endclock}}</li>
                        <li>{{$mondaynighttask->urgency}}</li>
                        <div class="text-end">
                          <a href="/task/donehome/{{$mondaynighttask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
             </div>
            </div>
   
            <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Tuesday Morning Tasks</h6>
               <div class="accordion" id="accordionExample4">
                @foreach($tuesdaymorningtasks as $tuesdaymorningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading4{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse4{{$loop->iteration}}">
                      {{$tuesdaymorningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse4{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading4{{$loop->iteration}}" data-bs-parent="#accordionExample4">
                    <div class="accordion-body">
                      <li>{{$tuesdaymorningtask->title}}</li>
                      <li>{{$tuesdaymorningtask->clock}}</li>
                      <li>{{$tuesdaymorningtask->endclock}}</li>
                      <li>{{$tuesdaymorningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$tuesdaymorningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Tuesday Afternoon Tasks</h6>
              <div class="accordion" id="accordionExample5">
                @foreach($tuesdayafternoontasks as $tuesdayafternoontask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading5{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse5{{$loop->iteration}}">
                      {{$tuesdayafternoontask->title}}
                    </button>
                  </h2>
                  <div id="collapse5{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading5{{$loop->iteration}}" data-bs-parent="#accordionExample5">
                    <div class="accordion-body">
                      <li>{{$tuesdayafternoontask->title}}</li>
                      <li>{{$tuesdayafternoontask->clock}}</li>
                      <li>{{$tuesdayafternoontask->endclock}}</li>
                      <li>{{$tuesdayafternoontask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$tuesdayafternoontask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Tuesday Evening Tasks</h6>
              <div class="accordion" id="accordionExample6">
                @foreach($tuesdayeveningtasks as $tuesdayeveningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading6{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse6{{$loop->iteration}}">
                      {{$tuesdayeveningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse6{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading6{{$loop->iteration}}" data-bs-parent="#accordionExample6">
                    <div class="accordion-body">
                      <li>{{$tuesdayeveningtask->title}}</li>
                      <li>{{$tuesdayeveningtask->clock}}</li>
                      <li>{{$tuesdayeveningtask->endclock}}</li>
                      <li>{{$tuesdayeveningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$tuesdayeveningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Tuesday Night Tasks</h6>
              <div class="accordion" id="accordionExample27">
                @foreach($tuesdaynighttasks as $tuesdaynighttask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading27{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse27{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse27{{$loop->iteration}}">
                      {{$tuesdaynighttask->title}}
                    </button>
                  </h2>
                  <div id="collapse27{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading27{{$loop->iteration}}" data-bs-parent="#accordionExample27">
                    <div class="accordion-body">
                      <li>{{$tuesdaynighttask->title}}</li>
                      <li>{{$tuesdaynighttask->clock}}</li>
                      <li>{{$tuesdaynighttask->endclock}}</li>
                      <li>{{$tuesdaynighttask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$tuesdaynighttask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Wednesday Morning Tasks</h6>
               <div class="accordion" id="accordionExample7">
                @foreach($wednesdaymorningtasks as $wednesdaymorningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading7{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse7{{$loop->iteration}}">
                      {{$wednesdaymorningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse7{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading7{{$loop->iteration}}" data-bs-parent="#accordionExample7">
                    <div class="accordion-body">
                      <li>{{$wednesdaymorningtask->title}}</li>
                      <li>{{$wednesdaymorningtask->clock}}</li>
                      <li>{{$wednesdaymorningtask->endclock}}</li>
                      <li>{{$wednesdaymorningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$wednesdaymorningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Wednesday Afternoon Tasks</h6>
              <div class="accordion" id="accordionExample8">
                @foreach($wednesdayafternoontasks as $wednesdayafternoontask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading8{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse8{{$loop->iteration}}">
                      {{$wednesdayafternoontask->title}}
                    </button>
                  </h2>
                  <div id="collapse8{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading8{{$loop->iteration}}" data-bs-parent="#accordionExample8">
                    <div class="accordion-body">
                      <li>{{$wednesdayafternoontask->title}}</li>
                      <li>{{$wednesdayafternoontask->clock}}</li>
                      <li>{{$wednesdayafternoontask->endclock}}</li>
                      <li>{{$wednesdayafternoontask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$wednesdayafternoontask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Wednesday Evening Tasks</h6>
              <div class="accordion" id="accordionExample9">
                @foreach($wednesdayeveningtasks as $wednesdayeveningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading9{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse9{{$loop->iteration}}">
                      {{$wednesdayeveningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse9{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading9{{$loop->iteration}}" data-bs-parent="#accordionExample9">
                    <div class="accordion-body">
                      <li>{{$wednesdayeveningtask->title}}</li>
                      <li>{{$wednesdayeveningtask->clock}}</li>
                      <li>{{$wednesdayeveningtask->endclock}}</li>
                      <li>{{$wednesdayeveningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$wednesdayeveningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Wednesday Night Tasks</h6>
              <div class="accordion" id="accordionExample10">
                @foreach($wednesdaynighttasks as $wednesdaynighttask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading10{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse10{{$loop->iteration}}">
                      {{$wednesdaynighttask->title}}
                    </button>
                  </h2>
                  <div id="collapse10{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading10{{$loop->iteration}}" data-bs-parent="#accordionExample10">
                    <div class="accordion-body">
                      <li>{{$wednesdaynighttask->title}}</li>
                      <li>{{$wednesdaynighttask->clock}}</li>
                      <li>{{$wednesdaynighttask->endclock}}</li>
                      <li>{{$wednesdaynighttask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$wednesdaynighttask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Thursday Morning Tasks</h6>
               <div class="accordion" id="accordionExample11">
                @foreach($thursdaymorningtasks as $thursdaymorningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading11{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse11{{$loop->iteration}}">
                      {{$thursdaymorningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse11{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading11{{$loop->iteration}}" data-bs-parent="#accordionExample11">
                    <div class="accordion-body">
                      <li>{{$thursdaymorningtask->title}}</li>
                      <li>{{$thursdaymorningtask->clock}}</li>
                      <li>{{$thursdaymorningtask->endclock}}</li>
                      <li>{{$thursdaymorningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$thursdaymorningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Thursday Afternoon Tasks</h6>
              <div class="accordion" id="accordionExample12">
                @foreach($thursdayafternoontasks as $thursdayafternoontask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading12{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse12{{$loop->iteration}}">
                      {{$thursdayafternoontask->title}}
                    </button>
                  </h2>
                  <div id="collapse12{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading12{{$loop->iteration}}" data-bs-parent="#accordionExample12">
                    <div class="accordion-body">
                      <li>{{$thursdayafternoontask->title}}</li>
                      <li>{{$thursdayafternoontask->clock}}</li>
                      <li>{{$thursdayafternoontask->endclock}}</li>
                      <li>{{$thursdayafternoontask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$thursdayafternoontask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Thursday Evening Tasks</h6>
              <div class="accordion" id="accordionExample13">
                @foreach($thursdayeveningtasks as $thursdayeveningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading13{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse13{{$loop->iteration}}">
                      {{$thursdayeveningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse13{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading13{{$loop->iteration}}" data-bs-parent="#accordionExample13">
                    <div class="accordion-body">
                      <li>{{$thursdayeveningtask->title}}</li>
                      <li>{{$thursdayeveningtask->clock}}</li>
                      <li>{{$thursdayeveningtask->endclock}}</li>
                      <li>{{$thursdayeveningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$thursdayeveningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Thursday Night Tasks</h6>
              <div class="accordion" id="accordionExample14">
                @foreach($thursdaynighttasks as $thursdaynighttask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading14{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse14{{$loop->iteration}}">
                      {{$thursdaynighttask->title}}
                    </button>
                  </h2>
                  <div id="collapse14{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading14{{$loop->iteration}}" data-bs-parent="#accordionExample14">
                    <div class="accordion-body">
                      <li>{{$thursdaynighttask->title}}</li>
                      <li>{{$thursdaynighttask->clock}}</li>
                      <li>{{$thursdaynighttask->endclock}}</li>
                      <li>{{$thursdaynighttask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$thursdaynighttask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Friday Morning Tasks</h6>
               <div class="accordion" id="accordionExample15">
                @foreach($fridaymorningtasks as $fridaymorningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading15{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse15{{$loop->iteration}}">
                      {{$fridaymorningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse15{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading15{{$loop->iteration}}" data-bs-parent="#accordionExample15">
                    <div class="accordion-body">
                      <li>{{$fridaymorningtask->title}}</li>
                      <li>{{$fridaymorningtask->clock}}</li>
                      <li>{{$fridaymorningtask->endclock}}</li>
                      <li>{{$fridaymorningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$fridaymorningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Friday Afternoon Tasks</h6>
              <div class="accordion" id="accordionExample16">
                @foreach($fridayafternoontasks as $fridayafternoontask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading16{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse16{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse16{{$loop->iteration}}">
                      {{$fridayafternoontask->title}}
                    </button>
                  </h2>
                  <div id="collapse16{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading16{{$loop->iteration}}" data-bs-parent="#accordionExample16">
                    <div class="accordion-body">
                      <li>{{$fridayafternoontask->title}}</li>
                      <li>{{$fridayafternoontask->clock}}</li>
                      <li>{{$fridayafternoontask->endclock}}</li>
                      <li>{{$fridayafternoontask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$fridayafternoontask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Friday Evening Tasks</h6>
              <div class="accordion" id="accordionExample17">
                @foreach($fridayeveningtasks as $fridayeveningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading17{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse17{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse17{{$loop->iteration}}">
                      {{$fridayeveningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse17{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading17{{$loop->iteration}}" data-bs-parent="#accordionExample17">
                    <div class="accordion-body">
                      <li>{{$fridayeveningtask->title}}</li>
                      <li>{{$fridayeveningtask->clock}}</li>
                      <li>{{$fridayeveningtask->endclock}}</li>
                      <li>{{$fridayeveningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$fridayeveningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Friday Night Tasks</h6>
              <div class="accordion" id="accordionExample18">
                @foreach($fridaynighttasks as $fridaynighttask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading18{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse18{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse18{{$loop->iteration}}">
                      {{$fridaynighttask->title}}
                    </button>
                  </h2>
                  <div id="collapse18{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading18{{$loop->iteration}}" data-bs-parent="#accordionExample18">
                    <div class="accordion-body">
                      <li>{{$fridaynighttask->title}}</li>
                      <li>{{$fridaynighttask->clock}}</li>
                      <li>{{$fridaynighttask->endclock}}</li>
                      <li>{{$fridaynighttask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$fridaynighttask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Saturday Morning Tasks</h6>
               <div class="accordion" id="accordionExample19">
                @foreach($saturdaymorningtasks as $saturdaymorningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading19{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse19{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse19{{$loop->iteration}}">
                      {{$saturdaymorningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse19{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading19{{$loop->iteration}}" data-bs-parent="#accordionExample19">
                    <div class="accordion-body">
                      <li>{{$saturdaymorningtask->title}}</li>
                      <li>{{$saturdaymorningtask->clock}}</li>
                      <li>{{$saturdaymorningtask->endclock}}</li>
                      <li>{{$saturdaymorningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$saturdaymorningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Saturday Afternoon Tasks</h6>
              <div class="accordion" id="accordionExample20">
                @foreach($saturdayafternoontasks as $saturdayafternoontask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading20{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse20{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse20{{$loop->iteration}}">
                      {{$saturdayafternoontask->title}}
                    </button>
                  </h2>
                  <div id="collapse20{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading20{{$loop->iteration}}" data-bs-parent="#accordionExample20">
                    <div class="accordion-body">
                      <li>{{$saturdayafternoontask->title}}</li>
                      <li>{{$saturdayafternoontask->clock}}</li>
                      <li>{{$saturdayafternoontask->endclock}}</li>
                      <li>{{$saturdayafternoontask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$saturdayafternoontask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Saturday Evening Tasks</h6>
              <div class="accordion" id="accordionExample21">
                @foreach($saturdayeveningtasks as $saturdayeveningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading21{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse21{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse21{{$loop->iteration}}">
                      {{$saturdayeveningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse21{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading21{{$loop->iteration}}" data-bs-parent="#accordionExample21">
                    <div class="accordion-body">
                      <li>{{$saturdayeveningtask->title}}</li>
                      <li>{{$saturdayeveningtask->clock}}</li>
                      <li>{{$saturdayeveningtask->endclock}}</li>
                      <li>{{$saturdayeveningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$saturdayeveningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Saturday Night Tasks</h6>
              <div class="accordion" id="accordionExample22">
                @foreach($saturdaynighttasks as $saturdaynighttask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading22{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse22{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse22{{$loop->iteration}}">
                      {{$saturdaynighttask->title}}
                    </button>
                  </h2>
                  <div id="collapse22{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading22{{$loop->iteration}}" data-bs-parent="#accordionExample22">
                    <div class="accordion-body">
                      <li>{{$saturdaynighttask->title}}</li>
                      <li>{{$saturdaynighttask->clock}}</li>
                      <li>{{$saturdaynighttask->endclock}}</li>
                      <li>{{$saturdaynighttask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$saturdaynighttask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
           </div>
   
           <div class="row mb-4">
             <div class="col-6 col-sm-3">
               <h6>Sunday Morning Tasks</h6>
               <div class="accordion" id="accordionExample23">
                @foreach($sundaymorningtasks as $sundaymorningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading23{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse23{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse23{{$loop->iteration}}">
                      {{$sundaymorningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse23{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading23{{$loop->iteration}}" data-bs-parent="#accordionExample23">
                    <div class="accordion-body">
                      <li>{{$sundaymorningtask->title}}</li>
                      <li>{{$sundaymorningtask->clock}}</li>
                      <li>{{$sundaymorningtask->endclock}}</li>
                      <li>{{$sundaymorningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$sundaymorningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
             </div>
   
             <div class="col-6 col-sm-3">
              <h6>Sunday Afternoon Tasks</h6>
              <div class="accordion" id="accordionExample24">
                @foreach($sundayafternoontasks as $sundayafternoontask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading24{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse24{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse24{{$loop->iteration}}">
                      {{$sundayafternoontask->title}}
                    </button>
                  </h2>
                  <div id="collapse24{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading24{{$loop->iteration}}" data-bs-parent="#accordionExample24">
                    <div class="accordion-body">
                      <li>{{$sundayafternoontask->title}}</li>
                      <li>{{$sundayafternoontask->clock}}</li>
                      <li>{{$sundayafternoontask->endclock}}</li>
                      <li>{{$sundayafternoontask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$sundayafternoontask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Sunday Evening Tasks</h6>
              <div class="accordion" id="accordionExample25">
                @foreach($sundayeveningtasks as $sundayeveningtask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading25{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse25{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse25{{$loop->iteration}}">
                      {{$sundayeveningtask->title}}
                    </button>
                  </h2>
                  <div id="collapse25{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading25{{$loop->iteration}}" data-bs-parent="#accordionExample25">
                    <div class="accordion-body">
                      <li>{{$sundayeveningtask->title}}</li>
                      <li>{{$sundayeveningtask->clock}}</li>
                      <li>{{$sundayeveningtask->endclock}}</li>
                      <li>{{$sundayeveningtask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$sundayeveningtask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
   
            <div class="col-6 col-sm-3">
              <h6>Sunday Night Tasks</h6>
              <div class="accordion" id="accordionExample26">
                @foreach($sundaynighttasks as $sundaynighttask)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading26{{$loop->iteration}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse26{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse26{{$loop->iteration}}">
                      {{$sundaynighttask->title}}
                    </button>
                  </h2>
                  <div id="collapse26{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="heading26{{$loop->iteration}}" data-bs-parent="#accordionExample26">
                    <div class="accordion-body">
                      <li>{{$sundaynighttask->title}}</li>
                      <li>{{$sundaynighttask->clock}}</li>
                      <li>{{$sundaynighttask->endclock}}</li>
                      <li>{{$sundaynighttask->urgency}}</li>
                      <div class="text-end">
                        <a href="/task/donehome/{{$sundaynighttask->id}}" class="btn btn-success mt-3 btn-sm">Mark as Done</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
           </div>
   
          </div>
        </div>
        <div class="float-end" id="task">
          <a href="/task/index" class="btn btn-primary">Manage Tasks</a>
        </div>

      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

// $('p').css('color','red');

</script>

<script>
var xValues = <?php echo json_encode($bulanke) ?>;

new Chart("budgeting", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      label : "Total Expense",
      data: <?php echo json_encode($totalexpensemonthly) ?>,
      borderColor: "red",
      fill: false
    },{
      label : "Total Income",
      data: <?php echo json_encode($totalincomemonthly) ?>,
      borderColor: "green",
      fill: false
    }]
  },
  options: {
    legend: {display: true}
  }
});

  
</script>
@endsection