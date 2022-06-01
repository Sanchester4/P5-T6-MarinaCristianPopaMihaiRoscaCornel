@extends('teacher.teacher')
 @section('content')
    <!--End navbar section-->
    <!--Add student form-->
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-envelope"></i>
        <i class="fas fa-at"></i>
        <i class="fas fa-mail-bulk"></i>
      </div>
      <form action="/createTask" method="post">
        @csrf
        <h1>Add Task</h1>
        @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="info">
          <input class="fname" type="text" name="title" placeholder="Title" />
          <br><br>
          <textarea type="text" name="description" placeholder="Description" required></textarea>
          <span>Project</span>
          <select class="form-select" aria-label="Default select example" name="project_id_task" required>
            <option selected >Click to Select</option>
            @foreach($projects as $project)
            <option value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
          </select>
          <span>Deadline</span>
          <input type="date" name="deadline" placeholder="Deadline" required />
        </div>
        <br>
        <button class="add-student-button" type="submit">
          Submit
        </button>
      </form>
    </div>
    <script src="js/app.js"></script>
@endsection
