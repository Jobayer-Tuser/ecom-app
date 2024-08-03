<?php
use Illuminate\Support\Facades\Route;
use Modules\JiraBoard\Http\Controllers\DailyTaskController;
use Modules\JiraBoard\Http\Controllers\HomeController;
use Modules\JiraBoard\Http\Controllers\ProjectController;

Route::get('home', [HomeController::class, 'index'])->name('home');

#project route
Route::group(['prefix' => 'project'], function(){

Route::post('sync', [ProjectController::class, 'runCronJobForProject'])->name('project.sync');
Route::get('list', [ProjectController::class, 'index'])->name('project.list');
Route::post('status/update', [ProjectController::class, 'update'])->name('project.update.status');
Route::post('loadajax', [ProjectController::class, 'loadProject'])->name('project.load');

});

#task route
Route::get('task', [DailyTaskController::class, 'index'])->name('task.list');
Route::get('task/struc', [DailyTaskController::class, 'taskArray'])->name('task.list');
Route::get('task/deta', [DailyTaskController::class, 'loadTaskArray'])->name('task.list');

Route::post('filter/task', [DailyTaskController::class, 'filterTask'])->name('task.load');

Route::get('group', [ProjectController::class, 'getGroup']);
Route::get('user', [ProjectController::class, 'getUser']);


Route::group(['middleware' => ['auth']], function() {
});

Route::post('get', [ProjectController::class, 'fetch'])->name('project.get');
Route::get('project/show', [ProjectController::class, 'show'])->name('project.show');
