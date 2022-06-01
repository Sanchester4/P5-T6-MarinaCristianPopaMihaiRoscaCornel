@extends('teacher.teacher')
@section('content')

    <!--Project Section-->
    <div class="project-table">
      @if ($message = Session::get('message'))
      <div class="alert alert-fail">
          <p>{{ $message }}</p>
      </div>
      @endif
      @foreach($projects as $project)
      <li class="project-body">
        <a href="task.html"></a>
        <div class="project-header">
          <h3 class="project-name"><a href="{{ url('teacher/project/'.$project->id).'/task'}}">{{$project->name}}</a></h3>
          @foreach($users as $user)
          <div class="teacher-name">{{$user->lastName}} {{$user->firstName}}</div>
          @endforeach
        </div>
        <div class="project-middle-body">
          <img
            class="PNzAWd"
            aria-hidden="true"
            src="https://lh3.googleusercontent.com/a/default-user=s75-c"
          />
          <div class="description-project">Descriere</div>
          <a>{{$project->description}}</a>
        </div>
        <div class="project-footer">
          <a href="{{ route('calendarTeacher') }}"><i class="fa fa-calendar-o fa-2x"></i></a>
        </div>
      </li>
      @endforeach
    </div>
    <script src="{{ asset('projects.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection