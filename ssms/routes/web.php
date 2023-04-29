<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PageViewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Front\EnrollController;

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

Route::get('/', [PageViewController::class, 'home'])->name('home');
Route::get('/subject-details/{id}', [PageViewController::class, 'subjectDetails'])->name('subject-details');
Route::get('/enroll/{id}', [PageViewController::class, 'enroll'])->name('enroll');
Route::get('/user-login', [PageViewController::class, 'userLogin'])->name('user-login');
Route::post('/user-post-login', [PageViewController::class, 'userPostLogin'])->name('user-post-login');
Route::get('/user-register', [PageViewController::class, 'userRegister'])->name('user-register');
Route::post('/user-post-register', [PageViewController::class, 'userPostRegister'])->name('user-post-register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('admin.home.home');

})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
//    admin routes
    Route::middleware('is_admin')->get('/create-role', [RoleController::class, 'create'])->name('create-role');
    Route::middleware('is_admin')->post('/new-role', [RoleController::class, 'newRole'])->name('new-role');
    Route::middleware('is_admin')->get('/manage-enroll', [EnrollController::class, 'manageEnroll'])->name('manage-enroll');
    Route::middleware('is_admin')->get('/edit-enroll-status/{id}', [EnrollController::class, 'editEnrollStatus'])->name('edit-enroll-status');
    Route::middleware('is_admin')->get('/delete-enroll/{id}', [EnrollController::class, 'deleteEnroll'])->name('delete-enroll');
    Route::middleware('is_admin')->post('/update-enroll/{id}', [EnrollController::class, 'updateEnroll'])->name('update-enroll');

//    user module
    Route::middleware('is_admin')->group(function (){
        Route::get('/create-user', [UserController::class, 'createUser'])->name('create-user');
        Route::post('/new-user', [UserController::class, 'newUser'])->name('new-user');
        Route::get('/manage-user', [UserController::class, 'manageUser'])->name('manage-user');
        Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
        Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('update-user');
        Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete-user');
    });


//    teachers routes
    Route::middleware('is_teacher')->get('/create-profile', [TeacherController::class, 'createProfile'])->name('create-profile');
    Route::middleware('is_teacher')->post('/new-profile/{id?}', [TeacherController::class, 'newProfile'])->name('new-profile');
    Route::middleware('is_admin')->get('/manage-profile', [TeacherController::class, 'manageProfile'])->name('manage-profile');
    Route::middleware('is_admin')->get('/edit-profile/{id}', [TeacherController::class, 'editProfile'])->name('edit-profile');
    Route::middleware('is_admin')->post('/update-profile/{id}', [TeacherController::class, 'updateProfile'])->name('update-profile');
    Route::middleware('is_admin')->get('/delete-profile/{id}', [TeacherController::class, 'deleteProfile'])->name('delete-profile');
    Route::middleware('is_admin')->get('/change-teacher-profile-status/{id}', [TeacherController::class, 'profileStatus'])->name('change-teacher-profile-status');

    //    subject routes
    Route::middleware('is_teacher')->get('/create-subject', [SubjectController::class, 'createSubject'])->name('create-subject');
    Route::middleware('is_teacher')->post('/new-subject', [SubjectController::class, 'newSubject'])->name('new-subject');
    Route::middleware(['is_teacher', 'is_admin'])->get('/manage-subject', [SubjectController::class, 'manageSubject'])->name('manage-subject');
    Route::middleware(['is_teacher', 'is_admin'])->get('/edit-subject/{id}', [SubjectController::class, 'editSubject'])->name('edit-subject');
    Route::middleware(['is_teacher', 'is_admin'])->post('/update-subject/{id}', [SubjectController::class, 'updateSubject'])->name('update-subject');
    Route::middleware('is_admin')->get('/delete-subject/{id}', [SubjectController::class, 'deleteSubject'])->name('delete-subject');
    Route::middleware('is_admin')->get('/change-subject-status/{id}', [SubjectController::class, 'subjectStatus'])->name('change-subject-status');


//    student module
    Route::middleware('is_student')->get('/create-student-info', [StudentController::class, 'createStudentInfo'])->name('create-student-info');
    Route::middleware('is_student')->post('/new-student-info', [StudentController::class, 'newStudentInfo'])->name('new-student-info');
    Route::middleware('is_admin')->get('/manage-student-info', [StudentController::class, 'manageStudentInfo'])->name('manage-student-info');
    Route::middleware('is_admin')->get('/edit-student-info/{id}', [StudentController::class, 'editStudentInfo'])->name('edit-student-info');
    Route::middleware('is_admin')->post('/update-student-info/{id}', [StudentController::class, 'updateStudentInfo'])->name('update-student-info');
    Route::middleware('is_admin')->get('/delete-student-info/{id}', [StudentController::class, 'deleteStudentInfo'])->name('delete-student-info');
    Route::middleware('is_admin')->get('/change-student-status/{id}', [StudentController::class, 'profileStatus'])->name('change-student-profile-status');
});
