Service Desk LDR
Sistema interno tipo Service Desk / Helpdesk para la gestión de incidentes, requerimientos y solicitudes de soporte tecnológico dentro de LDR Solutions.
El proyecto está planteado como una aplicación Full Stack con:
Backend: Laravel API + PHP 8.4
Frontend: React
Base de datos: MySQL
Servidor: Apache
Entorno de desarrollo: Linux mediante WSL
Control de versiones: Git + GitHub
Buenas prácticas: TDD / validación funcional por issue
---
Objetivo del proyecto
Centralizar la gestión de tickets de soporte tecnológico, permitiendo que los usuarios puedan levantar solicitudes y que el equipo de TI pueda dar seguimiento, asignar responsables, controlar estados, medir SLA, enviar notificaciones y generar reportes.
---
Alcance general por MVP
MVP	Nombre	Objetivo
MVP 0	Setup	Preparar entorno, repositorio, tablero y base técnica inicial.
MVP 1	Base funcional	Dejar lista la base Laravel API + React + MySQL + comunicación inicial.
MVP 2	Gestión de tickets	Construir flujo formal de creación, consulta, estados e historial de tickets.
MVP 3	Operación TI	Permitir atención, asignación, comentarios y resolución por técnicos/admin.
MVP 4	SLA y notificaciones	Agregar prioridades, tiempos SLA, semáforos y alertas automáticas.
MVP 5	Reportes y cierre	Incorporar dashboards, reportes, cierre, reproceso, encuesta y despliegue.
---
MVP actual
Actualmente el desarrollo se encuentra en:
MVP 1 — Base funcional
Issues principales del MVP 1:
Issue	Descripción
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
Estructura del repositorio
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
│       └── Pendiente de crear en MVP1-04
│
├── docs/
│   ├── evidencias/
│   ├── requerimientos/
│   └── arquitectura/
│
├── README.md
└── .gitignore
```
---
Requisitos base
Antes de ejecutar el proyecto se requiere validar:
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
Ruta actual del backend:
```bash
backend/service-desk-api
```
Entrar al backend:
```bash
cd backend/service-desk-api
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
URL local:
```txt
http://127.0.0.1:8000
```
---
Frontend React
El frontend se creará en el issue:
MVP1-04 - Crear frontend base en React
Ruta esperada:
```bash
frontend/service-desk-web
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
TDD / Validación funcional
Regla de trabajo del proyecto:
```txt
Test o criterio de aceptación
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
```
Una tarea crítica no debe considerarse terminada si no cuenta con prueba automatizada o validación funcional clara.
---
Flujo de trabajo en GitHub
Columnas del tablero SCRUM:
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
Campos del tablero:
```txt
Priority
Module
Sprint
Story Points
Type
MVP Phase
```
Escala de Story Points:
```txt
1 = Muy fácil
2 = Fácil
3 = Medio
5 = Complejo
8 = Muy complejo
```
Regla práctica:
```txt
Si una tarea parece de 8 puntos o más, conviene dividirla en issues más pequeños.
```
---
Comandos Git básicos
Desde la raíz del proyecto:
```bash
git status
git add .
git commit -m "feat: create Laravel API backend base"
git push origin main
```
---
Estado actual esperado
Al cierre de MVP1-03 se espera:
Backend Laravel creado en `backend/service-desk-api`.
Laravel responde con `php artisan --version`.
Laravel levanta con `php artisan serve`.
`php artisan route:list` funciona sin errores.
Repositorio actualizado en GitHub.
Issue MVP1-03 actualizado en el tablero.
Proyecto listo para continuar con MVP1-04 — Crear frontend base en React.
---
Autor / Responsable
Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack