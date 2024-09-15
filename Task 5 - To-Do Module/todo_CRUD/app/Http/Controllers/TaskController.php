<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Uses the 'Task" model to handle different query operations on the task table in the database.
use App\Models\Task;

class TaskController extends Controller
{
    // The 'index()' method reads all the task from the task table and passes them to 'tasks' view.
    public function index(){
        $tasks = Task::all();
        return view('tasks', ['tasks' => $tasks]);
    }

    // The 'create()' method validates the task to be created and then stores the task in the database using Task model.
    // Then it redirects to the route indicated by 'index'.
    public function create(Request $request){
        $data = $request->validate([
            'task_name' => 'required|string'
        ]);
        $newTask = Task::create($data);
        return redirect(route('index'));
    }

    // The 'edit()' method reads all the task from the task table and passes them to 'tasks' view.
    // Along with all the tasks, it sends '$task' (the task to be edited) as 'oldTask' to the view.
    public function edit(Task $task){
        $tasks = Task::all();
        return view('tasks', ['tasks' => $tasks, 'oldTask' => $task]);
    }

    // The 'update()' method receives the edited task as '$task', and validates it.
    // Then it updates the task in database and redirect to 'index' route.
    public function update(Task $task, Request $request){
        $data = $request->validate([
            'task_name' => 'required|string'
        ]);
        $task->update($data);
        return redirect(route('index'));
    }

    // The 'delete()' method receives the task to be deleted as '$task'.
    // Then it deletes the task from the database and redirect to 'index' route.
    public function delete(Task $task){
        $task->delete();
        return redirect(route('index'));
    }
}
