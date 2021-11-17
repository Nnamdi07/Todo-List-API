<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTaskRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\GetTaskRequest;

class TodoController extends Controller
{
    public function add(AddTaskRequest $request) : Todo{
       return Todo::create($request->validated());
    }

    public function delete(int $todos_id) : string{
        Todo::where('id',$todos_id)->delete();
        return "okay";
        
    }

    public function update(int $todos_id, UpdateTaskRequest $request) : Todo{
        $todo = Todo::where('id',$todos_id )->first();
        $todo->task = $request->task;
        $todo->due_date = $request->due_date;
        $todo->task_description = $request->task_description;
        $todo->save();
        
        return $todo;
    }

    public function show(int $todo_id) : Todo{
        return Todo::find($todo_id);
    }

    public function getAll(Request $request){
        $length = $request->length ?? 5;
        $user_todo = Todo::where('user_id', $request->user_id)->paginate($length);
        return $user_todo;
        
    }
}
