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
MVP1-09	Preparar base de autenticación futura	Issue actual
MVP1-10	Configurar CORS para conexión React + Laravel	Pendiente
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
Estructura limpia inicial:
```txt
backend/service-desk-api/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/
│   │   ├── Requests/
│   │   └── Middleware/
│   ├── Models/
│   ├── Services/
│   └── Repositories/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── routes/
│   └── api.php
└── tests/
    ├── Feature/
    └── Unit/
```
Comandos principales:
```bash
cd backend/service-desk-api
php artisan --version
php artisan route:list
php artisan test
php artisan serve
```
---
Frontend React
Ruta del frontend:
```bash
frontend/service-desk-web
```
Estructura limpia inicial:
```txt
frontend/service-desk-web/
├── src/
│   ├── assets/
│   ├── components/
│   ├── pages/
│   ├── routes/
│   ├── services/
│   │   └── api.js
│   ├── hooks/
│   ├── context/
│   ├── utils/
│   └── styles/
├── public/
├── .env.example
├── package.json
└── vite.config.js
```
Comandos principales:
```bash
cd frontend/service-desk-web
npm install
npm run dev
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
Base de autenticación futura
El issue actual MVP1-09 — Preparar base de autenticación futura prepara la estructura para que más adelante se pueda implementar login, logout, usuario autenticado, roles y protección de rutas.
En este issue no necesariamente se implementa el login completo todavía. Se prepara la base técnica para que el siguiente desarrollo sea ordenado.
Elementos esperados:
```txt
app/Http/Controllers/Api/AuthController.php
app/Http/Requests/Auth/
app/Services/Auth/
app/Repositories/UserRepository.php
tests/Feature/Auth/
```
Validaciones esperadas:
```bash
php artisan route:list
php artisan test
```
---
Variables de entorno
Backend Laravel
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
```env
VITE_API_URL=http://127.0.0.1:8000/api
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
Criterios para cerrar MVP1-09
Puedes mover el issue MVP1-09 - Preparar base de autenticación futura a Done cuando tengas validado:
```txt
✅ Se identificó el modelo User existente de Laravel
✅ Se validó que existe migración base de users
✅ Se creó carpeta app/Http/Requests/Auth
✅ Se creó carpeta app/Services/Auth
✅ Se creó carpeta tests/Feature/Auth
✅ Se creó AuthController base en app/Http/Controllers/Api
✅ Se creó UserRepository base o se dejó preparada la carpeta Repositories para usuarios
✅ Se documentó que el login completo queda para issue posterior
✅ php artisan route:list funciona correctamente
✅ php artisan test sigue pasando sin errores críticos
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
git commit -m "chore: prepare authentication base structure"
git push origin main
```
---
Estado esperado al cerrar MVP1-09
Al terminar MVP1-09, se espera:
La estructura inicial para autenticación está preparada.
Laravel mantiene su estructura limpia.
No se implementó lógica innecesaria antes de tiempo.
Las pruebas actuales siguen pasando.
README global actualizado.
Cambios subidos a GitHub.
Issue MVP1-09 actualizado en GitHub Projects.
---
Próximo paso
Después de cerrar MVP1-09, continuar con:
MVP1-10 — Configurar CORS para conexión React + Laravel
---
Responsable
Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack