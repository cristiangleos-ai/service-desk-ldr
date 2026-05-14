# Service Desk LDR

Sistema interno tipo **Service Desk / Helpdesk** para la gestión de incidentes, requerimientos y solicitudes de soporte tecnológico dentro de LDR Solutions.

Este repositorio usa una estructura tipo **monorepo**, concentrando backend, frontend, documentación y configuración general del proyecto en un solo lugar.

---

## Objetivo del proyecto

Centralizar la atención de soporte tecnológico mediante un sistema que permita:

- Levantar tickets de soporte.
- Consultar el estado de solicitudes.
- Gestionar usuarios, técnicos y administradores.
- Dar seguimiento a tickets.
- Controlar estados del flujo de atención.
- Preparar la base para SLA, notificaciones, reportes, cierre y reproceso de tickets.

---

## Stack tecnológico

| Capa | Tecnología |
|---|---|
| Backend | Laravel API |
| Lenguaje backend | PHP 8.4 |
| Frontend | React |
| Base de datos | MySQL |
| Servidor | Apache |
| Entorno local | Linux mediante WSL |
| Control de versiones | Git + GitHub |
| Gestión del proyecto | GitHub Projects |
| Calidad | TDD + validación funcional |

---

## Estructura global del repositorio

```txt
service-desk-ldr/
│
├── backend/
│   └── service-desk-api/
│       ├── app/
│       ├── bootstrap/
│       ├── config/
│       ├── database/
│       ├── public/
│       ├── resources/
│       ├── routes/
│       ├── storage/
│       ├── tests/
│       ├── .env.example
│       ├── artisan
│       ├── composer.json
│       └── README.md
│
├── frontend/
│   └── service-desk-web/
│       ├── public/
│       ├── src/
│       ├── .env.example
│       ├── index.html
│       ├── package.json
│       ├── vite.config.js
│       └── README.md
│
├── docs/
│   ├── requerimientos/
│   ├── evidencias/
│   ├── arquitectura/
│   └── pruebas/
│
├── README.md
└── .gitignore
```

---

## Plan general por MVP

| MVP | Nombre | Objetivo |
|---|---|---|
| MVP 0 | Setup | Preparar entorno, repositorio, tablero y estructura inicial. |
| MVP 1 | Base funcional | Crear la base Laravel API + React + MySQL + comunicación inicial. |
| MVP 2 | Gestión de tickets | Construir el flujo formal de tickets, estados, historial y comentarios. |
| MVP 3 | Operación TI | Permitir que técnicos/admin asignen, atiendan y resuelvan tickets. |
| MVP 4 | SLA y notificaciones | Agregar prioridades, tiempos de atención, semáforos y alertas. |
| MVP 5 | Reportes y cierre | Incorporar dashboards, reportes, cierre, reproceso, encuesta y despliegue. |

---

## MVP actual

Actualmente el proyecto se encuentra en:

**MVP 1 — Base funcional**

Objetivo del MVP 1:

> Dejar lista la base técnica del proyecto para continuar con el desarrollo del flujo de tickets, operación TI, SLA, notificaciones y reportes.

---

## Issues oficiales del MVP 1

| Issue | Actividad | Estado |
|---|---|---|
| MVP1-01 | Configurar entorno de desarrollo en WSL | Finalizado |
| MVP1-02 | Validar herramientas base | Finalizado |
| MVP1-03 | Crear backend base en Laravel API | Finalizado / validar cierre |
| MVP1-04 | Crear frontend base en React | Finalizado / validar cierre |
| MVP1-05 | Configurar conexión Laravel + MySQL | Finalizado / validar cierre |
| MVP1-06 | Crear endpoint `/api/health` | Finalizado / validar cierre |
| MVP1-07 | Crear primera prueba TDD para `/api/health` | Finalizado / validar cierre |
| MVP1-08 | Configurar estructura limpia inicial | Finalizado / validar cierre |
| MVP1-09 | Preparar base de autenticación futura | Finalizado / validar cierre |
| MVP1-10 | Configurar CORS para conexión React + Laravel | Finalizado / validar cierre |
| MVP1-11 | Crear primera llamada desde React a Laravel | Finalizado / validar cierre |
| MVP1-12 | Crear README inicial del proyecto | Issue actual |
| MVP1-13 | Subir avance a GitHub | Pendiente / continuo |
| MVP1-14 | Validar criterios de cierre del MVP 1 | Pendiente |

---

## Backend Laravel API

Ruta del backend:

```bash
backend/service-desk-api
```

Comandos principales:

```bash
cd backend/service-desk-api
composer install
php artisan --version
php artisan route:list
php artisan test
php artisan serve
```

URL local esperada:

```txt
http://127.0.0.1:8000
```

---

## Frontend React

Ruta del frontend:

```bash
frontend/service-desk-web
```

Comandos principales:

```bash
cd frontend/service-desk-web
npm install
npm run dev
```

URL local esperada:

```txt
http://localhost:5173
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

Prueba TDD relacionada:

```bash
php artisan test --filter=HealthEndpointTest
```

---

## Variables de entorno

### Backend Laravel

Archivo real local:

```txt
backend/service-desk-api/.env
```

Archivo plantilla:

```txt
backend/service-desk-api/.env.example
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

### Frontend React

Archivo real local:

```txt
frontend/service-desk-web/.env
```

Archivo plantilla:

```txt
frontend/service-desk-web/.env.example
```

Variable principal:

```env
VITE_API_URL=http://127.0.0.1:8000/api
```

---

## Cliente Axios

Ruta sugerida:

```txt
frontend/service-desk-web/src/services/api.js
```

Contenido base:

```js
import axios from "axios";

const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL,
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});

export default api;
```

---

## Primera conexión React + Laravel

El frontend React consume el endpoint:

```txt
GET /api/health
```

Archivo de prueba funcional sugerido:

```txt
frontend/service-desk-web/src/pages/HealthCheck.jsx
```

Resultado esperado en pantalla:

```txt
Status: ok
Message: Service Desk API is running
Service: service-desk-ldr
Version: 1.0.0
```

---

## Regla de trabajo con TDD

El proyecto debe mantenerse bajo una filosofía de TDD o validación funcional clara.

Flujo recomendado por issue:

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

Una tarea crítica no debe pasar a **Done** sin:

- Código implementado.
- Prueba automatizada o validación funcional clara.
- Sin errores visibles.
- Commit subido a GitHub.
- Documentación actualizada si aplica.

---

## Criterios para cerrar MVP1-12

Puedes mover el issue **MVP1-12 - Crear README inicial del proyecto** a **Done** cuando tengas validado:

```txt
✅ README global creado en la raíz del proyecto
✅ README frontend creado en frontend/service-desk-web
✅ README backend creado en backend/service-desk-api
✅ README global explica objetivo, stack, estructura y MVP actual
✅ README backend explica comandos Laravel, endpoint /api/health y pruebas
✅ README frontend explica comandos React, Axios y conexión con API
✅ Se documenta el uso de variables .env y .env.example
✅ Se documenta la regla TDD / validación funcional
✅ Cambios subidos a GitHub
```

---

## Tablero SCRUM

Columnas:

```txt
Product Backlog
Sprint Backlog
To Do
In Progress
Code Review
Testing / QA
Blocked
Done
```

Campos:

```txt
Priority
Module
Sprint
Story Points
Type
MVP Phase
```

Story Points:

```txt
1 = Muy fácil
2 = Fácil
3 = Medio
5 = Complejo
8 = Muy complejo
```

---

## Comandos Git básicos

Desde la raíz del proyecto:

```bash
git status
git add .
git commit -m "docs: add project README files"
git push origin main
```

---

## Próximo paso

Después de cerrar MVP1-12, continuar con:

**MVP1-13 — Subir avance a GitHub**

---

## Responsable

Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack
