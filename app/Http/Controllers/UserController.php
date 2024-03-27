<?php

namespace App\Http\Controllers;
use auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $userInput = $request -> validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8']
        ]);

        $userInput['password'] = bcrypt($userInput['password']);
        $user = User::create($userInput);
        auth()->login($user);
        return redirect('/');
    }

    public function login(Request $request) {
        $userInput = $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $userInput['email'], 'password' => $userInput['password']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
