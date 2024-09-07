<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:' . RoleEnum::Admin->value])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

        Route::prefix('admin/categories')->group(function () {
            Route::get('/', [CategoryController::class, 'listCategories'])->name('admin.categories');
            Route::post('/', [CategoryController::class, 'storeCategory'])->name('admin.categories.store');
            Route::put('/{category}/edit', [CategoryController::class, 'editCategory'])->name('admin.categories.edit');
            Route::delete('/{category}', [CategoryController::class, 'destroyCategory'])->name('admin.categories.destroy');
        });

        Route::prefix('admin/subcategories')->group(function () {
            Route::post('/', [SubcategoryController::class, 'storeSubcategory'])->name('admin.subcategories.store');
            Route::put('/{subcategory}/edit', [SubcategoryController::class, 'updateSubcategory'])->name('admin.subcategories.update');
            Route::delete('/{subcategory}', [SubcategoryController::class, 'destroySubcategory'])->name('admin.subcategories.destroy');
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
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
