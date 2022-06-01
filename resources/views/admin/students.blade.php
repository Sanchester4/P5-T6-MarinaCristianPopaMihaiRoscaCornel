@extends('admin.admin')
@section('content')
    <!--List Students SEctiova-->
    <div class="w3-container">
        <h1>Students List</h1>
        @if ($message = Session::get('message'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
        @foreach($students as $student)
        <ul class="w3-ul w3-card-4">
          <li class="w3-bar">
            <form action="{{url('admin/students/delete/'.$student->id)}}" method="post" style="display:contents">
              @csrf
       {{method_field('DELETE')}}
            <button   onclick="ConfirmDelete()" type="submit" class="w3-bar-item w3-button w3-white w3-xlarge w3-right"><i class="fa fa-trash-o"></i></button>
          </form>
            <button id="editButton" class="w3-bar-item w3-button w3-white w3-xlarge w3-right"><i class="fa fa-edit"></i>Edit</button>
            <img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
            <div class="w3-bar-item">
              <span class="w3-large">Id Student: {{ $student->id }}</span><br> 
              <span class="w3-large">{{ $student->firstName }} {{ $student->lastName }}</span>
            </div>
            <div class="w3-bar-item">
              <span class="w3-large">Specializare: {{ $student->specialisation }}</span><br> 
            </div>
          </li>
          @endforeach
    </div>
    <br>
    <div class="d-flex justify-content-center">
      {!! $students->links() !!}
  </div>
    <script src="{{asset('jsAdmin/deleteStudentButton.js')}}"></script> 
    <script src="{{asset('jsAdmin/editStudentButton.js')}}"></script>
@endsection
