@extends('admin.admin')
@section('content')
    <!--List Students SEctiova-->
    <div class="w3-container">
        <h1>Teachers List</h1>
        @if ($message = Session::get('message'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
        @foreach($teachers as $teacher)
        <ul class="w3-ul w3-card-4">
          <li class="w3-bar">
            <form action="{{ url('admin/teachers/delete/'.$teacher->id) }} " method="post" style="display:contents">
                @csrf
         {{method_field('DELETE')}}
                <button  onclick="ConfirmDelete()" class="w3-bar-item w3-button w3-white w3-xlarge w3-right"><i class="fa fa-trash-o"></i></button>
            </form>
            <button id="editButton" class="w3-bar-item w3-button w3-white w3-xlarge w3-right"><i class="fa fa-edit"></i>Edit</button>
            <img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
            <div class="w3-bar-item">
              <span class="w3-large">Id teacher: {{ $teacher->id }}</span><br> <!--Id Profesor-->
              <span class="w3-large">{{ $teacher->firstName }} {{ $teacher->lastName }}</span><!--Nume Profesor-->
            </div>
          </li>
          @endforeach
    </div>
    <br>
    <div class="d-flex justify-content-center">
        {!! $teachers->links() !!}
    </div>
    <script src="{{asset('jsAdmin/deleteTeacherButton.js')}}"></script> 
    <script src="{{asset('jsAdmin/editTeacherButton.js')}}"></script>
    @endsection