<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\AdminController;

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



Auth::routes();

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::middleware(['auth'])->group(function() { 

        Route::get('/dash', [HomeController::class, 'index'])->name('dash');
        Route::get('/search', [HomeController::class, 'search'])->name('search');
        Route::post('/markasread', [HomeController::class, 'markasread'])->name('markasread');
        
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/change-password', [ProfileController::class, 'update_password']);
        
        
        Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
        Route::patch('/project/{id}/edit', [ProjectController::class, 'update']);
        Route::delete('/project/{id}/delete', [ProjectController::class, 'destroy'])->name('project.delete');

        Route::get('/project-create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/project-create', [ProjectController::class, 'store']);
        
        Route::get('/repo', [ProjectController::class, 'repo'])->name('repo');
        Route::post('/repo/{filename}', [ProjectController::class, 'request'])->name('request');


        Route::get('/event', [EventController::class, 'index'])->name('event.index');
        Route::get('/events', [EventController::class, 'events']);
        Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/event/create', [EventController::class, 'store']);
        
        Route::get('/student', [StudentController::class, 'show'])->name('student.show');
        Route::get('/student-edit', [StudentController::class, 'edit'])->name('student.edit');
        Route::PATCH('/student-edit', [StudentController::class, 'update']);
        
        Route::get('/teacher', [TeacherController::class, 'show'])->name('teacher.show');
        Route::get('/teacher-edit', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::PATCH('/teacher-edit', [TeacherController::class, 'update']);
        
       
        
        
    });
    
    
    Route::middleware(['admin', 'auth'])->group(function() { 
        
        Route::get('admin', function(){
            return redirect('/admin/dash');
        });
        Route::get('admin/dash', [AdminController::class, 'index'])->name('admin.dash');
        Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::get('admin/search', [HomeController::class, 'search'])->name('admin.search');
        
        Route::post('admin/change-password', [ProfileController::class, 'update_password']);

        Route::get('admin/profile/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('admin/profile/edit', [AdminController::class, 'update']);

    Route::get('admin/projects', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('admin.project');
    Route::post('admin/project/create', [ProjectController::class, 'store']);
    Route::get('admin/project/create', [ProjectController::class, 'create'])->name('admin.project.new');

    Route::get('admin/project/{id}/edit', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('admin.project.edit');
    Route::patch('admin/project/{id}/edit', [App\Http\Controllers\Admin\ProjectController::class, 'update']);
    Route::delete('admin/project/{id}/delete', [App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('admin.project.delete');
    
    
    Route::get('admin/students', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('admin.students');
    Route::get('admin/student/create', [App\Http\Controllers\Admin\StudentController::class, 'create'])->name('admin.student.create');
    Route::post('admin/student/create', [App\Http\Controllers\Admin\StudentController::class, 'store'])->name('admin.student.create');
    
    Route::get('admin/student/{id}/show', [App\Http\Controllers\Admin\StudentController::class, 'show'])->name('admin.student.show');
    Route::get('admin/student/{id}/edit', [App\Http\Controllers\Admin\StudentController::class, 'edit'])->name('admin.student.edit');
    Route::PATCH('admin/student/{id}/edit', [App\Http\Controllers\Admin\StudentController::class, 'update']);
    
    Route::delete('admin/student/{id}/delete', [App\Http\Controllers\Admin\StudentController::class, 'destroy'])->name('admin.student.delete');
    
    
    Route::get('admin/teachers', [App\Http\Controllers\Admin\TeacherController::class, 'index'])->name('admin.teachers');
    Route::get('admin/teacher/create', [App\Http\Controllers\Admin\TeacherController::class, 'create'])->name('admin.teacher.create');
    Route::post('admin/teacher/create', [App\Http\Controllers\Admin\TeacherController::class, 'store'])->name('admin.teacher.create');
    
    
    Route::get('admin/teacher/{id}/show', [App\Http\Controllers\Admin\TeacherController::class, 'show'])->name('admin.teacher.show');
    Route::get('admin/teacher/{id}/edit', [App\Http\Controllers\Admin\TeacherController::class, 'edit'])->name('admin.teacher.edit');
    Route::PATCH('admin/teacher/{id}/edit', [App\Http\Controllers\Admin\TeacherController::class, 'update']);
    
    Route::delete('admin/teacher/{id}/delete', [App\Http\Controllers\Admin\TeacherController::class, 'destroy'])->name('admin.teacher.delete');


});