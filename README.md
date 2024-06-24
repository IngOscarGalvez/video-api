## Desafío de TalentPitch para Desarrollador Fullstack

### Escenario:

Tu equipo tiene la tarea de desarrollar una nueva funcionalidad para una aplicación Flutter que implica la integración de una API compleja escrita en GoLang, Python o PHP, según la elección que consideres mejor. El equipo enfrenta desafíos en la comprensión de las especificaciones de la API y en la coordinación entre los desarrolladores de Flutter y los desarrolladores de backend. Además, hay opiniones encontradas sobre el mejor enfoque para implementar esta funcionalidad.

### Desafío:

**Describe una estrategia que usarías para asegurar una comunicación y colaboración efectiva entre los desarrolladores de backend y los desarrolladores de Flutter.**

**Respuesta:**

1. **Reuniones regulares de sincronización**: Implementaría reuniones diarias (scrums) y reuniones semanales de planificación (sprints) para discutir el progreso, los problemas encontrados y las próximas tareas. Estas reuniones cortas y enfocadas aseguran que todos los miembros del equipo estén alineados y al tanto de los avances y desafíos.
2. **Documentación clara**: Crearía y mantendría una documentación detallada y actualizada sobre la API, incluyendo endpoints, ejemplos de solicitudes y respuestas, y manejo de errores. Utilizaría herramientas como Swagger para documentar la API, lo que facilita la comprensión y uso por parte de los desarrolladores de Flutter.
3. **Definición de roles y responsabilidades**: Clarificaría los roles y responsabilidades de cada miembro del equipo para evitar confusiones y asegurar que todos sepan exactamente qué se espera de ellos. Designaría un líder de proyecto que actúe como enlace entre los desarrolladores de backend y los desarrolladores de Flutter.
4. **Herramientas de gestión de proyectos**: Utilizaría herramientas como Jira, Trello o Asana para rastrear tareas, establecer plazos y asignar responsabilidades. Estas herramientas permiten una visibilidad clara del estado del proyecto y facilitan la coordinación entre los equipos.

**¿Cómo motivas y empoderas a los miembros del equipo para que se apropien de sus tareas mientras mantienes una dinámica de equipo cohesionada?**

**Respuesta:**

1. **Reconocimiento y recompensas**: Implementaría un sistema de reconocimiento y recompensas para destacar y premiar el buen trabajo. Esto podría incluir reconocimientos públicos durante las reuniones, bonos de rendimiento o días libres adicionales.
2. **Autonomía**: Fomentaría un entorno donde los desarrolladores tienen la libertad de tomar decisiones sobre cómo abordar sus tareas. Esto no solo incrementa la motivación, sino que también fomenta la creatividad y la innovación.
3. **Desarrollo profesional**: Proporcionaría oportunidades para el crecimiento profesional, como acceso a cursos, talleres y conferencias. Esto no solo mejora las habilidades del equipo, sino que también muestra que la empresa está comprometida con su desarrollo.
4. **Ambiente de apoyo**: Crearía un ambiente de trabajo colaborativo y de apoyo donde los miembros del equipo se sientan cómodos compartiendo ideas, dando y recibiendo feedback, y pidiendo ayuda cuando sea necesario. Fomentar la comunicación abierta y honesta es clave para mantener una dinámica de equipo positiva y cohesionada.

**Comparte una experiencia donde lideraste exitosamente a un equipo en la entrega de un proyecto desafiante, destacando tu estilo de liderazgo y las estrategias clave que empleaste.**

**Respuesta:**

- **Descripción del proyecto**: En mi experiencia anterior, lideré un equipo de desarrollo en un proyecto donde teníamos que migrar una aplicación monolítica a una arquitectura de microservicios en un plazo ajustado.
- **Estilo de liderazgo**: Mi estilo de liderazgo es colaborativo y centrado en el equipo. Creo en empoderar a los miembros del equipo, fomentar la colaboración y mantener una comunicación abierta y honesta.
- **Estrategias clave**:
    1. **Planificación detallada**: Dividí el proyecto en pequeñas fases manejables, cada una con metas claras y plazos específicos. Utilicé la metodología Agile para adaptarnos rápidamente a cualquier cambio o problema inesperado.
    2. **Comunicación continua**: Mantuve una comunicación constante con el equipo a través de reuniones diarias y actualizaciones semanales. Esto ayudó a identificar y resolver problemas rápidamente y a mantener a todos enfocados en los objetivos del proyecto.
    3. **Apoyo y mentoring**: Proporcioné orientación y apoyo continuo al equipo, ofreciendo mentoría cuando era necesario y asegurándome de que todos tuvieran los recursos necesarios para realizar su trabajo de manera efectiva.
    4. **Gestión de riesgos**: Identifiqué y gestioné los riesgos desde el principio, desarrollando planes de contingencia para los problemas más probables. Esto nos permitió enfrentar desafíos sin desviarnos del cronograma del proyecto.
- **Resultados**: Gracias a estas estrategias, logramos completar la migración con éxito, cumpliendo con los plazos y mejorando significativamente el rendimiento y la escalabilidad de la aplicación.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Video API

Esta es una API para gestionar videos, permitiendo operaciones CRUD (Crear, Leer, Actualizar y Eliminar).

## Requisitos

- PHP 7.4 o superior
- Composer
- MySQL
- Laravel 8 o superior

## Instalación

1. Clona el repositorio:

    ```sh
    git clone https://github.com/tuusuario/video-api.git
    cd video-api
    ```

2. Instala las dependencias:

    ```sh
    composer install
    ```

3. Configura el archivo `.env`:

    ```sh
    cp .env.example .env
    ```

4. Genera la clave de la aplicación:

    ```sh
    php artisan key:generate
    ```

5. Configura la base de datos en el archivo `.env`:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

6. Ejecuta las migraciones:

    ```sh
    php artisan migrate
    ```

## Endpoints de la API

### Listar Videos

- **URL**: `/api/videos`
- **Método**: `GET`
- **Descripción**: Obtener una lista paginada de videos.
- **Parámetros**:
    - `per_page` (opcional): Número de elementos por página.
- **Respuesta**:
  ```json
  {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "title": "Mi primer video",
        "description": "Este es un video de prueba",
        "path": "videos/example.mp4",
        "url": "http://localhost/storage/videos/example.mp4",
        "created_at": "2024-06-24T18:23:12.000000Z",
        "updated_at": "2024-06-24T18:23:12.000000Z"
      }
    ],
    "first_page_url": "http://localhost/api/videos?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost/api/videos?page=1",
    "links": [
      {
        "url": null,
        "label": "&laquo; Previous",
        "active": false
      },
      {
        "url": "http://localhost/api/videos?page=1",
        "label": "1",
        "active": true
      },
      {
        "url": null,
        "label": "Next &raquo;",
        "active": false
      }
    ],
    "next_page_url": null,
    "path": "http://localhost/api/videos",
    "per_page": 5,
    "prev_page_url": null,
    "to": 1,
    "total": 1
  }
  ```

### Crear Video

- **URL**: `/api/videos`
- **Método**: `POST`
- **Descripción**: Crear un nuevo video.
- **Parámetros**:
    - `title` (requerido): Título del video.
    - `description` (opcional): Descripción del video.
    - `video` (requerido): Archivo de video (formatos permitidos: mp4, avi, mov).
- **Respuesta**:
  ```json
  {
    "id": 1,
    "title": "Test Video",
    "description": "Test Description",
    "path": "videos/example.mp4",
    "url": "http://localhost/storage/videos/example.mp4",
    "created_at": "2024-06-24T18:23:12.000000Z",
    "updated_at": "2024-06-24T18:23:12.000000Z"
  }
  ```

### Obtener Video

- **URL**: `/api/videos/{id}`
- **Método**: `GET`
- **Descripción**: Obtener los detalles de un video por ID.
- **Respuesta**:
  ```json
  {
    "id": 1,
    "title": "Test Video",
    "description": "Test Description",
    "path": "videos/example.mp4",
    "url": "http://localhost/storage/videos/example.mp4",
    "created_at": "2024-06-24T18:23:12.000000Z",
    "updated_at": "2024-06-24T18:23:12.000000Z"
  }
  ```

### Actualizar Video

- **URL**: `/api/videos/{id}`
- **Método**: `PUT`
- **Descripción**: Actualizar un video por ID.
- **Parámetros**:
    - `title` (opcional): Título del video.
    - `description` (opcional): Descripción del video.
    - `video` (opcional): Archivo de video (formatos permitidos: mp4, avi, mov).
- **Respuesta**:
  ```json
  {
    "id": 1,
    "title": "Updated Title",
    "description": "Updated Description",
    "path": "videos/example.mp4",
    "url": "http://localhost/storage/videos/example.mp4",
    "created_at": "2024-06-24T18:23:12.000000Z",
    "updated_at": "2024-06-24T18:23:12.000000Z"
  }
  ```

### Eliminar Video

- **URL**: `/api/videos/{id}`
- **Método**: `DELETE`
- **Descripción**: Eliminar un video por ID.
- **Respuesta**:
  ```json
  {
    "message": "Video deleted successfully"
  }
  ```

## Pruebas

### Pruebas Unitarias y de Características

Para ejecutar las pruebas unitarias y de características, usa el siguiente comando:

```sh
php artisan test
```

### Pruebas Incluidas

- **Listar Videos**: `test_can_list_videos`
- **Crear Video**: `test_can_create_video`
- **Obtener Video**: `test_can_show_video`
- **Actualizar Video**: `test_can_update_video`
- **Eliminar Video**: `test_can_delete_video`

### Configuración de Pruebas

Asegúrate de tener la configuración correcta en el archivo `.env.testing` para la base de datos de pruebas:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos_de_prueba
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### Migraciones

Ejecuta las migraciones para la base de datos de pruebas:

```sh
php artisan migrate --env=testing
```

### Fábrica de Video

Asegúrate de tener una fábrica configurada para el modelo `Video`:

#### Archivo `VideoFactory.php`

```php
namespace Database\Factories;

use App\Models\Api\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'path' => 'videos/' . $this->faker->uuid . '.mp4',
            'url' => 'http://localhost/storage/videos/' . $this->faker->uuid . '.mp4',
        ];
    }
}
```

## Desarrollo y Contribución

Si deseas contribuir a este proyecto, sigue los siguientes pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -am 'Añadir nueva funcionalidad'`).
4. Haz push a la rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.

## Contacto

Si tienes alguna pregunta o sugerencia, no dudes en contactar a [oscargalvez1992@gmail.com](mailto:oscargalvez1992@gmail.com).
