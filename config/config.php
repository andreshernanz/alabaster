<?php

// Cargar variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

// Rutas de la aplicación
const CONTENT_DIR = __DIR__ . '/../src/content';
const TEMPLATES_DIR = __DIR__ . '/../src/templates';
const PUBLIC_DIR = __DIR__ . '/../public';
const RESOURCES_DIR = __DIR__ . '/../src/assets';