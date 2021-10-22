<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Step;
use App\Todo;
use Illuminate\Http\Request;


class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $todos = [];
        if (auth()->user()) {
            $todos = auth()->user()->todos->sortBy('completed');
        }

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function store(TodoCreateRequest $request)
    {

        $todo = auth()->user()->todos()->create($request->all());

        if ($request->has('step')) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }

        return redirect()->route('todo.index')->with('message', 'Task created successfully');
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update($request->all());

        if ($request->has('stepName')) {
            foreach ($request->stepName as $key=>$value) {
                $id = $request->stepId[$key];
                if (!$id){
                    $todo->steps()->create(['name' => $value]);
                }
                else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }

            }
        }

        return redirect()->route('todo.index')->with('message', 'Task updated successfully');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => '1']);

        return redirect()->back()->with('message', 'Task ' . $todo['title'] . ' was marked as completed!');
    }


    public function uncomplete(Todo $todo)
    {
        $todo->update(['completed' => 0]);

        return redirect()->back()->with('message', 'Task ' . $todo['title'] . ' was marked as completed!');
    }

    public function destroy(Todo $todo)
    {
//        $table->foreign('todo_id')
//            ->references('id')
//            ->on('todos')
//            ->onUpdate('cascade')
//            ->onDelete('cascade');  // bu elave edilmeyende asaqidaki formada silmek olar
//            $todo->steps->each->delete();

        $todo->delete();

        return redirect()->back()->with('message', 'Task ' . $todo['title'] . ' was deleted from task list!');
    }

    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }
}
