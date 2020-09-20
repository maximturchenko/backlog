<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 

use App\Http\Controllers\BacklogController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\SprintController;
 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/tasks', [BacklogController::class, 'store'])->name('add_task');

//Добавить права только с ролью PM
Route::post('/estimate/task', [EstimateController::class, 'store'])->name('add_estimate');


Route::post('/sprints', [SprintController::class, 'store'])->name('add_sprint');



Route::post('/sprints/add-task', [SprintController::class, 'store_task'])->name('add_sprint');




//test
Route::get('/sprints_all', [SprintController::class, 'index'])->name('all');

