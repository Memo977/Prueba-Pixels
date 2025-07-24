# 30 Days to Learn Laravel

# Índice General

## Unidad I - Baby Steps
- [Episodio 02 - Your First Route and View](#episodio-02---your-first-route-and-view)
- [Episodio 03 - Create a Layout File Using Laravel Components](#episodio-03---create-a-layout-file-using-laravel-components)
- [Episodio 04 - Make a Pretty Layout Using Tailwind CSS](#episodio-04---make-a-pretty-layout-using-tailwind-css)
- [Episodio 05 - Style the Currently Active Navigation Link](#episodio-05---style-the-currently-active-navigation-link)
- [Episodio 06 - View Data and Route Wildcards](#episodio-06---view-data-and-route-wildcards)
- [Episodio 07 - Autoloading, Namespaces, and Models](#episodio-07---autoloading-namespaces-and-models)

## Unidad II - Eloquent
- [Episodio 08 - Introduction to Migrations](#episodio-08---introduction-to-migrations)
- [Episodio 09 - Meet Eloquent](#episodio-09---meet-eloquent)
- [Episodio 10 - Model Factories](#episodio-10---model-factories)
- [Episodio 11 - Eloquent Relationships](#episodio-11---eloquent-relationships)
- [Episodio 12 - Pivot Tables and Many-to-Many Relationships](#episodio-12---pivot-tables-and-many-to-many-relationships)
- [Episodio 13 - Eager Loading and the N+1 Problem](#episodio-13---eager-loading-and-the-n1-problem)
- [Episodio 14 - All You Need to Know About Pagination](#episodio-14---all-you-need-to-know-about-pagination)
- [Episodio 15 - Understanding Database Seeders](#episodio-15---understanding-database-seeders)

## Unidad III - Forms
- [Episodio 16 - Forms and CSRF](#episodio-16---forms-and-csrf)
- [Episodio 17 - Always Validate. Never Trust the User](#episodio-17---always-validate-never-trust-the-user)
- [Episodio 18 - Editing, Updating, and Deleting a Resource](#episodio-18---editing-updating-and-deleting-a-resource)
- [Episodio 19 - Routes Reloaded - 6 Essential Tips](#episodio-19---routes-reloaded---6-essential-tips)

## Unidad IV - Authentication
- [Episodio 20 - Starter Kits, Breeze, and Middleware](#episodio-20---starter-kits-breeze-and-middleware)
- [Episodio 21 - Make a Login and Registration System From Scratch: Part 1](#episodio-21---make-a-login-and-registration-system-from-scratch-part-1)
- [Episodio 22 - Make a Login and Registration System From Scratch: Part 2](#episodio-22---make-a-login-and-registration-system-from-scratch-part-2)
- [Episodio 23 - 6 Steps to Authorization Mastery](#episodio-23---6-steps-to-authorization-mastery)

## Unidad V - Digging Deeper
- [Episodio 24 - How to Preview and Send Email Using Mailable Classes](#episodio-24---how-to-preview-and-send-email-using-mailable-classes)
- [Episodio 25 - Queues Are Easier Than You Think](#episodio-25---queues-are-easier-than-you-think)
- [Episodio 26 - Get Your Build Process in Order](#episodio-26---get-your-build-process-in-order)


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

## Episodio 03 - Create a Layout File Using Laravel Components

### Creando nuevas rutas

Se crea una nueva ruta para Contacto:

```php
Route::get('/contact', function () {
    return view('contact');
});
```

Actualizamos el nombre de welcome a home:

```php
Route::get('/', function () {
    return view('home');
});
```

### Actualizando las vistas

Por ende también actualizamos la vista, es decir `welcome.blade.php` lo renombramos a `home.blade.php` y actualizamos su contenido:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Hello, from the Home Page... </h1>
</body>
</html>
```

También creamos el archivo `contact.blade.php`:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
</head>
<body>
    <h1>Hello, from the Contact Page... </h1>
</body>
</html>
```

### Agregando navegación

Tenemos Home, About y Contact. Vamos a agregar nuestra primera barra de navegación simple en cada vista:

```html
<nav>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/contact">Contact</a>
</nav>
```

### Creando componentes de layout

Creamos una carpeta dentro de `views` llamada `components` y dentro creamos `layout.blade.php`:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </nav>
    {{ $slot }}
</body>
</html>
```

### Usando el componente layout

Ahora nuestros archivos tendrán lo siguiente:

**home.blade.php:**
```html
<x-layout>
    <h1>Hello from the Home Page.</h1>
</x-layout>
```

**about.blade.php:**
```html
<x-layout>
    <h1>Hello from the About Page.</h1>
</x-layout>
```

**contact.blade.php:**
```html
<x-layout>
    <h1>Hello from the Contact Page.</h1>
</x-layout>
```
## Episodio 04 - Make a Pretty Layout Using Tailwind CSS

### Agregando Tailwind CSS al layout

Ahora en `layout.blade.php` agregamos lo siguiente debajo de `<title>Home Page</title>`:

```html
<title>My Website</title>
<script src="https://cdn.tailwindcss.com"></script>
```

### Implementando el diseño de TailwindUI

Copiamos el código gratuito de tailwindui.com y lo agregamos a nuestro layout:

```html
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://laracasts.com/images/logo/logo-triangle.svg" alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="/" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                                <a href="/about" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
                                <a href="/contact" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="https://laracasts.com/images/lary-ai-face.svg" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Home</a>
                    <a href="/about" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">About</a>
                    <a href="/contact" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Contact</a>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://laracasts.com/images/lary-ai-face.svg" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Lary Robot</div>
                            <div class="text-sm font-medium leading-none text-gray-400">jeffrey@laracasts.com</div>
                        </div>
                        <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            </div>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
```

### Actualizando las vistas con slots

Ahora en cada uno de los siguientes archivos: home, about y contact agregamos lo siguiente según corresponda:

**home.blade.php:**
```html
<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>

    <h1>Hello from the Home Page.</h1>
</x-layout>
```

**about.blade.php:**
```html
<x-layout>
    <x-slot:heading>
        About Page
    </x-slot:heading>

    <h1>Hello from the About Page.</h1>
</x-layout>
```

**contact.blade.php:**
```html
<x-layout>
    <x-slot:heading>
        Contact Page
    </x-slot:heading>

    <h1>Hello from the Contact Page.</h1>
</x-layout>
```

### Resultado final

Al finalizar el episodio 04, la página debe verse con un diseño profesional utilizando Tailwind CSS, con una navegación moderna y responsiva.

![Pagina Web responsiva en ejecución con estilos](./images/01.PNG "Pagina web en ejecución responsiva")

## Episodio 05 - Style the Currently Active Navigation Link

### Modificando el layout principal

Realizamos cambios en el archivo `layout.blade.php` para mejorar la estructura del HTML:

```html
<html lang="en" class="h-full bg-gray-100">
<body class="h-full">
```

### Creando el componente nav-link

Creamos un componente personalizado para los enlaces de navegación. Archivo: `nav-link.blade.php` en la carpeta `components`:

```blade
@props(['active' => false])
<a class="{{ $active ? 'bg-gray-900 text-white': 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium"
   aria-current="{{ $active ? 'page': 'false' }}"
   {{ $attributes }}
>{{ $slot }}</a>
```

### Implementando la navegación activa

Reemplazamos los enlaces de navegación HTML estático por componentes dinámicos que detectan la página actual en el archivo `layout.blade.php`:

**Antes:**
```html
<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<a href="/" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
<a href="/about" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
<a href="/contact" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Contact</a>
```

**Después:**
```blade
<x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
<x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
<x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
```

**Resultado:** La barra de navegación ahora cambia el estilo cuando se pasa el mouse por encima de los enlaces.

![Pagina web en ejecución](./images/02.PNG "Pagina web resaltado de la barra de navegacion al pasar el mouse")

## Episodio 06 - View Data and Route Wildcards

### Configuración inicial

Agregamos el helper `Arr` de Laravel en el archivo `web.php` ubicado en el carpeta routes:

```php
use Illuminate\Support\Arr;
```

### Eliminando la ruta About

Comentamos o eliminamos la ruta anterior de about:

```php
// Route::get('/about', function () {
//     return view('about');
// });
```

### Creando la ruta Jobs con datos

Agregamos una nueva ruta que pasa un array de trabajos a la vista:

```php
Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ]
    ]);
});
```

### Creando ruta con wildcards

Implementamos una ruta dinámica que acepta un parámetro `id` para mostrar trabajos individuales:

```php
Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Director',
            'salary' => '$50,000'
        ],
        [
            'id' => 2,
            'title' => 'Programmer',
            'salary' => '$10,000'
        ],
        [
            'id' => 3,
            'title' => 'Teacher',
            'salary' => '$40,000'
        ]
    ];
    
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    return view('job', ['job' => $job]);
});
```

### Creando la vista Jobs

Renombramos `about.blade.php` a `jobs.blade.php` con el siguiente contenido:

```blade
<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
```

### Creando la vista Job individual

Creamos un nuevo archivo `job.blade.php` (singular) para mostrar trabajos individuales:

```blade
<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>
</x-layout>
```

### Actualizando la navegación

Modificamos el componente layout para cambiar el enlace de "About" por "Jobs":

```blade
<!-- Antes -->
<x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>

<!-- Después -->
<x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
```

### Resultado final

Al completar el episodio 6, la aplicación ahora:
- Muestra una lista de trabajos con sus salarios
- Permite hacer clic en cada trabajo para ver los detalles
- Utiliza wildcards en las rutas para pasar parámetros dinámicos
- Demuestra cómo pasar datos desde las rutas a las vistas

**Nota:** Los datos están hardcodeados por ahora. En episodios posteriores se hablara de eso a la base de datos.

![En página de jobs se muestra un listado de trabajos](./images/03.PNG "Seccion de Jobs funcionando")
![Página que muestra detalles de un trabjo especifico](./images/04.PNG "ID de Jobs en la ruta")

## Episodio 07 - Autoloading, Namespaces, and Models

### Actualizando el archivo web.php

Modificamos el archivo `web.php` para usar el modelo Job en lugar de datos hardcodeados:

```php
<?php
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});
```

### Buscando el directorio Models

Buscamos la carpeta `Models` dentro del directorio `app`:
```
app/
├── Models/
│   └── Job.php
```

### Creando el modelo Job

Creamos el archivo `Job.php` en `app/Models/` con el siguiente contenido:

```php
<?php
namespace App\Models;

use Illuminate\Support\Arr;

class Job {
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
        
        if (! $job) {
            abort(404);
        }
        
        return $job;
    }
}
```

### Conceptos clave del episodio

- **Autoloading**: Laravel automáticamente carga las clases siguiendo el estándar PSR-4
- **Namespaces**: Uso de `namespace App\Models;` para organizar el código
- **Modelos**: Separación de la lógica de datos en clases dedicadas
- **Métodos estáticos**: `all()` y `find()` como métodos de clase
- **Manejo de errores**: Uso de `abort(404)` cuando no se encuentra un trabajo
- **Reutilización**: El método `find()` utiliza `static::all()` para reutilizar la lógica

### Beneficios de esta refactorización

1. **Organización**: El código está mejor estructurado y separado por responsabilidades
2. **Reutilización**: Los datos se centralizan en el modelo
3. **Mantenibilidad**: Es más fácil modificar la lógica de datos en un solo lugar
4. **Escalabilidad**: Preparación para la futura integración con base de datos

# Unidad II - Eloquent

## Episodio 08 - Introduction to Migrations

### Introducción a las migraciones

Las migraciones son una característica fundamental de Laravel que permite versionar y gestionar cambios en la estructura de la base de datos. Esto elimina la necesidad de actualizar manualmente las tablas.

### Comando básico de migración

Laravel ya incluye migraciones predeterminadas. Para ejecutarlas usamos:

```bash
php artisan migrate
```

### Modificando migraciones existentes

Modificamos el archivo `create_users_table.php` ubicado en `database/migrations/`:

**Eliminamos esta línea:**
```php
$table->string('name');
```

**Agregamos estas dos líneas:**
```php
$table->string('first_name');
$table->string('last_name');
```

### Creando nuevas migraciones

Para crear una nueva migración para los trabajos, ejecutamos:

```bash
php artisan make:migration create_job_listings_table
```

Una vez hecho esto deberia verse asi.

![Migraciones](./images/05.PNG "Migraciones")

### Configuración del entorno

El comando se ejecuta en la máquina virtual webserver:

```bash
vagrant@webserver:~/sites/30days.isw811.xyz$
```

**Ubicación de la máquina virtual en la máquina anfitriona:**
```
/ISW811/M/VMs/webserver/
```

### Modificando la migración creada

El archivo creado desde la terminal debe modificarse para incluir la estructura de la tabla:

```php
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
```

### Ejecutando la migración

Ejecutamos el comando para aplicar la migración:

```bash
vagrant@webserver:~/sites/30days.isw811.xyz$ php artisan migrate
```

**Salida esperada:**
```
 INFO  Running migrations.
  2025_07_06_151255_create_job_listings_table .................. 147.05ms DONE
```

### Verificando en la base de datos

En MariaDB, dentro de la base de datos `30days`, ejecutamos:

```sql
show tables;
```

Veremos que se ha creado la tabla `job_listings`.

![Tablas de la base de datos en nuestro servidor de base de datos](./images/06.PNG "Tabla Job ha sido emigrada")

### Conceptos clave

- **Versionado**: Las migraciones permiten rastrear cambios en la base de datos
- **Colaboración**: Facilita el trabajo en equipo al sincronizar estructuras de BD
- **Reversibilidad**: Posibilidad de revertir cambios mediante rollbacks
- **Automatización**: Elimina la necesidad de cambios manuales en la base de datos

## Episodio 09 - Meet Eloquent

### Introducción a Eloquent

Eloquent es el ORM (Object-Relational Mapping) de Laravel que permite interactuar con la base de datos de forma elegante y expresiva.

### Iniciando Tinker

En la terminal ejecutamos:

```bash
vagrant@webserver:~/sites/30days.isw811.xyz$ php artisan tinker
```

### Primer intento de crear un registro

Intentamos crear un registro con:

```php
App\Models\Job::create(['title' => 'Acme Director', 'salary' => '$1,000,000']);
```

**Resultado:** Se produce un error por temas de seguridad que Laravel proporciona desde el inicio.

![Error al intentar crear un trabajo](./images/07.PNG "Error al intentar crear un trabajo")

### Configurando el modelo Job para Eloquent

Modificamos el archivo `Job.php` en la carpeta `models` para extender de Eloquent Model:

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    protected $table = 'job_listings';
    protected $fillable = ['title', 'salary'];
}
```

### Creando registros con Eloquent

Después de la configuración salimos del tinker con el comando `quit` y volvemos a ingresar `php artisan tinker` para que reconozca los cambios y ejecutamos nuevamente:

```php
App\Models\Job::create(['title' => 'Acme Director', 'salary' => '$1,000,000']);
```

**Resultado:** Se crea exitosamente el registro.

![Registro creado exitosamente](./images/08.PNG "Trabajo creado exitosamente")

### Agregando más registros

Continuamos creando más trabajos:

```php
App\Models\Job::create(['title' => 'Director', 'salary' => '50,000']);
App\Models\Job::create(['title' => 'Programmer', 'salary' => '$60,000']);
App\Models\Job::create(['title' => 'Teacher', 'salary' => '$50,000']);
```

### Consultando todos los registros

Para obtener todos los trabajos:

```php
App\Models\Job::all();
```

![Se muestran todos los trabajos anteriormente creados](./images/09.PNG "Todos los trabajos")

**Resultado:** Muestra todos los trabajos con id, título, salario y fechas de creación y actualización.

### Buscando por ID

Para buscar un trabajo específico:

```php
App\Models\Job::find(1);
```

![Se muestra un trabajo especifico](./images/10.PNG "Busqueda de Job por ID")

### Eliminando registros

Para eliminar un trabajo:

```php
$job->delete();
```

**Resultado:** Devuelve `true` si la eliminación fue exitosa.

### Conceptos clave de Eloquent

- **Fillable**: Protege contra asignación masiva especificando campos permitidos
- **Table**: Especifica el nombre de la tabla cuando no sigue la convención
- **Timestamps**: Maneja automáticamente `created_at` y `updated_at`
- **Métodos básicos**: `create()`, `all()`, `find()`, `delete()`

Con esto tenemos una base sólida de Eloquent para interactuar con la base de datos.

## Episodio 10 - Model Factories

**Parte de la serie:** 30 Days to Learn Laravel  
**Unidad:** II - Eloquent

## Introducción a Model Factories

Las Model Factories son una característica poderosa de Laravel que permite generar datos falsos de manera consistente y eficiente para testing y desarrollo.

## Actualizando UserFactory

Como anteriormente se modificó la tabla users en la migración reemplazando `name` por `first_name` y `last_name`, se debe actualizar UserFactory para evitar errores al generar datos falsos.

**Ubicación:** `database/factories/UserFactory.php`

```php
return [
    'first_name' => $this->faker->firstName(),
    'last_name' => $this->faker->lastName(),
    'email' => $this->faker->unique()->safeEmail(),
    'email_verified_at' => now(),
    'password' => bcrypt('password'),
    'remember_token' => Str::random(10),
];
```

> **Nota importante:** Si no hace esta modificación, al ejecutar `User::factory()->create()` se obtendrá un error por columna inexistente.

## Usando Factories con Tinker

### Iniciando Tinker

En la terminal ejecutamos:

```bash
vagrant@webserver:~/sites/30days.isw811.xyz$ php artisan tinker
```

### Crear un usuario

```php
App\Models\User::factory()->create();
```

### Crear múltiples usuarios

```php
App\Models\User::factory()->count(100)->create();
```

## Creando una Factory para el modelo Job

### Generando la factory

Creamos una nueva factory para el modelo Job:

```bash
php artisan make:factory JobFactory --model=Job
```

![JobFactory creado correctamente](./images/11.PNG "JobFactory creado")

### Configurando JobFactory

**Ubicación:** `database/factories/JobFactory.php`

Modificamos la función existente por:

```php
public function definition(): array
{
    return [
        'title' => $this->faker->jobTitle(),
        'employer_id' => Employer::factory(),
        'salary' => '$50,000 USD',
    ];
}
```

## Creando el modelo y migración para Employer

### Generando modelo y migración

```bash
php artisan make:model Employer -m
```
![Migración y modelo Employer creado correctamente](./images/12.PNG "Migración y modelo Employer creados")

### Configurando la migración

**Archivo:** `create_employers_table.php`

Modificamos la función `up` en el método `create` añadiendo `$table->string('name');`:

```php
public function up(): void
{
    Schema::create('employers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}
```

### Eliminando modelo duplicado

Procedemos a borrar el modelo de Employer que está ubicado en la carpeta `app/Models` ya que lo crearemos nuevamente con la factory.

### Creando modelo con factory

```bash
php artisan make:model Employer -f
```
![EmployerFactory y modelo Employer creado correctamente](./images/13.PNG "EmployerFactory y modelo Employer creados")

### Configurando EmployerFactory

Modificamos la función dentro de nuestro archivo de `EmployerFactory` para añadir `'name' => fake()->company()`:

```php
public function definition(): array
{
    return [
        'name' => fake()->company(),
    ];
}
```

## Configurando la referencia en la migración de Jobs

Para que la relación entre Jobs y Employers funcione correctamente, necesitamos agregar la referencia de clave foránea en la migración de la tabla `job_listings`.

**Archivo:** `create_job_listings_table.php`

Modificamos la función `up` para incluir la referencia:

```php
public function up(): void
{
    Schema::create('job_listings', function (Blueprint $table) {
        $table->id();
        $table->foreignIdFor(\App\Models\Employer::class);
        $table->string(column: 'title');
        $table->string(column: 'salary');
        $table->timestamps();
    });
}
```

> **Nota:** `foreignIdFor()` automáticamente crea la columna `employer_id` con la referencia de clave foránea apropiada.

## Ejecutando las migraciones

Una vez configuradas las migraciones y factories, ejecutamos:

```bash
php artisan migrate:refresh
```
Advertencia: Este comando elimina todas las tablas y las vuelve a crear desde cero, perdiendo todos los datos existentes.

## Probando las Factories - Creando datos de prueba

### Usando Tinker para crear registros

Iniciamos Tinker:

```bash
php artisan tinker
```

### Creando 10 registros de cada modelo

```php
// Crear 10 employers
App\Models\Employer::factory()->count(10)->create();

// Crear 10 users
App\Models\User::factory()->count(10)->create();

// Crear 10 jobs (automáticamente creará employers si no existen)
App\Models\Job::factory()->count(10)->create();
```

### Verificando los datos creados

```php
// Verificar que se crearon los registros
App\Models\Employer::count(); // Debería mostrar 10 o más
App\Models\User::count(); // Debería mostrar 10 o más
App\Models\Job::count(); // Debería mostrar 10
```

## Conceptos clave

- **Factories**: Generan datos falsos consistentes para desarrollo y testing
- **Faker**: Biblioteca para generar datos falsos realistas
- **Comandos Artisan**: `-m` para migración, `-f` para factory
- **Consistencia**: Mantener la estructura de datos coherente entre migraciones y factories
- **Asignación masiva**: Uso de `fake()` para generar datos realistas
- **Relaciones**: Las factories pueden crear automáticamente modelos relacionados
- **Claves foráneas**: `foreignIdFor()` simplifica la creación de referencias entre tablas

## Beneficios de usar Model Factories

1. **Desarrollo eficiente**: Genera datos de prueba rápidamente
2. **Testing**: Facilita la creación de datos para pruebas
3. **Consistencia**: Mantiene la estructura de datos uniforme
4. **Flexibilidad**: Permite personalizar los datos generados según necesidades específicas
5. **Relaciones automáticas**: Crea automáticamente los modelos relacionados necesarios

## Episodio 11 - Eloquent Relationships

## Introducción a las Relaciones de Eloquent

Las relaciones de Eloquent son una característica fundamental de Laravel que permite definir y trabajar con conexiones entre diferentes modelos de base de datos de manera elegante y eficiente.

## Definiendo la relación One-to-Many (Uno a Muchos)

### Configurando el modelo Employer

En el modelo `Employer` ubicado en `app/Models/Employer.php`, añadimos la siguiente función para definir la relación:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
```

### Entendiendo la relación hasMany

- **hasMany**: Define una relación uno a muchos
- **Job::class**: Especifica el modelo relacionado
- **Convención**: Laravel automáticamente busca la columna `employer_id` en la tabla `jobs`

## Trabajando con relaciones en Tinker

### Iniciando Tinker

```bash
php artisan tinker
```

### Obteniendo un empleador

```php
$employer = App\Models\Employer::first();
```

### Accediendo a los trabajos del empleador

```php
// Obtener todos los trabajos de un empleador
$employer->jobs;
```
![Trabajos de un empleador](./images/14.PNG "Trabajos de un empleador")

Este comando devuelve una **Collection** con todos los trabajos asociados al empleador.

### Diferentes formas de acceder a los datos

#### 1. Acceso como array

```php
// Obtener el primer trabajo usando índice de array
$employer->jobs[0];
```

#### 2. Usando métodos de Collection

```php
// Obtener el primer trabajo usando el método first()
$employer->jobs->first();

// Obtener el último trabajo
$employer->jobs->last();

// Contar los trabajos
$employer->jobs->count();
```

### Explorando métodos de Collection

Las Collections de Laravel ofrecen muchos métodos útiles:

```php
// Verificar si la colección está vacía
$employer->jobs->isEmpty();

// Verificar si la colección tiene elementos
$employer->jobs->isNotEmpty();

// Obtener solo los títulos de los trabajos
$employer->jobs->pluck('title');

// Filtrar trabajos por salario
$employer->jobs->where('salary', '>', 50000);

// Obtener el primer trabajo que coincida con una condición
$employer->jobs->firstWhere('title', 'Developer');
```

## Definiendo la relación inversa (belongsTo)

### Configurando el modelo Job

En el modelo `Job` ubicado en `app/Models/Job.php`, añadimos la relación inversa:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
```

### Usando la relación belongsTo

```php
// Obtener un trabajo
$job = App\Models\Job::first();

// Acceder al empleador de ese trabajo
$job->employer;

// Acceder al nombre del empleador
$job->employer->name;
```

## Ventajas de usar Eloquent Relationships

### 1. Lazy Loading
```php
// Solo se ejecuta la consulta cuando accedes a la relación
$employer = Employer::first();
$jobs = $employer->jobs; // Consulta SQL ejecutada aquí
```

### 2. Eager Loading
```php
// Cargar empleadores con sus trabajos en una sola consulta
$employers = Employer::with('jobs')->get();
```

### 3. Consultas dinámicas
```php
// Obtener empleadores que tienen trabajos
$employersWithJobs = Employer::has('jobs')->get();

// Contar trabajos por empleador
$employersWithJobCount = Employer::withCount('jobs')->get();
```

## Ejemplos prácticos de uso

### Creando trabajos para un empleador específico

```php
// Obtener un empleador
$employer = Employer::first();

// Crear un nuevo trabajo para este empleador
$job = new Job();
$job->title = 'Senior Developer';
$job->salary = '$80,000 USD';
$employer->jobs()->save($job);
```

### Usando create() con relaciones

```php
// Crear un trabajo directamente asociado a un empleador
$employer->jobs()->create([
    'title' => 'Project Manager',
    'salary' => '$70,000 USD'
]);
```

### Consultando datos relacionados

```php
// Obtener todos los trabajos de un empleador específico
$googleJobs = Employer::where('name', 'Google')->first()->jobs;

// Obtener empleadores con más de 5 trabajos
$busyEmployers = Employer::has('jobs', '>', 5)->get();
```

## Conceptos clave

- **hasMany**: Relación uno a muchos (un empleador tiene muchos trabajos)
- **belongsTo**: Relación inversa (un trabajo pertenece a un empleador)
- **Collection**: Estructura de datos que contiene múltiples modelos
- **Lazy Loading**: Las relaciones se cargan solo cuando se accede a ellas
- **Eager Loading**: Cargar relaciones de manera anticipada para optimizar consultas
- **Métodos de Collection**: `first()`, `last()`, `count()`, `pluck()`, `where()`, etc.

## Beneficios de las relaciones Eloquent

1. **Sintaxis limpia**: Acceso intuitivo a datos relacionados
2. **Optimización automática**: Laravel optimiza las consultas SQL
3. **Flexibilidad**: Múltiples formas de acceder y manipular datos
4. **Consistencia**: Mantiene la integridad de los datos relacionados
5. **Productividad**: Reduce significativamente el código necesario para trabajar con relaciones

## Episodio 12 - Pivot Tables and Many-to-Many Relationships

### Introducción a las Relaciones Many-to-Many

Las relaciones muchos a muchos (many-to-many) son fundamentales en las bases de datos cuando necesitamos conectar dos modelos donde cada uno puede estar relacionado con múltiples registros del otro. En nuestro caso, un trabajo puede tener múltiples etiquetas y una etiqueta puede estar asociada a múltiples trabajos.

## Creando el modelo Tag con migración y factory

### Generando el modelo completo

Para crear el modelo Tag junto con su migración y factory, ejecutamos:

```bash
php artisan make:model Tag -mf
```

Este comando genera:
- `app/Models/Tag.php` (el modelo)
- `database/migrations/create_tags_table.php` (la migración)
- `database/factories/TagFactory.php` (la factory)

## Configurando la migración de Tags

### Modificando la migración principal

**Archivo:** `create_tags_table.php`

Modificamos la función `up` para incluir el campo `name`:

```php
public function up(): void
{
    Schema::create('tags', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });
}
```

### Creando la tabla pivot

Dentro de la misma migración, después de la creación de la tabla `tags`, agregamos la tabla pivot:

```php
public function up(): void
{
    Schema::create('tags', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    Schema::create('job_tag', function (Blueprint $table) {
        $table->id();
        $table->foreignIdFor(\App\Models\Job::class, 'job_listing_id')->constrained()->cascadeOnDelete();
        $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete();
        $table->timestamps();
    });
}
```

### Configurando el método down

Para el rollback, actualizamos la función `down`:

```php
public function down(): void
{
    Schema::dropIfExists('job_tag');
    Schema::dropIfExists('tags');
}
```

> **Nota:** Es importante eliminar primero la tabla pivot (`job_tag`) antes que las tablas principales debido a las restricciones de claves foráneas.

## Entendiendo las tablas pivot

### ¿Qué es una tabla pivot?

Una tabla pivot es una tabla intermedia que conecta dos modelos en una relación muchos a muchos. En nuestro caso:

- **Tabla `job_listings`**: Contiene los trabajos
- **Tabla `tags`**: Contiene las etiquetas
- **Tabla `job_tag`**: Conecta trabajos con etiquetas

### Estructura de la tabla pivot

```sql
job_tag:
- id
- job_listing_id (clave foránea hacia job_listings)
- tag_id (clave foránea hacia tags)
- created_at
- updated_at
```

### Restricciones de integridad

Las restricciones `constrained()->cascadeOnDelete()` garantizan:

1. **Integridad referencial**: No se pueden crear relaciones con IDs inexistentes
2. **Eliminación en cascada**: Si se elimina un trabajo o etiqueta, sus relaciones se eliminan automáticamente
3. **Prevención de registros huérfanos**: Evita datos inconsistentes en la tabla pivot

## Ejecutando las migraciones

### Aplicando los cambios

Para aplicar los cambios realizados en la migración:

```bash
php artisan migrate:rollback && php artisan migrate
```

Este comando:
1. Revierte la última migración
2. Ejecuta nuevamente todas las migraciones

### Verificando en la base de datos

En MariaDB, verificamos que las tablas se crearon correctamente:

```sql
SHOW TABLES;
```

Deberíamos ver:
- `tags`
- `job_tag`

## Consideraciones con SQLite

Si trabajas con SQLite directamente (por ejemplo, con Herd), es necesario activar las restricciones de claves foráneas:

```sql
PRAGMA foreign_keys = ON;
```

> **Nota:** Laravel maneja esto automáticamente en la mayoría de entornos, pero es útil conocerlo para desarrollo local.

## Definiendo las relaciones en los modelos

### Configurando el modelo Job

En `app/Models/Job.php`, agregamos la relación many-to-many:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    protected $fillable = ['title', 'salary'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
```

### Configurando el modelo Tag

En `app/Models/Tag.php`, definimos la relación inversa:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: "job_listing_id");
    }
}
```

## Entendiendo los parámetros de belongsToMany

### Parámetros utilizados

- **`foreignPivotKey`**: Especifica la clave foránea del modelo actual en la tabla pivot
- **`relatedPivotKey`**: Especifica la clave foránea del modelo relacionado en la tabla pivot

### ¿Por qué necesitamos estos parámetros?

Laravel sigue convenciones de nomenclatura, pero nuestro caso es especial:

- **Convención esperada**: `job_id` en la tabla pivot
- **Nuestro caso**: `job_listing_id` porque nuestra tabla se llama `job_listings`

## Trabajando con relaciones Many-to-Many

### Usando Tinker para probar las relaciones

```bash
php artisan tinker
```

### Asociando tags a trabajos

## Asociando tags a trabajos

```php
// Obtener un trabajo
$job = App\Models\Job::first();

// Asociar etiquetas al trabajo usando attach
$job->tags()->attach([1, 2, 3]);

// O usando el método sync para reemplazar todas las etiquetas
$job->tags()->sync([1, 2]);
```

### Consultando relaciones

```php
// Obtener todas las etiquetas de un trabajo
$job->tags;

// Obtener todos los trabajos de una etiqueta
$phpTag = App\Models\Tag::find(1);
$phpTag->jobs;

// Verificar si un trabajo tiene una etiqueta específica
$job->tags->contains($phpTag);
```

## Métodos útiles para relaciones Many-to-Many

### Métodos de manipulación

```php
// Asociar etiquetas (mantiene las existentes)
$job->tags()->attach([1, 2, 3]);

// Desasociar etiquetas específicas
$job->tags()->detach([1, 2]);

// Desasociar todas las etiquetas
$job->tags()->detach();

// Sincronizar (reemplaza todas las etiquetas)
$job->tags()->sync([1, 2, 3]);

// Alternar etiquetas (asocia las que no están, desasocia las que sí)
$job->tags()->toggle([1, 2, 3]);
```

### Métodos de consulta

```php
// Contar etiquetas de un trabajo
$job->tags()->count();

// Verificar si tiene etiquetas
$job->tags()->exists();

// Obtener trabajos que tienen etiquetas específicas
$jobsWithPHP = App\Models\Job::whereHas('tags', function($query) {
    $query->where('name', 'PHP');
})->get();
```

## Conceptos clave

- **Tabla Pivot**: Tabla intermedia que conecta dos modelos en relaciones many-to-many
- **belongsToMany**: Método para definir relaciones muchos a muchos
- **foreignPivotKey**: Clave foránea del modelo actual en la tabla pivot
- **relatedPivotKey**: Clave foránea del modelo relacionado en la tabla pivot
- **Restricciones en cascada**: `cascadeOnDelete()` elimina automáticamente relaciones cuando se elimina un modelo
- **Integridad referencial**: `constrained()` garantiza que las claves foráneas sean válidas

## Beneficios de las relaciones Many-to-Many

1. **Flexibilidad**: Permite relaciones complejas entre modelos
2. **Normalización**: Evita duplicación de datos
3. **Integridad**: Mantiene consistencia en la base de datos
4. **Eficiencia**: Optimiza consultas y almacenamiento
5. **Escalabilidad**: Facilita el crecimiento de la aplicación.

## Capítulo 13: Eager Loading and the N+1 Problem

### Mejorando la Vista de Trabajos

### Actualización de jobs.blade.php

Comenzamos mejorando la presentación de nuestra vista de trabajos. Navegamos al archivo `resources/views/jobs.blade.php` y reemplazamos el código existente por:

```blade
<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job)
        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
            <div>
                <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
            </div>
        </a>
        @endforeach
    </div>
</x-layout>
```

Este cambio hace que nuestra vista se vea más elegante y profesional, con un diseño de tarjetas que mejora la experiencia del usuario.

## Instalación de Laravel Debugbar

Para monitorear el rendimiento de nuestra aplicación, especialmente las consultas a la base de datos, instalamos Laravel Debugbar:

```bash
composer require barryvdh/laravel-debugbar --dev
```

### Configuración del Debug

Es importante asegurarse de que el debugging esté habilitado en el archivo `.env`:

```env
APP_DEBUG=true
```

Una vez instalado, veremos una barra de depuración en la parte inferior de nuestras páginas que nos proporciona información valiosa sobre:
- Consultas a la base de datos
- Tiempo de respuesta
- Uso de memoria
- Variables de sesión
- Y mucho más

## Optimización con Eager Loading

### Problema del N+1 Query

Inicialmente, nuestra ruta en `routes/web.php` tenía un problema de rendimiento conocido como "N+1 Query Problem":

```php
Route::get('/jobs', function () {
    $jobs = Job::all(); // Una consulta para obtener todos los jobs
    return view('jobs', [
        'jobs' => $jobs
    ]);
});
```

Con este código, cuando mostramos `$job->employer->name` en la vista, Laravel ejecuta una consulta adicional por cada trabajo para obtener el empleador correspondiente.

### Solución: Eager Loading

Para solucionar este problema, actualizamos la ruta para usar **eager loading**:

```php
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->get();
    return view('jobs', [
        'jobs' => $jobs
    ]);
});
```

El método `with('employer')` le dice a Laravel que cargue la relación `employer` junto con los trabajos en una sola consulta adicional, reduciendo significativamente el número de consultas a la base de datos.

## Prevención de Lazy Loading

### Configuración en AppServiceProvider

Para detectar y prevenir problemas de lazy loading durante el desarrollo, añadimos la siguiente configuración en `app/Providers/AppServiceProvider.php`:

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Model::preventLazyLoading();
    }
}
```

### Beneficios de Prevenir Lazy Loading

- **Detección temprana**: Nos alerta cuando estamos haciendo consultas lazy loading no intencionadas
- **Mejor rendimiento**: Nos fuerza a ser explícitos sobre qué relaciones necesitamos cargar
- **Código más limpio**: Hace que nuestro código sea más predecible y fácil de optimizar

## Impacto en el Rendimiento

Con la implementación de eager loading, observamos una mejora significativa en el rendimiento:

- **Antes**: N+1 consultas (1 consulta para trabajos + 1 consulta por cada trabajo para obtener el empleador)
- **Después**: 2 consultas totales (1 para trabajos + 1 para todos los empleadores)

Esta optimización es especialmente importante cuando tenemos muchos registros, ya que la diferencia puede ser dramática (por ejemplo, de 101 consultas a solo 2 consultas para 100 trabajos).

### Episodio 14 - All You Need to Know About Pagination

### Introducción a la paginación

La paginación es una característica esencial en aplicaciones web que permite dividir grandes conjuntos de datos en páginas más pequeñas y manejables. Laravel proporciona un sistema de paginación integrado y fácil de implementar.

### Modificando la ruta Jobs

Actualizamos la ruta en `web.php` para implementar paginación:

```php
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(3);
    return view('jobs', [
        'jobs' => $jobs
    ]);
});
```

Este código:
- Recupera 3 registros de trabajos por página
- Incluye los empleadores usando eager loading para evitar el problema N+1
- Utiliza el método `paginate()` en lugar de `all()`

### Actualizando la vista Jobs

Modificamos el archivo `jobs.blade.php` para incluir los enlaces de paginación:

```blade
<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job)
        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
            <div>
                <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
            </div>
        </a>
        @endforeach
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
```

**Cambios principales:**
- Agregamos `{{ $jobs->links() }}` para mostrar los enlaces de paginación
- Mantenemos la estructura del loop `@foreach` existente
- Los enlaces se muestran debajo de la lista de trabajos

### Personalizar las vistas de paginación

Si deseas modificar el diseño o usar otro framework como Bootstrap, puedes publicar las vistas:

```bash
php artisan vendor:publish --tag=laravel-pagination
```

Esto copiará las vistas a:
```
resources/views/vendor/pagination
```

### Usando Bootstrap en lugar de Tailwind

Para cambiar el framework CSS de paginación, agrega esto en `AppServiceProvider`:

```php
use Illuminate\Pagination\Paginator;

public function boot()
{
    Paginator::useBootstrapFive();
}
```

### Tipos de paginación

Laravel ofrece diferentes tipos de paginación según tus necesidades:

| Tipo | Descripción | Método |
|------|-------------|---------|
| **Paginación estándar** | Números de página + enlaces prev/sig | `paginate()` |
| **Simple** | Solo muestra "Anterior" y "Siguiente" | `simplePaginate()` |
| **Cursor** | Usa un cursor codificado, más eficiente | `cursorPaginate()` |

**Ejemplos de uso:**

```php
// Paginación simple
Job::with('employer')->simplePaginate(3);

// Paginación con cursor
Job::with('employer')->cursorPaginate(3);
```

### Funcionamiento interno

- **`paginate()`**: Utiliza `LIMIT` y `OFFSET` en SQL para obtener los registros
- **`cursorPaginate()`**: Evita el uso de `OFFSET` y mejora el rendimiento con grandes volúmenes de datos, especialmente útil para datasets que crecen constantemente

### Conceptos clave del episodio

- **Paginación automática**: Laravel maneja automáticamente los parámetros de consulta
- **Eager loading**: Combinación con `with()` para optimizar consultas
- **Flexibilidad**: Múltiples tipos de paginación según las necesidades
- **Personalización**: Posibilidad de modificar el diseño y comportamiento
- **Rendimiento**: Diferentes estrategias para diferentes casos de uso

## Episodio 15 - Understanding Database Seeders

En este episodio, se introduce el concepto de "seeders" en Laravel, que son clases utilizadas para poblar la base de datos con datos iniciales. Se muestra cómo crear un seeder para el modelo `Job` y `User` y cómo utilizarlo para generar múltiples registros en la tabla `jobs_listings`.

### Creación de un Seeder para el modelo `Job`

```bash
php artisan make:seeder JobSeeder
```
### Implementación del Seeder
```php
public function run(): void
    {
        Job::factory(100)->create();
    }
```
### Uso del Seeder en `DatabaseSeeder.php`
```php
public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Guillermo',
            'last_name' => 'Solórzano',
            'email' => 'test@example.com',
        ]);

        $this->call(JobSeeder::class);
    }
```

### Ejecución del Seeder
+ Para ejecutar el seeder y poblar la base de datos, utiliza el siguiente comando:
```bash
php artisan db:seed
```
+ Para reiniciar la base de datos y volver a ejecutar todos los seeders, puedes usar el siguiente comando:
```bash
php artisan migrate:fresh --seed
```
+ Para ejecutar un seeder específico, puedes usar el siguiente comando:
```bash
php artisan db:seed --class=JobSeeder
```

### Verificación de los datos insertados
Puedes verificar los datos insertados en la base de datos desde DBeaver:
![Datos](./images/16.PNG)

## Episodio 15 - Understanding Database Seeders

### Introducción a los Seeders

Los **seeders** en Laravel permiten poblar la base de datos con datos de prueba de forma automatizada. Son útiles para desarrollo, pruebas y creación rápida de entornos consistentes.

---

### Creando un seeder para el modelo Job

Ejecutamos el comando para generar un seeder:

```bash
php artisan make:seeder JobSeeder
```

Esto creará un archivo en: `database/seeders/JobSeeder.php`.

---

### Implementando el JobSeeder

Editamos el archivo generado para usar la factory de `Job` y crear múltiples registros:

```php
use App\Models\Job;

public function run(): void
{
    Job::factory(100)->create();
}
```

Esto genera 100 trabajos usando datos falsos.

---

### Usando el seeder en DatabaseSeeder

Editamos el archivo `database/seeders/DatabaseSeeder.php` para llamar a `JobSeeder` y generar también un usuario de ejemplo:

```php
use App\Models\User;
use Illuminate\Database\Seeder;

public function run(): void
{
    // Crear un usuario de prueba
    User::factory()->create([
        'first_name' => 'Guillermo',
        'last_name' => 'Solórzano',
        'email' => 'test@example.com',
    ]);

    // Llamar al seeder de trabajos
    $this->call(JobSeeder::class);
}
```

---

### Ejecutando los seeders

#### 1. Ejecutar todos los seeders
```bash
php artisan db:seed
```

#### 2. Ejecutar un seeder específico
```bash
php artisan db:seed --class=JobSeeder
```

#### 3. Reiniciar base de datos y seedear desde cero
```bash
php artisan migrate:fresh --seed
```

Este comando elimina todas las tablas, las migra de nuevo y ejecuta los seeders.

### Verificando los datos

Podemos inspeccionar los datos generados usando herramientas como DBeaver o el comando:

```php
App\Models\Job::count();
```

Con DBeaver

![Datos creados con seeders](./images/16.PNG "Datos creados por seeders")

### Conceptos clave del episodio

- **Seeders**: Automatizan la inserción de datos de prueba
- **Factories + Seeders**: Combinación poderosa para poblar modelos relacionados
- **DatabaseSeeder**: Punto de entrada para ejecutar múltiples seeders
- **Datos consistentes**: Facilitan pruebas repetibles y entornos de desarrollo confiables

---

### Beneficios del uso de Seeders

1. **Agiliza el desarrollo**: Crea entornos completos en segundos  
2. **Facilita testing**: Proporciona datos para pruebas automatizadas  
3. **Evita errores humanos**: No requiere inserciones manuales  
4. **Escenarios realistas**: Genera múltiples combinaciones de datos  
5. **Repetibilidad**: Reestablece siempre los mismos datos en todos los equipos

# Unidad III - Forms

## Episodio 16 - Forms and CSRF

### Introducción a los Formularios y CSRF en Laravel

En este episodio, exploramos cómo utilizar formularios en Laravel para crear nuevos registros en la base de datos, específicamente para el modelo `Job`. También abordamos la protección CSRF (Cross-Site Request Forgery) que Laravel implementa para garantizar la seguridad de los formularios.

### Modificando el archivo de rutas

Modifica el archivo `routes/web.php` para incluir nuevas rutas relacionadas con el modelo `Job`. Estas rutas permiten listar trabajos, mostrar un trabajo individual y crear nuevos trabajos.

**Archivo:** `routes/web.php`

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function () {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // validation...
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
```

**Detalles de las rutas:**
- **Ruta `/jobs`**: Utiliza `simplePaginate(3)` para mostrar 3 trabajos por página, con eager loading de la relación `employer` para optimizar las consultas.
- **Ruta `/jobs/create`**: Muestra un formulario para crear un nuevo trabajo.
- **Ruta `/jobs/{id}`**: Muestra los detalles de un trabajo específico según su ID.
- **Ruta POST `/jobs`**: Procesa el formulario para crear un nuevo trabajo, asignando temporalmente un `employer_id` fijo (esto se mejorará en futuros episodios).

### Reorganizando las vistas

Crea una carpeta `jobs` dentro de `resources/views` para organizar las vistas relacionadas con trabajos. Mueve y renombra los archivos existentes de la siguiente manera:

- `jobs.blade.php` → `resources/views/jobs/index.blade.php`
- `job.blade.php` → `resources/views/jobs/show.blade.php`

### Actualizando el modelo Job

En el archivo `app/Models/Job.php`, reemplaza la propiedad `$fillable` por `$guarded` para permitir la asignación masiva de todos los campos:

**Antes:**
```php
protected $fillable = ['title', 'salary'];
```

**Después:**
```php
protected $guarded = [];
```

**Nota de seguridad:** Usar `$guarded = []` permite la asignación masiva de todos los campos, lo cual es práctico para pruebas rápidas. Sin embargo, en entornos de producción, se recomienda usar `$fillable` para especificar explícitamente los campos permitidos y evitar vulnerabilidades de seguridad.

### Creando el formulario para nuevos trabajos

Crea una nueva vista `create.blade.php` en `resources/views/jobs/` para permitir a los usuarios crear nuevos trabajos mediante un formulario:

**Archivo:** `resources/views/jobs/create.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Shift Leader">
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="salary" id="salary" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="$50,000 Per Year">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layout>
```

**Detalles del formulario:**
- **Método POST**: Envía los datos al servidor utilizando el método HTTP POST.
- **Directiva `@csrf`**: Genera un token CSRF para proteger el formulario contra ataques de Cross-Site Request Forgery.
- **Campos**: Incluye campos para `title` y `salary`, estilizados con Tailwind CSS para una apariencia moderna y responsiva.
- **Botones**: Contiene un botón "Cancel" (sin funcionalidad por ahora) y un botón "Save" para enviar el formulario.

### Protección CSRF en Laravel

Laravel proporciona protección automática contra ataques CSRF. La directiva `@csrf` en el formulario genera un token único que el servidor valida para asegurar que la solicitud proviene de la aplicación legítima. Esta protección es obligatoria para formularios que utilizan métodos como POST, PUT o DELETE.

### Conceptos clave del episodio

- **Rutas para formularios**: Define rutas GET para mostrar formularios y POST para procesar los datos enviados.
- **Organización de vistas**: Agrupa las vistas relacionadas en una carpeta `jobs` para una mejor estructura.
- **Asignación masiva**: Utiliza `$fillable` o `$guarded` para controlar qué campos se pueden asignar masivamente en los modelos Eloquent.
- **Protección CSRF**: Implementa la directiva `@csrf` para asegurar la seguridad de los formularios.
- **Diseño con Tailwind**: Crea formularios con una interfaz moderna y responsiva usando Tailwind CSS.

### Beneficios de los cambios realizados

1. **Funcionalidad de creación**: Permite a los usuarios crear nuevos trabajos directamente desde la interfaz web.
2. **Seguridad**: La protección CSRF garantiza que las solicitudes sean legítimas y seguras.
3. **Organización**: Las vistas relacionadas con trabajos están organizadas en una carpeta dedicada.
4. **Escalabilidad**: La estructura actual facilita la adición de funcionalidades futuras, como validaciones de formulario.
5. **Experiencia de usuario**: El formulario utiliza Tailwind CSS para ofrecer un diseño profesional y consistente.

![Imagen del Episodio 16](./images/17.PNG "Vista del formulario para crear un trabajo")

## Episodio 17 - Always Validate. Never Trust the User

### Introducción a la Validación en Laravel

En este episodio, aprendemos la importancia de validar siempre los datos enviados por los usuarios antes de procesarlos, siguiendo el principio de "Never Trust the User". Modificamos la ruta POST de trabajos y la vista del formulario para incluir validación básica y mostrar errores al usuario.

### Modificando la ruta POST de trabajos

Edita el archivo `routes/web.php` para agregar validación a la ruta POST `/jobs`.

**Archivo:** `routes/web.php`

```php
Route::post('/jobs', function () {
    // validation...
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});
```

**Detalles de la validación:**
- **`title`**: Requiere que el campo sea obligatorio (`required`) y tenga al menos 3 caracteres (`min:3`).
- **`salary`**: Requiere que el campo sea obligatorio (`required`).
- Si la validación falla, Laravel automáticamente redirige al formulario con los errores correspondientes.

### Modificando la vista create.blade.php

Edita la vista `create.blade.php` ubicada en `resources/views/jobs/` para mostrar los errores de validación y marcar los campos como obligatorios.

**Archivo:** `resources/views/jobs/create.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" required>
                            </div>

                            @error('title')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="salary" id="salary"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="$50,000 Per Year" required>
                            </div>

                            @error('salary')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Método alternativo para mostrar errores (comentado) -->
                <!-- 
                <div class="mt-10">
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-500 italic">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                -->
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layout>
```

**Detalles de la vista:**
- **`required`**: Agrega el atributo `required` a los campos `title` y `salary` para indicar que son obligatorios en el cliente.
- **`@error`**: Muestra mensajes de error personalizados debajo de cada campo si la validación falla, utilizando Tailwind CSS para estilizar los mensajes en rojo.
- **Método alternativo comentado**: Incluye un ejemplo alternativo para mostrar todos los errores en una lista, aunque se prefiere el enfoque por campo para una mejor experiencia de usuario.

### Modificando el layout para incluir el botón "Create Job"

Edita el archivo `layout.blade.php` en `resources/views/components/` para agregar un botón que redirija a la vista de creación de trabajos.

**Archivo:** `resources/views/components/layout.blade.php`

```blade
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://assets.laracasts.com/images/primary-logo-symbol.svg"
                                alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button"
                                class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="https://laracasts.com/images/forum/lary-ai-avatar.svg?v=2" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://laracasts.com/images/lary-ai-face.svg"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Lary Robot</div>
                            <div class="text-sm font-medium leading-none text-gray-400">jeffrey@laracasts.com</div>
                        </div>
                        <button type="button"
                            class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
                <x-button href="/jobs/create">Create Job</x-button>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
```

### Creando el componente button.blade.php

Crea un nuevo componente `button.blade.php` en `resources/views/components/` para estilizar el botón de manera reusable.

**Archivo:** `resources/views/components/button.blade.php`

```blade
<a {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300']) }}>{{ $slot }}</a>
```

**Detalles del componente:**
- Utiliza `$attributes->merge()` para combinar clases personalizadas con estilos predeterminados de Tailwind CSS.
- El componente es adaptable a temas claro y oscuro, con transiciones suaves para mejorar la experiencia de usuario.

### Resultado visual

El botón "Create Job" aparece en la página de trabajos, y el formulario requiere que se llenen los campos `title` y `salary` para evitar errores de validación.

![Imagen del Episodio 17](./images/18.PNG "Existencia del botón crear trabajo en Jobs y el requerimiento de llenar campos")

### Conceptos clave del episodio

- **Validación de datos**: Usa `request()->validate()` para asegurar que los datos cumplan con las reglas definidas.
- **Errores en formularios**: Implementa `@error` para mostrar mensajes de validación debajo de cada campo.
- **Seguridad**: Nunca confíes en los datos del usuario sin validarlos primero.
- **Componentes reutilizables**: Crea componentes como `button.blade.php` para mantener consistencia en el diseño.
- **Experiencia de usuario**: Mejora la interfaz con botones y validaciones visibles.

### Beneficios de los cambios realizados

1. **Seguridad mejorada**: La validación previene la inserción de datos inválidos en la base de datos.
2. **Feedback al usuario**: Los mensajes de error guían al usuario para corregir los campos.
3. **Consistencia visual**: El componente de botón mejora la apariencia y reusabilidad en toda la aplicación.
4. **Accesibilidad**: El botón "Create Job" facilita la creación de nuevos trabajos desde la vista principal.
5. **Mantenibilidad**: La estructura modular permite ajustes futuros sin afectar otras partes del código.

## Episodio 18 - Editing, Updating, and Deleting a Resource

### Introducción a la Gestión de Recursos en Laravel

En este episodio, implementamos funcionalidades para editar, actualizar y eliminar recursos del modelo `Job` utilizando rutas GET, PATCH y DELETE. También creamos y actualizamos las vistas correspondientes para gestionar estas acciones.

### Modificando el archivo web.php

Edita el archivo `routes/web.php` para agregar rutas de edición, actualización y eliminación de trabajos.

**Archivo:** `routes/web.php`

```php
// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // authorize (On hold...)

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    // authorize (On hold...)

    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});
```

**Detalles de las rutas:**
- **GET `/jobs/{id}/edit`**: Muestra un formulario de edición para un trabajo específico.
- **PATCH `/jobs/{id}`**: Valida y actualiza los datos de un trabajo existente, redirigiendo a la vista del trabajo actualizado.
- **DELETE `/jobs/{id}`**: Elimina un trabajo y redirige a la lista de trabajos.
- **Nota**: La autorización (`authorize`) está pendiente de implementación en episodios futuros.

### Actualizando la vista show.blade.php

Edita el archivo `show.blade.php` en `resources/views/jobs/` para incluir un botón de edición.

**Archivo:** `resources/views/jobs/show.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>

    <p>
        This job pays {{ $job->salary }} per year.
    </p>

    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    </p>
</x-layout>
```

**Detalles de la vista:**
- Agrega un botón "Edit Job" que enlaza a la ruta de edición del trabajo específico.

### Creando la vista edit.blade.php

Crea un nuevo archivo `edit.blade.php` en `resources/views/jobs/` para el formulario de edición.

**Archivo:** `resources/views/jobs/edit.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader"
                                    value="{{ $job->title }}"
                                    required>
                            </div>

                            @error('title')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="salary"
                                    id="salary"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="$50,000 Per Year"
                                    value="{{ $job->salary }}"
                                    required>
                            </div>

                            @error('salary')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
            </div>

            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                <div>
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
```

**Detalles de la vista:**
- **Formulario de edición**: Usa `PATCH` para actualizar el trabajo, con campos prellenados con los valores actuales.
- **Validación**: Incluye las mismas reglas de validación que en la creación (`required`, `min:3` para `title`).
- **Botones**: Incluye "Update" para guardar cambios, "Cancel" para regresar, y "Delete" para eliminar el trabajo.
- **Formulario oculto**: Un formulario `DELETE` oculto se activa con el botón "Delete".

### Actualizando el componente button.blade.php

Edita el archivo `button.blade.php` en `resources/views/components/` para quitar el margen izquierdo.

**Archivo:** `resources/views/components/button.blade.php`

```blade
<a {{ $attributes->merge(['class' => 'relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300']) }}>{{ $slot }}</a>
```

**Detalles del componente:**
- Elimina `ml-3` del atributo `class` para ajustar el espaciado del botón según el contexto.

![Imagen del Episodio 18](./images/19.PNG "Editar, Eliminar y Actualizar")

### Conceptos clave del episodio

- **Rutas CRUD**: Implementa rutas para editar, actualizar y eliminar recursos.
- **Métodos HTTP**: Usa `GET`, `PATCH`, y `DELETE` para gestionar recursos de manera adecuada.
- **Validación persistente**: Aplica las mismas reglas de validación en la edición que en la creación.
- **Formularios ocultos**: Utiliza `@method('DELETE')` para manejar eliminaciones desde un formulario.
- **Reusabilidad**: Actualiza el componente de botón para mayor flexibilidad en el diseño.

### Beneficios de los cambios realizados

1. **Gestión completa**: Permite editar, actualizar y eliminar trabajos de forma eficiente.
2. **Seguridad**: La validación asegura datos consistentes al actualizar.
3. **Experiencia de usuario**: Botones claros y formularios intuitivos mejoran la interacción.
4. **Modularidad**: El componente de botón adaptado facilita su uso en diferentes contextos.
5. **Escalabilidad**: La estructura soporta futuras mejoras, como la autorización pendiente.

## Episodio 19 - Routes Reloaded - 6 Essential Tips

### Introducción a la Reorganización de Rutas

En este episodio, reorganizamos la gestión de rutas introduciendo un controlador `JobController` para centralizar la lógica de la aplicación. Además, exploramos seis consejos esenciales para optimizar y estructurar las rutas de manera efectiva, mejorando la escalabilidad y el mantenimiento del proyecto.

### Creación del Controlador `JobController`

Crea un nuevo archivo `JobController.php` en `app/Http/Controllers/` para manejar las operaciones relacionadas con los trabajos.

**Archivo:** `app/Http/Controllers/JobController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        // authorize (On hold...)

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        // authorize (On hold...)

        $job->delete();

        return redirect('/jobs');
    }
}
```

**Detalles del controlador:**
- **Método `index`**: Lista los trabajos con eager loading de `employer`, ordenados por fecha descendente y paginados con 3 elementos.
- **Método `create`**: Muestra el formulario de creación.
- **Método `show`**: Muestra los detalles de un trabajo específico.
- **Método `store`**: Valida y crea un nuevo trabajo con `employer_id` fijo en 1.
- **Método `edit`**: Muestra el formulario de edición.
- **Método `update`**: Valida y actualiza un trabajo existente.
- **Método `destroy`**: Elimina un trabajo.
- **Nota**: La autorización sigue pendiente.

### Modificación de las rutas en `web.php`

Actualiza el archivo `routes/web.php` para utilizar el controlador recién creado.

**Archivo:** `routes/web.php`

```php
<?php
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobController::class);
```

**Detalles de las rutas:**
- **`Route::resource('jobs', JobController::class)`**: Define todas las rutas CRUD (index, create, store, show, edit, update, destroy) para el recurso `jobs`.

### Seis Consejos Esenciales para Rutas
1. **Usa Controladores**: Centraliza la lógica en controladores para mantener las rutas limpias y escalables.
2. **Eager Loading**: Aplica `with('employer')` para evitar problemas de lazy loading y mejorar el rendimiento.
3. **Paginación Inteligente**: Implementa `simplePaginate()` para manejar grandes listas de datos eficientemente.
4. **Validación en Controladores**: Realiza la validación dentro de los métodos del controlador para mantener la consistencia.
5. **Inyección de Dependencias**: Usa `Job $job` para simplificar el manejo de modelos en las acciones.
6. **Redirecciones Consistentes**: Mantén un flujo lógico con redirecciones a URLs o rutas nombradas según el contexto.

### Resultado visual
- La lista de trabajos en `jobs/index.blade.php` ahora muestra los empleadores y está paginada.
- Los formularios en `jobs/create.blade.php` y `jobs/edit.blade.php` funcionan con las nuevas rutas generadas.

![Imagen del Episodio 19](./images/20.PNG "Se muestran los empleados, junto a los trabajos")

### Conceptos clave del episodio
- **Controladores**: Mejoran la organización al separar la lógica de las rutas.
- **Eager Loading**: Evita errores de carga diferida con `with()`.
- **Paginación**: Facilita la navegación con `simplePaginate()`.
- **Rutas de Recursos**: `Route::resource()` simplifica la definición de rutas CRUD.

### Beneficios de los cambios realizados
1. **Escalabilidad**: Los controladores preparan el código para futuras expansiones.
2. **Rendimiento**: El eager loading y la paginación optimizan las consultas.
3. **Mantenimiento**: La lógica centralizada facilita las actualizaciones.
4. **Consistencia**: Las rutas y validaciones están estandarizadas.
5. **Usabilidad**: La paginación mejora la experiencia del usuario.

# Unidad IV - Authentication

## Episodio 20 - Starter Kits, Breeze, and Middleware

### Introducción a Starter Kits y Laravel Breeze

En este episodio, exploramos los starter kits de Laravel, con un enfoque en Laravel Breeze, una herramienta que proporciona una autenticación rápida y completa. También introducimos el concepto de middleware, un componente clave para proteger rutas y gestionar flujos de autenticación. Estos conceptos serán fundamentales para implementar autenticación en proyectos futuros.

### ¿Qué es Laravel Breeze?

Laravel Breeze es un starter kit que ofrece funcionalidades de autenticación preconfiguradas, incluyendo:
- Registro de usuarios
- Inicio de sesión
- Restablecimiento de contraseñas
- Gestión de perfil

### Métodos de Instalación

#### Opción 1: Proyecto Nuevo con Breeze
Crea un nuevo proyecto Laravel con Breeze desde cero:
```bash
laravel new app
```
Durante la instalación, selecciona Breeze como starter kit cuando se te solicite.

#### Opción 2: Instalación en Proyecto Existente
Instala Breeze manualmente en un proyecto existente:
```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
php artisan migrate
```

### Opciones de Frontend
Breeze soporta varios stacks de frontend:
- Blade con JavaScript (tradicional)
- React con Inertia.js
- Vue con Inertia.js
- Livewire
Para este tutorial, se recomienda el stack de Blade sin modo oscuro.

### Comandos para Ejecutar la Aplicación
- Usando el servidor de desarrollo de Laravel:
  ```bash
  php artisan serve
  ```
- Con Laravel Herd, accede directamente via URL local.

### Funcionalidades Incluidas
1. **Formularios de Registro y Login**: Validación automática, hash seguro de contraseñas y manejo de errores.
2. **Dashboard Protegido**: Accesible solo para usuarios autenticados con redirección automática.
3. **Gestión de Perfil**: Edición de datos personales, actualización de contraseñas y eliminación de cuenta.
4. **Funcionalidad de Logout**: Cierre seguro de sesión y limpieza de datos.
5. **Middleware de Protección**: Rutas protegidas con redirección de invitados.

### Cómo Funciona la Autenticación

#### Middleware de Protección
Ejemplo de uso de middleware en rutas:
```php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
```

#### Acceso al Usuario Autenticado
- Usando el facade `Auth`:
  ```php
  $user = Auth::user();
  ```
- Usando el helper `auth()`:
  ```php
  $user = auth()->user();
  ```
- En Blade:
  ```blade
  @auth
      Bienvenido, {{ auth()->user()->name }}!
  @endauth
  ```

#### Componentes Blade Incluidos
Breeze proporciona componentes reutilizables:
- Layouts: `<x-app-layout>`, `<x-guest-layout>`
- Formularios: `<x-input-label>`, `<x-text-input>`, `<x-primary-button>`
- Errores: `<x-input-error>`

### Estructura de Archivos Creados
- **Controladores**: `app/Http/Controllers/Auth/AuthenticatedSessionController.php`, `ConfirmablePasswordController.php`, etc.
- **Vistas**: `resources/views/auth/login.blade.php`, `register.blade.php`, etc.
- **Perfiles**: `resources/views/profile/edit.blade.php`, `partials/`

### Middleware Explicado
- **`auth`**: Verifica si el usuario está autenticado y redirige al login si no lo está.
- **`verified`**: Comprueba si el email está verificado y redirige a la verificación si no lo está.

### Rutas Creadas Automáticamente
Ejemplo en `routes/auth.php`:
```php
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    // Más rutas...
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Más rutas protegidas...
});
```

### Comandos Útiles Post-Instalación
- Ver todas las rutas:
  ```bash
  php artisan route:list
  ```
- Ver rutas específicas:
  ```bash
  php artisan route:list --name=login
  php artisan route:list --name=register
  ```
- Limpiar caché:
  ```bash
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

### Comandos de Verificación
- Estado de migraciones:
  ```bash
  php artisan migrate:status
  ```
- Contar usuarios:
  ```bash
  php artisan tinker
  >>> User::count()
  ```
- Ver logs:
  ```bash
  tail -f storage/logs/laravel.log
  ```

### Ventajas de Usar Breeze
1. **Ahorro de Tiempo**: Autenticación lista sin empezar de cero.
2. **Mejores Prácticas**: Implementa seguridad y estructura estándar.
3. **Educacional**: Código fuente para aprender autenticación.
4. **Personalizable**: Base sólida para modificaciones.

### Próximos Pasos
En el siguiente episodio, exploraremos la autenticación manual, conceptos subyacentes y personalización del sistema.

### Conceptos clave del episodio
- **Starter Kits**: Herramientas como Breeze aceleran el desarrollo.
- **Breeze**: Proporciona autenticación preconfigurada.
- **Middleware**: Filtra y protege las rutas de la aplicación.

### Beneficios de los cambios realizados
1. **Preparación**: Introduce herramientas para autenticación futura.
2. **Aprendizaje**: Conceptos clave para entender Laravel.
3. **Flexibilidad**: Base para personalizar autenticación.
4. **Seguridad**: Mejores prácticas integradas.

# Episodio 21 - Make a Login and Registration System From Scratch: Part 1

## Introducción al Sistema de Autenticación Personalizado

En este episodio, comenzamos a construir un sistema de autenticación desde cero para nuestra aplicación Laravel, enfocándonos en las funcionalidades de registro e inicio de sesión. Implementamos rutas, vistas, controladores y componentes reutilizables para formularios, siguiendo una estructura modular y estilizada con Tailwind CSS. Este episodio sienta las bases para un sistema de autenticación flexible, que se completará en capítulos futuros con validaciones, hash de contraseñas y manejo de sesiones.

## Modificando el Archivo de Rutas

Actualizamos el archivo `routes/web.php` para incluir las rutas necesarias para el registro y el inicio de sesión, utilizando controladores específicos para manejar estas acciones.

**Archivo:** `routes/web.php`

```php
<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
```

**Detalles de las rutas:**
- **`Route::get('/register', ...)`**: Muestra el formulario de registro.
- **`Route::post('/register', ...)`**: Procesa los datos enviados desde el formulario de registro.
- **`Route::get('/login', ...)`**: Muestra el formulario de inicio de sesión.
- **`Route::post('/login', ...)`**: Procesa los datos enviados desde el formulario de inicio de sesión.
- **Controladores**: Usa `RegisteredUserController` para registro y `SessionController` para inicio de sesión.

## Actualizando el Layout Principal

Modificamos el archivo `resources/views/components/layout.blade.php` para incluir enlaces dinámicos de autenticación (Log In y Register) en la barra de navegación, visibles solo para usuarios no autenticados.

**Archivo:** `resources/views/components/layout.blade.php`

```blade
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://laracasts.com/images/logo/logo-triangle.svg"
                             alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                            <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        @guest
                            <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                        @endguest
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://laracasts.com/images/lary-ai-face.svg"
                             alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">Lary Robot</div>
                        <div class="text-sm font-medium leading-none text-gray-400">jeffrey@laracasts.com</div>
                    </div>
                    <button type="button"
                            class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            <x-button href="/jobs/create">Create Job</x-button>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
```

**Detalles del layout:**
- **Directiva `@guest`**: Muestra los enlaces "Log In" y "Register" solo si el usuario no está autenticado.
- **Componente `<x-nav-link>`**: Reutiliza el componente de navegación para mantener consistencia en el diseño.
- **Tailwind CSS**: Estiliza la barra de navegación con un diseño moderno y responsivo.

## Creando Componentes Reutilizables para Formularios

Creamos una serie de componentes Blade en `resources/views/components/` para estandarizar los formularios de autenticación y creación de trabajos, asegurando consistencia en el diseño.

### `form-button.blade.php`

**Archivo:** `resources/views/components/form-button.blade.php`

```blade
<button {{ $attributes->merge(['class' => 'rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600', 'type' => 'submit']) }}>
    {{ $slot }}
</button>
```

**Detalles:**
- Define un botón de envío estilizado con Tailwind CSS.
- Usa `$attributes->merge()` para combinar clases predeterminadas con personalizaciones.

### `form-error.blade.php`

**Archivo:** `resources/views/components/form-error.blade.php`

```blade
@props(['name'])

@error($name)
    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
@enderror
```

**Detalles:**
- Muestra mensajes de error de validación para un campo específico, estilizados en rojo.

### `form-field.blade.php`

**Archivo:** `resources/views/components/form-field.blade.php`

```blade
<div class="sm:col-span-4">
    {{ $slot }}
</div>
```

**Detalles:**
- Define un contenedor para campos de formulario, compatible con la cuadrícula de Tailwind CSS.

### `form-input.blade.php`

**Archivo:** `resources/views/components/form-input.blade.php`

```blade
<div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
    <input {{ $attributes->merge(['class' => 'block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6']) }}>
</div>
```

**Detalles:**
- Define un campo de entrada estilizado, con soporte para atributos dinámicos como `type` y `required`.

### `form-label.blade.php`

**Archivo:** `resources/views/components/form-label.blade.php`

```blade
<label {{ $attributes->merge(['class' => 'block text-sm font-medium leading-6 text-gray-900']) }}>{{ $slot }}</label>
```

**Detalles:**
- Define una etiqueta para campos de formulario, estilizada para consistencia.

## Creando Vistas de Autenticación

Creamos una carpeta `auth` en `resources/views/` para almacenar las vistas relacionadas con autenticación.

### Formulario de Inicio de Sesión - `login.blade.php`

**Archivo:** `resources/views/auth/login.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" required />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Log In</x-form-button>
        </div>
    </form>
</x-layout>
```

**Detalles:**
- Usa componentes reutilizables (`x-form-field`, `x-form-label`, `x-form-input`, `x-form-error`, `x-form-button`).
- Incluye `@csrf` para protección contra ataques CSRF.
- Campos `email` y `password` son obligatorios (`required`).

### Formulario de Registro - `register.blade.php`

**Archivo:** `resources/views/auth/register.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" required />
                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" required />
                            <x-form-error name="last_name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" required />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />
                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>
</x-layout>
```

**Detalles:**
- Incluye campos para `first_name`, `last_name`, `email`, `password`, y `password_confirmation`.
- Usa componentes reutilizables para mantener consistencia con el formulario de inicio de sesión.
- Incluye `@csrf` para seguridad.

## Creando Controladores de Autenticación

Creamos dos controladores en `app/Http/Controllers/` para manejar la lógica de registro e inicio de sesión.

### `RegisteredUserController.php`

**Archivo:** `app/Http/Controllers/RegisteredUserController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        dd(request()->all());
    }
}
```

**Detalles:**
- **Método `create`**: Retorna la vista del formulario de registro.
- **Método `store`**: Actualmente usa `dd()` para depurar los datos enviados; se implementará la lógica de registro en futuros episodios.

### `SessionController.php`

**Archivo:** `app/Http/Controllers/SessionController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        dd(request()->all());
    }
}
```

**Detalles:**
- **Método `create`**: Retorna la vista del formulario de inicio de sesión.
- **Método `store`**: Actualmente usa `dd()` para depurar; se implementará la lógica de autenticación más adelante.

## Actualizando el Formulario de Creación de Trabajos

Modificamos el archivo `resources/views/jobs/create.blade.php` para usar los componentes reutilizables creados, asegurando consistencia con los formularios de autenticación.

**Archivo:** `resources/views/jobs/create.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" placeholder="CEO" />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="salary" id="salary" placeholder="$50,000 USD" />
                            <x-form-error name="salary" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
```

**Detalles:**
- Reemplaza los campos de entrada manuales con los componentes `x-form-field`, `x-form-label`, `x-form-input`, `x-form-error`, y `x-form-button`.
- Mantiene la misma estructura visual y funcionalidad, pero con un diseño más consistente.

## Estructura de Archivos

La estructura de archivos actualizada incluye los nuevos componentes y vistas de autenticación:

```
app/Http/Controllers/
├── JobController.php
├── RegisteredUserController.php
├── SessionController.php

resources/views/
├── auth/
│   ├── login.blade.php
│   ├── register.blade.php
├── components/
│   ├── button.blade.php
│   ├── form-button.blade.php
│   ├── form-error.blade.php
│   ├── form-field.blade.php
│   ├── form-input.blade.php
│   ├── form-label.blade.php
│   ├── layout.blade.php
│   ├── nav-link.blade.php
├── jobs/
│   ├── create.blade.php
│   ├── edit.blade.php
│   ├── index.blade.php
│   ├── show.blade.php
├── contact.blade.php
├── home.blade.php

routes/
└── web.php
```

## Resultado Visual

Los formularios de registro e inicio de sesión se ven modernos y consistentes gracias a Tailwind CSS y los componentes reutilizables.

![Formulario de Inicio de Sesión](./images/21.PNG "Formulario para loguearse")
![Formulario de Registro](./images/22.PNG "Formulario para registrarse")

## Conceptos Clave del Episodio

- **Rutas de Autenticación**: Define rutas GET y POST para registro e inicio de sesión, utilizando controladores dedicados.
- **Componentes Reutilizables**: Crea componentes Blade para formularios, asegurando consistencia y mantenibilidad.
- **Protección CSRF**: Usa la directiva `@csrf` en todos los formularios para garantizar seguridad.
- **Diseño Responsive**: Implementa Tailwind CSS para una interfaz moderna y adaptable.
- **Arquitectura MVC**: Separa la lógica en controladores, vistas y rutas para una estructura clara.

## Beneficios de los Cambios Realizados

1. **Consistencia Visual**: Los formularios de creación de trabajos, registro e inicio de sesión comparten el mismo diseño gracias a los componentes reutilizables.
2. **Seguridad**: La protección CSRF asegura que las solicitudes sean legítimas.
3. **Modularidad**: Los componentes y controladores facilitan futuras expansiones.
4. **Escalabilidad**: La estructura MVC permite agregar más funcionalidades de autenticación fácilmente.
5. **Experiencia de Usuario**: La interfaz es clara, moderna y responsiva.

# Episodio 22 - Make a Login and Registration System From Scratch: Part 2

## Introducción al Sistema de Autenticación Completo

En este episodio, completamos la implementación del sistema de autenticación personalizado iniciado en el Episodio 21. Nos enfocamos en agregar la funcionalidad de cierre de sesión, implementar la lógica de validación y autenticación en los controladores, y mejorar la interfaz de usuario con componentes Blade reutilizables. Este sistema incluye registro, inicio de sesión y cierre de sesión, utilizando Laravel y Tailwind CSS para una experiencia moderna y segura.

## Modificando el Archivo de Rutas

Actualizamos el archivo `routes/web.php` para incluir la ruta de cierre de sesión, complementando las rutas de registro e inicio de sesión definidas previamente.

**Archivo:** `routes/web.php`

```php
<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
```

**Detalles de las rutas:**
- **`Route::post('/logout', ...)`**: Procesa la acción de cierre de sesión, manejada por el método `destroy` del controlador `SessionController`.
- Las rutas de registro (`/register`) y login (`/login`) permanecen sin cambios desde el Episodio 21.
- **Controladores**: `RegisteredUserController` para registro, `SessionController` para inicio y cierre de sesión.

## Actualizando el Layout Principal

Modificamos `resources/views/components/layout.blade.php` para incluir un formulario de cierre de sesión que aparece solo para usuarios autenticados, utilizando las directivas `@auth` y `@guest` de Blade.

**Archivo:** `resources/views/components/layout.blade.php`

```blade
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://laracasts.com/images/logo/logo-triangle.svg"
                             alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                            <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        @guest
                            <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                        @endguest
                        @auth
                            <form method="POST" action="/logout">
                                @csrf
                                <x-form-button>Log Out</x-form-button>
                            </form>
                        @endauth
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://laracasts.com/images/lary-ai-face.svg"
                             alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">Lary Robot</div>
                        <div class="text-sm font-medium leading-none text-gray-400">jeffrey@laracasts.com</div>
                    </div>
                    <button type="button"
                            class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733 .64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            <x-button href="/jobs/create">Create Job</x-button>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
```

**Detalles del layout:**
- **Directiva `@auth`**: Muestra un formulario de cierre de sesión con un botón "Log Out" para usuarios autenticados.
- **Directiva `@guest`**: Muestra enlaces "Log In" y "Register" para usuarios no autenticados.
- **Protección CSRF**: Incluye `@csrf` en el formulario de logout para seguridad.
- **Diseño responsivo**: Mantiene la navegación adaptativa con Tailwind CSS.

## Actualizando las Vistas de Autenticación

Actualizamos las vistas de registro e inicio de sesión para usar los componentes reutilizables creados en el Episodio 21, asegurando consistencia y agregando mejoras como la preservación de datos en caso de errores de validación.

### Formulario de Inicio de Sesión - `login.blade.php`

**Archivo:** `resources/views/auth/login.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>
    <form method="POST" action="/login">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" :value="old('email')" required />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Log In</x-form-button>
        </div>
    </form>
</x-layout>
```

**Detalles:**
- **Preservación de datos**: Usa `:value="old('email')"` para mantener el valor del email en caso de errores de validación.
- **Componentes reutilizables**: Utiliza `x-form-field`, `x-form-label`, `x-form-input`, `x-form-error`, y `x-form-button`.
- **Seguridad**: Incluye `@csrf` para protección contra ataques CSRF.

### Formulario de Registro - `register.blade.php`

**Archivo:** `resources/views/auth/register.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form method="POST" action="/register">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" required />
                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" required />
                            <x-form-error name="last_name" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" required />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />
                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>
</x-layout>
```

**Detalles:**
- Incluye campos para `first_name`, `last_name`, `email`, `password`, y `password_confirmation`.
- Usa componentes reutilizables para mantener consistencia con el formulario de login.
- **Seguridad**: Incluye `@csrf` para protección contra ataques CSRF.

## Configurando el Modelo de Usuario

Modificamos el modelo `User.php` para habilitar la asignación masiva, ocultar campos sensibles y configurar el hash automático de contraseñas.

**Archivo:** `app/Models/User.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

**Detalles:**
- **Asignación masiva**: Usa `$guarded = []` para permitir la asignación de todos los campos.
- **Campos ocultos**: Oculta `password` y `remember_token` en serializaciones.
- **Casts**: Configura `email_verified_at` como tipo `datetime` y `password` como `hashed` para hash automático.
- **Traits**: Incluye `HasFactory` para factories y `Notifiable` para notificaciones.

## Implementando los Controladores de Autenticación

Actualizamos los controladores `SessionController` y `RegisteredUserController` para implementar la lógica completa de autenticación, incluyendo validación, creación de usuarios, inicio de sesión automático y regeneración de sesiones.

### `SessionController.php`

**Archivo:** `app/Http/Controllers/SessionController.php`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
```

**Detalles:**
- **Método `create`**: Retorna la vista del formulario de inicio de sesión.
- **Método `store`**:
  - Valida que `email` sea un correo válido y que `password` esté presente.
  - Usa `Auth::attempt()` para autenticar al usuario.
  - Lanza una excepción `ValidationException` si las credenciales no coinciden.
  - Regenera la sesión con `session()->regenerate()` para prevenir ataques de fijación de sesión.
  - Redirige a `/jobs` tras un login exitoso.
- **Método `destroy`**:
  - Usa `Auth::logout()` para cerrar la sesión.
  - Redirige a la página principal (`/`).

### `RegisteredUserController.php`

**Archivo:** `app/Http/Controllers/RegisteredUserController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'email'      => ['required', 'email'],
            'password'   => ['required', Password::min(6), 'confirmed']
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/jobs');
    }
}
```

**Detalles:**
- **Método `create`**: Retorna la vista del formulario de registro.
- **Método `store`**:
  - Valida `first_name`, `last_name`, `email` (correo válido), y `password` (mínimo 6 caracteres, confirmado).
  - Crea un nuevo usuario con `User::create()`.
  - Inicia sesión automáticamente con `Auth::login()`.
  - Redirige a `/jobs`.

## Flujo de Autenticación

1. **Registro de nuevo usuario**:
   - El usuario completa el formulario en `/register`.
   - Los datos se validan en `RegisteredUserController@store`.
   - Se crea el usuario con contraseña hasheada automáticamente.
   - Se inicia sesión automáticamente y se redirige a `/jobs`.

2. **Inicio de sesión**:
   - El usuario completa el formulario en `/login`.
   - Los datos se validan en `SessionController@store`.
   - Se verifica la autenticación con `Auth::attempt()`.
   - La sesión se regenera para mayor seguridad.
   - Se redirige a `/jobs`.

3. **Cierre de sesión**:
   - El usuario envía el formulario de logout desde el layout.
   - `SessionController@destroy` cierra la sesión con `Auth::logout()`.
   - Se redirige a la página principal (`/`).

## Características de Seguridad

- **Hashing automático**: Las contraseñas se hashean automáticamente gracias al cast `'password' => 'hashed'` en el modelo `User`.
- **Regeneración de sesión**: `session()->regenerate()` en el login previene ataques de fijación de sesión.
- **Validación de confirmación**: La regla `'confirmed'` asegura que la contraseña y su confirmación coincidan.
- **Protección CSRF**: Todos los formularios incluyen `@csrf` para prevenir ataques de falsificación de solicitudes.
- **Campos ocultos**: `password` y `remember_token` no se exponen en serializaciones.

## Estructura de Archivos

La estructura de archivos actualizada incluye:

```
app/
├── Http/Controllers/
│   ├── JobController.php
│   ├── RegisteredUserController.php
│   ├── SessionController.php
├── Models/
│   ├── User.php
│   ├── Job.php
│   ├── Employer.php
│   ├── Tag.php
resources/views/
├── auth/
│   ├── login.blade.php
│   ├── register.blade.php
├── components/
│   ├── button.blade.php
│   ├── form-button.blade.php
│   ├── form-error.blade.php
│   ├── form-field.blade.php
│   ├── form-input.blade.php
│   ├── form-label.blade.php
│   ├── layout.blade.php
│   ├── nav-link.blade.php
├── jobs/
│   ├── create.blade.php
│   ├── edit.blade.php
│   ├── index.blade.php
│   ├── show.blade.php
├── contact.blade.php
├── home.blade.php
routes/
└── web.php
```

## Resultado Visual

El sistema de autenticación ahora incluye formularios de registro e inicio de sesión completamente funcionales, con un botón de logout visible para usuarios autenticados. La interfaz es moderna, responsiva y consistente gracias a Tailwind CSS y los componentes Blade reutilizables.

![Botón de Logout en la Navegación](./images/23.PNG "Botón de cierre de sesión")

## Conceptos Clave del Episodio

- **Autenticación completa**: Implementa registro, login y logout con lógica robusta.
- **Validación avanzada**: Usa reglas de validación como `Password::min(6)` y `'confirmed'` para contraseñas.
- **Seguridad**: Incluye hashing de contraseñas, regeneración de sesiones y protección CSRF.
- **Componentes Blade**: Reutiliza componentes para formularios, asegurando consistencia visual.
- **Flujo de usuario**: Proporciona una experiencia fluida con redirecciones lógicas tras cada acción.

## Beneficios de los Cambios Realizados

1. **Funcionalidad completa**: El sistema de autenticación permite registrar, iniciar y cerrar sesión de manera segura.
2. **Seguridad robusta**: Las características como hashing, regeneración de sesiones y CSRF protegen la aplicación.
3. **Consistencia visual**: Los componentes reutilizables aseguran una interfaz uniforme.
4. **Escalabilidad**: La estructura MVC y los controladores facilitan futuras mejoras, como autorización o restablecimiento de contraseñas.
5. **Experiencia de usuario**: Formularios intuitivos y mensajes de error claros mejoran la interacción.

# Episodio 23 - 6 Steps to Authorization Mastery

## Introducción al Sistema de Autenticación Completo

Este episodio se centra en la implementación de autorización usando Políticas (Policies) en Laravel para controlar qué usuarios pueden editar trabajos específicos. Nos enfocamos en proteger rutas, vistas y acciones en el controlador, asegurando que solo los propietarios de los trabajos puedan modificarlos. Utilizamos relaciones de modelos, middleware y una política personalizada para crear un sistema robusto y organizado.

## Configuración de Rutas (web.php)

Actualizamos el archivo `routes/web.php` para integrar middleware de autenticación y autorización en las rutas relacionadas con los trabajos.

**Archivo:** `routes/web.php`

```php
<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Rutas de Jobs
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

// Ruta con middleware auth y autorización can
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Rutas de autenticación
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
```

**Características importantes:**
- **Middleware `auth`**: Protege rutas que requieren autenticación.
- **Método `can()`**: Verifica autorización usando políticas.
- **Named route**: La ruta de login tiene nombre para redirecciones automáticas.

## Vista de Job Individual (show.blade.php)

Actualizamos la vista `show.blade.php` para mostrar un botón de edición solo a los usuarios autorizados, utilizando la directiva `@can`.

**Archivo:** `resources/views/jobs/show.blade.php`

```blade
<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>

    <p>
        This job pays {{ $job->salary }} per year.
    </p>

    @can('edit', $job)
        <p class="mt-6">
           <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
    @endcan
</x-layout>
```

**Funcionalidad:**
- **Directiva `@can`**: Muestra el botón de edición solo si el usuario tiene permisos.
- **Autorización condicional**: El botón "Edit Job" aparece únicamente para usuarios autorizados.

## Proveedor de Servicios (AppServiceProvider.php)

Modificamos `AppServiceProvider.php` para eliminar la definición de un Gate y priorizar el uso de una política personalizada.

**Archivo:** `app/Providers/AppServiceProvider.php`

```php
<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Model::preventLazyLoading();

        // Gate comentado - se usa Policy en su lugar
        // Gate::define('edit-job', function (User $user, Job $job) {
        //     return $job->employer->user->is($user);
        // });
    }
}
```

**Configuraciones:**
- **`preventLazyLoading()`**: Previene lazy loading para mejor rendimiento.
- **Gate comentado**: Se prefieren las Políticas sobre Gates para mejor organización.

## Modelo Employer (Employer.php)

Actualizamos el modelo `Employer` para definir relaciones con los modelos `User` y `Job`.

**Archivo:** `app/Models/Employer.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employer extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
```

**Relaciones:**
- **`jobs()`**: Un employer tiene muchos jobs (One-to-Many).
- **`user()`**: Un employer pertenece a un usuario (Many-to-One).

## Migración de Employers

A continuación, se muestra el código completo de la migración actualizada para la tabla `employers`, que incluye la clave foránea `user_id` para relacionarla con la tabla `users`.

**Archivo:** `database/migrations/XXXX_XX_XX_XXXXXX_create_employers_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(\App\Models\User::class); // Clave foránea para relacionar con la tabla users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
```

**Notas sobre la migración:**
- La línea `$table->foreignIdFor(\App\Models\User::class);` agrega la columna `user_id` como clave foránea que referencia la columna `id` de la tabla `users`.
- Asegúrate de ejecutar `php artisan migrate` o `php artisan migrate:fresh --seed` después de actualizar este archivo para aplicar los cambios a la base de datos.

## Factory de Employer (EmployerFactory.php)

Configuramos el factory para generar datos de prueba para el modelo `Employer`.

**Archivo:** `database/factories/EmployerFactory.php`

```php
<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'user_id' => User::factory()
        ];
    }
}
```

**Detalles:**
- **`name`**: Genera un nombre de empresa aleatorio usando `fake()->company()`.
- **`user_id`**: Asocia un usuario generado por `User::factory()` al empleador.
- Permite poblar la base de datos con datos de prueba coherentes.

## Controlador de Jobs (JobController.php)

Actualizamos el controlador `JobController.php` para integrar autorización en los métodos de actualización y eliminación, además de optimizar consultas.

**Archivo:** `app/Http/Controllers/JobController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1 // Valor temporal fijo
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        Gate::authorize('edit-job', $job);

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        Gate::authorize('edit-job', $job);

        $job->delete();

        return redirect('/jobs');
    }
}
```

**Características:**
- **Eager Loading**: `with('employer')` para optimizar consultas.
- **Paginación simple**: `simplePaginate(3)`.
- **Autorización manual**: `Gate::authorize()` en métodos de modificación.
- **Validación**: Reglas consistentes para título y salario.

## Política de Jobs (JobPolicy.php)

Creamos una política para gestionar la autorización de acciones sobre los trabajos.

**Archivo:** `app/Policies/JobPolicy.php`

```php
<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function edit(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }
}
```

**Lógica de autorización:**
- **Método `edit()`**: Verifica si el usuario actual es el propietario del job.
- **Comparación de identidad**: Usa `is()` para comparar instancias de User.
- **Navegación de relaciones**: `$job->employer->user` accede al usuario propietario.

## Comandos Artisan Ejecutados

Ejecutamos los siguientes comandos en la terminal para configurar la base de datos y generar la política:

```bash
php artisan migrate:fresh --seed
php artisan make:policy JobPolicy
```

**Propósito:**
- **`migrate:fresh --seed`**: Recrea toda la base de datos con datos de prueba.
- **`make:policy JobPolicy`**: Genera una nueva política para el modelo Job (nota: en Laravel 8+ no se pasa el modelo como argumento).

## Flujo de Autorización

1. **Verificación en Ruta**:
   ```php
   ->can('edit', 'job')
   ```

2. **Verificación en Vista**:
   ```blade
   @can('edit', $job)
   ```

3. **Verificación en Controlador**:
   ```php
   Gate::authorize('edit-job', $job);
   ```

## Relaciones de Base de Datos

```
User (1) ←→ (1) Employer (1) ←→ (Many) Job
```

- Un **Usuario** tiene un **Employer**.
- Un **Employer** tiene muchos **Jobs**.
- Solo el **Usuario propietario** puede editar sus **Jobs**.

## Ventajas de las Políticas

- **Organización**: Mantiene la lógica de autorización centralizada.
- **Reutilización**: Puede usarse en rutas, vistas y controladores.
- **Mantenimiento**: Fácil de modificar y extender.
- **Claridad**: Código más limpio y expresivo.

## Estructura de Archivos

La estructura de archivos relevante incluye:

```
app/
├── Http/Controllers/
│   ├── JobController.php
│   ├── RegisteredUserController.php
│   ├── SessionController.php
├── Models/
│   ├── Employer.php
│   ├── Job.php
│   ├── User.php
├── Policies/
│   ├── JobPolicy.php
├── Providers/
│   ├── AppServiceProvider.php
database/
├── migrations/
│   ├── XXXX_XX_XX_XXXXXX_create_employers_table.php
├── factories/
│   ├── EmployerFactory.php
resources/views/
├── jobs/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── show.blade.php
│   ├── edit.blade.php
routes/
└── web.php
```

## Resultado Visual

- **Vista de un trabajo (`show.blade.php`)**: Muestra el título y salario del trabajo, con un botón "Edit Job" visible solo para el usuario propietario.
- **Interfaz protegida**: Los usuarios no autorizados no ven el botón de edición ni pueden acceder a la ruta `/jobs/{job}/edit`.

## Conceptos Clave del Episodio

- **Políticas de autorización**: Uso de `JobPolicy` para definir reglas de acceso basadas en la propiedad.
- **Middleware y `can`**: Restricción de rutas con autenticación y autorización.
- **Directiva `@can`**: Control condicional en vistas para mostrar elementos según permisos.
- **Relaciones de modelos**: Uso de `User`, `Employer` y `Job` para verificar la propiedad.
- **Optimización**: Eager loading y paginación simple para mejorar el rendimiento.
- **Seguridad**: Autorización en múltiples niveles (rutas, vistas, controladores).

## Beneficios de los Cambios Realizados

1. **Autorización robusta**: Solo los usuarios propietarios pueden editar o eliminar trabajos.
2. **Código organizado**: Las políticas centralizan la lógica de autorización, reemplazando Gates.
3. **Escalabilidad**: La estructura permite agregar más reglas de autorización fácilmente.
4. **Seguridad mejorada**: Múltiples capas de verificación protegen los recursos.
5. **Experiencia de usuario**: Interfaz clara y consistente, con acceso restringido según permisos.

# Unidad V - Digging Deeper

# Episodio 24 - How to Preview and Send Email Using Mailable Classes

## Introducción al Envío de Correos Electrónicos

En este episodio, implementamos el envío de correos electrónicos en nuestra aplicación Laravel utilizando la funcionalidad de **Mailables**. Configuramos una notificación por correo cada vez que se crea un nuevo trabajo, incluyendo un enlace dinámico al listado del trabajo. Este proceso incluye la generación de un Mailable, la creación de una vista para el correo, la configuración de un servicio SMTP para pruebas y la integración con nuestro controlador de trabajos para enviar correos automáticamente.

## Generando una Clase Mailable

Para enviar correos electrónicos, Laravel proporciona una clase **Mailable** que define el contenido, el asunto y los destinatarios del correo. Creamos una nueva clase Mailable utilizando Artisan.

### Comando Artisan

En la terminal, ejecutamos:

```bash
php artisan make:mail JobPosted
```

**Resultado:**
- Se genera un nuevo archivo en `app/Mail/JobPosted.php`.
- Este archivo contiene una clase `JobPosted` que extiende de `Illuminate\Mail\Mailable`.

### Configurando el Mailable

Modificamos el archivo `app/Mail/JobPosted.php` para definir el contenido del correo y pasar datos dinámicos, como el trabajo recién creado.

```php
<?php

namespace App\Mail;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobPosted extends Mailable
{
    use Queueable, SerializesModels;

    public $job;

    /**
     * Create a new message instance.
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Job Listing is Live!',
            from: 'info@laracasts.com',
            tags: ['job-posted']
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.job-posted',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
```

**Detalles:**
- **Constructor**: Acepta una instancia del modelo `Job` para pasar datos dinámicos al correo.
- **Método `envelope`**: Define el asunto del correo (`subject`), el remitente (`from`) y etiquetas (`tags`) para organización.
- **Método `content`**: Especifica la vista Blade (`mail.job-posted`) que contendrá el cuerpo del correo.
- **Método `attachments`**: Actualmente vacío, pero permite agregar archivos adjuntos si es necesario.

## Creando la Vista del Correo Electrónico

Creamos una vista Blade para definir el contenido del correo electrónico, que será renderizado cuando se envíe el correo. La vista se crea en el directorio `resources/views/mail/` con el nombre `job-posted.blade.php`.

### Archivo de la Vista

**Ubicación:** `resources/views/mail/job-posted.blade.php`

```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Job Listing is Live!</title>
</head>
<body>
    <p>Congrats, your job is now live on our website.</p>
    <p>
        <a href="{{ url('jobs/' . $job->id) }}">View your job listing</a>
    </p>
</body>
</html>
```

**Detalles:**
- **Ubicación del archivo**: El archivo `job-posted.blade.php` debe colocarse en el subdirectorio `mail` dentro de `resources/views/`. Si el directorio `mail` no existe, créalo manualmente.
- **Contenido simple**: Incluye un mensaje de felicitación y un enlace al trabajo recién creado.
- **Helper `url()`**: Genera una URL completa (por ejemplo, `http://30days.isw811.xyz/jobs/1`) para el enlace, asegurando compatibilidad en entornos locales y de producción.
- **Acceso a datos dinámicos**: Usa `$job->id` para crear un enlace específico al trabajo.

## Previsualizando el Correo Electrónico

Para verificar cómo se verá el correo antes de enviarlo, creamos una ruta temporal que retorna una instancia del Mailable.

### Ruta Temporal

Agregamos la siguiente ruta temporal para pruebas en `routes/web.php`:

```php
Route::get('/test', function () {
    return new \App\Mail\JobPosted(\App\Models\Job::first());
});
```

**Uso:**
- Visitamos `http://30days.isw811.xyz/test` en el navegador.
- Esto renderiza la vista `mail.job-posted` con los datos del primer trabajo en la base de datos, permitiendo verificar el diseño del correo.

![Correo Electrónico de Prueba](./images/24.PNG "Correo electrónico recibido")

**Eliminación de la ruta**: Después de probar la previsualización, **es crucial eliminar esta ruta** de `routes/web.php` para evitar exponerla en producción o causar errores inesperados.

## Configurando el Envío de Correos

Integramos el envío del correo en el controlador `JobController` para que se envíe automáticamente cuando se crea un nuevo trabajo.

### Actualizando el Controlador

Modificamos el método `store` en `app/Http/Controllers/JobController.php` para enviar el correo después de crear el trabajo.

```php
<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1 // Valor temporal fijo
        ]);

        Mail::to($job->employer->user)->send(new JobPosted($job));

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        Gate::authorize('edit-job', $job);

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        Gate::authorize('edit-job', $job);

        $job->delete();

        return redirect('/jobs');
    }
}
```

**Cambios realizados:**
- **Importación**: Agregamos `use Illuminate\Support\Facades\Mail;` y `use App\Mail\JobPosted;`.
- **Envío del correo**: Usamos `Mail::to($job->employer->user)->send(new JobPosted($job));` para enviar el correo al usuario propietario del empleador asociado al trabajo. Laravel automáticamente resuelve el atributo `email` del modelo `User`.
- **Relaciones**: Navegamos por las relaciones `$job->employer->user` para obtener el destinatario del correo.

**Nota:** El `employer_id` está fijado temporalmente a `1`. En episodios futuros, esto se vinculará dinámicamente al usuario autenticado.

## Configurando el Servicio de Correo

Para enviar correos en un entorno local, configuramos un servicio SMTP como **Mailtrap**, que es ideal para pruebas. Actualizamos el archivo `.env` con las credenciales de Mailtrap.

### Configuración en `.env`

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=info@laracasts.com
MAIL_FROM_NAME="Laracasts"
```

**Detalles:**
- **`MAIL_MAILER`**: Define el controlador de correo (`smtp` para Mailtrap).
- **`MAIL_HOST` y `MAIL_PORT`**: Especifican el servidor y puerto de Mailtrap.
- **`MAIL_USERNAME` y `MAIL_PASSWORD`**: Credenciales proporcionadas por Mailtrap.
- **`MAIL_FROM_ADDRESS` y `MAIL_FROM_NAME`**: Definen el remitente del correo.

**Alternativa:** Si no se configura un servicio SMTP, Laravel registra los correos en `storage/logs/laravel.log` en entornos locales, útil para pruebas sin un servidor de correo.

### Configuración en `config/mail.php`

Opcionalmente, podemos configurar los valores predeterminados en `config/mail.php` si preferimos no usar el archivo `.env`.

```php
<?php

return [
    'default' => env('MAIL_MAILER', 'smtp'),
    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'sandbox.smtp.mailtrap.io'),
            'port' => env('MAIL_PORT', 2525),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ],
    ],
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'info@laracasts.com'),
        'name' => env('MAIL_FROM_NAME', 'Laracasts'),
    ],
];
```

**Nota:** Los valores en `.env` tienen prioridad sobre los definidos en `config/mail.php`.

## Probando el Envío de Correos

### Flujo de Prueba

1. **Crear un trabajo**:
   - Navegamos a `/jobs/create` y completamos el formulario con un título y salario.
   - Al enviar el formulario, el método `store` crea el trabajo y envía el correo.

2. **Verificar en Mailtrap**:
   - Iniciamos sesión en Mailtrap (o el servicio SMTP configurado).
   - Revisamos la bandeja de entrada de pruebas para confirmar que el correo fue recibido.
   - Verificamos que el correo contiene el mensaje "Congrats, your job is now live on our website" y el enlace correcto al trabajo.

3. **Verificar en el Log (sin SMTP)**:
   - Si no hay un servicio SMTP configurado, abrimos `storage/logs/laravel.log`.
   - Buscamos el contenido del correo registrado, que incluye el asunto, el cuerpo y los datos enviados.

### Previsualización en el Navegador

- Visitamos `/test` (antes de eliminar la ruta) para previsualizar el correo renderizado.
- Verificamos que el enlace en el correo (`<a href="...">`) apunta correctamente al trabajo (por ejemplo, `http://30days.isw811.xyz/jobs/1`).
- **Importante**: Recordar eliminar la ruta `/test` de `routes/web.php` después de las pruebas para evitar problemas en producción.

## Resultado Visual

El correo electrónico enviado se ve como un mensaje simple pero funcional, con un diseño limpio y un enlace clicable al listado del trabajo.

![Correo Electrónico de Prueba en Mailtrap](./images/25.PNG "Correo electrónico recibido en Mailtrap")

**Captura de pantalla (simulada):**
- **Asunto**: "Your Job Listing is Live!"
- **Cuerpo**: "Congrats, your job is now live on our website." seguido de un enlace "View your job listing".
- **Remitente**: `info@laracasts.com (Laracasts)`.

## Conceptos Clave del Episodio

- **Clases Mailable**: Uso de `make:mail` para generar clases que definen correos electrónicos.
- **Vistas de Correo**: Creación de vistas Blade para el contenido del correo, con acceso a datos dinámicos.
- **Envío de Correos**: Uso del facade `Mail` para enviar correos, pasando un objeto `User` como destinatario.
- **Configuración SMTP**: Configuración de Mailtrap para pruebas de correo en entornos locales.
- **URLs Dinámicas**: Uso del helper `url()` para generar enlaces completos en correos.
- **Previsualización y limpieza**: Creación de rutas temporales para pruebas y su eliminación posterior para mantener la seguridad.

## Beneficios de los Cambios Realizados

1. **Notificaciones automáticas**: Los usuarios reciben un correo de confirmación al crear un trabajo, mejorando la experiencia de usuario.
2. **Configuración flexible**: La integración con Mailtrap permite probar correos sin enviarlos a usuarios reales.
3. **Datos dinámicos**: Los correos incluyen información específica del trabajo, como un enlace directo al listado.
4. **Seguridad**: Los enlaces generados con `url()` funcionan en cualquier entorno, y la eliminación de la ruta de prueba evita vulnerabilidades.
5. **Escalabilidad**: La estructura del Mailable permite agregar más funcionalidades, como adjuntos o contenido personalizado.
6. **Mantenibilidad**: La separación de la lógica de correo en `JobPosted.php` y `job-posted.blade.php` facilita futuras modificaciones.

# Episodio 25 - Queues Are Easier Than You Think

## Introducción a las Colas

En este episodio, exploramos cómo implementar colas en Laravel para procesar tareas de manera asíncrona, mejorando el rendimiento de la aplicación. Introducimos el uso de colas para diferir el envío de correos electrónicos (como la notificación de trabajos creados) y creamos una clase de trabajo personalizada para traducir listados de trabajos. Este proceso incluye configurar un controlador de cola, encolar trabajos, ejecutar un trabajador de cola, y usar cierres encolados para tareas diferidas.

## Configurando las Colas

Laravel soporta múltiples controladores de cola, y la configuración se realiza principalmente en el archivo `.env`. El controlador predeterminado se define con la variable `QUEUE_CONNECTION`.

### Controladores de Cola Disponibles
- **sync**: Ejecuta trabajos de forma síncrona (predeterminado, útil para desarrollo local).
- **database**: Almacena trabajos en una tabla de base de datos.
- **beanstalkd, SQS, Redis**: Opciones más robustas para entornos de producción.

### Configuración en `.env`
El valor predeterminado en un proyecto Laravel recién instalado es `QUEUE_CONNECTION=database`, por lo que no es necesario modificarlo a menos que desees usar otro controlador. Verifica o actualiza el archivo `.env` si es necesario:

```env
QUEUE_CONNECTION=database
```

**Detalles:**
- El controlador `database` utiliza una tabla `jobs` para almacenar los trabajos encolados y una tabla `failed_jobs` para registrar los fallidos. Dado que has realizado migraciones en capítulos anteriores, estas tablas deberían estar creadas automáticamente por Laravel al configurar `QUEUE_CONNECTION=database` y ejecutar `php artisan migrate`. Si no existen, puedes recrearlas con:
  ```bash
  php artisan queue:table
  php artisan failed_jobs:table
  php artisan migrate
  ```

### Configuración en `config/queue.php`
Opcionalmente, podemos ajustar la configuración en `config/queue.php` si necesitamos personalizar las conexiones:

```php
<?php

return [
    'default' => env('QUEUE_CONNECTION', 'sync'),
    'connections' => [
        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
        ],
    ],
    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuid'),
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],
];
```

**Nota:** Los valores en `.env` tienen prioridad sobre los definidos en `config/queue.php`.

## Encolando Trabajos

Modificamos el controlador `JobController` para encolar el envío de correos en lugar de ejecutarlo inmediatamente.

### Actualizando el Controlador
Cambiamos el método `store` en `app/Http/Controllers/JobController.php`:

```php
<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1 // Valor temporal fijo
        ]);

        Mail::to($job->employer->user)->queue(new JobPosted($job));

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        Gate::authorize('edit-job', $job);

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        Gate::authorize('edit-job', $job);

        $job->delete();

        return redirect('/jobs');
    }
}
```

**Cambios realizados:**
- **Encolado del correo**: Reemplazamos `send` por `queue` en `Mail::to($job->employer->user)->queue(new JobPosted($job))`, lo que encola el envío del correo para ser procesado por un trabajador de cola.
- **Relaciones**: Seguimos usando `$job->employer->user` para determinar el destinatario.

**Nota:** El `employer_id` sigue siendo fijo en 1 por ahora, pero en episodios futuros se vinculará al usuario autenticado.

## Ejecutando el Trabajador de Cola

Para procesar los trabajos encolados, necesitamos ejecutar un trabajador de cola.

### Comando Artisan
En la terminal, ejecutamos:

```bash
php artisan queue:work
```

**Detalles:**
- Este comando escucha los trabajos encolados y los procesa según el controlador configurado (en este caso, `database`).
- Mantén la terminal abierta mientras pruebas, ya que el trabajador se detiene si cierras la sesión.
- Si realizas cambios en el código, reinicia el trabajador con `Ctrl+C` y vuelve a ejecutarlo.

**Alternativa con supervisión:**
Para entornos de producción, considera usar un supervisor como `supervisorctl` para mantener el trabajador activo.

## Usando Cierres Encolados

Laravel permite encolar cierres simples para tareas diferidas.

### Ejemplo de Cierre Encolado
En cualquier parte de tu código (por ejemplo, un controlador o una ruta), usa:

```php
dispatch(function () {
    logger('Hello from the queue');
})->delay(now()->addSeconds(5));
```

**Detalles:**
- El cierre se ejecuta después de un retraso de 5 segundos.
- Es útil para tareas como notificaciones diferidas o procesamiento en segundo plano.

## Creando Clases de Trabajo Personalizadas

Generamos una clase de trabajo para tareas más complejas, como traducir listados de trabajos.

### Comando Artisan
En la terminal, ejecutamos:

```bash
php artisan make:job TranslateJob
```

**Resultado:**
- Se genera un nuevo archivo en `app/Jobs/TranslateJob.php`.

### Configurando la Clase de Trabajo
Modificamos el archivo `app/Jobs/TranslateJob.php`:

```php
<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TranslateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $jobListing;

    public function __construct($jobListing)
    {
        $this->jobListing = $jobListing;
    }

    public function handle()
    {
        // Lógica para traducir el listado de trabajos
        logger('Translating job listing: ' . $this->jobListing->title);
        // Aquí iría la lógica real de traducción (por ejemplo, usando una API)
    }
}
```

**Detalles:**
- **Constructor**: Acepta un listado de trabajos (`$jobListing`) para procesar.
- **Método `handle`**: Contiene la lógica del trabajo, en este caso, un log simple como ejemplo.

### Despachando la Clase de Trabajo
En cualquier parte del código (por ejemplo, en `JobController` después de crear un trabajo), despachamos:

```php
TranslateJob::dispatch($job);
```

**Nota:** Reinicia el trabajador de cola (`php artisan queue:work`) después de crear o modificar la clase de trabajo.

## Probando las Colas

### Flujo de Prueba
1. **Verificar las tablas**:
   - Confirma que las tablas `jobs` y `failed_jobs` existen en tu base de datos debido a migraciones previas. Si no están presentes, crea las migraciones con:
     ```bash
     php artisan queue:table
     php artisan failed_jobs:table
     php artisan migrate
     ```
2. **Encolar un correo**:
   - Crea un trabajo en `/jobs/create` y verifica que aparezca un registro en la tabla `jobs`.

   ![Correo Electrónico en cola en la tabla jobs](./images/26.PNG "Correo electrónico en cola en la tabla jobs")

3. **Ejecutar el trabajador**:
   - Inicia `php artisan queue:work` en una terminal.

   ![Comando php artisan queue:work ejecutandose](./images/27.PNG "Comando php artisan queue:work ejecutandose")

   - Observa que el correo se envía y desaparece el registro de la tabla `jobs`.

![Correo Electrónico recibido en Mailtrap](./images/28.PNG "Correo electrónico recibido en Mailtrap")

![Tabla jobs vacia después de enviar el correo correctamente](./images/29.PNG "Tabla jobs vacia después de enviar el correo correctamente")

4. **Probar un cierre encolado**:
   - Agrega el ejemplo de `dispatch` en una ruta o controlador y verifica el log después de 5 segundos.
5. **Probar una clase de trabajo**:
   - Despacha `TranslateJob::dispatch($job)` y revisa el log o la salida del trabajador.

### Verificación en la Base de Datos
- Consulta la tabla `jobs` para ver trabajos pendientes:
  ```sql
  SELECT * FROM jobs;
  ```
- Si un trabajo falla, revisa `failed_jobs`.

## Resultado Visual
- El trabajador de cola procesa los trabajos encolados, enviando correos o ejecutando tareas como la traducción sin bloquear la respuesta HTTP.
- Los logs muestran mensajes como "Hello from the queue" o "Translating job listing: [título]".

## Conceptos Clave del Episodio
- **Controladores de cola**: Configuración de `QUEUE_CONNECTION` para manejar trabajos.
- **Encolado de correos**: Uso de `queue` en lugar de `send` para diferir envíos.
- **Trabajador de cola**: Ejecución con `php artisan queue:work`.
- **Cierres encolados**: Tareas simples con `dispatch` y retrasos.
- **Clases de trabajo**: Creación y despacho de trabajos personalizados con `make:job`.

## Beneficios de los Cambios Realizados
1. **Rendimiento mejorado**: Las colas evitan que el envío de correos retrase la respuesta al usuario.
2. **Escalabilidad**: Permite procesar tareas pesadas en segundo plano.
3. **Flexibilidad**: Los cierres y clases de trabajo permiten personalizar tareas.
4. **Mantenimiento**: Las tablas `jobs` y `failed_jobs` facilitan el monitoreo.
5. **Facilidad de uso**: La configuración es sencilla con comandos Artisan.

# Episodio 26 - Get Your Build Process in Order

## Prerrequisitos

### Habilitar Enlaces Simbólicos en Windows

Cuando utilizas *Vagrant* para virtualizar sistemas operativos tipo GNU/Linux sobre Windows (7, 8, 10, 11, etc.), puedes encontrar un error al ejecutar comandos como `npm install`. Esto ocurre porque herramientas como *NPM* intentan crear enlaces simbólicos (symlinks) al instalar dependencias, y Windows, por defecto, no permite a usuarios sin privilegios administrativos crear symlinks. A continuación, se explican los pasos para habilitar esta funcionalidad. **Nota**: Los pasos para habilitar la herramienta *Local Security Policy* (`secpol.msc`) son necesarios solo para ediciones *Home Edition* de Windows, ya que no incluyen esta herramienta por defecto. Los pasos para otorgar permisos de creación de symlinks aplican a todas las versiones de Windows (Home, Pro, Enterprise, etc.).

#### Paso 1 — Habilitar el Editor de Políticas de Seguridad en Windows Home Edition

Si utilizas Windows 7, 8, 10, 11, etc., en cualquiera de sus versiones *Home Edition*, debes habilitar la herramienta *Local Security Policy* (`secpol.msc`), necesaria para autorizar a tu usuario la creación de symlinks. Sigue estos pasos:

1. **Abrir una terminal CMD como administrador**:
   - Haz clic con el botón derecho sobre el icono de CMD y selecciona "Ejecutar como administrador".

2. **Ejecutar el comando para agregar los componentes del sistema**:
   - Ejecuta el siguiente comando para instalar el paquete de herramientas de políticas de grupo, que incluye `secpol.msc`:
     ```bash
     FOR %F IN ("%SystemRoot%\servicing\Packages\Microsoft-Windows-GroupPolicy-ClientTools-Package~*.mum") DO (DISM /Online /NoRestart /Add-Package:"%F")
     ```
   - Este comando utiliza *DISM* (Deployment Image Servicing and Management) para instalar los componentes necesarios.

3. **Añadir la extensión que soporta las políticas de grupo**:
   - Ejecuta el segundo comando para agregar las extensiones necesarias:
     ```bash
     FOR %F IN ("%SystemRoot%\servicing\Packages\Microsoft-Windows-GroupPolicy-ClientExtensions-Package~*.mum") DO (DISM /Online /NoRestart /Add-Package:"%F")
     ```
   - Este comando agrega las extensiones necesarias para que las políticas de grupo funcionen correctamente en tu sistema.

4. **Reiniciar el equipo**:
   - Después de ejecutar los comandos anteriores, reinicia tu equipo para que los cambios surtan efecto y la herramienta *Local Security Policy* esté disponible.

**Nota**: Si usas Windows Pro, Enterprise u otras ediciones que no sean *Home Edition*, la herramienta `secpol.msc` ya está disponible, por lo que puedes omitir este paso e ir directamente al *Paso 2*.

#### Paso 2 — Otorgar Permisos para Crear Symlinks

Una vez que `secpol.msc` está disponible (o si ya lo estaba en tu edición de Windows), sigue estos pasos para otorgar a tu usuario permisos para crear symlinks:

1. **Abrir el editor de políticas de seguridad local**:
   - Presiona `Win + R`, escribe `secpol.msc` y presiona Enter.

   ![Comando a secpol.msc](./images/30.PNG "Comando a secpol.msc a ejecutar")

2. **Navegar a la sección de asignación de derechos**:
   - En el menú del lado izquierdo, ve a `Directivas locales > Asignación de derechos de usuario`.

3. **Configurar la política de enlaces simbólicos**:
   - Busca la política **Crear vínculos simbólicos** y haz doble clic sobre ella.

    ![Ubicación de ka directiva para asignar derechos](./images/31.PNG "Ubicación de ka directiva para asignar derechos")

4. **Agregar un usuario o grupo**:
   - Haz clic en **Agregar usuario o grupo**.

   ![Ubicación de ka directiva para asignar derechos](./images/32.PNG "Ubicación de ka directiva para asignar derechos")

5. **Acceder a opciones avanzadas**:
   - En la ventana emergente, haz clic en **Opciones avanzadas**.

6. **Seleccionar el usuario**:
   - Haz clic en **Buscar ahora** para listar los usuarios disponibles.
   - Selecciona tu nombre de usuario o el del usuario al que deseas otorgar permisos y haz clic en **Aceptar**.

   ![Seleccionar Usuario](./images/33.PNG "Seleccionar Usuario")

7. **Confirmar la selección**:
   - Haz clic en **Aceptar** para confirmar la selección del usuario.

   ![Confirmación de selección](./images/34.PNG "Confirmación de selección")

8. **Aplicar los cambios**:
   - Confirma los cambios haciendo clic en **Aplicar** y luego en **Aceptar**.

   ![Confirmación de cambios](./images/35.PNG "Confirmación de cambios")

9. **Reiniciar el equipo**:
   - Para que los permisos de creación de enlaces simbólicos surtan efecto, reinicia tu computadora. Sin este paso, el error relacionado con los symlinks persistirá.

**Conclusión**: Con estos pasos, habrás habilitado la creación de enlaces simbólicos para tu usuario en Windows. Esta funcionalidad es especialmente útil para desarrolladores que trabajan con herramientas como *NPM* y *Vagrant*, las cuales a menudo requieren symlinks para la correcta instalación de dependencias. Si el problema persiste, verifica que el usuario seleccionado tenga los permisos correctos y que el sistema se haya reiniciado.

---

## Introducción a Vite y Tailwind CSS

En este episodio, configuramos **Vite** y **Tailwind CSS** en nuestro proyecto Laravel dentro de un entorno Vagrant, tanto para un entorno sin certificados SSL (HTTP) como con certificados SSL (HTTPS). Este proceso optimiza el manejo de assets, permite recarga en caliente y asegura que los estilos de Tailwind se integren correctamente en la aplicación. La aplicación estará disponible en `http://30days.isw811.xyz` (HTTP) o `https://30days.isw811.xyz` (HTTPS).

### Configuración del Entorno

#### Verificación de Node.js y npm

En la máquina virtual, accede al directorio del proyecto y verifica la instalación de Node.js y npm:

```bash
vagrant@webserver:~/sites/30days.isw811.xyz$ node -v
vagrant@webserver:~/sites/30days.isw811.xyz$ npm -v
```

**Salida esperada** (ejemplo):
```
v18.16.0
9.5.0
```

Si no están instalados, ejecuta:

```bash
sudo apt update
sudo apt install nodejs npm
```

#### Actualización del archivo `.env`

Configura la URL de la aplicación según el entorno en el archivo `.env`:

**Para HTTP:**
```env
APP_URL=http://30days.isw811.xyz
```

**Para HTTPS:**
```env
APP_URL=https://30days.isw811.xyz
```

#### Iniciar la Máquina Virtual

Desde la máquina anfitriona, inicia Vagrant y accede al proyecto:

```bash
vagrant up
vagrant ssh
cd /home/vagrant/sites/30days.isw811.xyz
```

**Ruta del proyecto en la máquina anfitriona:**
```
/ISW811/M/VMs/webserver/sites/30days.isw811.xyz
```

### Configuración de Vite

Vite está integrado en Laravel a través del plugin `laravel-vite-plugin`. Configuramos Vite para ambos entornos.

#### Caso 1: Sin certificados (HTTP)

**Archivo:** `vite.config.js`

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        hmr: {
            host: '30days.isw811.xyz',
            port: 5173,
        },
    },
});
```

#### Caso 2: Con certificados (HTTPS)

**Archivo:** `vite.config.js`

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        https: {
            key: fs.readFileSync('/vagrant/ssl/30days.isw811.xyz/privkey.pem'),
            cert: fs.readFileSync('/vagrant/ssl/30days.isw811.xyz/fullchain.pem'),
        },
        hmr: {
            protocol: 'wss',
            host: '30days.isw811.xyz',
            port: 5173,
        },
    },
});
```

**Nota sobre certificados SSL**: Los archivos `fullchain.pem` y `privkey.pem` deben estar en `/vagrant/ssl/30days.isw811.xyz/`.

#### Configuración de `package.json`

Verifica que el archivo `package.json` incluya los scripts y dependencias necesarias:

```json
{
    "scripts": {
        "dev": "vite",
        "build": "vite build"
}
```

### Instalación y Configuración de Tailwind CSS

#### Instalando Tailwind CSS y Dependencias

Ejecuta los siguientes comandos para instalar Tailwind y sus dependencias:

```bash
npm install -D tailwindcss postcss autoprefixer
npm install
```

#### Modificamos Tailwind CSS

Mofidicamos el archivo de configuración de Tailwind:

**Archivo:** `tailwind.config.js`

```javascript
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "laracasts": "rgb(50,138,241)"
            }
        },
    },
    plugins: [],
}
```

#### Configurando los Estilos

Edita el archivo `resources/css/app.css` para incluir las directivas de Tailwind:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

#### Actualizando el Punto de Entrada de JavaScript

Edita `resources/js/app.js` para importar los estilos:

```javascript
import './bootstrap';
import '../css/app.css';
```

### Integrando Vite con las Vistas

#### Actualizando el Layout Principal

Modifica `resources/views/components/layout.blade.php` para incluir los assets de Vite:

```blade
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                <x-nav-link href="/jobs" :active="request()->is('jobs*')">Jobs</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @auth
                                <form method="POST" action="/logout">
                                    @csrf
                                    <x-form-button>Log Out</x-form-button>
                                </form>
                            @else
                                <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                            @endauth
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" fill="none" viewBox="0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/jobs" :active="request()->is('jobs*')">Jobs</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    @auth
                        <form method="POST" action="/logout">
                            @csrf
                            <x-form-button>Log Out</x-form-button>
                        </form>
                    @else
                        <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                        <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                    @endauth
                </div>
            </div>
        </nav>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
                <x-button href="/jobs/create">Create Job</x-button>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
```

#### Actualizando la Vista de Jobs

Edita `resources/views/jobs/index.blade.php` para aplicar estilos de Tailwind:

```blade
<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <strong class="text-laracasts">{{ $job->title }}:</strong> Pays {{ $job->salary }} per year.
                </div>
            </a>
        @endforeach
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
```

### Ejecutando y Probando los Cambios

#### Iniciar el Servidor de Vite

Ejecuta Vite para desarrollo con recarga en caliente:

```bash
npm run dev
```

**Salida esperada en consola (HTTP):**
```
Local:    http://localhost:5173/
Network:  http://30days.isw811.xyz:5173/
```

**Salida esperada en consola (HTTPS):**
```
Local:    https://localhost:5173/
Network:  https://30days.isw811.xyz:5173/
```

#### Compilación para Producción

Para generar assets optimizados:

```bash
npm run build
```

#### Verificando la Aplicación

1. Accede a `http://30days.isw811.xyz` (HTTP) o `https://30days.isw811.xyz` (HTTPS).
2. Verifica que los estilos de Tailwind y el color personalizado `laracasts` se apliquen en la página de trabajos (`/jobs`).
3. Confirma que no hay errores SSL (`ERR_SSL_PROTOCOL_ERROR`) en el caso de HTTPS.
4. Modifica `resources/css/app.css` y verifica que los cambios se reflejen instantáneamente en el navegador (recarga en caliente).

### Resultado Visual

- **Página de Trabajos**: Muestra tarjetas con bordes redondeados, espaciado uniforme y el color personalizado `laracasts` aplicado al título del trabajo.
- **Diseño responsivo**: La navegación y el layout están optimizados con Tailwind CSS.
- **Recarga en caliente**: Los cambios en los estilos o scripts se reflejan instantáneamente en el navegador.
- **HTTPS (opcional)**: La aplicación se sirve de forma segura sin errores SSL cuando se configura.

![Página de trabajos con Tailwind CSS aplicado](./images/36.PNG "Página de trabajos con Tailwind CSS")

### Conceptos Clave del Episodio

- **Vite**: Herramienta de empaquetado moderna con soporte para recarga en caliente, integrada con Laravel.
- **Tailwind CSS**: Framework de estilos basado en clases utilitarias para un diseño rápido y consistente.
- **HTTPS**: Configuración opcional con certificados SSL para entornos seguros.
- **Configuración de Vite**: Uso de `vite.config.js` para definir el comportamiento del servidor de desarrollo.
- **Integración con Blade**: Uso de la directiva `@vite` para incluir assets en las vistas.
- **Color personalizado**: Definición del color `laracasts` en `tailwind.config.js`.

### Beneficios de los Cambios Realizados

1. **Rendimiento mejorado**: Vite optimiza la carga de assets y permite recarga en caliente.
2. **Estilizado eficiente**: Tailwind CSS agiliza el diseño con clases utilitarias.
3. **Desarrollo ágil**: La recarga en caliente acelera el ciclo de desarrollo.
4. **Seguridad mejorada**: La configuración HTTPS asegura conexiones seguras (opcional).
5. **Integración nativa**: Vite y Laravel trabajan juntos sin problemas.

---

_Documentación realizada por Guillermo Antonio Solórzano Ochoa - ISW811_