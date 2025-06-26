<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TaskList;
use App\Livewire\TaskDashboard;
use App\Livewire\TaskForm;
use App\Livewire\TaskShow;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/dashboard', fn () => view('dashboard-page'))->middleware('auth')->name('dashboard');




Route::get('/create-task', fn () => view('taskform-page'))->middleware('auth');



Route::get('/edit-task/{task}', function (Task $task) {
    return view('edit-task-page', compact('task'));
})->middleware('auth');




Route::get('/tasks/{task}', function (Task $task) {
    if ($task->user_id !== Auth::id()) {
        abort(403);
    }

    return view('taskshow-page', compact('task'));
})->middleware('auth');


require __DIR__.'/auth.php';
