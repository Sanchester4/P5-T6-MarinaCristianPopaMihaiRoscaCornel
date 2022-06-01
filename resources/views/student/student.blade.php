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
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"
  />
    <link rel="stylesheet" href="{{ asset('cssStudent/about.css') }}" />
    <link rel="stylesheet" href="{{ asset('cssStudent/profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('cssStudent/projects.css') }}" />
    <link rel="stylesheet" href="{{ asset('cssStudent/task.css') }}" />
    <link rel="stylesheet" href="{{ asset('cssStudent/calendar.css') }}" />
    <title>S.P.M.</title>
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
            <a href="{{ route('projectStudent') }}" class="navbar__links" id="home-page"
              ><i class="fa fa-folder-open fa-2x"></i> Projects</a
            >
          </li>
          <li class="navbar_item">
            <a href="{{ route('calendarStudent') }}" class="navbar__links" id="about-page"
              ><i class="fa fa-calendar"></i> Calendar</a
            >
          </li>
          <li class="navbar_item">
            <a href="{{ route('profileStudent') }}" class="navbar__links" id="contac-page"
              ><i class="fa fa-user"></i> Profile</a
            >
          </li>

          <form action="{{ route('logoutStudent') }}" method="post" style="display:contents">
            @csrf
            <button type="submit" class="btn btn-primary btn-block" style="text-size: 14px">Logout</button>
          </form>
        </ul>
      </div>
    </nav>
@yield('content')
  </body>
</html>
