@extends('teacher.teacher')
@section('content')
    <!--List of homeworks Section-->
    <ul class="w3-ul w3-card-4">
      <li class="w3-bar">
        <img
          src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
          class="w3-bar-item w3-circle w3-hide-small"
          style="width: 85px"
        />
        <div class="w3-bar-item">
          <span class="w3-large">Student name</span><br />
          <span class="w3-large">Task ID</span><br />
          <a href="#">LinkHomework</a>
        </div>
      </li>

      <!--second li-->
      <li class="w3-bar">
        <img
          src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
          class="w3-bar-item w3-circle w3-hide-small"
          style="width: 85px"
        />
        <div class="w3-bar-item">
          <span class="w3-large">Student name</span><br />
          <span class="w3-large">Task ID</span><br />
          <a href="#">LinkHomework</a>
        </div>
      </li>
    </ul>
    <script src="projects.js"></script>
@endsection