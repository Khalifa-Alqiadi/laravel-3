<?php
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DatialsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CompaniesController;
use App\Http\Controllers\Admin\jobsDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\userDashboard\UserDashboardController;
use Illuminate\Support\Facades\Route;

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
    // session_start();
    return view('index');
});
Route::get('/showLogin', function () {
    return view('login');
});
Route::get('/admin', function () {
    return view('admin.layout.master');
});

Route::get('/home', [IndexController::class, 'indexShow']);
Route::get('/companies', [CompanyController::class, 'companyShow']);
Route::get('/details', [DatialsController::class, 'detialsShow']);
Route::post('/register', [LoginController::class, 'loginUser'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
// Abmin Dashboard
Route::get('/adminUsers', [UsersController::class, 'showUsers'])->name('adminUsers');
Route::post('/edit_admin_user', [UsersController::class, 'updateUser'])->name('edit_admin_user');
Route::post('/add_admin_user', [UsersController::class, 'register'])->name('add_admin_user');
Route::post('/delete_admin_user', [UsersController::class, 'deleteUser'])->name('delete_admin_user');
Route::post('/active_admin_user', [UsersController::class, 'activeUser'])->name('active_admin_user');
Route::get('/adminCompanies', [CompaniesController::class, 'showCompanies'])->name('adminCompanies');
Route::post('/add_admin_company', [CompaniesController::class, 'insertCompany'])->name('add_admin_company');
Route::post('/edit_admin_company', [CompaniesController::class, 'editCompanies'])->name('edit_admin_company');
Route::post('/delete_admin_company', [CompaniesController::class, 'deleteCompanies'])->name('delete_admin_company');
Route::post('/active_admin_company', [CompaniesController::class, 'activeCompanies'])->name('active_admin_company');
Route::get('/adminJobs', [jobsDashboardController::class, 'showJobs'])->name('adminJobs');
Route::post('/add_admin_job', [jobsDashboardController::class, 'insertJobsAdmin'])->name('add_admin_job');
Route::post('/edit_admin_job', [jobsDashboardController::class, 'editJobsAdmin'])->name('edit_admin_job');
Route::post('/delete_admin_job', [jobsDashboardController::class, 'deleteJobsAdmin'])->name('delete_admin_job');
Route::post('/active_admin_job', [jobsDashboardController::class, 'activeJobsAdmin'])->name('active_admin_job');
Route::get('/adminDetails', [jobsDashboardController::class, 'showDetailsAdmin'])->name('adminDetails');
Route::post('/add_admin_detail', [jobsDashboardController::class, 'insertDetailsAdmin'])->name('add_admin_detail');
Route::post('/edit_admin_detail', [jobsDashboardController::class, 'editDetailsAdmin'])->name('edit_admin_detail');
Route::post('/delete_admin_detail', [jobsDashboardController::class, 'deleteDetailsAdmin'])->name('delete_admin_detail');
Route::post('/active_admin_detail', [jobsDashboardController::class, 'activeDetailsAdmin'])->name('active_admin_detail');

// User Dashboard
Route::get('/userDashboard', [UserDashboardController::class, 'showUserDashboard'])->name('userDashboard');
Route::post('/add_skill_user', [UserDashboardController::class, 'insertSkillUserDashboard'])->name('add_skill_user');
Route::post('/edit_skill_user', [UserDashboardController::class, 'editSkillUserDashboard'])->name('edit_skill_user');
Route::post('/delete_skill_user', [UserDashboardController::class, 'deleteSkillUserDashboard'])->name('delete_skill_user');
Route::post('/add_experience_user', [UserDashboardController::class, 'insertExperienceUserDashboard'])->name('add_experience_user');
Route::post('/edit_experience_user', [UserDashboardController::class, 'editExperienceUserDashboard'])->name('edit_experience_user');
Route::post('/delete_experience_user', [UserDashboardController::class, 'deleteExperienceUserDashboard'])->name('delete_experience_user');
Route::post('/add_qualifcations_user', [UserDashboardController::class, 'insertQualifcationsUserDashboard'])->name('add_qualifcations_user');
Route::post('/edit_qualifcations_user', [UserDashboardController::class, 'editQualifcationsUserDashboard'])->name('edit_qualifcations_user');
Route::post('/delete_qualifcations_user', [UserDashboardController::class, 'deleteQualifcationsUserDashboard'])->name('delete_qualifcations_user');
Route::post('/add_Courses_user', [UserDashboardController::class, 'addCoursesUser'])->name('add_Courses_user');
Route::post('/edit_courses_user', [UserDashboardController::class, 'editCoursesUser'])->name('edit_courses_user');
Route::post('/delete_courses_user', [UserDashboardController::class, 'deleteCoursesUser'])->name('delete_courses_user');

