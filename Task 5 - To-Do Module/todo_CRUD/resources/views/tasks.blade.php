{{-- Inherits 'index.blade.php' view --}}
@extends('index')
 
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">

                    {{-- New Task Form --}}
                    {{-- Check if there is no old task, show the form to create a new task --}}
                    {{-- isset($oldTask) is false if $oldTask is undefined --}}

                    @if((!isset($oldTask)) || $oldTask == NULL)

                        {{-- The data of the form is sent to the route indicated by 'create' --}}
                        <form action="{{route('create')}}" method="POST" class="form-horizontal">

                            {{-- @csrf Generate hidden input field for csrf token --}}
                            @csrf

                            {{-- @method('post') indicates that it is a post request  --}}
                            @method('post')
                            
                            {{-- Task Name --}}
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Task</label>
                                <div class="col-sm-6">
                                    <input type="text" name="task_name" id="task-name" class="form-control">
                                </div>
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i>Add Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif

                    {{-- Update Task Form --}}
                    {{-- If $oldTask is defined and not null, show the form to update the task --}}

                    @if(isset($oldTask) && $oldTask != NULL)

                        {{-- The data of the form is sent to the route indicated by 'update' --}}
                        {{-- $oldTask, the data to be updated is sent as an argument --}}
                        <form action="{{route('update', ['task' => $oldTask])}}" method="POST" class="form-horizontal">

                            {{-- @csrf Generate hidden input field for csrf token --}}
                            @csrf

                            {{-- @method('PUT') indicates that it is a put request  --}}
                            @method('PUT')
                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Task</label>

                                <div class="col-sm-6">
                                    <input type="text" name="task_name" id="task-name" class="form-control" value="{{$oldTask->task_name}}">
                                </div>
                            </div>

                            {{-- Add Task Button --}}
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-upload"></i>Update Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            {{-- Current Tasks --}}
            {{-- Check if there are any tasks to display in the table --}}
            @if (isset($tasks) && $tasks != NULL && count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>

                                {{-- Loop through the list of tasks and display each one --}}
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->task_name }}</div></td>

                                        {{-- Task Edit Button --}}
                                        <td style="width: 5%">

                                            {{-- The task to be edited is sent to the route indicated by 'edit' --}}
                                            {{-- $task, the task to be edited is sent as an argument --}}
                                            <form action="{{route('edit', ['task' => $task])}}" method="POST">

                                                {{-- @csrf Generate hidden input field for csrf token --}}
                                                @csrf

                                                {{-- @method('GET') indicates that it is a get request  --}}
                                                @method('GET')
                                                
                                                {{-- If any task is currently being edited then the edit button is disabled using @disabled() directive --}}
                                                <button type="submit" class="btn btn-primary" @disabled(isset($oldTask))>
                                                    <i class="fa fa-btn fa-solid fa-pencil-square-o"></i>Edit
                                                </button>
                                            </form>
                                        </td>

                                        {{-- Task Delete Button --}}
                                        <td style="width: 5%">

                                            {{-- The task to be deleted is sent to the route indicated by 'delete' --}}
                                            {{-- $task, the task to be deleted is sent as an argument --}}
                                            <form action="{{route('delete', ['task' => $task])}}" method="POST">
                                                
                                                {{-- @csrf Generate hidden input field for csrf token --}}
                                                @csrf

                                                {{-- @method('DELETE') indicates that it is a delete request  --}}
                                                @method('DELETE')

                                                {{-- If any task is currently being edited then the delete button is disabled using @disabled() directive --}}
                                                <button type="submit" class="btn btn-danger" @disabled(isset($oldTask))>
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
 
@endsection