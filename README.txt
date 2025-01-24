El flujo de trabajo de **Alabaster**, tu generador de sitios estáticos, se puede dividir en varios pasos que involucran la configuración, la generación de contenido, la visualización en el navegador y la creación del sitio final. Aquí tienes una descripción detallada de cómo fluye el proceso desde que el usuario clona el proyecto hasta que obtiene un sitio estático listo para ser desplegado:

### 1. **Clonación del Proyecto y Configuración Inicial**
El usuario clona el repositorio de **Alabaster** desde GitHub y lo configura localmente.

#### Comandos:
```bash
git clone https://github.com/tu-repositorio/alabaster.git
cd alabaster
```

### 2. **Instalación de Dependencias**
Después de clonar el proyecto, el usuario necesita instalar las dependencias necesarias para PHP y Node.js:

```bash
npm install      # Instalar dependencias de Node.js (Vite, Tailwind, etc.)
composer install # Instalar dependencias de PHP (Blade, Parsedown, etc.)
```

### 3. **Configuración del Proyecto**
El usuario debe configurar el proyecto ajustando las opciones en `src/config.php`, como el nombre del sitio y el framework CSS deseado (`tailwind` o `bootstrap`).

### 4. **Configuración de Vite y Tailwind/Bootstrap**
Si el usuario ha seleccionado **Tailwind** o **Bootstrap** en la configuración, **Alabaster** genera automáticamente los archivos de configuración necesarios para Vite y Tailwind en `tailwind.config.js` y `vite.config.js`.

```js
// Ejemplo de tailwind.config.js
module.exports = {
    content: ['./src/**/*.{html,php,md,blade.php}'],
    theme: { extend: {} },
    plugins: [],
};
```

### 5. **Iniciar el Servidor de Desarrollo (Opcional)**
Para ver los cambios en tiempo real mientras desarrollas el sitio, puedes ejecutar el servidor de desarrollo utilizando Vite. Esto compila y sirve el contenido de manera eficiente:

```bash
npx vite    # o npm run dev
```

Esto hace que el contenido se sirva desde `localhost`, utilizando Vite para la recarga en caliente y la compilación rápida de CSS/JS.

### 6. **Generación del Sitio Estático (build.php)**
Una vez que el contenido está listo y el usuario quiere generar los archivos estáticos finales, ejecuta el script `build.php`.

```bash
php build.php
```

Este script realiza varias tareas:

- **Cargar la configuración** desde `src/config.php` (incluyendo el nombre del sitio y el framework CSS).
- **Procesar archivos Markdown**: El contenido de cada archivo `.md` en la carpeta `src/pages/` se convierte en HTML.
- **Renderización con Blade**: El contenido generado en Markdown se pasa a través de las plantillas Blade para formatear correctamente la página HTML final.
- **Guardar los archivos estáticos**: Los archivos HTML generados se guardan en la carpeta `public/`.
- **Generar archivos de configuración de Vite y Tailwind/Bootstrap**: Dependiendo de la configuración, los archivos `tailwind.config.js` y `vite.config.js` se copian a la carpeta `public/`.

### 7. **Generación de la Página en `public/`**
Cuando se ejecuta `build.php`, los archivos se procesan y se almacenan en la carpeta `public/`. La estructura de los archivos generados será algo así:

```plaintext
public/
├── index.html       # Página principal del sitio
├── about.html       # Página de "Acerca de"
├── contact.html     # Página de contacto
├── assets/          # Archivos CSS/JS compilados por Vite
└── vite.config.js   # Configuración de Vite (si no se sobreescribe)
└── tailwind.config.js  # Configuración de Tailwind (si es necesario)
```

### 8. **Despliegue del Sitio**
Los archivos generados en la carpeta `public/` son estáticos, por lo que pueden ser subidos a cualquier servidor estático, como:

- **Netlify**
- **Vercel**
- **GitHub Pages**
- **Amazon S3**
- **Servidor propio**

El proceso de despliegue no necesita servidor PHP, solo los archivos HTML y los recursos estáticos generados.

### 9. **Uso de `index.php` y `server.php` (Desarrollo Local)**
En un entorno de desarrollo local, si el usuario desea hacer pruebas con rutas dinámicas o interactuar con el sitio de manera más avanzada:

- **`server.php`**: Maneja las rutas y las redirecciones, sirviendo archivos estáticos cuando corresponde, y redirigiendo las solicitudes dinámicas a `index.php`.
- **`index.php`**: El punto de entrada para las páginas dinámicas, donde se procesan las solicitudes de páginas como `/about` o `/contact`, convirtiendo los archivos Markdown en HTML y renderizándolos con Blade.

### Flujo Resumido

1. **Clonar el proyecto** (`git clone`).
2. **Instalar dependencias** (`npm install` y `composer install`).
3. **Configurar el proyecto** (editar `src/config.php` y seleccionar el framework CSS).
4. **Iniciar el servidor de desarrollo** (`npx vite` para recarga en caliente).
5. **Generar el sitio estático** (`php build.php`).
6. **Desplegar el sitio estático** (subir la carpeta `public/` a un servidor estático).
7. **Desarrollo local con `server.php` y `index.php`** (opcional para pruebas dinámicas).

### Diagramas del Flujo
Si prefieres un gráfico visual, el flujo podría representarse como:

1. **Clonación y configuración** (configuración inicial).
2. **Desarrollo y pruebas** (iniciar servidor de desarrollo).
3. **Generación de contenido estático** (ejecutar `build.php`).
4. **Despliegue** (subir a un servidor estático).

### Ventajas de Alabaster:
- **Rendimiento**: Gracias a la generación estática, el sitio cargará rápidamente.
- **Flexibilidad**: El uso de Markdown y Blade proporciona una forma sencilla de gestionar el contenido y las plantillas.
- **Modularidad**: Puedes elegir entre diferentes frameworks CSS (Tailwind/Bootstrap) según las necesidades del proyecto.
- **Despliegue sencillo**: Al ser un sitio estático, se puede desplegar fácilmente en plataformas como Netlify, Vercel o cualquier servidor que soporte archivos estáticos.

Este es el flujo completo de **Alabaster**: desde la instalación hasta la generación y despliegue del sitio estático.