<?php



use App\Livewire\Auth\Login;
use App\Http\Controllers\Dashboard;
use App\Livewire\Auth\RegisterForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\CheckCourseAccess;
use App\Http\Controllers\CourseSectionsController;
use App\Http\Controllers\SeasonsEpisodesController;
use App\Http\Controllers\SectionMaterialController;

Route::view('/', 'welcome');
Route::middleware(['guest'])->get('/register', RegisterForm::class)->name('register');
Route::middleware(['guest'])->get('/login', Login::class)->name('login');
Route::middleware(['auth'])->group(function () {
  Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');
  Route::get('profile', [UserController::class, 'showProfile'])->name('profile');
  Route::get('profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
  Route::get('profile/{profile}/edit', [UserController::class, 'updateProfile'])->name('profile.update');

  Route::get('journals', [\App\Http\Controllers\JournalController::class, 'index'])->name('journals');
  Route::get('journals/create', [\App\Http\Controllers\JournalController::class, 'create'])->name('journal.create');
  Route::get('journals/{journal}/view', [\App\Http\Controllers\JournalController::class, 'show'])->name('journal.show');
  Route::delete('journals/{journal}', [\App\Http\Controllers\JournalController::class, 'destroy'])->name('journal.destroy');


  Route::get('my-courses', [CourseController::class, 'seeCourses'])->name('my-courses');
  Route::get('my-courses/{mycourses}/show', [CourseController::class, 'seeMyCourses'])->middleware(CheckCourseAccess::class)->name('mycourses.show');
});

Route::middleware(['auth', 'superadmin'])->group(function () {

  Route::get('/view-pdf/{filename}', [PDFController::class, 'view'])->name('pdf.view');
  Route::get('/download-pdf/{filename}', [PDFController::class, 'download'])->name('pdf.download');
  Route::get('/secure-pdf/{filename}', [PdfController::class, 'view'])->name('pdf.secure-view');


  Route::get('cohorts', [\App\Http\Controllers\CohortController::class, 'index'])->name('cohorts');
  Route::get('cohorts/create', [\App\Http\Controllers\CohortController::class, 'create'])->name('cohort.create');
  Route::get('cohorts/{cohort}/edit', [\App\Http\Controllers\CohortController::class, 'edit'])->name('cohort.edit');
  Route::delete('cohorts/{cohort}', [\App\Http\Controllers\CohortController::class, 'destroy'])->name('cohort.destroy');

  Route::get('cohort/assign/{cohort}', [\App\Http\Controllers\CohortController::class, 'assignUser'])->name('cohort.assignUser');
  Route::get('courses/create', [CourseController::class, 'create'])->name('course.create');
  Route::get('/courses/{season}', [CourseController::class, 'index'])->name('courses');

  Route::get('all-courses', [CourseController::class, 'allCourses'])->name('all-courses');
  Route::get('courses/{course}/show', [CourseController::class, 'show'])->name('course.view');
  Route::get('courses/{course}/edit', [CourseController::class, 'edit'])->name('course.edit');
  Route::get('courses/assign/{course}', [CourseController::class, 'assignCohort'])->name('course.assignCohort');


  Route::get('/user-roles/{id?}', [UserController::class, 'editRole'])->name('user-roles');
  Route::get('/users', [UserController::class, 'index'])->name('users');
  Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



  Route::get('sections/create/{course}', [CourseSectionsController::class, 'createSection'])->name('section.create');
  Route::get('sections/{courseSection}/edit', [CourseSectionsController::class, 'edit'])->name('section.edit');
  Route::delete('sections/{courseSection}', [CourseSectionsController::class, 'destroy'])->name('section.delete');

  Route::delete('sections/{courseSection}/materials/{material}', [SectionMaterialController::class, 'destroyMaterial'])->name('section.material.destroy');
  Route::get('viewVideo/{episode}/{section}', [CourseController::class, 'viewVideo'])->name('view.video');

  Route::get('report/create', [ReportController::class, 'create'])->name('report.create');
  Route::get('report/tppreport', [ReportController::class, 'tpp_dashboard'])->name('report.tpp');
  Route::get('report/super5', [ReportController::class, 'super5_dashboard'])->name('report.super5');
  Route::get('report/sba', [ReportController::class, 'super5_dashboard'])->name('report.sba');
  Route::get('report/sol', [ReportController::class, 'super5_dashboard'])->name('report.sol');
  Route::get('report/hdme', [ReportController::class, 'super5_dashboard'])->name('report.hdme');
  Route::get('report/humanitarian', [ReportController::class, 'super5_dashboard'])->name('report.humanitarian');
});

require __DIR__ . '/auth.php';
