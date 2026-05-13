Service Desk LDR
Sistema interno tipo Service Desk / Helpdesk para la gestión de incidentes, requerimientos y solicitudes de soporte tecnológico dentro de LDR Solutions.
Este repositorio usa una estructura tipo monorepo, concentrando backend, frontend, documentación y configuración general del proyecto en un solo lugar.
---
Objetivo del proyecto
Centralizar la atención de soporte tecnológico mediante un sistema que permita:
Levantar tickets de soporte.
Consultar el estado de solicitudes.
Gestionar usuarios, técnicos y administradores.
Dar seguimiento a tickets.
Controlar estados del flujo de atención.
Preparar la base para SLA, notificaciones, reportes, cierre y reproceso de tickets.
---
Stack tecnológico
Capa	Tecnología
Backend	Laravel API
Lenguaje backend	PHP 8.4
Frontend	React
Base de datos	MySQL
Servidor	Apache
Entorno local	Linux mediante WSL
Control de versiones	Git + GitHub
Gestión del proyecto	GitHub Projects
Calidad	TDD + validación funcional
---
Estructura global del repositorio
```txt
service-desk-ldr/
│
├── backend/
│   └── service-desk-api/
│
├── frontend/
│   └── service-desk-web/
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
Plan general por MVP
MVP	Nombre	Objetivo
MVP 0	Setup	Preparar entorno, repositorio, tablero y estructura inicial.
MVP 1	Base funcional	Crear la base Laravel API + React + MySQL + comunicación inicial.
MVP 2	Gestión de tickets	Construir el flujo formal de tickets, estados, historial y comentarios.
MVP 3	Operación TI	Permitir que técnicos/admin asignen, atiendan y resuelvan tickets.
MVP 4	SLA y notificaciones	Agregar prioridades, tiempos de atención, semáforos y alertas.
MVP 5	Reportes y cierre	Incorporar dashboards, reportes, cierre, reproceso, encuesta y despliegue.
---
MVP actual
Actualmente el proyecto se encuentra en:
MVP 1 — Base funcional
Objetivo del MVP 1:
> Dejar lista la base técnica del proyecto para continuar con el desarrollo del flujo de tickets, operación TI, SLA, notificaciones y reportes.
---
Issues oficiales del MVP 1
Issue	Actividad	Estado
MVP1-01	Configurar entorno de desarrollo en WSL	Finalizado
MVP1-02	Validar herramientas base	Finalizado
MVP1-03	Crear backend base en Laravel API	Finalizado / validar cierre
MVP1-04	Crear frontend base en React	Finalizado / validar cierre
MVP1-05	Configurar conexión Laravel + MySQL	Finalizado / validar cierre
MVP1-06	Crear endpoint `/api/health`	Finalizado / validar cierre
MVP1-07	Crear primera prueba TDD para `/api/health`	Finalizado / validar cierre
MVP1-08	Configurar estructura limpia inicial	Finalizado / validar cierre
MVP1-09	Preparar base de autenticación futura	Finalizado / validar cierre
MVP1-10	Configurar CORS para conexión React + Laravel	Issue actual
MVP1-11	Crear primera llamada desde React a Laravel	Pendiente
MVP1-12	Crear README inicial del proyecto	En actualización continua
MVP1-13	Subir avance a GitHub	Pendiente / continuo
MVP1-14	Validar criterios de cierre del MVP 1	Pendiente
---
Backend Laravel API
Ruta del backend:
```bash
backend/service-desk-api
```
Comandos principales:
```bash
cd backend/service-desk-api
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
Frontend React
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
Endpoint de salud
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
Variables de entorno
Backend Laravel
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
Frontend React
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
Cliente Axios
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
CORS React + Laravel
Issue actual:
MVP1-10 — Configurar CORS para conexión React + Laravel
Objetivo:
> Permitir que el frontend React en `http://localhost:5173` pueda consumir la API Laravel en `http://127.0.0.1:8000/api` sin bloqueo del navegador por política CORS.
Configuración esperada para desarrollo local:
```php
'paths' => ['api/*', 'sanctum/csrf-cookie'],
'allowed_methods' => ['*'],
'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:5173')],
'allowed_headers' => ['*'],
'exposed_headers' => [],
'max_age' => 0,
'supports_credentials' => false,
```
Validaciones esperadas:
```bash
php artisan config:clear
php artisan route:list
php artisan test
curl -i -H "Origin: http://localhost:5173" http://127.0.0.1:8000/api/health
```
---
Regla de trabajo con TDD
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
Una tarea crítica no debe pasar a Done sin:
Código implementado.
Prueba automatizada o validación funcional clara.
Sin errores visibles.
Commit subido a GitHub.
Documentación actualizada si aplica.
---
Criterios para cerrar MVP1-10
Puedes mover el issue MVP1-10 - Configurar CORS para conexión React + Laravel a Done cuando tengas validado:
```txt
✅ Existe configuración CORS en Laravel
✅ FRONTEND_URL=http://localhost:5173 está definido en .env
✅ FRONTEND_URL está documentado en .env.example
✅ allowed_origins permite http://localhost:5173
✅ paths incluye api/*
✅ php artisan config:clear se ejecutó correctamente
✅ php artisan route:list funciona correctamente
✅ php artisan test sigue pasando sin errores críticos
✅ curl con Origin http://localhost:5173 responde correctamente
✅ No aparece error CORS al consumir Laravel desde React
✅ README global actualizado
✅ Cambios subidos a GitHub
```
---
Tablero SCRUM
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
Comandos Git básicos
Desde la raíz del proyecto:
```bash
git status
git add .
git commit -m "chore: configure CORS for React frontend"
git push origin main
```
---
Estado esperado al cerrar MVP1-10
Al terminar MVP1-10, se espera:
Laravel permite peticiones desde React local.
La API mantiene la ruta `/api/health` funcionando.
Las pruebas actuales siguen pasando.
No hay errores críticos de CORS.
README global actualizado.
Cambios subidos a GitHub.
Issue MVP1-10 actualizado en GitHub Projects.
---
Próximo paso
Después de cerrar MVP1-10, continuar con:
MVP1-11 — Crear primera llamada desde React a Laravel
---
Responsable
Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack