@extends('teacher.teacher')
@section('content')
    <!--List Students Section-->
    <div class="w3-container">
        <h1>Add/Delete students from your created project/s</h1>
        <span>Project</span>
        <form action="{{ url('teacher/project/assign')}}" method="post" style="display:contents" >
        <select class="form-select" aria-label="Default select example" name="proj_id">
        <option selected >Click to Select</option>
            @foreach($projects as $project)
            <option class="dropdown" value="{{ $project->id }}" >{{ $project->name }}</option>
            @endforeach
          </select>
         
            @csrf
          <br>
          <button id="editButton" class="w3-bar-item btn btn-primary w3-right"><i class="fa-solid fa-right-long"></i>Add</button>
        </form>
          <br>
    </div>
@endsection