@extends('student.student')
 @section('content')
    <!--Profile SEctiova-->
    @foreach($users as $user)
    <div class="container rounded mt-5 mb-5">
      <div class="row">
        <div class="col-md-3 border-right">
          <div
            class="d-flex flex-column align-items-center text-center p-3 py-5"
          >
            <div class="profile-pic">
              <label class="-label" for="file">
                <span>Change Image</span>
              </label>
              <input id="file" type="file" onchange="loadFile(event)" />
              <img
                src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                id="output"
                width="200"
              />
            </div>
            
          
            <span class="text-black-50">{{$user->email}}</span>
          </div>
        </div>
        <div class="col-md-5 border-right border-bottom border-top">
          <div class="p-5 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="text-right">My Profile</h4>
            </div>
            <div class="row mt-2">
              <div class="col-md-6">
                <label class="labels">First Name</label>
              </div>
              <label class="text-black-100">{{$user->firstName}}</label>
              <div class="col-md-6"><label class="labels">Name</label></div>
              <label class="text-black-100">{{$user->lastName}}</label>
            </div>
            <div class="row mt-2">
              <div class="col-md-12"><label class="labels">CNP</label></div>
              <label class="text-black-100">{{$user->cnp}}</label>
              <div class="col-md-12">
                <label class="labels">Study year</label>
              </div>
              <label class="text-black-100">{{$user->studyYear}}</label>
              <div class="col-md-12">
                <label class="labels">Specialization</label>
              </div>
              <label class="text-black-100">{{$user->specialisation}}</label>
              <div class="col-md-12">
                <label class="labels">Date of birth</label>
              </div>
              <label class="text-black-100">{{$user->dateBirth}}</label>
              {{-- <div class="col-md-12">
                <label class="labels">Password</label
                ><input
                  id="myInput"
                  type="password"
                  class="form-control"
                  value="parola"
                />
              </div>
              <div class="col-md-12">
                <input type="checkbox" onclick="myFunction()" />Show Password
              </div> --}}
              <!--<label class="text-black-100">parola</label>-->
              <!--<div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>-->
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
    <script>
    //   function myFunction() {
    //     var x = document.getElementById("myInput");
    //     if (x.type === "password") {
    //       x.type = "text";
    //     } else {
    //       x.type = "password";
    //     }
    //   }
    // </script>
    <script src="{{asset('js/addImg.js')}}"></script>
    <script src="{{asset('jsStudent/app.js')}}"></script>
@endsection