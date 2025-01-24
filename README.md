
## 🏗 **Alabaster – Generador de Sitios Estáticos con PHP, Blade y Vite**

Alabaster es un generador de sitios estáticos minimalista que combina **Markdown**, **Blade**, **TailwindCSS o Bootstrap** y **Vite.js** para una experiencia de desarrollo moderna y eficiente.

---  

## ✨ **Características Principales**
✔ **Markdown para el contenido** – Escribe contenido fácilmente en `src/pages/`.  
✔ **Blade como motor de plantillas** – Usa plantillas reutilizables con sintaxis elegante.  
✔ **Soporte para Tailwind o Bootstrap** – Tú eliges el framework CSS que prefieras.  
✔ **Vite.js para assets modernos** – Compilación rápida de CSS y JS.  
✔ **PHP para generar archivos estáticos** – `build.php` procesa el contenido y lo coloca en `public/`.

---  

## 📂 **Estructura del Proyecto**
```plaintext
alabaster/
src/
├── templates/
│   ├── layouts/
│   │   ├──  # Plantilla principal
│   ├── partials/
│   │   ├── head.blade.php  # Meta y estilos
│   │   ├── header.blade.php  # Encabezado con navegación
│   │   ├── footer.blade.php  # Pie de página
│   ├── components/
│   │   ├── alert.blade.php  # Ejemplo de un componente reutilizable
│   ├── pages/
│   │   ├── home.md  # Página de inicio
│   ├── assets/         # CSS, JS, imágenes
│   │   ├── css/
│   │   │   ├── styles.css
│   │   │   ├── tailwind.css (opcional)
│   │   ├── js/
│   │   │   ├── app.js
│   │   │   ├── bootstrap.js (opcional)
│   ├── config.php      # Configuración del sitio
├── public/             # Carpeta accesible por el servidor
│   ├── index.php       # Entrada del servidor PHP
│   ├── assets/         # Archivos compilados
├── build.php           # Script para generar HTML estático
├── init.php            # Configuración inicial del sitio
├── server.php          # Router PHP para desarrollo
├── vite.config.js      # Configuración de Vite
├── README.md           # Documentación
├── package.json        # Dependencias de Node.js
```  

---  

## 🚀 **Guía Rápida de Uso**

### 1️⃣ **Clonar el Proyecto**
Primero, clona el proyecto desde GitHub:

```bash
git clone https://github.com/tu-usuario/alabaster.git
cd alabaster
```

### 2️⃣ **Configurar el Proyecto**
Antes de comenzar, necesitas realizar la configuración inicial del sitio. Esto incluye el nombre del sitio y la elección del framework CSS que quieres usar (TailwindCSS o Bootstrap). Para ello, ejecuta el siguiente comando:

```bash
php alabaster init
```

Este comando te guiará a través del proceso de configuración.

### 3️⃣ **Instalar dependencias**
Ejecuta estos comandos en la raíz del proyecto para instalar las dependencias necesarias:

```bash
npm install
composer install
```  

### 4️⃣ **Iniciar el servidor de desarrollo**
Para ver cambios en tiempo real mientras editas el sitio, ejecuta:

```bash
npx vite           # o npm run dev
```  

### 5️⃣ **Compilar para producción**
Cuando el sitio esté listo, genera los archivos optimizados:

```bash
npx vite build
```  

### 6️⃣ **Generar el sitio estático**
Finalmente, renderiza el contenido y genera la versión final en `public/`:

```bash
php build.php
```  

📌 **¡Listo! Ahora tu sitio está generado en la carpeta `public/` y puedes subirlo a cualquier servidor estático!** 🎉

---

## 📌 **Personalización**
### **Configurar el framework CSS (Tailwind o Bootstrap)**
En el archivo `src/config.php`, cambia la opción según lo que necesites:

```php
'css_framework' => 'tailwind',  // Cambia a 'bootstrap' si prefieres Bootstrap
```  

Si usas **TailwindCSS**, asegúrate de tener `tailwind.config.js` correctamente configurado:

```js
export default {
    content: ['./src/**/*.{html,php,md,blade.php}'],
    theme: { extend: {} },
    plugins: [],
};
```  

Si usas **Bootstrap**, asegúrate de importar los estilos en `src/assets/css/styles.css`:

```css
@import "bootstrap/dist/css/bootstrap.min.css";
```  

---  

## 🛠 **Tecnologías Utilizadas**
- **PHP** – Para procesar Markdown y Blade.
- **Blade** – Motor de plantillas de Laravel.
- **Markdown (Parsedown)** – Para gestionar el contenido.
- **Vite.js** – Para compilar CSS y JS de forma rápida.
- **TailwindCSS o Bootstrap** – Frameworks CSS opcionales.

---

## 📜 **Licencia**
Este proyecto está bajo la licencia **MIT** – Puedes usarlo, modificarlo y compartirlo libremente. 🚀

---

### 📢 **Contribuciones y Soporte**
Si tienes sugerencias, mejoras o encuentras algún error, ¡no dudes en contribuir! 🤝

📌 **Mejoras sugeridas**:
- 🌐 Implementar soporte para más frameworks CSS.
- 📝 Agregar opciones de configuración avanzadas.
- 🚀 Mejorar la optimización de archivos para producción.

---

🔹 **¡Gracias por usar Alabaster!** 🚀✨

---