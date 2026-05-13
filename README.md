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
Issues oficiales actuales:
Issue	Actividad
MVP1-01	Configurar entorno de desarrollo en WSL
MVP1-02	Validar herramientas base
MVP1-03	Crear backend base en Laravel API
MVP1-04	Crear frontend base en React
MVP1-05	Configurar conexión Laravel + MySQL
MVP1-06	Crear endpoint `/api/health`
MVP1-07	Crear primera prueba TDD para `/api/health`
MVP1-08	Configurar estructura limpia inicial
MVP1-09	Preparar base de autenticación futura
MVP1-10	Configurar CORS para conexión React + Laravel
MVP1-11	Crear primera llamada desde React a Laravel
MVP1-12	Crear README inicial del proyecto
MVP1-13	Subir avance a GitHub
MVP1-14	Validar criterios de cierre del MVP 1
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
Variable usada para identificar el frontend local:
```env
FRONTEND_URL=http://localhost:5173
```
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
Estado actual esperado
Al terminar MVP1-04, se espera:
Backend creado en `backend/service-desk-api`.
Frontend creado en `frontend/service-desk-web`.
Laravel validado con `php artisan serve`.
React validado con `npm run dev`.
Axios instalado y configurado.
`.env.example` creado en React.
`.gitignore` configurado en la raíz.
README global creado.
Avance subido a GitHub.
---
Responsable
Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack