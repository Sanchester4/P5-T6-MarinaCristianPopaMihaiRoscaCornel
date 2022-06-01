@extends('teacher.teacher')
 @section('content')
    <!--Calendar Section-->
    <div class="calendar-background">
      <div id="calendar"></div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script src="{{asset('jsStudent/calendar.js')}}"></script>
  </body>
</html>
@endsection