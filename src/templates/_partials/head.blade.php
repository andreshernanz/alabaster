<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $config['site_name'] }}</title>

    <!-- Incluir Tailwind o Bootstrap según la configuración -->
    @if ($config['css_framework'] === 'tailwind')
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="/assets/tailwind.css" rel="stylesheet">
    @elseif ($config['css_framework'] === 'bootstrap')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link href="/assets/css/styles.css" rel="stylesheet">
    @endif
</head>
