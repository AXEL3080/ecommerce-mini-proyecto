@extends('layouts.app')

@section('content')
<div class="card p-4 shadow-sm border-danger">
    <h2>Panel del Gerente</h2>
    <p class="mb-3">Bienvenido. Tienes acceso total al sistema de administración.</p>
    <a href="{{ route('users.index') }}" class="btn btn-danger">Administrar Usuarios (CRUD)</a>
</div>
@endsection