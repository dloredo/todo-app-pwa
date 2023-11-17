<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where("id_user" , Auth::user()->id)->orderBy('status')->get();
        //dd($todos);
        return Inertia::render('Todos/Index' , [
            'todos' => $todos
        ]);
    }

    public function changeStatus(Todo $todo){
        if($todo->status == 0 ){
            $todo->status = 1;
            $todo->save();
            return back();
        }else if($todo->status == 1){
            $todo->status = 2;
            $todo->save();
            return back();
        }else{
            $todo->status = 0;
            $todo->save();
            return back();
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
