@extends('layouts.app')

@section('content')
<div class="p-5 mb-4 bg-white rounded-3 shadow-sm text-center">
    <h1 class="display-5 fw-bold text-primary">Bienvenido a nuestra Tienda en Línea</h1>
    <p class="lead mt-3">Explora nuestros productos y disfruta de la mejor experiencia de compra.</p>
    @guest
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-2">Crear una cuenta</a>
    @endguest
</div>
@endsection