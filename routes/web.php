<?php

use App\Models\Note;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;

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
    $notes = [];
    if (auth()->check()) {
        $notes = auth()->user()->usersNotes()->latest()->get();
    }
    return view('index', ['notes' => $notes]);
});

// Authentication Route
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Notes Route
Route::post('/create-notes', [NoteController::class, 'createNote']);
Route::get('/update-notes/{note}', [NoteController::class, 'updateNote']);
Route::put('/update-notes/{note}', [NoteController::class, 'completeUpdateNote']);
Route::delete('/delete-notes/{note}', [NoteController::class, 'deleteNote']);
