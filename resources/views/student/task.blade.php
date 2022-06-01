@extends('student.student')
 @section('content')
      <!--Task Section-->
      <div class="body2">
        @foreach($tasks as $task)
        @csrf
          <div class="task-container">
            <div class="left-side">
              <div class="task-body">
                <div class="task-header">
                  <div class="task-title">
                    <h1 class="title-task">
                      {{ $task->title }}
                    </h1>
                  </div>
                  <div class="grade-deadline">
                    <div class="task-grade">
                      <div class="grade-text">Grade</div>
                    </div>
                    <div class="task-deadline">
                      <p>Deadline</p>
                      <p>{{ $task->deadline }}</p>
                    </div>
                  </div>
                </div>
                <div class="task-description">
                  <span>
                    {{ $task->description }}
                  </span>
                </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
  
    </div>
  @endsection
