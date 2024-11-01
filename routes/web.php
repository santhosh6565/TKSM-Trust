<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckPermissions;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MonthlyReportController;
use App\Http\Controllers\logsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\AnnouncementController;


Route::get('/', [PageController::class, 'index'])->name('landing');


// Other landing pages
Route::get('/donations', [PageController::class, 'donations'])->name('donations');
Route::get('/Event', [PageController::class, 'event'])->name('Event');
Route::get('/Gallery', [PageController::class, 'gallery'])->name('Gallery');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/check-password', [UserController::class, 'checkPassword']);

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

// Admin and manage_user-only routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(CheckPermissions::class . ':manage_roles')->group(function () {
        Route::get('/logs', [logsController::class, 'index'])->name('admin.logs');
    }); 

    Route::middleware(CheckPermissions::class . ':manage_user')->group(function () {
        Route::get('/users', [UserController::class, 'showUsers'])->name('admin.users');
        Route::post('/users/add', [UserController::class, 'addUser'])->name('admin.users.add');
        Route::delete('/users/{user}/delete', [UserController::class, 'deleteUser'])->name('admin.users.delete');
        Route::get('/users/{user}/edit', [UserController::class, 'editUser'])->name('admin.users.edit');
        Route::post('/users/{user}/update', [UserController::class, 'updateUser'])->name('admin.users.update');
        Route::post('restore-user/{id}', [UserController::class, 'restoreUser'])->name('developer.user.restore');
        Route::delete('force-delete-user/{id}', [UserController::class, 'forceDeleteUser'])->name('developer.user.force-delete');
    });    

    // Routes for managing roles (requires manage_roles permission)
    Route::middleware(CheckPermissions::class . ':manage_roles')->group(function () {
        Route::get('/roles', [RoleController::class, 'showRoles'])->name('admin.roles');
        Route::post('/roles/add', [RoleController::class, 'addRole'])->name('admin.roles.add');
        Route::post('/roles/{id}/update', [RoleController::class, 'editUserRole'])->name('admin.updateUserRole');
    });

    Route::middleware(CheckPermissions::class . ':catergories')->group(function () {
        Route::get('/expense_categories', [ExpenseCategoryController::class, 'index'])->name('admin.expense_categories');
        Route::post('/expense_categories/add', [ExpenseCategoryController::class, 'store'])->name('admin.expense_categories.create');
        Route::get('/expense_categories/{id}', [ExpenseCategoryController::class, 'show'])->name('admin.expense_categories.show');
        Route::delete('/expense_categories/{id}', [ExpenseCategoryController::class, 'destroy'])->name('admin.expense_categories.delete');
        Route::post('/expense_categories/{id}', [IncomeCategoryController::class, 'update'])->name('admin.expense_categories.update');
    });    

    Route::middleware(CheckPermissions::class . ':catergories')->group(function () {
        Route::get('/income-categories', [IncomeCategoryController::class, 'index'])->name('admin.income_categories');
        Route::post('/income-categories/add', [IncomeCategoryController::class, 'store'])->name('admin.income_categories.create');
        Route::get('/income-categories/{id}/incomes', [IncomeCategoryController::class, 'show'])->name('admin.income_categories.show');
        Route::delete('/income_categories/{id}', [IncomeCategoryController::class, 'destroy'])->name('admin.income_categories.delete');
        Route::post('/income_categories/{id}', [ExpenseCategoryController::class, 'update'])->name('admin.income_categories.update');
    });

    Route::middleware(CheckPermissions::class . ':enroll_amount')->group(function () {
        Route::get('/income', [IncomeController::class, 'index'])->name('admin.income');
        Route::get('/income/create', [IncomeController::class, 'create'])->name('admin.income.create');
        Route::post('/income/add', [IncomeController::class, 'store'])->name('admin.income.store');
        Route::post('/income/update/{id}', [IncomeController::class, 'update'])->name('admin.income.update');
        Route::get('/income/edit/{id}', [IncomeController::class, 'edit'])->name('admin.income.edit');
        Route::delete('/income/{id}', [IncomeController::class, 'destroy'])->name('admin.income.destroy');
    });

    Route::middleware(CheckPermissions::class . ':enroll_amount')->group(function () {
        Route::get('/expense', [ExpenseController::class, 'index'])->name('admin.expense');
        Route::get('/expense/create', [ExpenseController::class, 'create'])->name('admin.expense.create');
        Route::post('/expense/add', [ExpenseController::class, 'store'])->name('admin.expense.store');
        Route::post('/expense/update/{id}', [ExpenseController::class, 'update'])->name('admin.expense.update');
        Route::get('/expense/edit/{id}', [ExpenseController::class, 'edit'])->name('admin.expense.edit');
        Route::delete('/expense/{id}', [ExpenseController::class, 'destroy'])->name('admin.expense.destroy');
    });

    Route::middleware(CheckPermissions::class . ':monthly_report')->group(function () {
        Route::get('/monthly-report', [MonthlyReportController::class, 'index'])->name('admin.monthlyReport');
    });

    Route::middleware(CheckPermissions::class . ':events')->group(function () {
        Route::get('/Events', [EventController::class, 'index'])->name('admin.images.index'); // List images
        Route::get('/Events/create', [EventController::class, 'create'])->name('admin.images.create'); // Show create form
        Route::post('/Events', [EventController::class, 'store'])->name('admin.images.store'); // Store new image
        // Route::get('/images/{image}', [EventController::class, 'show'])->name('admin.images.show'); // Show single image
        Route::get('/Events/{image}/edit', [EventController::class, 'edit'])->name('admin.images.edit'); // Show edit form
        Route::put('/Events/{image}', [EventController::class, 'update'])->name('admin.images.update'); // Update image
        Route::delete('/Events/{image}', [EventController::class, 'destroy'])->name('admin.images.destroy'); // Delete image
    });

    Route::middleware(CheckPermissions::class . ':Anoucement')->group(function () {
        Route::get('/Announcement', [AnnouncementController::class, 'index'])->name('admin.announcement');
        Route::post('/Announcement/store', [AnnouncementController::class, 'store'])->name('admin.announcement.store');
    });

    Route::middleware(CheckPermissions::class . ':developer_control')->group(function () {
        Route::get('/Developer-controll', [DeveloperController::class, 'index'])->name('admin.developercontrol');
    });

});
