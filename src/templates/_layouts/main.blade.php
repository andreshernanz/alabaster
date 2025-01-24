<!DOCTYPE html>
<html lang="es">
<head>
    @include('_partials.head')
</head>
<body class="bg-gray-100 text-gray-900">

<!-- Encabezado -->
@include('_partials.header')

<!-- Contenido principal -->
<main class="container mx-auto px-4 mt-6">
    <section class="bg-white p-6 rounded-lg shadow-md">
        @yield('content')
    </section>
</main>

<!-- Pie de página -->
@include('_partials.footer')

</body>
</html>
