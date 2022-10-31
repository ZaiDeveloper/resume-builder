<?php

use App\Http\Controllers\{DashboardController, EducationController, ExperienceController, HomepageController, ResumeController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::group([
        'prefix' => 'dashboard',
        'as' => 'dashboard.'
    ], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::group([
        'prefix' => 'resume',
        'as' => 'resume.'
    ], function () {
        Route::get('/create', [ResumeController::class, 'create'])->name('create');
        Route::post('/store', [ResumeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ResumeController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ResumeController::class, 'update'])->name('update');
        Route::get('/{id}', [ResumeController::class, 'index'])->name('index');
        Route::delete('/{id}', [ResumeController::class, 'delete'])->name('delete');
    });

    Route::group([
        'prefix' => 'experience',
        'as' => 'experience.'
    ], function () {
        Route::get('/create/{id}', [ExperienceController::class, 'create'])->name('create');
        Route::post('/store', [ExperienceController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ExperienceController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ExperienceController::class, 'update'])->name('update');
        Route::delete('/{id}', [ExperienceController::class, 'delete'])->name('delete');
    });

    Route::group([
        'prefix' => 'education',
        'as' => 'education.'
    ], function () {
        Route::get('/create/{id}', [EducationController::class, 'create'])->name('create');
        Route::post('/store', [EducationController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [EducationController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [EducationController::class, 'update'])->name('update');
        Route::delete('/{id}', [EducationController::class, 'delete'])->name('delete');
    });
});

Route::get('/', HomepageController::class);
Route::get('/{code}', [ResumeController::class, 'uniqueCode'])->name('unique_code');
