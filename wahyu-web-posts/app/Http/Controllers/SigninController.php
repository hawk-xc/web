<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function register(): View
    {
        $data = [
            'title' => 'Sign In',
            'active' => 'signin',
        ];

        return view('register', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5'
        ]);

        $store = \App\Models\User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        session()->flash('message', 'data already saved!');

        if ($store) {
            session()->flash('message', 'data already saved!');
            return redirect('/signin');
        } else {
            session()->flash('message', 'data failure saved!');
            return dd('data failed disimpan');
        }
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
            'active' => 'signin'
        ];

        return view('login', $data);
    }

    public function loginAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns|min:5',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(env('APP_URL'));
        }

        return back()->with('loginError', 'mail or password is invalid, please check again!');
    }

    public function signout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/signin');
    }
}
