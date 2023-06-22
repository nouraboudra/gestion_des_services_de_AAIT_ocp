<?php

use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\SalleController;
use App\Http\Controllers\candidat\CandidatEcosystemeController;
use App\Http\Controllers\candidat\CandidatOcpController;
use App\Http\Controllers\planification\PlanificationController;
use App\Http\Controllers\planification\SessionFormationController;
use App\Http\Controllers\planification\ThemeController;
use App\Http\Controllers\planification\DomainController;


use App\Http\Controllers\presence\PresenceCandidatController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;

use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\Useradd;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Livewire\FormationPlanification;
use App\Http\Livewire\SessionPlanification;




use App\Http\Controllers\form_elements\Role;

use App\Http\Controllers\Admin\Showuser;
use App\Http\Controllers\admin\UsersController;

use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic;

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// candidat managemnet : 
//candidatEcosysteme management
Route::resource('candidat/candidatEcosysteme', CandidatEcosystemeController::class);
//candidatOcp management
Route::resource('candidat/candidatOcp', CandidatOcpController::class);

Route::get('/download-example', function () {
    $path = public_path('doc/example.xlsx');
    return response()->download($path);
})->name('download.example');

//presence 
Route::resource('presence/candidat', PresenceCandidatController::class);
// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/login', [LoginBasic::class, 'index']);
Route::post('/auth/login-basic', [LoginBasic::class, 'authenticate'])->name('post-auth-login-basic');
Route::get('/auth/register-basic/{userId}', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::post('/auth/register-basic', [RegisterBasic::class, 'store'])->name('post-auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements

Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');


//for admin :
//roles
Route::get('admin/roles', [RolesController::class, 'index'])->name('admin.roles.index');
Route::get('admin/roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::get('admin/roles/{id}', [RolesController::class, 'show'])->name('roles.show');
Route::post('admin/roles', [RolesController::class, 'store'])->name('roles.store');
Route::delete('admin/roles/{id}', [RolesController::class, 'destroy'])->name('roles.delete');
Route::get('admin/roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
//users
Route::get('admin/users', [UsersController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/create', [UsersController::class, 'create'])->name('users.create');
Route::get('admin/users/{id}', [UsersController::class, 'show'])->name('users.show');
Route::delete('admin/users/{id}', [UsersController::class, 'destroy'])->name('users.delete');
Route::post('admin/users', [UsersController::class, 'store'])->name('users.store');

//salles
Route::get('admin/salles', [SalleController::class, 'index'])->name('admin.salles.index');
Route::get('admin/salles/create', [SalleController::class, 'create'])->name('salles.create');
Route::post('admin/salles', [SalleController::class, 'store'])->name('salles.store');
Route::delete('admin/salles/{id}', [SalleController::class, 'destroy'])->name('admin.salles.destroy');
Route::get('admin/salles/{id}/edit', [SalleController::class, 'edit'])->name('admin.salles.edit');
Route::put('admin/salles/{id}', [SalleController::class, 'update'])->name('admin.salles.update');

//mail
Route::get('/send-test-email', [TestController::class, 'sendTestEmail']);
Route::post('candidatEcosysteme/upload', [CandidatEcosystemeController::class, 'upload'])->name('candidatEcosysteme.upload');
//Route::post('/import-users', [CandidatEcosystemeController::class, 'importUsers'])->name('import.users');
//Route::post('/upload', [CandidatEcosystemeController::class, 'store'])->name('candidatEcosysteme.upload');
//Route::post('/candidat-ecosysteme/upload', [CandidatEcosystemeController::class, 'upload'])->name('candidatEcosysteme.upload');
// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [Basic::class, 'index'])->name('tables-basic');
Route::get('/tables/ocp', [Basic::class, 'index'])->name('tables-ocp');


//planification
Route::get('planing/formations',FormationPlanification::class)->name('planing.formations.index');
Route::post('planing/formations',[PlanificationController::class, 'store'])->name('planing.formations.store');
Route::get('planing/{id}/sessions',SessionPlanification::class)->name('planing.sessions.index');
Route::post('planing/sessions',[SessionFormationController::class, 'store'])->name('planing.sessions.store');
Route::delete('planing/sessions/{id}',[SessionFormationController::class, 'destroy'])->name('planing.sessions.destroy');

Route::get('planing/themes',[ThemeController::class, 'index'])->name('planing.themes.index');
Route::post('planing/themes',[ThemeController::class, 'store'])->name('planing.themes.store');
Route::delete('planing/themes/{id}',[ThemeController::class, 'destroy'])->name('planing.themes.destroy');

Route::get('planing/domaines', [DomainController::class, 'index'])->name('planing.domaines.index');
Route::post('planing/domaines', [DomainController::class, 'store'])->name('planing.domaines.store');
Route::delete('planing/domaines/{id}', [DomainController::class, 'destroy'])->name('planing.domaines.destroy');

