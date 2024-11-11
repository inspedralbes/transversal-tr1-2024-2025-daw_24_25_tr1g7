<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required|string', // Nuevo campo para el rol
        ]);

        // Crea un nuevo usuario
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        $user->assignRole($data['role']);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }


    public function update(Request $request, User $user)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|string|exists:roles,name',
        ]);

        // Actualizar los datos del usuario
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Si se proporciona una nueva contraseña, se actualiza
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Actualizar el rol del usuario
        $user->syncRoles([$validated['role']]);
        $user->role = $validated['role'];


        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito');
    }


    /**
     * Elimina un usuari especific.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuari eliminat amb èxit');
    }

    public function updateNickname(Request $request)
    {
        $data = $request->validate([
            'nick' => 'required'
        ],
        [
            'nick.required'=>'Este campo es necesario'
        ]);

        Auth::user()->name = $data['nick'];
        Auth::user()->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Nickname editado correctamente',
            'user' => Auth::user()
        ]);
    }

    public function updateEmail(Request $request)
    {
        $data = $request->validate([
            'email' => 'required'
        ],
        [
            'email.required'=>'Este campo es necesario'
        ]);

        Auth::user()->email = $data['email'];
        Auth::user()->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Email editado correctamente',
            'user' => Auth::user()
        ]);
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'lastPassword' => 'required',
            'password'=>'required',
            'passwordRepeat'=>'required'
        ],
        [
            'lastPassword'=>'Este campo es necesario',
            'password.required'=>'Este campo es necesario',
            'passwordRepeat.required'=>'Este campo es necesario',
        ]);

        $user = Auth::user();

        if (!Hash::check($data['lastPassword'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'La contraseña actual es incorrecta'
            ]);
        }

        // Actualiza la contraseña
        $user->password = Hash::make($data['password']);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Nueva password editado correctamente',
            'user' => Auth::user()
        ]);
    }
}
