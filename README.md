# Alabaster

![Logo de Alabaster](ruta/al/logo.png) <!-- Agrega tu logo aquí -->

Alabaster es un generador de sitios estáticos minimalista que combina Markdown, Twig y PHP para ofrecer una experiencia de desarrollo moderna y eficiente. Con soporte para Tailwind CSS o Bootstrap, y la potencia de Vite.js para la compilación de assets, Alabaster es la herramienta perfecta para crear sitios web rápidos y optimizados.

---

## Características principales
- **[Markdown](https://daringfireball.net/projects/markdown/) para el contenido**: Escribe contenido fácilmente en `src/content/`.
- **[Twig](https://twig.symfony.com/) como motor de plantillas**: Usa plantillas reutilizables con sintaxis elegante.
- **Soporte para [Tailwind CSS](https://tailwindcss.com/) o [Bootstrap](https://getbootstrap.com/)**: Elige el framework CSS que prefieras.
- **[Vite.js](https://vitejs.dev/) para assets modernos**: Compilación rápida de CSS y JS.
- **[PHP](https://www.php.net/) para generar archivos estáticos**: Genera tu sitio con un solo comando.
--- 

## Requisitos

- PHP 8.0 o superior
- Node.js 16.0 o superior

---

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/tuusuario/alabaster.git
   cd alabaster
   ```

2. Instala las dependencias de PHP:
   ```bash
   composer install
   ```

3. Instala las dependencias de Node.js:
   ```bash
   npm install
   ```

4. Elige un framework CSS:
    - Para Tailwind CSS:
      ```bash
      npm install tailwindcss postcss autoprefixer --save-dev
      ```
    - Para Bootstrap:
      ```bash
      npm install bootstrap @popperjs/core --save-dev
      ```

5. Inicia el servidor de desarrollo:
   ```bash
   npm run dev
   ```

6. Genera el sitio estático:
   ```bash
   php scripts/build.php
   ```

---

## Estructura del proyecto

```

```

---

## Uso

### 1. Escribe contenido en Markdown
Coloca tus archivos `.md` en `src/content/_pages` o `src/content/_posts`.

### 2. Crea plantillas con Twig
Usa Twig para crear plantillas reutilizables en `src/templates`.

### 3. Personaliza el CSS
Elige entre Tailwind CSS o Bootstrap y personaliza los estilos en `src/assets/css/main.css`.

### 4. Genera el sitio
Ejecuta el siguiente comando para generar el sitio estático:
```bash
php scripts/build.php
```

---

## Contribución

¡Las contribuciones son bienvenidas! Si tienes ideas para mejorar Alabaster, sigue estos pasos:

1. Haz un fork del proyecto.
2. Crea una rama con tu nueva funcionalidad (`git checkout -b feature/nueva-funcionalidad`).
3. Haz commit de tus cambios (`git commit -m 'Añade nueva funcionalidad'`).
4. Haz push a la rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.

---

## Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

---

## Créditos

- **Autor**: [Andrés Hernández](https://github.com/andreshernanz
- **Inspiración**: [Enlace a inspiración, si la hay]
```

---

## 3. **Pendientes**

### a) Integración de Vite.js
Asegúrate de que Vite.js esté correctamente configurado para compilar tanto Tailwind CSS como Bootstrap. Ya tienes una base sólida en tu `vite.config.js`, pero recuerda:

- Si el usuario elige Tailwind CSS, asegúrate de que `tailwind.config.js` y `postcss.config.js` estén configurados.
- Si el usuario elige Bootstrap, asegúrate de que los archivos de Bootstrap se importen correctamente en `src/assets/js/main.js` y `src/assets/css/main.css`.

### b) Documentación adicional
Considera agregar una sección en el `README.md` para explicar cómo cambiar entre Tailwind CSS y Bootstrap, o cómo personalizar la configuración de Vite.

