@extends('layouts.app') 

@section('content')
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Lista de Usuarios Registrados</h3>
        <span class="badge bg-primary fs-6">Total: {{ $users->count() }}</span>
    </div>

    <table class="table table-bordered table-striped mt-2 align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge 
                        @if($user->role == 'Gerente') bg-danger 
                        @elseif($user->role == 'Empleado') bg-warning text-dark 
                        @else bg-secondary 
                        @endif">
                        {{ $user->role }}
                    </span>
                </td>
                <td class="text-center">
                    @if($user->id !== Auth::id())
                        <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este usuario? Esta acción no se puede deshacer.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    @else
                        <span class="badge bg-info text-dark">Tu usuario activo</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
