<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Services\Todo\AddTodoService;
use App\Services\Todo\EditTodoService;
use App\Services\Todo\GetListTodoService;
use App\Services\Todo\GetTodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $getListTodoService = new GetListTodoService($request);
        $todoList = $getListTodoService->handle();

        return view('todos.index')->with('todos', $todoList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todos.edit')->with('item', new Todo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTodoRequest $request)
    {
        //

        $addTodoService = new AddTodoService($request);
        list($flag, $res) = $addTodoService->handle();
        if ($flag) {
            return redirect()->route('todos.index')->with('success', 'Add todo success!');
        }
        return redirect()->back()->withInput()->withErrors($res);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
        return view('todos.edit')->with('item', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        //
        $editTodoService = new EditTodoService($request);
        list($flag, $res) = $editTodoService->handle();
        if ($flag) {
            return redirect()->route('todos.index')->with('success', 'Edit todo success!');
        }
        return redirect()->back()->withInput()->withErrors($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
        return redirect()->route('todos.index')->with('success', 'Delete todo success!');
    }
}
