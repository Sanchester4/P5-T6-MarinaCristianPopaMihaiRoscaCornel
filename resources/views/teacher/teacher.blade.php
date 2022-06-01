<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Projects Management S.P.M.</title>
    <link
      href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"
  />

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"
  />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="{{ asset('cssTeacher/project.css')}}" />
    <link rel="stylesheet" href="{{ asset('cssTeacher/addProject.css')}}" />
    <link rel="stylesheet" href="{{ asset('cssStudent/task.css')}}" />
    <link rel="stylesheet" href="{{ asset('cssTeacher/profile.css')}}" />
    <link rel="stylesheet" href="{{ asset('cssStudent/calendar.css') }}" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
    <!-- Navbar Section-->
    <nav class="navbar">
      <div class="navbar__container">
        <a href="{{ route('getProjects') }}" id="navbar__logo"
          ><ion-icon name="cut-outline"></ion-icon>S.P.M.
        </a>
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
          <li class="navbar__item">
            <a href="{{ route('homeworksView')}}" class="navbar__links" id="home-page" >Homeworks</a>
          </li>
          <li class="navbar__item">
            <a href="{{ route('getProjects') }}" class="navbar__links" id="home-page"
              >ViewProjects</a
            >
          </li>
          <li class="navbar__item">
            <a href="{{ route('addProject')}}" class="navbar__links" id="home-page">
              AddProject</a
            >
          </li>
          <li class="navbar_item">
            <a href="{{ route('addTask') }}" class="navbar__links" id="about-page">
              AddTask</a
            >
          </li>
          <li class="navbar_item">
            <a href="{{ route('getProjforAssign') }}" class="navbar__links" id="about-page">
              Assign</a
            >
          </li>
          <li class="navbar_item">
            <a href="{{ route('profileTeacher') }}" class="navbar__links" id="contac-page"
              ><i class="fa fa-user"></i> Profile</a
            >
          </li>

          <form action="{{ route('logoutTeacher') }}" method="post" style="display:contents">
            @csrf
            <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" style="text-size: 14px">Logout</button>
          </form>
        </ul>
      </div>
    </nav>

    @yield('content')
    <script src="{{ asset('projects.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
