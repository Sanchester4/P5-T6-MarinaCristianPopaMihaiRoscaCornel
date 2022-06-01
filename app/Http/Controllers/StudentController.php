<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class StudentController extends Controller
{

    public function getProfile(){

        $id = Auth::id();
        $users = User::where('id', $id) -> get();
        return view ('student.profile', compact('users'));

    }

    public function showProjects(){

        $id = Auth::id();
        $users = User::find($id);
        return view ('student.projects', compact('users'));

    }

    public function showCalendar(){

        $user = Auth::user();
        return view ('student.calendar');
    }

    public function getAssignedProjects(){

        
        $users = User::where('id', 1)->get();
        

        return view ('student.projects', compact('$users'));
    }

    public function viewTask($id){

        $user = Auth::user();  
        $tasks = Task::where('project_id_task', $id)->get();
        if($tasks == null)
        {
            return redirect()->back()->with('message','There is no tasks in this project');
        }
        else{
        return view('student.task', compact('tasks'));
        }
    }
}
