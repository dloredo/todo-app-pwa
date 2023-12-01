<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodosController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/offline', function () {
    return view('modules/laravelpwa/offline');
});

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [ TodosController::class, 'index' ])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/changeStatus/{todo}' , [TodosController::class, 'changeStatus'])->name('changeStatus');
    Route::get('finalizadas' , [TodosController::class, 'finalizadas'])->name('finalizadas');
    Route::post('/agregarTodo' , [TodosController::class, 'store'])->name('todoStore');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
