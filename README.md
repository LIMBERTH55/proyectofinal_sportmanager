# SPORTMANAGER

## Sistema Web de Gestión de Torneos Deportivos

### Proyecto Final - INF560 Desarrollo Web Backend

**Universidad Autónoma Tomás Frías (UATF)** 
**Carrera Ingenieria Informatica**

**Estudiante:** Limberth Cordova Mamani

**Docente:** M. Sc. Huáscar Fedor Gonzales Guzmán

**Versión:** v0.1

---

# DESCRIPCIÓN DEL PROYECTO

SportManager es una aplicación web desarrollada con Laravel para la gestión de torneos deportivos.

El sistema permitirá administrar torneos, partidos, participantes y comentarios mediante una interfaz web. El proyecto sigue una arquitectura monolítica utilizando Laravel, PostgreSQL y Blade.

La versión v0.1 corresponde a la fase de cimientos del proyecto e incluye el modelo de datos, relaciones, migraciones, factories y seeders.

---

# TECNOLOGÍAS UTILIZADAS

* Laravel 13
* PHP 8.3+
* PostgreSQL
* Eloquent ORM
* Blade
* Git

---

# MODELO DE DATOS

## Entidades principales

### User

Representa los usuarios del sistema.

Campos principales:

* id
* name
* email
* password

---

### Torneo

Campos:

* id
* nombre
* descripcion
* estado
* owner_id
* deleted_at

---

### Partido

Campos:

* id
* torneo_id
* responsable_id
* titulo
* descripcion
* estado
* prioridad
* fecha_partido
* deleted_at

---

### Comentario

Campos:

* id
* contenido
* user_id
* partido_id

---

### Etiqueta (Opcional)

Campos:

* id
* nombre
* color

---

# RELACIONES IMPLEMENTADAS

## Relación 1:N

### Torneo → Partido

Un torneo puede tener muchos partidos.

### Usuario → Comentario

Un usuario puede realizar muchos comentarios.

### Partido → Comentario

Un partido puede tener muchos comentarios.

---

## Relación N:M

### Usuario ↔ Torneo

Tabla pivote:

torneo_user

Campos:

* user_id
* torneo_id
* torneo_role

Ejemplos de roles en torneo:

* organizador
* entrenador
* arbitro
* invitado

---

# SOFT DELETES

Se implementó Soft Delete en:

* Torneo
* Partido

Esto permite recuperar registros eliminados sin perder información.

---

# FACTORIES

Factories implementados:

* UserFactory
* TorneoFactory
* PartidoFactory

Permiten generar datos de prueba automáticamente.

---

# SEEDERS

Seeder principal:

SportManagerSeeder

Funciones:

* Crear usuario administrador
* Crear torneos de prueba
* Crear partidos asociados

---

# INSTALACIÓN

Clonar repositorio:

```bash
git clone URL_DEL_REPOSITORIO
```

Ingresar al proyecto:

```bash
cd sportmanager
```

Instalar dependencias:

```bash
composer install
```

Copiar variables de entorno:

```bash
cp .env.example .env
```

Generar clave:

```bash
php artisan key:generate
```

Configurar PostgreSQL en el archivo .env:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=sportmanager
DB_USERNAME=postgres
DB_PASSWORD=xxxxx
```

Ejecutar migraciones y seeders:

```bash
php artisan migrate:fresh --seed
```

Levantar servidor:

```bash
php artisan serve
```

---

# ESTRUCTURA DEL PROYECTO

app/
├── Models
│   ├── Torneo.php
│   ├── Partido.php
│   ├── Comentario.php
│   └── Etiqueta.php
│
database/
├── migrations
├── factories
└── seeders

---

# CONTROL DE VERSIONES

Versión actual:

```text
v0.1
```

Contenido:

* Migraciones
* Modelos
* Relaciones Eloquent
* Factories
* Seeders
* Soft Deletes
* Tabla pivote N:M

# ESTADO DEL PROYECTO

## FASE 1 COMPLETADA (v0.1)

Incluye:

* Modelo relacional
* Migraciones
* Relaciones Eloquent
* Factories
* Seeders
* Soft Deletes
* Relación N:M con campo adicional en pivote

Próxima fase:

v0.2 - Autenticación con Laravel Breeze y protección de rutas.
