<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function createNote(Request $request) {
        $userInput = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $userInput['title'] = strip_tags($userInput['title']);
        $userInput['description'] = strip_tags($userInput['description']);
        $userInput['user_id'] = auth()->id();
        Note::create($userInput);
        return redirect('/');
    }

    public function updateNote(Note $note) {
        if (auth()->user()->id !== $note['user_id']) {
            return redirect('/');
        }
        return view('/update-notes', ['note' => $note]);
    }

    public function completeUpdateNote(Note $note, Request $request) {
        if (auth()->user()->id !== $note['user_id']) {
            return redirect('/');
        }

        $userInput = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $userInput['title'] = strip_tags($userInput['title']);
        $userInput['description'] = strip_tags($userInput['description']);

        $note->update($userInput);
        return redirect('/');
    }

    public function deleteNote(Note $note) {
        if (auth()->user()->id === $note['user_id']) {
            $note->delete();
        }
        return redirect('/');
    }


}
