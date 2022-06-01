<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"
    />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{asset('cssAdmin/profile.css')}}" />
    <title>Profile</title>
  </head>
  <body>
    <!-- Navbar Section-->
    <nav class="navbar">
      <div class="navbar__container">
        <a href="#home" id="navbar__logo"
          ><ion-icon name="cut-outline"></ion-icon>S.P.M.
        </a>
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
            <li class="navbar__item">
              <a href="{{ route('getStudents') }}" class="navbar__links" id="home-page"
                ></i> Students List</a
              >
            </li>
            <li class="navbar_item">
              <a href="{{ route('getTeachers') }}" class="navbar__links" id="about-page"
                ></i> Teachers List</a
              >
  
          <li class="navbar__item">
            <a href="{{ route('addStudent') }}" class="navbar__links" id="home-page"
              ></i> AddStudent</a
            >
          </li>
          <li class="navbar_item">
            <a href="{{ route('addTeacher') }}" class="navbar__links" id="about-page"
              ></i> AddTeacher</a
            >
          </li>
          <li class="navbar_item">
            <a href="{{ route('profile') }}" class="navbar__links" id="contac-page"
              ><i class="fa fa-user"></i>  Profile</a
            >
          </li>
          <li class="navbar_btn">
            <form action="{{ route('logout') }}" method="post" style="display:contents">
              @csrf
              <button type="submit" class="btn btn-primary btn-block" style="text-size: 14px">Logout</button>
            </form>

          </li>
        </ul>
      </div>
    </nav>
    <!--Home SEctiova-->
    @yield('content')
    <script src="{{asset('jsAdmin/app.js')}}"></script>
  </body>
</html>
