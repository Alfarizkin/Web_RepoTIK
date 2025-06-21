<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilesUploadController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FileAdministrationController;
use App\Http\Controllers\FileResearchController;
use App\Http\Controllers\FileCourseController;
use App\Http\Controllers\FileCollaborationController;
use App\Http\Controllers\ManageFileController;
use App\Http\Controllers\ManageUserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('auth.dashboard');
    Route::get('/research', [FileResearchController::class, 'index'])->name('auth.research');
    Route::get('/administration', [FileAdministrationController::class, 'index'])->name('auth.administration');
    Route::get('/course', [FileCourseController::class, 'index'])->name('auth.course');
    Route::get('/collaboration', [FileCollaborationController::class, 'index'])->name('auth.collaboration');

    Route::middleware([RoleMiddleware::class . ':operator'])->group(function () {
        Route::get('/manage-users', [ManageUserController::class, 'index'])
            ->name('users.index');
        Route::get('/manage-files', [ManageFileController::class, 'index'])
            ->name('files.index');
        Route::put('/manage-users/{user}', [ManageUserController::class, 'update'])
            ->name('manage-users.update');
        Route::delete('/manage-users/{user}', [ManageUserController::class, 'destroy'])
            ->name('users.destroy');
        Route::put('/manage-files/{fileId}', [ManageFileController::class, 'updateFile'])
            ->name('file.update');
        Route::delete('/file', [FilesUploadController::class, 'deleteFile'])
            ->name('delete.file');
    });
    
    Route::middleware([RoleMiddleware::class . ':editor'])->group(function () {
    });
});

Route::get('/search', [SearchController::class, 'search'])->name('search.result');
Route::post('/upload', [FilesUploadController::class, 'uploadFile'])->name('upload');
Route::get('/preview/{id}', [DashboardController::class, 'preview'])->name('preview');
Route::get('/jadwal', [FileAdministrationController::class, 'showAllJadwal'])->name('jadwal.index');
Route::get('file/download/{category}/{id}', [DownloadController::class, 'download'])->name('file.download');

