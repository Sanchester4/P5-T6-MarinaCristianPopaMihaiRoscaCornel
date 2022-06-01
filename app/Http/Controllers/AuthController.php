<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->input('email'))->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return redirect(route('login'))->withErrors([
                    'login' => 'Email or password is incorrect!'
                ])->withInput();
            }
            $request -> session() -> put('loginId', $user -> id);
            Auth::login($user);
            if($user->hasRole('user')){
                return redirect()->route('projectStudent');
            }
            else if($user->hasRole('teacher')){
                return redirect()->route('getProjects');
            }
            else{
                return redirect()->route('getStudents');}
        }
        
        
        return view('login');
    }

    public function register(Request $request)
    {
        //TODO
        if ($request->isMethod('post')) {
            //validate request
            //create user
            //login user or send activate email
            //redirected to dashboard/login
        }

        //return view register
        return 'REGISTER';
    }
     

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}