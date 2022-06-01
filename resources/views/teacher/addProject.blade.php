@extends('teacher.teacher')
@section('content')

    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-envelope"></i>
        <i class="fas fa-at"></i>
        <i class="fas fa-mail-bulk"></i>
      </div>
      <form action="/createProject" method="post">
        @csrf
        <h1>Add Project</h1>
        @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="info">
          <input
            class="fname"
            type="text"
            name="name"
            placeholder="Project Name"
          /> 
          <br><br>
          <textarea type="text" name="description" placeholder="Description" required></textarea>
          <span>Student's year: </span>
          <select class="form-select" aria-label="Default select example" name="studyYear">
            <option selected value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="3">4</option>
          </select>
          <span>Deadline</span>
          <input type="date" name="dataTarget" placeholder="Deadline" required />
        </div>
        <br>
        <button class="add-student-button" type="submit">
          Submit
        </button>
      </form>
    </div>
@endsection