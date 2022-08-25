<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Teacher\TeacherAuthController;
use App\Http\Controllers\Teacher\TeacherFunctionsController;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminControllsEnrollController;
use App\Http\Controllers\AdminControllsStudentController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\Student\StudentAuthController;
use App\Http\Controllers\Student\StudentController;

Route::get('/', [FrontViewController::class, 'home'])->name('home');

Route::prefix('pages')->group(function () {
    Route::get('/contact', [FrontViewController::class, 'contact'])->name('contact');
    Route::get('/about-us', [FrontViewController::class, 'aboutUs'])->name('about.us');
    Route::get('/all-courses', [FrontViewController::class, 'allCourses'])->name('all.courses');
    Route::get('/login-registration', [FrontViewController::class, 'auth'])
        ->name('login.registration')
        ->middleware('is_student_login');
    Route::get('/course-details/{id}', [FrontViewController::class, 'courseDetail'])->name('front.course.view');

    Route::get('/enroll/{id}', [EnrollController::class, 'enroll'])->name('enroll');
    Route::post('/enroll-create/{course_id}', [EnrollController::class, 'create'])->name('enroll.store');


// *********STUDENT MIDDLEWARE GROUP
    Route::middleware(['is_student'])->group(function () {
        Route::get('/student-dashboard', [StudentAuthController::class, 'dashboard'])->name('student.dashboard');
        Route::post('/student-logout', [StudentAuthController::class, 'logout'])->name('student.logout');

        Route::get('/enrolled-courses', [StudentController::class, 'enrollHistory'])->name('enrolled.courses');
        Route::get('/my-profile', [StudentController::class, 'editProfile'])->name('student.profile');
        Route::post('/my-profile/update', [StudentController::class, 'updateProfile'])->name('student.profile.update');

    });

    Route::post('/student-login', [StudentAuthController::class, 'login'])->name('student.login');
    Route::post('/student/new', [StudentController::class, 'storeProfile'])->name('student.store');

});


// ********ADMIN MIDDLEWARE GROUP
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/user-profile-edit', [DashboardController::class, 'profile'])->name('user.profile.edit');

    Route::get('/admin-profile-index', [AdminController::class, 'index'])->name('admin.profile.index');
    Route::get('/admin-profile', [AdminController::class, 'create'])->name('admin.profile');
    Route::post('/admin-profile-store', [AdminController::class, 'store'])->name('admin.profile.store');
    Route::get('/admin-profile-edit/{id}', [AdminController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin-profile-update/{id}', [AdminController::class, 'update'])->name('admin.profile.update');
    Route::post('/admin-profile-delete/{id}', [AdminController::class, 'delete'])->name('admin.profile.delete');

    Route::resource('/teachers', TeacherController::class);
    Route::post('/teachers/status-change/{id}', [TeacherController::class, 'statusChange'])->name('teacher.change.status');

    Route::get('/admin-courses', [AdminCourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/admin-courses-details/{id}', [AdminCourseController::class, 'details'])->name('admin.courses.details');
    Route::get('/admin-courses-status-change/{id}', [AdminCourseController::class, 'statusChange'])->name('admin.courses.status-change');
    Route::post('/admin-courses-rejection/{id}', [AdminCourseController::class, 'rejection'])->name('admin.courses.rejection');
    Route::post('/admin-courses-delete/{id}', [AdminCourseController::class, 'destroy'])->name('admin.courses.destroy');

    Route::get('/students', [AdminControllsStudentController::class, 'index'])->name('students.index');
    Route::post('/students/status-change/{id}', [AdminControllsStudentController::class, 'statusChange'])->name('student.change.status');
    Route::post('/students/delete/{id}', [AdminControllsStudentController::class, 'destroy'])->name('students.destroy');

    Route::get('/manage-enrolls', [AdminControllsEnrollController::class, 'manage'])->name('manage.enrolls');
    Route::get('/change-enroll-status/{id}', [AdminControllsEnrollController::class, 'status'])->name('enroll.change.status');

});


// ***********TEACHER MIDDLEWARE GROUP
Route::middleware(['is_teacher'])->group(function () {
    Route::post('/teacher/logout', [TeacherAuthController::class, 'logout'])->name('logout.teacher');
    Route::get('/teacher/dashboard', [TeacherFunctionsController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/teacher/profile/edit', [TeacherFunctionsController::class, 'edit'])->name('teacher.profile.edit');
    Route::post('/teacher/profile/update/{id}', [TeacherFunctionsController::class, 'update'])->name('teachers.profile.update');
      
    Route::resource('/courses', CourseController::class);

    Route::get('/teacher/enrolls/manage', [TeacherFunctionsController::class, 'manage'])->name('teacher.manage.enroll');
});

Route::get('/teacher/login', [TeacherAuthController::class, 'login'])
    ->name('loginView.teacher')
    ->middleware('is_teacher_login');
Route::post('/teacher/auth', [TeacherAuthController::class, 'auth'])->name('login.teacher');

