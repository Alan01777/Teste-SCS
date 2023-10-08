<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()  {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/task/create', 'create')->name('tasks.create');

Route::get('/task/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/task/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::fallback(function () {
    return view('404');
})->name('tasks.404');

//======================================================================//

Route::post('/tasks', function(TaskRequest $request) {
    $task = Task::create( $request->validated());
    return redirect()->route('tasks.index')->with('status', 'Task created!');
})->name('tasks.store');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('status', 'Task Updated!');
})->name('tasks.update');

Route::delete('task/{task}', function(Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('status', 'Task Deleted!');
})->name('tasks.destroy');
