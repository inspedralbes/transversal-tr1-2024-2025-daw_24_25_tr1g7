<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatorController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
    
            return redirect()->route('welcome');
        }
    
        return redirect()->back()->withErrors(['email' => 'Credencials incorrectes'])->withInput();
    
    }

    public function showWelcome()
    {
        if (Auth::check()) {
            return view('welcome'); 
        } else {
            return redirect()->route('login');
        }
    }
    

    public function showLoginForm()
    {
        return view('auth.login_register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
    
        return redirect()->route('home'); 
    }
    

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ],
        [
            'username.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email debe ser una dirección válida',
            'password.required' => 'El campo password es obligatorio'
        ]);

        try {
            $user = new User();
            $user->name = $data['username'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();

            Auth::login($user);
            
            return view('welcome'); 
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un problema al registrar el usuario: ' . $e->getMessage()])->withInput();
        }
    }
}
