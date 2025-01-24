@extends('_layouts.main')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Bienvenido a {{ $config['site_name'] }}</h2>
    <p>Este es un sitio web estático generado con Alabaster.</p>

    @include('_components.alert', ['message' => '¡Este es un mensaje de prueba!', 'type' => 'success'])
@endsection
