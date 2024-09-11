<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs = Blog::with('media')->latest()->take(6)->get()->map(function ($blog) {
        $blog->image = $blog->getFirstMediaUrl($blog->id);
        return $blog;
    });
    return view('welcome', compact('blogs'));
})->name('welcome');

Route::get('/blog/{slug}', function ($slug) {
    $blog = Blog::where('slug', $slug)->with('media')->firstOrFail();
    $blog->image = $blog->getFirstMediaUrl($blog->id);
    // dd($blog->image);
    return view('blog-show', compact('blog'));
})->name('blog.show');

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
    Route::prefix('admin/folders')->middleware('permission:manage files')->group(function () {
        Route::get('/', [FolderController::class, 'listFolders'])->name('admin.folders');
        Route::post('/', [FolderController::class, 'storeFolder'])->name('admin.folder.store');
        Route::put('/{folder}/edit', [FolderController::class, 'updateFolder'])->name('admin.folder.update');
        Route::delete('/{folder}', [FolderController::class, 'destroyFolder'])->name('admin.folder.destroy');
    });

    Route::prefix('admin/files')->middleware('permission:manage files')->group(function () {
        Route::get('/', [FileController::class, 'listFiles'])->name('admin.files');
        Route::post('/upload', [FileController::class, 'uploadFiles'])->name('admin.files.upload');
        Route::get('/{folder}', [FileController::class, 'viewFolderFile'])->name('admin.viewFolder.file');
        Route::delete('/{file}', [FileController::class, 'destroyFile'])->name('admin.files.destroy');
    });

    Route::prefix('admin/blogs')->middleware('permission:manage blogs')->group(function () {
        Route::get('/', [BlogController::class, 'listBlogs'])->name('admin.blogs');
        Route::get('/{blog}', [BlogController::class, 'showBlog'])->name('admin.blogs.show');

        Route::post('/', [BlogController::class, 'storeBlog'])->name('admin.blogs.store');
        Route::get('/{blog}/edit', [BlogController::class, 'editBlog'])->name('admin.blogs.edit');
        Route::put('/{blog}', [BlogController::class, 'updateBlog'])->name('admin.blogs.update');
        Route::delete('/{blog}', [BlogController::class, 'destroyBlog'])->name('admin.blogs.destroy');
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
