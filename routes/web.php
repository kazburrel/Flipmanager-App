<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'edit'])->name('view.user.profile.edit');
    Route::put('/user/profile', [UserController::class, 'update'])->name('user.profile.edit');
    Route::put('/user/profile/password', [UserController::class, 'updatePassword'])->name('user.profile.updatePassword');


    Route::middleware(['role:' . RoleEnum::Admin->value])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    });

    Route::middleware(['auth'])->group(function () {
        Route::prefix('admin/categories')->middleware('permission:manage categories')->group(function () {
            Route::get('/', [CategoryController::class, 'listCategories'])->name('admin.categories');
            Route::post('/', [CategoryController::class, 'storeCategory'])->name('admin.categories.store');
            Route::put('/{category}/edit', [CategoryController::class, 'editCategory'])->name('admin.categories.edit');
            Route::delete('/{category}', [CategoryController::class, 'destroyCategory'])->name('admin.categories.destroy');
        });

        Route::prefix('admin/subcategories')->middleware('permission:manage categories')->group(function () {
            Route::post('/', [SubcategoryController::class, 'storeSubcategory'])->name('admin.subcategories.store');
            Route::put('/{subcategory}/edit', [SubcategoryController::class, 'updateSubcategory'])->name('admin.subcategories.update');
            Route::delete('/{subcategory}', [SubcategoryController::class, 'destroySubcategory'])->name('admin.subcategories.destroy');
        });

        Route::prefix('admin/users')->middleware('permission:manage users')->group(function () {
            Route::get('/', [UserController::class, 'listUsers'])->name('admin.users');
            Route::post('/', [UserController::class, 'storeUser'])->name('admin.users.store');
            Route::put('/{user}/update', [UserController::class, 'updateUser'])->name('admin.users.update');
            Route::delete('/{user}', [UserController::class, 'destroyUser'])->name('admin.users.destroy');
        });

        Route::prefix('/permissions')->middleware('permission:manage permissions')->group(function () {
            Route::get('/{user}', [PermissionController::class, 'managePermissions'])->name('admin.users.permissions');
            Route::put('/{user}', [PermissionController::class, 'updatePermission'])->name('admin.users.updatePermission');
        });
    });

    Route::middleware(['role:' . RoleEnum::Editor->value])->group(function () {
        Route::get('/editor/dashboard', [DashboardController::class, 'editorDashboard'])->name('editor.dashboard');
    });

    Route::middleware(['role:' . RoleEnum::User->value])->group(function () {
        Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
