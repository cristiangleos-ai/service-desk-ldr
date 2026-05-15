# Service Desk LDR

Sistema interno tipo **Service Desk / Helpdesk** para la gestión de incidentes, requerimientos y solicitudes de soporte tecnológico dentro de LDR Solutions.

Este repositorio usa una estructura tipo **monorepo**, concentrando backend, frontend, documentación y configuración general del proyecto en un solo lugar.

---

## Objetivo del proyecto

Centralizar la atención de soporte tecnológico mediante un sistema que permita levantar tickets, consultar solicitudes, gestionar usuarios/técnicos/administradores, dar seguimiento a tickets y preparar la base para SLA, notificaciones, reportes, cierre, reproceso y base de conocimiento futura.

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

## Arquitectura oficial

El proyecto trabaja con una arquitectura **monorepo full stack**, separando backend Laravel API y frontend React.

El backend está organizado con una arquitectura por capas ligera:

```txt
Routes
↓
Controllers
↓
Requests
↓
Services
↓
Repositories
↓
Models
↓
MySQL
```

El frontend se organiza por páginas, componentes y servicios, consumiendo la API mediante Axios.

---

## MVP cerrado

**MVP 1 — Base funcional** queda cerrado como primera base técnica del proyecto.

Incluye backend Laravel API, frontend React, MySQL configurado, endpoint `GET /api/health`, prueba TDD, CORS, primera conexión React + Laravel, READMEs y avance en GitHub.

---

## MVP actual

Actualmente se trabaja en:

**MVP 2 — Gestión de tickets**

Objetivo del MVP 2:

> Permitir que un usuario pueda crear un ticket desde React, clasificarlo por área/categoría/subcategoría, guardar la información en MySQL mediante Laravel API y consultar sus tickets creados.

---

## Alcance del MVP 2

### Incluye

```txt
✅ Definir alcance técnico del MVP 2
✅ Crear modelos y migraciones para Area, Category, Subcategory y Ticket
✅ Crear seeders de áreas, categorías y subcategorías
✅ Crear prueba TDD para creación de ticket
✅ Crear endpoint para registrar ticket
✅ Crear validaciones backend
✅ Generar folio automático
✅ Guardar estado inicial del ticket
✅ Crear endpoints para listar catálogos
✅ Crear formulario React para levantar ticket
✅ Conectar formulario React con Laravel API
✅ Agregar resumen previo y confirmación
✅ Implementar adjunto opcional máximo 5MB
✅ Crear vista Mis tickets
✅ Crear vista detalle básico
✅ Crear historial básico de ticket
✅ Probar flujo completo
✅ Actualizar documentación
✅ Validar cierre del MVP 2
```

### No incluye todavía

```txt
❌ Dashboard técnico avanzado
❌ Dashboard administrador avanzado
❌ SLA completo
❌ Notificaciones automáticas
❌ Reasignación completa
❌ Cierre automático
❌ Encuesta de satisfacción
❌ Reportes Excel/PDF
❌ Base de conocimiento completa
```

---

## Requerimiento futuro agregado

Se agrega como requerimiento futuro una **Base de conocimiento / BD de aprendizaje** para registrar soluciones técnicas aplicadas por los técnicos al resolver tickets.

Objetivo:

> Reutilizar conocimiento cuando se repita un problema similar, evitando capturas duplicadas por tipo de aprendizaje o solución.

Ubicación principal:

```txt
MVP 3 — Operación TI
```

---

## Issues planeados del MVP 2

| Issue | Actividad | Estado |
|---|---|---|
| MVP2-01 | Definir alcance técnico del MVP 2 | Finalizado / validar cierre |
| MVP2-02 | Crear migración y modelo Area | Finalizado / validar cierre |
| MVP2-03 | Crear migración y modelo Category | Issue actual |
| MVP2-04 | Crear migración y modelo Subcategory | Pendiente |
| MVP2-05 | Crear seeders de áreas, categorías y subcategorías | Pendiente |
| MVP2-06 | Crear migración y modelo Ticket | Pendiente |
| MVP2-07 | Crear prueba TDD para creación de ticket | Pendiente |
| MVP2-08 | Crear endpoint para registrar ticket | Pendiente |
| MVP2-09 | Crear validaciones backend para ticket | Pendiente |
| MVP2-10 | Implementar generación automática de folio | Pendiente |
| MVP2-11 | Implementar estado inicial del ticket | Pendiente |
| MVP2-12 | Crear endpoint para listar catálogos | Pendiente |
| MVP2-13 | Crear formulario React para levantar ticket | Pendiente |
| MVP2-14 | Conectar formulario React con Laravel API | Pendiente |
| MVP2-15 | Agregar resumen previo y confirmación | Pendiente |
| MVP2-16 | Implementar adjunto opcional máximo 5MB | Pendiente |
| MVP2-17 | Crear vista “Mis tickets” | Pendiente |
| MVP2-18 | Crear vista detalle básico de ticket | Pendiente |
| MVP2-19 | Crear historial básico de ticket | Pendiente |
| MVP2-20 | Probar flujo completo de creación de ticket | Pendiente |
| MVP2-21 | Actualizar README global, backend y frontend | Pendiente |
| MVP2-22 | Validar criterios de cierre del MVP 2 | Pendiente |

---

## MVP2-03 — Crear migración y modelo Category

Objetivo:

> Crear la entidad `Category` como catálogo dependiente de `Area`, para que cada área pueda tener sus propias categorías de atención.

Ejemplo inicial para el área de Tecnologías de la Información:

```txt
Programas / Software
Equipo de cómputo
Internet
Intranet / Plataformas de la empresa
```

Modelo esperado:

```txt
app/Models/Category.php
```

Migración esperada:

```txt
database/migrations/xxxx_xx_xx_xxxxxx_create_categories_table.php
```

Tabla esperada:

```txt
categories
```

Campos sugeridos:

```txt
id
area_id
name
slug
description
is_active
created_at
updated_at
```

Relación esperada:

```txt
Area hasMany Category
Category belongsTo Area
```

Validaciones esperadas:

```bash
php artisan make:model Category -m
php artisan migrate
php artisan test
```

---

## Regla de trabajo con TDD / validación funcional

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

---

## Criterios para cerrar MVP2-03

Puedes mover el issue **MVP2-03 - Crear migración y modelo Category** a **Done** cuando tengas validado:

```txt
✅ Se creó el modelo app/Models/Category.php
✅ Se creó la migración create_categories_table
✅ La tabla categories incluye id
✅ La tabla categories incluye area_id
✅ area_id está definido como foreign key hacia areas
✅ La tabla categories incluye name
✅ La tabla categories incluye slug
✅ La tabla categories incluye description nullable
✅ La tabla categories incluye is_active con valor default true
✅ La tabla categories incluye timestamps
✅ El modelo Category tiene fillable configurado
✅ El modelo Category tiene relación area()
✅ El modelo Area tiene relación categories()
✅ php artisan migrate se ejecuta correctamente
✅ php artisan test sigue pasando sin errores críticos
✅ README global actualizado
✅ Cambios subidos a GitHub
```

---

## Comandos Git básicos

Desde la raíz del proyecto:

```bash
git status
git add .
git commit -m "feat: create category model and migration"
git push origin main
```

---

## Próximo paso

Después de cerrar MVP2-03, continuar con:

**MVP2-04 — Crear migración y modelo Subcategory**

---

## Responsable

Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack
