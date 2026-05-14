# Service Desk LDR — Backend Laravel API

Backend del sistema **Service Desk LDR**, desarrollado con **Laravel API + PHP 8.4**.

Este backend expone endpoints REST para que el frontend React pueda consumir información del sistema. Actualmente contiene la base del proyecto, conexión con MySQL, endpoint `/api/health`, prueba TDD inicial y estructura preparada para autenticación futura.

---

## Stack backend

| Herramienta | Uso |
|---|---|
| Laravel | Framework backend |
| PHP 8.4 | Lenguaje backend |
| MySQL | Base de datos |
| Apache | Servidor objetivo |
| PHPUnit / Laravel Test | Pruebas automatizadas |
| Composer | Gestión de dependencias PHP |

---

## Ruta dentro del repositorio

```txt
service-desk-ldr/
└── backend/
    └── service-desk-api/
```

---

## Estructura sugerida

```txt
backend/service-desk-api/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/
│   │   ├── Requests/
│   │   │   └── Auth/
│   │   └── Middleware/
│   ├── Models/
│   ├── Repositories/
│   └── Services/
│       └── Auth/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── routes/
│   └── api.php
├── tests/
│   ├── Feature/
│   │   └── HealthEndpointTest.php
│   └── Unit/
├── .env.example
├── artisan
└── composer.json
```

---

## Instalación

Entrar al backend:

```bash
cd backend/service-desk-api
```

Instalar dependencias:

```bash
composer install
```

---

## Variables de entorno

Archivo real local:

```txt
.env
```

Archivo plantilla:

```txt
.env.example
```

Variables principales:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=service_desk_ldr_dev
DB_USERNAME=root
DB_PASSWORD=

FRONTEND_URL=http://localhost:5173
```

---

## Base de datos

Base de datos sugerida para desarrollo:

```txt
service_desk_ldr_dev
```

Crear base de datos:

```sql
CREATE DATABASE service_desk_ldr_dev CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Limpiar configuración:

```bash
php artisan config:clear
```

Ejecutar migraciones:

```bash
php artisan migrate
```

---

## Ejecutar backend en desarrollo

```bash
php artisan serve
```

URL local esperada:

```txt
http://127.0.0.1:8000
```

---

## Endpoint de salud

Endpoint creado:

```txt
GET /api/health
```

URL local:

```txt
http://127.0.0.1:8000/api/health
```

Respuesta esperada:

```json
{
  "status": "ok",
  "message": "Service Desk API is running",
  "service": "service-desk-ldr",
  "version": "1.0.0"
}
```

Validar con curl:

```bash
curl http://127.0.0.1:8000/api/health
```

---

## Prueba TDD

Archivo:

```txt
tests/Feature/HealthEndpointTest.php
```

La prueba valida:

```txt
HTTP 200
status: ok
message: Service Desk API is running
service: service-desk-ldr
version: 1.0.0
```

Ejecutar prueba específica:

```bash
php artisan test --filter=HealthEndpointTest
```

Ejecutar todas las pruebas:

```bash
php artisan test
```

---

## CORS

El backend debe permitir peticiones desde React:

```txt
http://localhost:5173
```

Variable usada:

```env
FRONTEND_URL=http://localhost:5173
```

Validación sugerida:

```bash
curl -i -H "Origin: http://localhost:5173" http://127.0.0.1:8000/api/health
```

---

## Base de autenticación futura

Estructura preparada:

```txt
app/Http/Controllers/Api/AuthController.php
app/Http/Requests/Auth/
app/Services/Auth/
app/Repositories/UserRepository.php
tests/Feature/Auth/
```

El login completo queda para un issue posterior. Este backend ya queda preparado para crecer hacia:

```txt
login
logout
usuario autenticado
roles
permisos
rutas protegidas
tokens / sesión API
```

---

## Regla de trabajo con TDD

```txt
Criterio de aceptación o prueba
↓
Implementación mínima
↓
Validación
↓
Refactorización
↓
Documentación
↓
Commit en GitHub
↓
Done
```

---

## Comandos útiles

```bash
php artisan --version
php artisan route:list
php artisan test
php artisan serve
php artisan config:clear
php artisan migrate
```

---

## Responsable

Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack
