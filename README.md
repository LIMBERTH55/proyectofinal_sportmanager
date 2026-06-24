# SPORTMANAGER

## Sistema Web de Gestión de Torneos Deportivos

### Proyecto Final - INF560 Desarrollo Web Backend

**Universidad Autónoma Tomás Frías (UATF)**

**Estudiante:** Limberth Cordova Mamani

**Docente:** M. Sc. Huáscar Fedor Gonzales Guzmán

**Versión Actual:** v0.2

---

# DESCRIPCIÓN DEL PROYECTO

SportManager es una aplicación web desarrollada con Laravel para la gestión de torneos deportivos.

El sistema permite administrar torneos, partidos, participantes y comentarios mediante una interfaz web segura, utilizando autenticación basada en sesión, control de acceso y operaciones CRUD.

La versión actual corresponde a la Fase 2 del proyecto.

---

# TECNOLOGÍAS UTILIZADAS

* Laravel 13
* PHP 8.3+
* PostgreSQL
* Blade
* Laravel Breeze
* Eloquent ORM
* Git

---

# FUNCIONALIDADES IMPLEMENTADAS

## FASE 1 - CIMIENTOS (v0.1)

### Modelo de Datos

#### User

* name
* email
* password

#### Torneo

* nombre
* descripcion
* estado
* owner_id

#### Partido

* torneo_id
* responsable_id
* titulo
* descripcion
* estado
* prioridad
* fecha_partido

#### Comentario

* contenido
* user_id
* partido_id

#### Etiqueta (Opcional)

* nombre
* color

---

### Relaciones Implementadas

#### 1:N

* Torneo → Partidos
* Usuario → Comentarios
* Partido → Comentarios

#### N:M

* Usuario ↔ Torneo

Tabla pivote:

```text
torneo_user
```

Campos:

```text
user_id
torneo_id
torneo_role
```

---

### Soft Deletes

Implementados en:

* Torneo
* Partido

---

### Factories

* UserFactory
* TorneoFactory
* PartidoFactory

---

### Seeders

* SportManagerSeeder

---

## FASE 2 - AUTENTICACIÓN (v0.2)

### Laravel Breeze

Se implementó Laravel Breeze con Blade para proporcionar autenticación basada en sesión.

Funcionalidades:

* Registro de usuarios
* Inicio de sesión
* Cierre de sesión
* Recuperación de sesión
* Middleware auth
* Protección CSRF

---

### Dashboard Privado

Acceso restringido únicamente a usuarios autenticados.

Ruta:

```text
/dashboard
```

---

### Navbar Personalizada

Se personalizó la navegación principal para SportManager.

Incluye:

* Nombre del sistema
* Usuario autenticado
* Logout

---

### Protección de Rutas

Uso de:

```php
Route::middleware(['auth'])
```

para restringir acceso a usuarios autenticados.

---

### Protección CSRF

Todos los formularios generados por Breeze incluyen:

```blade
@csrf
```

Cumpliendo los requisitos de seguridad del proyecto.

---

# INSTALACIÓN

## Clonar repositorio

```bash
git clone https://github.com/LIMBERTH55/proyectofinal_sportmanager.git
```

Ingresar al proyecto:

```bash
cd proyectofinal_sportmanager
```

---

## Instalar dependencias PHP

```bash
composer install
```

---

## Instalar dependencias Frontend

```bash
npm install
```

---

## Configurar variables de entorno

```bash
cp .env.example .env
```

Editar:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=proyecto_db
DB_USERNAME=postgres
DB_PASSWORD=123456
```

---

## Generar clave de aplicación

```bash
php artisan key:generate
```

---

## Ejecutar migraciones y seeders

```bash
php artisan migrate:fresh --seed
```

---

## Compilar assets

Modo desarrollo:

```bash
npm run dev
```

Modo producción:

```bash
npm run build
```

---

## Iniciar servidor

```bash
php artisan serve
```

Abrir:

```text
http://127.0.0.1:8000
```

---

# USUARIO DE PRUEBA

Administrador:

```text
Correo:
admin@sportmanager.com

Contraseña:
12345678
```

---

# ESTRUCTURA DEL PROYECTO

```text
app/
├── Models
│   ├── Torneo.php
│   ├── Partido.php
│   ├── Comentario.php
│   └── Etiqueta.php

database/
├── migrations
├── factories
├── seeders

resources/
├── views

routes/
├── web.php
```

---

# CONTROL DE VERSIONES

## v0.1

Incluye:

* Migraciones
* Modelos
* Relaciones
* Factories
* Seeders
* Soft Deletes

---

## v0.2

Incluye:

* Laravel Breeze
* Login
* Registro
* Logout
* Dashboard privado
* Middleware auth
* Protección CSRF
* Navbar personalizada
---
# ESTADO DEL PROYECTO

## COMPLETADO

* Fase 1 (v0.1)
* Fase 2 (v0.2)

## SIGUIENTE FASE

### Fase 3 (v0.3)

Implementación de:

* Spatie Laravel Permission
* Roles
* Permisos
* Policies
* Control de acceso con @can
* Control de acceso con @role
* Autorización por pertenencia
