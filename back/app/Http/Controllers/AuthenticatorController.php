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
            // Regenerar la sesión para evitar fijación de sesión
            $request->session()->regenerate();
    
            // Redirigir a la página de bienvenida después de iniciar sesión
            return redirect()->route('welcome');
        }
    
        return response()->json(['status' => 'error', 'message' => 'Invalid credentials']);
    }


    public function showWelcome()
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            return view('welcome'); // Muestra la vista de bienvenida si el usuario está autenticado
        } else {
            return redirect()->route('login'); // Redirige a la página de login si no está autenticado
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
            // Asegúrate de encriptar la contraseña antes de guardarla
            $user->password = bcrypt($data['password']);
            $user->save();

            // Iniciar sesión después de registrarse
            Auth::login($user);
            
            // Redirigir a la ruta de inicio
            return redirect()->route('home')->with('success', 'Usuario registrado e iniciado sesión exitosamente');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Hubo un problema al registrar el usuario: ' . $e->getMessage()])->withInput();
        }
    }
}
