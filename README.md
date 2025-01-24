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
├── src/                     # Carpeta fuente
│   ├── pages/               # Archivos Markdown (.md) para el contenido
│   ├── templates/           # Plantillas Blade (.blade.php)
│   ├── assets/              # Recursos estáticos (CSS, JS, imágenes)
│   │   ├── css/
│   │   │   ├── styles.css   # Archivo de estilos principal
│   │   │   ├── tailwind.css # (opcional) Configuración de Tailwind
│   │   ├── js/
│   │   │   ├── app.js       # Código JavaScript principal
│   │   │   ├── bootstrap.js # (opcional) Bootstrap JS
│   ├── index.html           # Archivo de entrada de Vite
├── public/                  # Salida generada (listo para deploy)
├── build.php                # Script de compilación PHP
├── package.json             # Configuración de dependencias frontend
├── tailwind.config.js        # Configuración de Tailwind (opcional)
├── vite.config.js            # Configuración de Vite
└── README.md                 # Documentación
```  

---  

## 🚀 **Guía Rápida de Uso**

### 1️⃣ **Instalar dependencias**
Ejecuta estos comandos en la raíz del proyecto para instalar las dependencias necesarias:

```bash
npm install
composer install
```  

### 2️⃣ **Iniciar el servidor de desarrollo**
Para ver cambios en tiempo real mientras editas el sitio, ejecuta:

```bash
npx vite           # o npm run dev
```  

### 3️⃣ **Compilar para producción**
Cuando el sitio esté listo, genera los archivos optimizados:

```bash
npx vite build
```  

### 4️⃣ **Generar el sitio estático**
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