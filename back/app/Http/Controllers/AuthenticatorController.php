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

            $token = $user->createToken('auth_token')->plainTextToken;
            $cookie = cookie('auth_token', $token, 60 * 24, null, null, true, true);
//            session(['auth_token' => $token]);
//            return redirect('/category')->with('success', 'Usuario iniciado sesión exitosamente');

            return response()->json(['status' => 'success', 'message' => 'Credentials validated', 'token' => $token, 'user' => $user])->cookie($cookie);
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
            $cookie = cookie('auth_token', $token, 60 * 24, null, null, true, true);

//            session(['auth_token' => $token]);
//            Mail::to($user->email)->send(new RegisterNewUserMail($user));

//            return redirect('/category')->with('success', 'Usuario registrado e iniciado sesión exitosamente');
            return response()->json(['status' => 'success', 'message' => 'User created', 'token' => $token, 'user' => $user])->cookie($cookie);

            
            return view('welcome'); 
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un problema al registrar el usuario: ' . $e->getMessage()])->withInput();
        }
    }
}
