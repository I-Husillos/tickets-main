# Proyecto de Gestión de Tickets

**Versión:** Laravel 12

Este repositorio contiene una aplicación completa de gestión de incidencias y tickets. Está pensada para ser utilizada en entornos corporativos donde se requiera registrar, clasificar y dar seguimiento a las peticiones de usuarios. A continuación se detallan los diferentes componentes, tecnologías y procedimientos necesarios para utilizar la plataforma.

## Tabla de Contenidos

1. [Introducción](#introduccion)
2. [Características Principales](#caracteristicas-principales)
3. [Tipos de Usuarios](#tipos-de-usuarios)
4. [Arquitectura del Proyecto](#arquitectura-del-proyecto)
5. [Estructura de Carpetas](#estructura-de-carpetas)
6. [Instalación y Puesta en Marcha](#instalacion-y-puesta-en-marcha)
7. [Despliegue con Docker](#despliegue-con-docker)
8. [Migraciones y Base de Datos](#migraciones-y-base-de-datos)
9. [Sistema de Autenticación](#sistema-de-autenticacion)
10. [API REST](#api-rest)
11. [Notificaciones y Eventos](#notificaciones-y-eventos)
12. [Internacionalización](#internacionalizacion)
13. [Pruebas y Calidad](#pruebas-y-calidad)
14. [Requisitos del Sistema](#requisitos-del-sistema)
15. [Acceso a la Aplicación](#acceso-a-la-aplicacion)
16. [Desarrollo y Contribución](#desarrollo-y-contribucion)
17. [Información Adicional](#informacion-adicional)

---

## Introducción

Esta aplicación se construyó siguiendo los principios de diseño de *SOLID*. Permite manejar de forma sencilla la creación y seguimiento de tickets de soporte. Incluye control de usuarios, roles de administrador, notificaciones y un sistema API completo para integraciones externas.

---

## Características Principales

- Desarrollo con **Laravel 12**. Aprovecha la estructura de controladores, modelos, vistas, servicios y políticas.
- **Docker Compose** para levantar el entorno de desarrollo de forma sencilla: servicios de PHP-FPM, MySQL, Redis, phpMyAdmin y Mailpit.
- Soporte multilingüe con archivos de traducción en `src/lang/en` y `src/lang/es`.
- Gestión diferenciada de **usuarios** y **administradores**. Cada uno cuenta con paneles, rutas y permisos específicos.
- Creación y administración de tickets con campos de prioridad, tipo y estado. Los tickets pueden asignarse a un administrador y registrar su resolución.
- **Historial de eventos** (`EventHistory`) que almacena todas las operaciones relevantes: alta, modificación y eliminación de entidades.
- Sistema de **notificaciones** mediante base de datos y correo. Las tareas de envío utilizan colas gestionadas por Redis.
- **API REST** protegida con Laravel Passport. Permite manejar tickets, usuarios, administradores y tipos desde clientes externos.
- Plantillas de vistas con **Blade** y maquetación adaptada a paneles diferenciados para usuario y administrador.
- Ejemplos de pruebas unitarias y de características dentro del directorio `src/tests`.

---

## Tipos de Usuarios

La plataforma define dos roles principales:

1. **Usuario Registrado**
   - Puede crear tickets describiendo una incidencia, seleccionando prioridad y tipo.
   - Dispone de un panel personal donde consulta todos sus tickets creados.
   - Tiene la capacidad de comentar en sus propios tickets y recibir notificaciones de cambios.
   - Puede cerrar o validar un ticket cuando considere resuelta la incidencia.

2. **Administrador**
   - Accede a un panel de administración con estadísticas generales de tickets.
   - Gestiona usuarios y otros administradores (incluyendo creación, edición y eliminación).
   - Tiene la posibilidad de asignarse tickets o asignarlos a otros administradores.
   - Cambia estados de los tickets (nuevo, en progreso, pendiente, resuelto, cerrado) y edita su prioridad o tipo.
   - Consulta el historial de eventos generado por todas las operaciones del sistema.
   - Recibe notificaciones cuando se le asigna un ticket o éste cambia de estado.

Adicionalmente, un administrador puede marcarse como **superadministrador** para realizar configuraciones globales (como la gestión de tipos de ticket).

---

## Arquitectura del Proyecto

El directorio `src/` contiene una instalación completa de Laravel. Se han añadido controladores específicos para cada área (usuarios, administradores, API, etc.). Los modelos definen las tablas principales: `users`, `admins`, `tickets`, `types`, `event_histories` y `messages` (comentarios).

Los controladores se encuentran bajo `app/Http/Controllers`, mientras que los servicios e integraciones adicionales están en `app/Services`. Las políticas (`app/Policies`) regulan la autorización para ciertas acciones.

La capa de persistencia se maneja mediante migraciones y `Eloquent` ORM. Todas las tablas poseen claves foráneas y se mantienen sincronizadas con los modelos.

La autenticación API se maneja con **Laravel Passport**, permitiendo la generación y validación de *tokens* para clientes externos. El proyecto también incluye *middleware* para selección dinámica de idioma y verificación de roles.

---

## Estructura de Carpetas

```
/
├── .docker/                       # Archivos Docker y configuración de Supervisor
├── src/                           # Aplicación Laravel
│   ├── app/                       # Controladores, modelos y servicios
│   ├── bootstrap/                 # Carga inicial de Laravel
│   ├── config/                    # Configuración de la aplicación
│   ├── database/                  # Migraciones y seeders
│   ├── lang/                      # Archivos de traducción ES/EN
│   ├── public/                    # Punto de entrada para el servidor web
│   ├── resources/                 # Vistas Blade y assets
│   ├── routes/                    # Definición de rutas web y API
│   ├── storage/                   # Archivos generados (logs, vistas, etc.)
│   └── tests/                     # Pruebas unitarias y de características
├── docker-compose.yml             # Orquestación de contenedores
├── .env                           # Variables de entorno para Docker
├── my.cnf                         # Configuración adicional para MySQL por conflictos de mayusculas al en Windows
├── DocumentacionUsuario.odt       # Manual de usuario
├── DocumentacionGeneral.odt       # Documentación general
└── otros documentos *.docx        # Informes y buenas prácticas
```

---

## Instalación y Puesta en Marcha

1. **Clonar el repositorio**
   ```bash
   git clone <url-del-repo>
   cd Tickets-project
   ```
2. **Configurar variables de entorno**
   - Copiar el archivo `.env` (o crear uno nuevo basado en `.env.example`).
   - Revisar las credenciales de base de datos y los puertos expuestos.
3. **Instalar dependencias con Composer**
   ```bash
   docker compose run --rm servicecomposer
   ```
   Este contenedor ejecutará `composer install` automáticamente.
4. **Compilar assets y dependencias NPM**
   La imagen de PHP instala `nodejs` y al construir ejecuta `npm install` y `npm run build` para compilar los recursos de Vite.
5. **Levantar el entorno completo**
   ```bash
   docker compose up -d
   ```
   Esto iniciará los servicios de PHP, MySQL, Redis, phpMyAdmin y Mailpit.
6. **Ejecutar migraciones y seeders**
   ```bash
   docker compose exec servicephp-fpm bash -c "php artisan migrate --seed" para llenar la tabal de usuarios con datos de prueba.
   ```
7. **Acceder a la aplicación**
   Visite `http://localhost:8080/es` (o `/en`) para entrar en el sistema. El idioma se selecciona mediante el prefijo en la URL.

---

## Despliegue con Docker

El archivo `docker-compose.yml` define varios contenedores:

- **servicephp-fpm**: Basado en una imagen PHP personalizada. Ejecuta `supervisord` para manejar el servidor web interno y el trabajador de colas.
- **servicecomposer**: Contenedor auxiliar para instalar dependencias de Composer en `src/`.
- **servicemysql**: Imagen de MySQL que almacena datos persistentes en `.docker/volumes/mysql-data`.
- **serviceredis**: Utilizado para la cola de trabajos y el almacenamiento de sesiones.
- **servicephpmyadmin**: Herramienta web para gestionar la base de datos MySQL.
- **servicemailpit**: Simulador de servidor SMTP para pruebas de envío de correos.

Para iniciar todos los servicios:
```bash
docker compose up -d
```

Puede detenerlos con:
```bash
docker compose down
```

---

## Migraciones y Base de Datos

El proyecto incluye varias migraciones que crean las siguientes tablas:

- `users` y `admins`: Almacenan credenciales y datos de acceso.
- `tickets`: Guarda los tickets generados por los usuarios. Contiene referencias a usuario, administrador asignado, prioridad, tipo y estado.
- `messages`: Comentarios asociados a cada ticket.
- `notifications`: Tabla estándar de Laravel para notificaciones.
- `types`: Catálogo de tipos de ticket. Puede ser modificado por administradores con permisos.
- `event_histories`: Registro de eventos (creación, actualización o eliminación de entidades).

Los seeders generan datos de ejemplo para usuarios a través de `UserSeeder.php`. Puede personalizarse para poblar más información inicial.

---

## Sistema de Autenticación

El sistema utiliza *guards* diferenciados para usuarios y administradores. En el caso de la API, Passport gestiona los tokens de acceso. La autenticación web se maneja mediante sesiones tradicionales de Laravel.

Flujo de autenticación básico:
1. El usuario o administrador se registra (o se crea mediante un seeder/registro manual).
2. Inicia sesión en `/es/login` o `/es/admin/login` dependiendo de su rol.
3. Tras autenticarse, es redirigido a su panel correspondiente (`/es/user/dashboard` o `/es/admin`).
4. Las rutas protegidas utilizan middleware `auth:user` o `auth:admin` según corresponda.

Las contraseñas se almacenan de forma segura utilizando el *hash* por defecto de Laravel.

---

## API REST

El archivo `src/routes/api.php` define los puntos de acceso para integraciones externas. Todas las rutas se dividen en dos grupos:

- **Prefijo `admin`**: Operaciones orientadas a la administración (gestión de usuarios, administradores, tipos y tickets). Se requiere autenticación con Passport mediante el guard `auth:api`.
- **Prefijo `user`**: Funcionalidades de los usuarios normales. Se protege con el guard `auth:api_user`.

Ejemplos de rutas disponibles (solo un resumen):

- `POST /api/admin/login` – Autenticación de administradores.
- `GET /api/admin/users` – Listar todos los usuarios.
- `PATCH /api/admin/tickets/{ticket}/close` – Cerrar un ticket.
- `POST /api/user/tickets/store` – Crear un ticket desde la API.
- `GET /api/user/notifications` – Obtener notificaciones de un usuario.

Para utilizar el API se debe generar un token de Passport mediante las rutas de login.

---

## Notificaciones y Eventos

Cada acción relevante genera un registro en la tabla `event_histories`. Además, se envían notificaciones por correo y base de datos:

- **Creación de ticket**: Se notifica al administrador (o a un administrador asignado) para que atienda la incidencia.
- **Cambio de estado**: Cuando un ticket pasa de pendiente a resuelto, o se reasigna, se informa al usuario y al administrador implicado.
- **Comentarios**: Al añadir comentarios, los participantes reciben un aviso para mantenerse actualizados.

Las colas de Laravel gestionan el envío asíncrono de correos gracias al contenedor Redis. Así la aplicación no bloquea la interacción del usuario.

---

## Internacionalización

El sistema soporta dos idiomas: español (`es`) e inglés (`en`). Para cambiar el idioma basta con introducir el prefijo de la URL:

- `http://localhost:8080/es` para español.
- `http://localhost:8080/en` para inglés.

Los textos se cargan desde los archivos de traducción dentro de `src/lang/`. Se proveen traducciones para mensajes genéricos, validaciones, rutas y vistas.


---

## Requisitos del Sistema

- Docker 20.10 o superior.
- Docker Compose versión 2 o superior.
- Al menos 2 GB de RAM disponibles para los contenedores.
- Espacio libre en disco para las dependencias de PHP y Node.

Si desea instalar la aplicación sin Docker, necesitará:
- PHP 8.2
- MySQL 8
- Redis 7
- Node.js 18
- Composer

---

## Acceso a la Aplicación

Una vez levantados los contenedores y ejecutadas las migraciones, puede acceder con las siguientes URLs por defecto:

- **Frontend**: `http://localhost:8080/es`
- **phpMyAdmin**: `http://localhost:8081`
- **Mailpit** (visor de correos): `http://localhost:8025`

Si se realizaron seeders, se habrá creado un usuario de ejemplo:
- **Usuario**: `test@example.com`
- **Contraseña**: definida en el seeder (`UserFactory` o `DatabaseSeeder`).

Los administradores se pueden crear manualmente desde el panel de administración o mediante un seeder personalizado.

---

## Desarrollo y Contribución

Se recomienda seguir las convenciones de código de Laravel y utilizar las herramientas incluidas:

- **Laravel Pint** para formateo automático (`./vendor/bin/pint`).
- **Laravel Debugbar** disponible en desarrollo para inspeccionar consultas.
- **Vite** para compilar CSS y JavaScript.

Antes de enviar un *pull request*, asegúrese de ejecutar las pruebas y la herramienta Pint:
```bash
./vendor/bin/pint
php artisan test
```

Las contribuciones deben describir claramente el cambio y seguir un flujo de ramas basado en *feature branches* (aunque este repositorio de ejemplo no incluye una estrategia estricta de git-flow).

---

## Información Adicional

En la raíz del proyecto encontrará varios documentos en formato **docx** y **odt** que amplían la información sobre buenas prácticas y lineamientos de desarrollo. También existen ejemplos y guías de uso para distintos perfiles dentro de la organización.

Para cualquier duda sobre Laravel, consulte [la documentación oficial](https://laravel.com/docs/12.x) o el README original incluido dentro del directorio `src/`.

---

## Claves OAuth para la API

Para que la API funcione correctamente y puedas autenticarte mediante Laravel Passport, es necesario generar las claves pública y privada de OAuth. Esto permite emitir y validar tokens de acceso.

1. **Generar las claves de Passport**
   Ejecuta el siguiente comando dentro del contenedor PHP:
   ```bash
   docker compose exec servicephp-fpm bash -c "php artisan passport:install"
   ```
   Esto creará las claves en `storage/oauth-private.key` y `storage/oauth-public.key` y registrará los clientes en la tabla `oauth_clients`.

2. **Verificar los clientes OAuth**
   Puedes revisar los clientes generados en la tabla `oauth_clients` usando phpMyAdmin o el comando:
   ```bash
   docker compose exec servicemysql bash -c "mysql -u<usuario> -p<contraseña> -e 'SELECT * FROM oauth_clients;' baseDatosMysql"
   ```

3. **Configurar el archivo `.env`**
   Asegúrate de que las variables de entorno para Passport estén presentes (normalmente Laravel lo gestiona automáticamente, pero revisa si necesitas personalizar rutas o claves).

---

## Pasos adicionales para el despliegue

- **Permisos de carpetas**: Es recomendable dar permisos a las carpetas `storage` y `bootstrap/cache`:
  ```bash
  docker compose exec servicephp-fpm bash -c "chmod -R 775 storage bootstrap/cache"
  ```
- **Compilar assets**: Si modificas recursos front-end, ejecuta:
  ```bash
  docker compose exec servicephp-fpm bash -c "npm run build"
  ```
- **Verificar migraciones**: Si agregas nuevas tablas o campos, ejecuta:
  ```bash
  docker compose exec servicephp-fpm bash -c "php artisan migrate"
  ```
- **Revisar variables de entorno**: Asegúrate de que `.env` tenga las credenciales correctas para base de datos, Redis, Mailpit, etc.

---

Con estos pasos, el sistema estará listo para emitir tokens, aceptar consultas API y funcionar correctamente en producción o desarrollo.


