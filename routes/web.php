<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');

//forgot password
//activate email

//Teacher Routes
Route::group(['middleware' => ['role:teacher']], function () {
    Route::get('/teacher/profile', [TeacherController::class, 'getProfile'])->name('profileTeacher');
    Route::get('/teacher/homeworks', [TeacherController::class, 'showHomework'])->name('homeworksView');
    Route::get('/teacher/addProject', [TeacherController::class, 'addProject'])->name('addProject');
    Route::get('/teacher/calendar', [TeacherController::class, 'showCalendar'])->name('calendarTeacher');
    //Route for get view addTask
    Route::get('/teacher/addTask', [TeacherController::class, 'getAddTask'])->name('addTask');
    //Create tasks for project
    Route::post('/createTask', [TeacherController::class, 'createTask']);
    //Route for creating Projects
    Route::post('/createProject', [TeacherController::class, 'storeProject']);
    //Filter alphabetical
    Route::get('/teacher/assignStudent/filterStudentLastName', [TeacherController::class, 'sortAlphabetical'])->name('sortAlphabet');
    //Sort by Study Year
    Route::get('/teacher/assignStudent/filterStudentByStudyYear', [TeacherController::class, 'sortbyStudyYear'])->name('sortStudyYear');
    //Route for assign student
    Route::post('/teacher/students/assign-student/{id}/', [TeacherController::class, 'funcAssignStudent']);
     //Route for retrieving task from view teacher/projects
    Route::get('/teacher/project/{id}/task', [TeacherController::class, 'viewTask'])->name('viewTask'); 
    //Retrieve projects
    Route::get('/teacher/project', [TeacherController::class, 'getProjects'])->name('getProjects');
    //Route for get the view assignStudent
    Route::get('teacher/project/assign-student', [TeacherController::class, 'viewAsssignStudents_'])->name('assignStudent_');

    Route::post('teacher/project/assign', [TeacherController::class, 'viewAsssignStudents'])->name('assignStudent');
    //Select project for assign student
    Route::get('/teacher/projects', [TeacherController::class, 'selectProjForAssign'])->name('getProjforAssign');
    //Logout teacher
    Route::post('logoutTeacher', [AuthController::class, 'logout'])->name('logoutTeacher');
});

//Student Routes
Route::group(['middleware' => ['role:user']], function () {
    Route::get('/student/profile', [StudentController::class, 'getProfile'])->name('profileStudent');
    Route::get('/student/projects', [StudentController::class, 'showProjects'])->name('projectStudent');
    Route::get('/student/calendar', [StudentController::class, 'showCalendar'])->name('calendarStudent');
    Route::get('/student/project/{id}/task', [StudentController::class, 'viewTask'])->name('viewTaskStudent'); 
    Route::post('logoutStudent', [AuthController::class, 'logout'])->name('logoutStudent');
});

//Admin Routes
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin.admin', function () {
        return view('admin.admin');
    });
    Route::get('/admin/profile', [AdminController::class, 'getProfile'])->name('profile');
    Route::get('/admin/addTeacher', [AdminController::class, 'addTeacher'])->name('addTeacher');
    Route::get('/admin/students', [AdminController::class, 'getStudents'])->name('getStudents');
    Route::get('/admin/teachers', [AdminController::class, 'getTeachers'])->name('getTeachers');
    Route::post('/createTeacher', [AdminController::class, 'storeTeacher']);
    Route::post('/createStudent', [AdminController::class, 'storeStudent']);
    Route::get('/admin/addStudent', [AdminController::class, 'addStudent'])->name('addStudent');
    Route::delete('admin/teachers/delete/{id}', [AdminController::class, 'deleteTeacher']);
    Route::delete('admin/students/delete/{id}', [AdminController::class, 'deleteStudent']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
