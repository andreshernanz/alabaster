<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/config.php';

use League\CommonMark\CommonMarkConverter;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Configura Twig con un caché para mejorar el rendimiento y recarga automática
$loader = new FilesystemLoader(__DIR__ . '/../src/templates');
$twig = new Environment($loader, [
    'cache' => __DIR__ . '/../cache', // Habilita la caché para mejorar el rendimiento
    'auto_reload' => true, // Recarga automáticamente las plantillas en desarrollo
]);

// Configura CommonMark para procesar archivos Markdown
$converter = new CommonMarkConverter();

// Crear la carpeta 'public' si no existe
if (!is_dir(PUBLIC_DIR)) {
    mkdir(PUBLIC_DIR, 0755, true);
}

// Función para procesar contenido Markdown y generar HTML utilizando Twig
function processContent($contentPath, $outputPath, $converter, $twig): void
{
    // Crear la carpeta de salida si no existe
    if (!is_dir($outputPath)) {
        mkdir($outputPath, 0755, true);
    }

    // Obtener todos los archivos Markdown (*.md) en la carpeta de contenido
    $files = glob($contentPath . '/*.md');

    foreach ($files as $file) {
        // Leer el archivo Markdown y convertirlo a HTML
        $markdown = file_get_contents($file);
        $htmlContent = $converter->convert($markdown);

        // Determinar el nombre de la plantilla según el archivo Markdown
        $templateName = basename($file, '.md');
        $templatePath = "_pages/post.twig"; // Plantilla predeterminada para posts

        // Verificar si la plantilla existe antes de renderizarla
        if ($twig->getLoader()->exists($templatePath)) {
            $renderedHtml = $twig->render($templatePath, [
                'content' => $htmlContent,
                'title' => ucfirst($templateName), // Usar el nombre del archivo como título
            ]);

            // Guardar el HTML generado en el directorio de salida
            $outputFile = $outputPath . '/' . $templateName . '.html';
            file_put_contents($outputFile, $renderedHtml);
        } else {
            echo "⚠️ Plantilla genérica no encontrada: {$templatePath}\n";
        }
    }
}

// Procesar las páginas estáticas
processContent(CONTENT_DIR . '/_pages', PUBLIC_DIR, $converter, $twig);

// Procesar los posts del blog (si existen)
if (is_dir(CONTENT_DIR . '/_posts')) {
    processContent(CONTENT_DIR . '/_posts', PUBLIC_DIR . '/posts', $converter, $twig);
}

// Función para copiar los assets de 'resources' a 'public'
function copyDirectory($src, $dst)
{
    // Crear la carpeta de destino si no existe
    if (!is_dir($dst)) {
        mkdir($dst, 0755, true);
    }

    // Leer todos los archivos y carpetas dentro del directorio fuente
    $files = scandir($src);
    foreach ($files as $file) {
        // Ignorar los directorios especiales '.' y '..'
        if ($file !== '.' && $file !== '..') {
            $srcFile = $src . '/' . $file;
            $dstFile = $dst . '/' . $file;

            // Si es un directorio, llamar recursivamente
            if (is_dir($srcFile)) {
                copyDirectory($srcFile, $dstFile);
            } else {
                // Si es un archivo, copiarlo directamente
                copy($srcFile, $dstFile);
            }
        }
    }
}

// Crear una lista de los directorios de 'resources' que queremos copiar (puede ser extendida por el usuario)
$assetDirectories = [
    '/css',   // Carpeta de estilos CSS
    '/js',    // Carpeta de archivos JavaScript
    '/img',   // Carpeta de imágenes
    '/fonts', // Carpeta de fuentes (si el usuario las tiene)
    '/videos',// Carpeta de videos (si el usuario la tiene)
    // Puedes agregar más directorios aquí si el usuario agrega otros assets
];

// Copiar todos los directorios definidos en 'assets' a 'public'
foreach ($assetDirectories as $assetDir) {
    $srcDir = RESOURCES_DIR . $assetDir;
    $dstDir = PUBLIC_DIR . $assetDir;

    // Verificar si el directorio de origen existe antes de intentar copiar
    if (is_dir($srcDir)) {
        echo "Copiando assets desde: {$srcDir} a {$dstDir}\n";
        copyDirectory($srcDir, $dstDir);
    } else {
        echo "⚠️ El directorio de assets no existe: {$srcDir}\n";
    }
}

echo "✅ Sitio generado correctamente en la carpeta public/\n";
