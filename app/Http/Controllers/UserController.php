<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }
    public function login()
    {
        return view('users.login');
    }
    public function create(Request $request)
    {
        $existingAdminsCount = User::where('role', 'admin')->count();
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','confirmed'],
            'role' => ($existingAdminsCount > 0) ? 'user' : 'admin',
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        
       $user = User::create($formFields);
       auth()->login($user);
        return redirect('/')->with('message','User created and logged in Successfully');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','User logged out Successfully');
    }
    public function signin(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if(!auth()->attempt($formFields)){
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        else
        {$request->session()->regenerate();
        return redirect('/')->with('message','User logged in Successfully');}
    }
}
