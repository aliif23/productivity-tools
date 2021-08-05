@section('content')
@extends('layouts.app')

<div class="row">
    <div class="col-lg-10">
        <div class="card" style="">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/img/staff/{{$staff->gambar}}" class="img-fluid rounded" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Staff Data</h5>
                  <h5 class="card-title">{{$staff->role}}</h5>
                  @if($staff->role == "Project Manager")
                  <p class="card-text">The IT Project Manager handles various aspects of IT in an organization. Typical duties and responsibilities include : </p>
                  <ul>
                    <li>Managing the day-to-day IT operations, networks and computer systems
                    </li>
                    <li>Creating IT project budgets and reallocating resources where necessary
                    </li>
                    <li>Directing the recruitment of IT staff and mentoring the in-house IT team
                    </li>
                  </ul>
                  @endif
                  @if($staff->role == "UI/UX Designer")
                  <p class="card-text">Their main concern is studying users, understanding their behavior, and architecting a user journey that enables the user to achieve their desired tasks with minimal effort.</p>
                  <p>The day-to-day activities of a UX designer vary widely between companies or even between projects within the same company, but some general job functions include:</p>
                  <ul>
                    <li>Conduct user research. Learning about users and their behavior, goals, motivations, and needs. UX teams may collect data via various methods, such as interviews with users/stakeholders, competitive analysis, online surveys, and focus groups. The data is analyzed and converted into qualitative and quantitative information that guides decision-making.
                    </li>
                    <li>Create user personas. Identifying key user groups and creating representative personas of their behaviors and demographics. Personas can be used to make in-depth scenarios, a day-in-the-life of a persona, which shows how the product fits into the user’s everyday routine.
                    </li>
                  </ul>
                  @endif
                  @if($staff->role == "Front End Developer")
                  <p class="card-text">Front-End Web Developer who is motivated to combine the art of design with the art of programming. Responsibilities will include translation of the UI/UX design wireframes to actual code that will produce visual elements of the application. You will work with the UI/UX designer and bridge the gap between graphical design and technical implementation, taking an active role on both sides and defining how the application looks as well as how it works.</p>
                  <ul>
                    <li>Proficient understanding of web markup, including HTML5, CSS3
                    </li>
                    <li>Basic understanding of server-side CSS pre-processing platforms, such as LESS and SASS
                    </li>
                    <li>Proficient understanding of client-side scripting and JavaScript frameworks, including jQuery
                    </li>
                    <li>Good understanding of {Depending on the specific case, a developer should have the knowledge of advanced JavaScript libraries and frameworks, such as AngularJS, KnockoutJS, BackboneJS, ReactJS, DurandalJS etc.}</li>
                  </ul>
                  @endif
                  @if($staff->role == "Back End Developer")
                  <p class="card-text">Back-End Web Developer is responsible for managing the interchange of data between the server and the users. Your primary focus will be development of all server-side logic, definition and maintenance of the central database, and ensuring high performance and responsiveness to requests from the front-end. You will also be responsible for integrating the front-end elements built by your coworkers into the application. A basic understanding of front-end technologies is therefore necessary as well</p>
                  <ul>
                    <li>Creating database schemas that represent and support business processes
                    </li>
                    <li>Proficient knowledge of a back-end programming language
                    </li>
                    <li>Proficient understanding of OWASP security principles
                    </li>
                    <li>Understanding of “session management” in a distributed server environment
                    </li>
                  </ul>
                  @endif
                  @if($staff->role == "Full Stack Web Developer")
                  <p class="card-text">A highly skilled computer programmer who is comfortable with both front and back end programming. Full stack developers are responsible for developing and designing front end web architecture, ensuring the responsiveness of applications, and working alongside graphic designers for web design features, among other duties.</p>

                  <p>Full stack developers will be required to see out a project from conception to final product, requiring good organizational skills and attention to detail.</p>
                  <ul>
                    <li>Developing front end website architecture.
                    </li>
                    <li>Proficient knowledge of a back-end programming language
                    </li>
                    <li>Developing back-end website applications.
                    </li>
                    <li>Creating servers and databases for functionality.
                    </li>
                  </ul>
                  @endif

                  @if($staff->role == "Game Developer")
                  <p class="card-text">Game developers work on teams to plan, design, and produce video games for computers, mobile devices, or game consoles. Their work involves creating visual content for the game and writing code to implement all the game’s features and functionality. This career requires a background in software development and mathematics and the ability to collaborate well with others to accomplish project goals. While many work full-time hours in game studios or at software companies, opportunities exist for game developers who prefer to work remotely or to self-publish their games online as independent developers.</p>

                  <p>Game developers work in a variety of organizations. Specific duties and responsibilities may vary, but there are several core tasks associated with the job, including:
                  </p>
                  <ul>
                    <li>After receiving the game’s specifications and feature requests, game developers plan its storyline, characters, environment, activities, scoring, and progression. They break the project down into smaller parts for the team to handle, create schedules with estimated timelines, set milestones, and create prototypes.
                    </li>
                    <li>Proficient knowledge of a back-end programming language
                    </li>
                    <li>Often coordinating with dedicated visual designers, game developers use computer applications to make 2D and 3D models of game assets, including scenery and characters. They also create graphics for game art and maps. This includes animating the characters and designing any virtual reality environments used.
                    </li>
                    <li>Testing and debugging occur during the development process and after the game ships to players. Game developers use their eye for detail and automated testing tools to check for broken features and functionality, inspect their code for errors as they write it, and handle requests to fix performance and reliability issues.
                    </li>
                  </ul>
                  @endif

                  <h5 class="card-title mb-3">Involved Projects : </h5>
                  <div class="accordion" id="accordionExample">
                    @foreach($projects as $project)
                    @if($project->pic == $staff->name || $project->eng == $staff->name || $project->desi == $staff->name)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse{{$loop->iteration}}">
                            {{$project->name}}
                          </button>
                        </h2>
                        <div id="collapse{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                              <p>Project Name : </p>
                              <ul>
                                  <li>{{$project->name}}</li>
                              </ul>
                              <p>Project Category : </p>
                              <ul>
                                  <li>{{$project->cat}}</li>
                              </ul>
                              <p>Involved As</p>
                              <ul>
                                @if($project->pic == $staff->name)
                                <li>PIC</li>
                                @elseif($project->desi == $staff->name)
                                <li>UI/UX Designer</li>
                                @elseif($project->eng == $staff->name)
                                <li>Developer</li>
                                @endif

                              </ul>
                              <p>Project Price : {{$project->price}}</p>
                              <div class="text-end">
                                  <a href="/project/details/{{$project->id}}" class="btn btn-primary">More Details</a>
                              </div>
                          </div>
                        </div>
                      </div>
                    @endif
                    @endforeach
                    <div class="text-end mt-4">
                        <a href="/staff/index" class="btn btn-primary">Back To Staff Index</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection