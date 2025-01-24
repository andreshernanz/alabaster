<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $config['site_name'] }}</title>

    @if ($config['css_framework'] === 'tailwind')
        <script type="module" src="{{ $config['base_url'] }}/@vite('assets/js/app.js')"></script>
    @elseif ($config['css_framework'] === 'bootstrap')
        <script type="module" src="{{ $config['base_url'] }}/@vite('assets/js/app.js')"></script>
    @endif
</head>
<body>
<div class="container mx-auto">
    {!! $content !!}
</div>

<script type="module">
    import refreshRuntime from '{{ $config['base_url'] }}/@vite/client';
    refreshRuntime();
</script>
</body>
</html>
