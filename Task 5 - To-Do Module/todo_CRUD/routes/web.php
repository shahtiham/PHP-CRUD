<?php

use Illuminate\Support\Facades\Route;

// The TaskController is used to handle http requests.
use App\Http\Controllers\TaskController;

// This route symbolizes one of the operations of CRUD which is : CREATE
// A post request is sent to this route to create a new task.
// 'create()' method from 'TaskController' class is called.
// This route is named as 'create'.
Route::post('/', [TaskController::class, 'create'])->name('create');


// This route symbolizes one of the operations of CRUD which is : READ
// A get request is sent to this route to get current tasks.
// 'index()' method from 'TaskController' class is called.
// This route is named as 'index'.
Route::get('/', [TaskController::class, 'index'])->name('index');


// This route redirects to the 'index'.
// A 'task' is sent to this route as a parameter.
// This 'task' is sent to the 'tasks' view as $oldTask
Route::get('/{task}', [TaskController::class, 'edit'])->name('edit');

// This route symbolizes one of the operations of CRUD which is : UPDATE
// A put request is sent to this route to update the task indicated by parameter 'task'.
// 'update()' method from 'TaskController' class is called.
// This route is named as 'update'.
Route::put('/{task}', [TaskController::class, 'update'])->name('update');


// This route symbolizes one of the operations of CRUD which is : DELETE
// A delete request is sent to this route to delete the task indicated by parameter 'task'.
// 'delete()' method from 'TaskController' class is called.
// This route is named as 'delete'.
Route::delete('/{task}', [TaskController::class, 'delete'])->name('delete');