<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        //fetch all todos from database

        //display them in todos index page

        $todos = Todo::all();
        return view('todos.index') -> with('todos', $todos);
    }

    public function show($todoId)
    {    

        //die(var_dump($todoId));
        $todo = Todo::find($todoId);
        return view('todos.show')->with('todo', Todo::find($todoId));

    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        $this->validate(request(), [

            'name' => 'required',

            'descripition' => 'required'

        ]);

        $data = request()->all();

        $todo = new Todo();

        $todo ->name = $data['name'];

        $todo->description = $data['description'];

        $todo->completed = false;

        $todo->save();

        return redirect('/todos');


    }
}