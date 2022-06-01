@extends('admin.admin')
@section('content')
    <!--Add student form-->
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-envelope"></i>
        <i class="fas fa-at"></i>
        <i class="fas fa-mail-bulk"></i>
      </div>
      <form action="/createStudent" method="post">
        @csrf
        <h1>Add student</h1>
        @if ($message = Session::get('message'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
        <div class="info">
          <input class="fname" type="text" name="firstname" placeholder="First name" required/>
          <input class="fname" type="text" name="lastname" placeholder="Last name" required/>
          <input type="text" name="email" placeholder="Email" required />
          <input type="password" name="password" placeholder="Password" required />
          <input type="text" name="cnp" placeholder="CNP" required />
          <input type="number" name="studyYear" placeholder="Study year" required />
          <input type="text" name="specialisation" placeholder="Specialization" required />
          <input type="date" name="dateBirth" placeholder="Date of birth" required />
        </div>
        <button class="add-student-button" type="submit">
          Submit
        </button>
      </form>
    </div>
    <script src="js/app.js"></script>
@endsection
