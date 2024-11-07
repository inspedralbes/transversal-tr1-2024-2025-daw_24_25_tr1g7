<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all(); 
        return view('Users.users', compact('users')); // Indica la carpeta i la vista
    }

    public function create()
    {
        return view('Users.create'); // Vista amb el formulari de creació
    }


    public function store(Request $request)
    {
        // Valida les dades del formulari
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        // Crea un nou usuari i el desa
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuari creat correctament');
    }

    /**
     * Actualitza la informació d'un usuari especific.
     */
    public function update(Request $request, User $user)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'string',
        ]);

        // Actualitza les dades de l'usuari
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuari actualitzat amb èxit');
    }

    /**
     * Elimina un usuari especific.
     */
    public function destroy(User $user)
    {
        $user->delete(); 
        return redirect()->route('users.index')->with('success', 'Usuari eliminat amb èxit');
    }
}
