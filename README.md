Service Desk LDR
Sistema interno tipo Service Desk / Helpdesk para la gestión de incidentes, requerimientos y solicitudes de soporte tecnológico dentro de LDR Solutions.
Este repositorio usa una estructura tipo monorepo, concentrando backend, frontend, documentación y configuración general del proyecto en un solo lugar.
---
Objetivo del proyecto
Centralizar la atención de soporte tecnológico mediante un sistema que permita:
Levantar tickets.
Consultar el estado de solicitudes.
Gestionar usuarios, técnicos y administradores.
Dar seguimiento a tickets.
Controlar estados.
Preparar la base para SLA, notificaciones, reportes y cierre de tickets.
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
Pruebas / Calidad	TDD + validación funcional
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
El objetivo del MVP 1 es dejar lista la base técnica del proyecto para continuar con el desarrollo del flujo de tickets, operación TI, SLA, notificaciones y reportes.
---
Issues oficiales del MVP 1
Issue	Actividad	Estado
MVP1-01	Configurar entorno de desarrollo en WSL	Finalizado
MVP1-02	Validar herramientas base	Finalizado
MVP1-03	Crear backend base en Laravel API	En proceso / validar cierre
MVP1-04	Crear frontend base en React	En proceso / validar cierre
MVP1-05	Configurar conexión Laravel + MySQL	Issue actual
MVP1-06	Crear endpoint `/api/health`	Pendiente
MVP1-07	Crear primera prueba TDD para `/api/health`	Pendiente
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
Variables principales de base de datos para desarrollo local:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=service_desk_ldr_dev
DB_USERNAME=root
DB_PASSWORD=
```
Variable usada para identificar el frontend local:
```env
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
TDD / Validación funcional
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
Ejemplo:
```txt
✅ Funcionalidad implementada
✅ Validación ejecutada correctamente
✅ Sin errores críticos
✅ README actualizado si aplica
✅ Cambios subidos a GitHub
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
git commit -m "feat: describe change"
git push origin main
```
---
Estado actual esperado al cerrar MVP1-05
Al terminar MVP1-05, se espera:
MySQL activo.
Base de datos `service_desk_ldr_dev` creada.
Laravel configurado con conexión MySQL.
`.env.example` actualizado como plantilla.
Migraciones ejecutadas correctamente.
Tablas base visibles en MySQL.
`.env` protegido y no subido a GitHub.
Cambios subidos al repositorio.
Issue MVP1-05 actualizado en GitHub Projects.
---
Próximo paso
Después de cerrar MVP1-05, continuar con:
MVP1-06 — Crear endpoint `/api/health`
---
Responsable
Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack