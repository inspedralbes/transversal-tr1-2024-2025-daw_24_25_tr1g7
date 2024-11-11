<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;  // Asegúrate de importar el modelo Role

class LoginRegisterController extends Controller
{
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

        // Redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->withErrors(['email' => 'Credenciales inválidas'])->withInput();
    }

    public function showWelcome()
    {
        if (Auth::check()) {
            return view('welcome');
        } else {
            return redirect()->route('login.showForm');
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
    ], [
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
        $user->role = 'user'; // Assignem el rol per defecte
        $user->save();

        $user->assignRole('user');

        Auth::login($user);

        return redirect()->route('welcome');

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Hubo un problema al registrar el usuario: ' . $e->getMessage()])->withInput();
    }
}

}
