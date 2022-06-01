@extends('student.student')
 @section('content')
    <!--Project Section-->
    <div class="project-table">
      @foreach($users->projects as $project)
      <li class="project-body">
        <a href="task.html"></a>
        <div class="project-header">
          <h3 class="project-name"><a href="{{ url('student/project/'.$project->id).'/task'}}">{{$project->name}}</a></h3>
          <div class="teacher-name">{{$project->creator_lastName}} {{$project->creator_firstName}}</div>
        </div>
        <div class="project-middle-body">
          <img
            class="PNzAWd"
            aria-hidden="true"
            src="https://lh3.googleusercontent.com/a/default-user=s75-c"
          />
          <div class="description-project">{{$project->description}}</div>
        </div>
        <div class="project-footer">
          <a href="calendar.html"><i class="fa fa-calendar-o fa-2x"></i></a>
        </div>
      </li>
      @endforeach
    </div>
    <script src="{{asset('projects.js')}}"></script>
@endsection
