<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectLeaderController;
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
Auth::routes();

Route::get('/logout', function() {
    \Auth::logout();
    return redirect('/');
});


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/project-monitor', [ProjectController::class, 'index']);
Route::get('/project-monitor/create', [ProjectController::class, 'create'])->name('project-monitor.create');
Route::post('/project-monitor/add', [ProjectController::class, 'add'])->name('project-monitor.add');
Route::get('/project-monitor/edit/{id}', [ProjectController::class, 'edit'])->name('project-monitor.edit');
Route::post('/project-monitor/update/{id}', [ProjectController::class, 'update'])->name('project-monitor.update');
Route::post('/project-monitor/destroy/{id}', [ProjectController::class, 'destroy'])->name('project-monitor.destroy');

Route::get('/project-leader', [ProjectLeaderController::class, 'index']);
Route::get('/project-leader/create', [ProjectLeaderController::class, 'create'])->name('project-leader.create');
Route::post('/project-leader/add', [ProjectLeaderController::class, 'add'])->name('project-leader.add');
Route::get('/project-leader/edit/{id}', [ProjectLeaderController::class, 'edit'])->name('project-leader.edit');
Route::post('/project-leader/update/{id}', [ProjectLeaderController::class, 'update'])->name('project-leader.update');
Route::post('/project-leader/destroy/{id}', [ProjectLeaderController::class, 'destroy'])->name('project-leader.destroy');

Route::get('/project-monitor/search', [ProjectController::class, 'search'])->name('project-monitor.search');



