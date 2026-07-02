# 🏆 SportManager

Sistema Web de Gestión de Torneos Deportivos desarrollado con Laravel 13 como Proyecto Final de la materia **INF560 - Desarrollo Web Backend** de la Universidad Autónoma Tomás Frías (UATF).

---

# 📌 Información General

**Materia:** INF560 – Desarrollo Web Backend

**Proyecto Final:** Sistema Web de Gestión de Torneos Deportivos

**Framework:** Laravel 13

**Lenguaje:** PHP 8.3+

**Base de Datos:** PostgreSQL

**Arquitectura:** Monolítica (Laravel + Blade)

**Autor:** Limberth

**Universidad:** Universidad Autónoma Tomás Frías (UATF)

---

# 📖 Descripción

SportManager es una aplicación web que permite administrar torneos deportivos de manera colaborativa.

El sistema permite:

- Crear torneos
- Gestionar partidos
- Administrar miembros del torneo
- Registrar comentarios
- Controlar accesos mediante Roles y Permisos
- Gestionar usuarios desde un panel administrativo

Todo el sistema fue desarrollado utilizando Laravel 13 siguiendo la arquitectura MVC y buenas prácticas de desarrollo.

---

# 🚀 Tecnologías utilizadas

- Laravel 13
- PHP 8.3+
- PostgreSQL
- Blade
- Laravel Breeze
- Tailwind CSS
- Spatie Laravel Permission
- Eloquent ORM
- Git

---

# 📂 Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/
│   ├── Requests/
│   └── Middleware/
│
├── Models/
│
├── Policies/
│
database/
├── migrations/
├── factories/
└── seeders/

resources/
├── views/
│   ├── admin/
│   ├── comentarios/
│   ├── partidos/
│   ├── torneos/
│   └── layouts/

routes/
└── web.php
```

---

# 🗄 Modelo de Datos

El sistema está compuesto por las siguientes entidades:

- Usuarios
- Torneos
- Partidos
- Comentarios
- Etiquetas (Opcional)

Relaciones implementadas:

## 1:N

- Usuario → Torneos
- Torneo → Partidos
- Partido → Comentarios
- Usuario → Comentarios

## N:M

- Usuarios ↔ Torneos

Tabla pivote:

```
torneo_user
```

Campos:

- torneo_id
- user_id
- torneo_role

---

# 👥 Roles del Sistema

## Administrador

Puede:

- Gestionar usuarios
- Asignar roles
- Crear torneos
- Editar cualquier torneo
- Eliminar cualquier torneo
- Gestionar miembros
- Gestionar partidos
- Comentar

---

## Organizador

Puede:

- Crear torneos
- Editar sus torneos
- Gestionar miembros
- Crear partidos
- Editar partidos
- Comentar

---

## Entrenador

Puede:

- Ver torneos
- Ver partidos
- Comentar

---

## Invitado

Puede:

- Ver torneos
- Ver partidos
- Comentar

---

# 🔐 Roles y Permisos

El sistema utiliza:

```
spatie/laravel-permission
```

Permisos implementados:

- ver torneo
- crear torneo
- editar torneo
- eliminar torneo

- gestionar miembros

- ver partido
- crear partido
- editar partido
- eliminar partido

- comentar

- gestionar usuarios

---

# 🔒 Policies

Se implementaron Policies para:

- TorneoPolicy
- PartidoPolicy
- ComentarioPolicy

Las Policies controlan:

- Ver
- Crear
- Editar
- Eliminar

según el propietario del recurso y el rol del usuario.

---

# 📋 Funcionalidades

## Autenticación

✔ Registro

✔ Inicio de sesión

✔ Cierre de sesión

✔ Middleware Auth

✔ Protección CSRF

---

## Dashboard

- Total de Torneos
- Total de Partidos
- Total de Usuarios
- Total de Comentarios
- Últimos Torneos
- Últimos Partidos

---

## Torneos

- Crear
- Editar
- Eliminar
- Buscar
- Filtrar
- Soft Delete

---

## Partidos

- Crear
- Editar
- Eliminar
- Buscar
- Filtrar
- Estado
- Marcador
- Responsable

---

## Comentarios

- Crear
- Eliminar

---

## Miembros

- Agregar
- Eliminar
- Cambiar Rol

Uso de:

- attach()
- detach()
- updateExistingPivot()

---

## Administración

Panel exclusivo para Administradores.

Permite:

- Listar usuarios
- Cambiar roles
- Gestionar permisos

---

# ⚙ Instalación

## 1. Clonar el repositorio

```bash
git clone https://github.com/LIMBERTH55/proyectofinal_sportmanager.git
```

---

## 2. Entrar al proyecto

```bash
cd proyectofinal_sportmanager
```

---

## 3. Instalar dependencias

```bash
composer install
```

---

## 4. Instalar dependencias de Node

```bash
npm install
```

---

## 5. Copiar el archivo .env

```bash
cp .env.example .env
```

---

## 6. Configurar PostgreSQL

Editar el archivo `.env`

```env
DB_CONNECTION=pgsql

DB_HOST=127.0.0.1

DB_PORT=5432

DB_DATABASE=proyecto_db

DB_USERNAME=postgres

DB_PASSWORD=tu_password
```

---

## 7. Generar la clave

```bash
php artisan key:generate
```

---

## 8. Ejecutar migraciones

```bash
php artisan migrate:fresh --seed
```

---

## 9. Compilar Vite

```bash
npm run dev
```

---

## 10. Ejecutar el servidor

```bash
php artisan serve
```

---

# 👤 Credenciales de prueba

## Administrador

Correo:

```
admin@sportmanager.com
```

Contraseña

```
12345678
```

---

## Organizador

Correo:

```
organizador@sportmanager.com
```

Contraseña

```
12345678
```

---

## Entrenador

Correo

```
entrenador@sportmanager.com
```

Contraseña

```
12345678
```

---

## Invitado

Correo

```
invitado@sportmanager.com
```

Contraseña

```
12345678
```

---

# 📁 Seeders

Se implementaron:

- AdminSeeder
- UserRoleSeeder
- RolePermissionSeeder
- SportManagerSeeder

---

# 📁 Factories

- UserFactory
- TorneoFactory
- PartidoFactory
- ComentarioFactory

---

# 📁 Form Requests

- StoreTorneoRequest
- UpdateTorneoRequest
- StorePartidoRequest
- UpdatePartidoRequest
- StoreComentarioRequest

---

# 📁 Controladores

- DashboardController
- TorneoController
- PartidoController
- ComentarioController
- MiembroController
- AdminUserController

---

# 📁 Policies

- TorneoPolicy
- PartidoPolicy
- ComentarioPolicy

---

# 📁 Middleware

- auth
- role
- permission

---

# 🛠 Características Implementadas

- Soft Deletes
- Eloquent ORM
- Form Requests
- Policies
- Roles
- Permisos
- Dashboard
- CRUD Completo
- Relaciones 1:N
- Relaciones N:M
- Tabla Pivote
- Paginación
- Filtros
- Mensajes Flash
- Errores Personalizados (403, 404, 500)

---

# 📌 Control de Versiones

Etiquetas utilizadas:

```
v0.1
```

Cimientos

```
v0.2
```

Autenticación

```
v0.3
```

Roles y Permisos

```
v0.4
```

CRUD Completo

```
v1.0
```

Proyecto Final

---

# 📄 Licencia

Proyecto desarrollado exclusivamente con fines académicos para la asignatura **INF560 – Desarrollo Web Backend** de la **Universidad Autónoma Tomás Frías (UATF)**.

---

# 👨‍💻 Autor

**Limberth**

Ingeniería Informática

Universidad Autónoma Tomás Frías

Potosí - Bolivia

2026