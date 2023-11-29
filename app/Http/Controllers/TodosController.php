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
        $todos = Todo::where("id_user" , Auth::user()->id)->orderBy('status')
        ->where('status', 0)
        ->get();
        $todos1 = Todo::where("id_user" , Auth::user()->id)->orderBy('status')
        ->where('status', 1)
        ->get();

        //dd($todos);
        return Inertia::render('Todos/Index' , [
            'todos' => $todos,
            'todos1' => $todos1,
        ]);
    }

    public function finalizadas()
    {
        $todos = Todo::where("id_user" , Auth::user()->id)->orderBy('status')
        ->where('status', 2)
        ->get();

        //dd($todos);
        return Inertia::render('Todos/Finalizadas' , [
            'todos' => $todos,
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
        $request->validate([
            'title' => 'required',
        ]);

        Todo::create([
            'title' => $request->title,
            'status' => 0,
            'id_user' => Auth::user()->id
        ]);

        return back();
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
