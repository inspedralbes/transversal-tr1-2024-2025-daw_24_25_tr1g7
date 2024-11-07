@extends('layouts.master')

@section('page-style')
<style>

    .no-permission {
        color: red;
        font-style: italic;
    }

</style>

@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Gestió d'Usuaris</h2>
    
    <div class="d-flex justify-content mb-3">
        @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('users.create') }}" class="btn btn-success">Afegir Usuari</a>
        @else
            <span class="no-permission">No tens permisos per afegir un usuari</span>
        @endif
    </div>

    <!-- Taula de usuaris -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames()->join(', ') }}</td>

                    <td>
                        
                        @if (auth()->user()->hasRole('admin'))
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Editar</button>
                            
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estàs segur que vols eliminar aquest usuari?')">Eliminar</button>
                            </form>
                        @else
                            <span class="no-permission">No tens permisos per editar o eliminar</span>
                        @endif
                    </td>

                </tr>

                <!-- Modal per editar un usuari -->
                <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Editar Usuari</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                    </div>
                                    
                                    @if (auth()->user()->hasRole('admin'))
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Rol</label>
                                            <select class="form-control" id="role" name="role">
                                                <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                                                <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User</option>
                                            </select>
                                        </div>
                                    @else
                                        <input type="hidden" name="role" value="{{ $user->getRoleNames()->first() }}"> 
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tancar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Canvis</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
