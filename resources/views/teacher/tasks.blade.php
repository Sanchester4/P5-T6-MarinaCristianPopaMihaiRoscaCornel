@extends('teacher.teacher')
@section('content')
    <!--Task Section-->
    
      @foreach($tasks as $task)
      @csrf
      <div class="body2">
        <div class="task-container">
          <div class="left-side">
            <div class="task-body">
              <div class="task-header">
                <div class="task-title">
                  <h1 class="title-task">
                    {{ $task->title }}
                  </h1>
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

@endsection
