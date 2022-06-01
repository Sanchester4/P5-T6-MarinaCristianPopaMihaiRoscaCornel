@extends('admin.admin')
@section('content')

    <!--Add Teacher Sectiova-->
    <div class="main-block">
        <form action="/createTeacher" method="post">
         @csrf
          <h1>Add Teacher</h1>
          @if ($message = Session::get('message'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
          <div class="info">
            <input type="name" name="firstname" placeholder="First name" required />
            <input class="fname" type="text" name="lastname" placeholder="Last Name" required />
            <input type="text" name="email" placeholder="Email"  required/>
            <input type="password" name="password" placeholder="Password" required />
            <input type="text" name="cnp" placeholder="CNP"  />
            <input type="date" name="dateBirth" placeholder="Date of birth" required />
          </div>
          <button class="add-student-button" type="submit">
            Submit
          </button>
        </form>
      </div>
    <script src="{{asset('cssJs/app.js')}}"></script>
    @endsection
