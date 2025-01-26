<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/config.php';

use League\CommonMark\CommonMarkConverter;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Configura Twig
$loader = new FilesystemLoader(__DIR__ . '/../src/templates');
$twig = new Environment($loader, [
    'cache' => __DIR__ . '/../cache', // Habilita la caché para mejorar el rendimiento
    'auto_reload' => true, // Recarga automáticamente las plantillas en desarrollo
]);

// Configura CommonMark para Markdown
$converter = new CommonMarkConverter();

// Crear la carpeta public si no existe
if (!is_dir(PUBLIC_DIR)) {
    mkdir(PUBLIC_DIR, 0755, true);
}

// Procesar contenido Markdown y generar HTML
function processContent($contentPath, $outputPath, $converter, $twig): void
{
    // Crear la carpeta de salida si no existe
    if (!is_dir($outputPath)) {
        mkdir($outputPath, 0755, true);
    }

    $files = glob($contentPath . '/*.md');

    foreach ($files as $file) {
        $markdown = file_get_contents($file);
        $htmlContent = $converter->convert($markdown);

        $templateName = basename($file, '.md'); // Nombre de la vista (sin extensión)
        $templatePath = "_pages/post.twig"; // Usar la plantilla genérica

        // Verificar si la plantilla genérica existe
        if ($twig->getLoader()->exists($templatePath)) {
            $renderedHtml = $twig->render($templatePath, [
                'content' => $htmlContent,
                'title' => ucfirst($templateName), // Título dinámico para la página
            ]);

            $outputFile = $outputPath . '/' . $templateName . '.html';
            file_put_contents($outputFile, $renderedHtml);
        } else {
            echo "⚠️ Plantilla genérica no encontrada: {$templatePath}\n";
        }
    }
}

// Procesar páginas
processContent(CONTENT_DIR . '/_pages', PUBLIC_DIR, $converter, $twig);

// Procesar posts (si los hay)
if (is_dir(CONTENT_DIR . '/_posts')) {
    processContent(CONTENT_DIR . '/_posts', PUBLIC_DIR . '/posts', $converter, $twig);
}

// Copiar archivos estáticos desde resources/ a public/
function copyDirectory($src, $dst)
{
    if (!is_dir($dst)) {
        mkdir($dst, 0755, true);
    }

    $files = scandir($src);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $srcFile = $src . '/' . $file;
            $dstFile = $dst . '/' . $file;

            if (is_dir($srcFile)) {
                copyDirectory($srcFile, $dstFile);
            } else {
                copy($srcFile, $dstFile);
            }
        }
    }
}

// Copiar assets compilados (CSS, JS, imágenes) desde resources/ a public/
copyDirectory(RESOURCES_DIR . '/css', PUBLIC_DIR . '/css');
copyDirectory(RESOURCES_DIR . '/js', PUBLIC_DIR . '/js');
copyDirectory(RESOURCES_DIR . '/img', PUBLIC_DIR . '/img');

echo "✅ Sitio generado en la carpeta public/\n";

//