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

## Comandos útiles para verificar

```bash
# Ver las tablas creadas
php artisan migrate:status

# Acceder a Tinker para interactuar con los modelos
php artisan tinker

# Hacer rollback si es necesario
php artisan migrate:rollback
```