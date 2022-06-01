<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\ProjectUser;


class TeacherController extends Controller
{
    private $id_proj; 

    public function addProject(){

        $user = Auth::user(); 
        return view ('teacher.addProject');
    }

    public function getProjects(){

        $user = Auth::user(); 
        $id = Auth::user()->id;
        $users = User::where("id", $id)->get();
        $projects = Project::where('creator_id', $id)->get();
        return view ('teacher.projects', compact('projects', 'users'));
    }



    public function storeProject(Request $request){
        $id = Auth::user()->id;
        $teacher = User::where('id', $id)->get();
        $firstName = Auth::user()->firstName;
        $lastName = Auth::user()->lastName;
        $project = new Project;
        $project->name = $request->name;
        $project->creator_firstName = $firstName;
        $project->creator_lastName = $lastName;
        $project->studyYear = $request->studyYear;
        $project->status = 0;
        $project->description = $request->description;
        $project->dataTarget = $request->dataTarget;
        $project->creator_id = Auth::user()->id;
        $project->createdDate  =  '2015-07-01';
        $project->save();
        return redirect()->back()->with('message','Project has been created successfully.');
    }

    public function showCalendar(){

        $user = Auth::user();
        return view ('teacher.calendar');
    }

    public function getProfile(){

        $id = Auth::id();
        $users = User::where('id', $id) -> get();
        return view ('teacher.profile', compact('users'));
    }

    public function showHomework(){

        $user = Auth::user();
        return view ('teacher.homeworks');
    }

    public function getAddTask(){

       
        $user = Auth::user();  
        $id = Auth::user()->id;
        $users = User::where("id", $id)->get();
        $projects = Project::where('creator_id', $id)->get();


        return view ('teacher.addTask', compact('projects'));
    }

    public function createTask(Request $request){
        
        $user = Auth::user();
        //Find the project
        $project = Project::find($request->project_id_task)->get();  
        //Create the task
        $task = new Task;
        $task->project_id_task = $request->project_id_task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->save();
        return redirect()->back()->with('message','Task has been created successfully.');
    }

    public function viewTask($id){

        $user = Auth::user();  
        $tasks = Task::where('project_id_task', $id)->get();
        if($tasks == null)
        {
            return redirect()->back()->with('message','There is no tasks in this project');
        }
        else{
        return view('teacher.tasks', compact('tasks'));
        }
    }

    public function viewAsssignStudents(Request $request){

        $user = Auth::user();  
        DB::update('UPDATE selectedproj SET project = ? WHERE id = 1', [$request->proj_id]);
        return redirect()-> route('assignStudent_');
        //return redirect()->route('assignStudent', compact('projects','students'));
    }

    public function viewAsssignStudents_(){

        $user = Auth::user();  
        // DB::update('UPDATE selectedproj SET project = ? WHERE id = 1', [$request->proj_id]);
        $projId = DB::table('selectedproj')->where('id', '1')->first();
        $id = Auth::user()->id;
        $projects = Project::where('creator_id', $id)->get();
        $students = User::role('user')->paginate(3);
        return view('teacher.assignStudent', compact('students', 'projId'));
    }



    public function funcAssignStudent(Request $request){
    
        $user = Auth::user();
        $project_id = DB::table('selectedproj')->where('id', '1')->first();
        // $user =  ProjectUser::where('project_id','!=',$project_id);
        DB::insert('insert into project_user (user_id, project_id) values (?, ?)', [$request->id, $project_id->project]);
        return redirect()->back()->with('message','Student has been added successfully.');
        
    }

    public function sortAlphabetical(){
        $user = Auth::user();
        $id = Auth::user()->id;
        $projects = Project::where('creator_id', $id)->get();
        $students = User::role('user')->orderBy('lastName')->paginate(3);
        return view('teacher.assignStudent', compact('projects','students'));
    }

    public function sortbyStudyYear(){
        $user = Auth::user();
        $id = Auth::user()->id;
        $projects = Project::where('creator_id', $id)->get();
        $students = User::role('user')->orderBy('studyYear')->paginate(3);
        return view('teacher.assignStudent', compact('projects','students'));
    }

    public function setIdProj($id) : void {
       $this->id_proj = $id;
    }

    public function getIdProj(): int {
        return $this->id_proj;
    }

    public function selectProjForAssign()
    {
        $id = Auth::user()->id;
        $projects = Project::where('creator_id', $id)->get();
        return view('teacher.getProjForAssign', compact('projects'));
    }

}
