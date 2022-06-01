<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getProfile(){

        $id = Auth::id();
        $users = User::where('id', $id) -> get();
        return view ('admin.profile', compact('users'));

    }

    public function showProjects(){

        $user = Auth::user();
        return view ('admin.projects');

    }

    public function addTeacher(Request $request){

        $user = Auth::user();
        return view ('admin.addTeacher');
    }

    public function getStudents(Request $request){

        $user = Auth::user();
        $students = User::role('user')->paginate(3);
        
        // dd($students);
        return view ('admin.students', compact('students'));
    }

    public function getTeachers(Request $request){

        $user = Auth::user();
        $teachers = User::role('teacher')->paginate(3);
        return view ('admin.teachers', compact('teachers'));
    }

    public function storeTeacher(Request $request){
        $user = Auth::user();
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->cnp = $request->cnp;
        $user->email = $request->email;
        $user->dateBirth = $request->dateBirth;
        $user->password = Hash::make($request->password);
        $user->assignRole('teacher');
        $user->save();
        return redirect()->back()->with('message','Teacher has been created successfully.');
    }

    public function storeStudent(Request $request){
        $user = Auth::user();
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->cnp = $request->cnp;
        $user->email = $request->email;
        $user->dateBirth = $request->dateBirth;
        $user->specialisation = $request->specialisation;
        $user->studyYear = $request->studyYear;
        $user->password = Hash::make($request->password);
        $user->assignRole('user');
        $user->save();
        return redirect()->back()->with('message','Student has been created successfully.');
    }

    public function addStudent(){

        $user = Auth::user();
        return view ('admin.addStudent');

    }

    public function deleteTeacher($teacher)
    {
        User::find($teacher)->delete();
        return redirect()->back()->with('message', 'Teacher deleted successfully');   
    }

    public function deleteStudent($student)
    {
        User::find($student)->delete();
        return redirect()->back()->with('message', 'Student deleted successfully');   
    }

    public function updateStudent(){
        DB::table('post')
            ->where('id', 3)
            ->update(['title' => "Updated Title"]);
    }

}

?>