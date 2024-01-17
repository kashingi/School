<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthContoller;

use App\Models\User;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\ClassController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ClassUnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ClassTimetableController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| 
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthContoller::class, 'login']);

Route::post('login', [AuthContoller::class, 'AuthLogin']);

Route::get('/logout', [AuthContoller::class, 'logout']);

Route::get('register', [AuthContoller::class, 'register']);

Route::get('forgot-password', [AuthContoller::class, 'forgot_password']);

Route::post('forgot-password', [AuthContoller::class, 'PostForgotPassword']);

Route::post('register-user', [AuthContoller::class, 'register_user']);

Route::get('reset/{token}', [AuthContoller::class, 'reset']);

Route::post('reset/{token}', [AuthContoller::class, 'PostReset']);

// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// })


Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);
    
    //Students
    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);

     //Teachers
     Route::get('admin/teacher/list', [TeacherController::class, 'list']);
     Route::get('admin/teacher/add', [TeacherController::class, 'add']);
     Route::post('admin/teacher/add', [TeacherController::class, 'insert']);
     Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
     Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
     Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);

    // Class URL
    Route::get('admin/class/list', [ClassController::class, 'list']);
    Route::get('admin/class/add', [ClassController::class, 'add']);
    Route::post('admin/class/add', [ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);

    // Units URL
    Route::get('admin/unit/list', [UnitController::class, 'list']);
    Route::get('admin/unit/add', [UnitController::class, 'add']);
    Route::post('admin/unit/add', [UnitController::class, 'insert']);
    Route::get('admin/unit/edit/{id}', [UnitController::class, 'edit']);
    Route::post('admin/unit/edit/{id}', [UnitController::class, 'update']);
    Route::get('admin/unit/delete/{id}', [UnitController::class, 'delete']);

    //Assign Units
    Route::get('admin/assign_unit/list', [ClassUnitController::class, 'list']);
    Route::get('admin/assign_unit/add', [ClassUnitController::class, 'add']);
    Route::post('admin/assign_unit/add', [ClassUnitController::class, 'insert']);
    Route::get('admin/assign_unit/edit/{id}', [ClassUnitController::class, 'edit']);
    Route::post('admin/assign_unit/edit/{id}', [ClassUnitController::class, 'update']);
    Route::get('admin/assign_unit/delete/{id}', [ClassUnitController::class, 'delete']);

    // Admin Change Password Routes
    Route::get('/profile/change_password', [UserController::class, 'change_password']);
    Route::post('/profile/change_password', [UserController::class, 'update_change_password']);
    Route::get('admin/my_account', [UserController::class, 'MyAccount']);
    Route::post('admin/my_account', [UserController::class, 'UpdateMyAccountAdmin']);

    //Students
    Route::get('admin/parent/list', [ParentController::class, 'list']);
    Route::get('admin/parent/add', [ParentController::class, 'add']);
    Route::post('admin/parent/add', [ParentController::class, 'insert']);
    Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']);
    Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);
    Route::get('admin/parent/my-student/{id}', [ParentController::class, 'myStudent']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'assignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'assignStudentParentDelete']);

    Route::get('admin/timetable/list', [ClassTimetableController::class, 'list']);
    Route::post('admin/timetable/get_unit', [ClassTimetableController::class, 'get_unit']);

    Route::get('admin/ClassTeacher/list', [AssignClassTeacherController::class, 'list']);
    Route::get('admin/ClassTeacher/add', [AssignClassTeacherController::class, 'add']);
    Route::post('admin/ClassTeacher/add', [AssignClassTeacherController::class, 'insert']);
    Route::get('admin/ClassTeacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
    Route::post('admin/ClassTeacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
    Route::get('admin/ClassTeacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);


    
});

Route::group(['middleware' => 'teacher'], function(){
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']); 

    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
    Route::get('/teacher/my_account', [UserController::class, 'MyAccount']);
    Route::post('/teacher/my_account', [UserController::class, 'UpdateMyAccount']);

    Route::get('teacher/class_units', [AssignClassTeacherController::class, 'MyClassUnit']);
    Route::get('/teacher/my_student', [StudentController::class, 'MyStudent']);



    
});

Route::group(['middleware' => 'student'], function(){
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']); 
    Route::get('student/my_unit', [UnitController::class, 'MyUnit']);
    Route::get('student/my_account', [UserController::class, 'MyAccount']);
    Route::post('student/my_account', [UserController::class, 'UpdateMyAccountStudent']);

    // student make payment
    Route::get('student/payment', [StudentController::class, 'Payment']);
    Route::get('/checkout', [StudentController::class, 'PaymentNow']);
    Route::get('student/receipt', [StudentController::class, 'Receipt']);

    Route::get('profile/change_password', [UserController::class, 'change_password']);
    Route::post('profile/change_password', [UserController::class, 'update_change_password']);

    

    
});

Route::group(['middleware' => 'parent'], function(){
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
    
    Route::get('/parent/change_password', [UserController::class, 'change_password']);
    Route::post('/parent/change_password', [UserController::class, 'update_change_password']);
    Route::get('parent/my_account', [UserController::class, 'MyAccount']);
    Route::post('parent/my_account', [UserController::class, 'UpdateMyAccountParent']);
    Route::get('parent/my_student', [ParentController::class, 'myStudentParent']);
    Route::get('parent/my_student/unit/{student_id}', [UnitController::class, 'ParentStudentUnit']);

    
});
