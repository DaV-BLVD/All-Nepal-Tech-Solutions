<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/contact', [ContactController::class, 'index'])->name('contactus');

Route::post('/consults', [ServiceController::class, 'store'])->name('consults.store');



use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CompanySectionController;
use App\Http\Controllers\Admin\CompanyFeatureController;
use App\Http\Controllers\Admin\ExcellenceController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ContactSettingController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\CompanyStatementController;
use App\Http\Controllers\Admin\AboutServiceController;
use App\Http\Controllers\Admin\UspController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\ConsultController;
use App\Http\Controllers\Admin\ContactCardController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\MapLocationController;

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard (Admin + Super Admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin_role'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');
    });


    /*
    |--------------------------------------------------------------------------
    | Profile (Admin + Super Admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin_role'])->group(function () {
        Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    });


    /*
    |--------------------------------------------------------------------------
    | Super Admin Only — Manage Admins/Super Admins
    |--------------------------------------------------------------------------
    */
    Route::middleware(['super_admin'])->group(function () {
        Route::resource('/admin/dashboard/users', AdminUsersController::class);
        Route::resource('/admin/dashboard/services', ServicesController::class);
        Route::resource('/admin/dashboard/company/section', CompanySectionController::class)->only(['index', 'edit', 'update']);
        Route::resource('/admin/dashboard/company/features', CompanyFeatureController::class);
        Route::resource('/admin/dashboard/excellence', ExcellenceController::class);
        Route::resource('/admin/dashboard/statistics', StatisticController::class);
        Route::resource('/admin/dashboard/team_members', TeamMemberController::class);
        Route::resource('/admin/dashboard/contact_settings', ContactSettingController::class);
        Route::resource('/admin/dashboard/milestones', MilestoneController::class);
        Route::resource('/admin/dashboard/core_values', CoreValueController::class);
        Route::resource('/admin/dashboard/company_statement', CompanyStatementController::class);
        Route::resource('/admin/dashboard/about_services', AboutServiceController::class);
        Route::resource('/admin/dashboard/why_choose_us', UspController::class)->parameters([
            'why_choose_us' => 'usp'
        ]);
        Route::resource('/admin/dashboard/projects', ProjectsController::class);
        Route::resource('/admin/dashboard/comprehensive_services', ServiceAdminController::class)->parameters([
            'comprehensive_services' => 'service'
        ]);

        // Why Choose Us CRUD
        // Note: Use 'parameters' if you want to keep the variable name consistent in the controller
        Route::resource('/admin/dashboard/why_choose_us_services', WhyChooseUsController::class)->parameters([
            'why_choose_us' => 'why_choose_us_services'
        ]);

        Route::get('/admin/dashboard/consults', [ConsultController::class, 'index'])->name('admin.consults.index');
        Route::post('/admin/dashboard/consults/{consult}/resolve', [ConsultController::class, 'resolve'])->name('admin.consults.resolve');
        Route::delete('/admin/dashboard/consults/{consult}', [ConsultController::class, 'destroy'])->name('admin.consults.destroy');
        Route::post('/admin/dashboard/consults/{consult}/undo', [ConsultController::class, 'undo'])->name('admin.consults.undo');
        Route::get('/admin/dashboard/consults/{consult}', [ConsultController::class, 'show'])->name('admin.consults.show');

        Route::resource('/admin/dashboard/contact_cards', ContactCardController::class)->except(['show']);

        Route::resource('/admin/dashboard/social_links', SocialLinkController::class)->except(['show']);

        Route::resource('/admin/dashboard/map_locations', MapLocationController::class);

    });
});


require __DIR__ . '/auth.php';
