<!-- Servidor de desarrollo -->
<?php

$publicDir = __DIR__ . '/../public';
$address = '127.0.0.1';
$port = 8000;

echo "🚀 Servidor iniciado en http://{$address}:{$port}/\n";
echo "Presiona Ctrl+C para detener.\n";

exec("php -S {$address}:{$port} -t {$publicDir}");