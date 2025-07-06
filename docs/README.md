# 30 Days to Learn Laravel

---
# Unidad I - Baby Steps

## Episodio 02 - Your First Route and View

Para comenzar a trabajar con el proyecto, abrimos el editor desde la terminal en la ruta del proyecto:

```bash
code .
```

**Ruta del proyecto:** `/ISW811/M/VMs/webserver/sites/30days.isw811.xyz`

### Modificando la vista principal

Navegamos a la carpeta `resources/views` y editamos el archivo `welcome.blade.php`. Dentro del elemento `<body>`, agregamos un mensaje de saludo:

```html
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <h1>Hello, World!</h1>
</body>
```

### Creando rutas en Laravel

Las rutas en Laravel se definen en el archivo `routes/web.php`. Existen diferentes formas de crear rutas:

#### 1. Ruta que retorna una respuesta simple

```php
Route::get('/about', function (){
    return 'About Page';
});
```

#### 2. Ruta que retorna una respuesta JSON

```php
Route::get('/json', function (){
    return ['message' => 'Hello JSON'];
});
```

#### 3. Ruta que retorna una vista (método recomendado)

```php
Route::get('/about', function () {
    return view('about');
});
```

### Creando vistas personalizadas

Las vistas en Laravel se almacenan en la carpeta `resources/views`. Para crear una nueva vista, creamos el archivo `about.blade.php` con el siguiente contenido:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
</head>
<body>
    <h1>Hello, from the About Page...</h1>
</body>
</html>
```

### Puntos clave del episodio

- **Ubicación de vistas:** `resources/views/`
- **Ubicación de rutas:** `routes/web.php`
- **Función `view()`:** Utilizada para retornar vistas desde las rutas
- **Extensión de archivos:** Las vistas pueden usar `.blade.php` para aprovechar el motor de plantillas Blade de Laravel