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
MVP1-07	Crear primera prueba TDD para `/api/health`	Issue actual / en validación
MVP1-08	Configurar estructura limpia inicial	Pendiente
MVP1-09	Preparar base de autenticación futura	Pendiente
MVP1-10	Configurar CORS para conexión React + Laravel	Pendiente
MVP1-11	Crear primera llamada desde React a Laravel	Pendiente
MVP1-12	Crear README inicial del proyecto	En actualización continua
MVP1-13	Subir avance a GitHub	Pendiente / continuo
MVP1-14	Validar criterios de cierre del MVP 1	Pendiente
---
Requisitos base del entorno
Validar las herramientas principales:
```bash
php -v
composer -V
mysql --version
apache2 -v
node -v
npm -v
git --version
curl --version
```
---
Backend Laravel API
Ruta del backend:
```bash
backend/service-desk-api
```
Entrar al backend:
```bash
cd backend/service-desk-api
```
Instalar dependencias, si aplica:
```bash
composer install
```
Validar Laravel:
```bash
php artisan --version
```
Listar rutas:
```bash
php artisan route:list
```
Levantar servidor local:
```bash
php artisan serve
```
URL local esperada:
```txt
http://127.0.0.1:8000
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
---
Prueba TDD para `/api/health`
Archivo esperado:
```txt
backend/service-desk-api/tests/Feature/HealthEndpointTest.php
```
La prueba automatizada debe validar:
Código HTTP 200.
Estructura JSON.
Campo `status` con valor `ok`.
Campo `message` con valor `Service Desk API is running`.
Campo `service` con valor `service-desk-ldr`.
Campo `version` con valor `1.0.0`.
Comando para ejecutar solo esta prueba:
```bash
php artisan test --filter=HealthEndpointTest
```
Comando para ejecutar todas las pruebas:
```bash
php artisan test
```
---
Frontend React
Ruta del frontend:
```bash
frontend/service-desk-web
```
Entrar al frontend:
```bash
cd frontend/service-desk-web
```
Instalar dependencias:
```bash
npm install
```
Levantar React:
```bash
npm run dev
```
URL local esperada:
```txt
http://localhost:5173
```
---
Variables de entorno
Backend Laravel
Archivo real local:
```txt
backend/service-desk-api/.env
```
Archivo plantilla que sí se sube al repositorio:
```txt
backend/service-desk-api/.env.example
```
Variables principales para desarrollo local:
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
Frontend React
Archivo real local:
```txt
frontend/service-desk-web/.env
```
Archivo plantilla que sí se sube al repositorio:
```txt
frontend/service-desk-web/.env.example
```
Variable base para consumir la API Laravel:
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
Base de datos
Base de datos sugerida para desarrollo:
```txt
service_desk_ldr_dev
```
Base de datos sugerida para pruebas:
```txt
service_desk_ldr_test
```
Comando SQL sugerido para crear la base de datos de desarrollo:
```sql
CREATE DATABASE service_desk_ldr_dev CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
Después de configurar el archivo `.env` de Laravel, validar conexión con:
```bash
php artisan config:clear
php artisan migrate
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
Criterios para cerrar issues MVP1-XX
Cada issue del MVP 1 debe incluir una sección de cierre con checklist.
Formato esperado:
```txt
## Criterios para cerrar MVP1-XX

✅ Funcionalidad implementada
✅ Validación ejecutada correctamente
✅ Sin errores críticos
✅ README actualizado si aplica
✅ Cambios subidos a GitHub
```
---
Criterios para cerrar MVP1-07
Puedes mover el issue MVP1-07 - Crear primera prueba TDD para `/api/health` a Done cuando tengas validado:
```txt
✅ Existe el archivo tests/Feature/HealthEndpointTest.php
✅ La prueba usa getJson('/api/health')
✅ La prueba valida HTTP 200
✅ La prueba valida status: ok
✅ La prueba valida message: Service Desk API is running
✅ La prueba valida service: service-desk-ldr
✅ La prueba valida version: 1.0.0
✅ php artisan test --filter=HealthEndpointTest pasa correctamente
✅ php artisan test no muestra errores críticos
✅ Cambios subidos a GitHub
✅ README global actualizado
```
---
Tablero SCRUM
Columnas del tablero:
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
Campos usados:
```txt
Priority
Module
Sprint
Story Points
Type
MVP Phase
```
Escala oficial de Story Points:
```txt
1 = Muy fácil
2 = Fácil
3 = Medio
5 = Complejo
8 = Muy complejo
```
Regla:
```txt
Si una tarea parece de 8 puntos o más, conviene dividirla en issues más pequeños.
```
---
Comandos Git básicos
Desde la raíz del proyecto:
```bash
git status
git add .
git commit -m "test: add health endpoint test"
git push origin main
```
---
Estado actual esperado al cerrar MVP1-07
Al terminar MVP1-07, se espera:
Existe una prueba automatizada para `GET /api/health`.
La prueba valida HTTP 200.
La prueba valida la estructura JSON esperada.
`php artisan test --filter=HealthEndpointTest` ejecuta correctamente.
`php artisan test` no muestra errores críticos.
Cambios subidos a GitHub.
Issue MVP1-07 actualizado en GitHub Projects.
README global actualizado.
---
Próximo paso
Después de cerrar MVP1-07, continuar con:
MVP1-08 — Configurar estructura limpia inicial
---
Responsable
Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack