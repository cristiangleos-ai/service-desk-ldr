# Service Desk LDR — README Global MVP2-06

Sistema interno tipo **Service Desk / Helpdesk** para la gestión de incidentes, requerimientos y solicitudes de soporte tecnológico dentro de LDR Solutions.

## Arquitectura oficial

Arquitectura **monorepo full stack**:

```txt
service-desk-ldr/
├── backend/service-desk-api   # Laravel API
├── frontend/service-desk-web  # React
├── docs/
└── README.md
```

Backend con arquitectura por capas ligera:

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

Frontend React organizado por páginas, componentes y servicios, consumiendo la API mediante Axios.

## MVP actual

**MVP 2 — Gestión de tickets**

Objetivo:

> Permitir que un usuario pueda crear un ticket desde React, clasificarlo por área/categoría/subcategoría, guardar la información en MySQL mediante Laravel API y consultar sus tickets creados.

## Avance MVP 2

| Issue | Actividad | Estado |
|---|---|---|
| MVP2-01 | Definir alcance técnico del MVP 2 | Finalizado / validar cierre |
| MVP2-02 | Crear migración y modelo Area | Finalizado / validar cierre |
| MVP2-03 | Crear migración y modelo Category | Finalizado / validar cierre |
| MVP2-04 | Crear migración y modelo Subcategory | Finalizado / validar cierre |
| MVP2-05 | Crear seeders de áreas, categorías y subcategorías | Finalizado / validar cierre |
| MVP2-06 | Crear migración y modelo Ticket | Issue actual |
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

## MVP2-06 — Crear migración y modelo Ticket

Objetivo:

> Crear la entidad principal `Ticket`, que será el núcleo del Service Desk y permitirá guardar las solicitudes creadas por los usuarios.

## Modelo esperado

```txt
app/Models/Ticket.php
```

## Migración esperada

```txt
database/migrations/xxxx_xx_xx_xxxxxx_create_tickets_table.php
```

## Tabla esperada

```txt
tickets
```

## Campos sugeridos

```txt
id
folio
requester_id
assigned_to_id
area_id
category_id
subcategory_id
title
description
priority
status
created_at
updated_at
deleted_at
```

## Relaciones esperadas

```txt
Ticket belongsTo Area
Ticket belongsTo Category
Ticket belongsTo Subcategory
Ticket belongsTo User como requester
Ticket belongsTo User como assignedTo
```

## Estados base iniciales

```txt
new
assigned
in_progress
resolved
closed
cancelled
reprocess
```

## Prioridades base iniciales

```txt
urgent
high
medium
low
```

## Requerimiento futuro agregado

Se mantiene como requerimiento futuro una **Base de conocimiento / BD de aprendizaje** para registrar soluciones técnicas aplicadas por técnicos al resolver tickets.

Ubicación principal:

```txt
MVP 3 — Operación TI
```

## Validaciones esperadas

```bash
php artisan make:model Ticket -m
php artisan migrate
php artisan test
```

## Regla de trabajo con TDD / validación funcional

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
Subir cambios a GitHub
↓
Done
```

## Criterios para cerrar MVP2-06

Crear migración y modelo Ticket:

```txt
✅ Se creó el modelo app/Models/Ticket.php
✅ Se creó la migración create_tickets_table
✅ La tabla tickets incluye id
✅ La tabla tickets incluye folio único
✅ La tabla tickets incluye requester_id nullable
✅ La tabla tickets incluye assigned_to_id nullable
✅ La tabla tickets incluye area_id
✅ La tabla tickets incluye category_id
✅ La tabla tickets incluye subcategory_id
✅ La tabla tickets incluye title
✅ La tabla tickets incluye description
✅ La tabla tickets incluye priority con valor default medium
✅ La tabla tickets incluye status con valor default new
✅ La tabla tickets incluye timestamps
✅ La tabla tickets incluye softDeletes
✅ Se agregaron índices útiles para consultas
✅ El modelo Ticket tiene fillable configurado
✅ El modelo Ticket tiene relación area()
✅ El modelo Ticket tiene relación category()
✅ El modelo Ticket tiene relación subcategory()
✅ El modelo Ticket tiene relación requester()
✅ El modelo Ticket tiene relación assignedTo()
✅ php artisan migrate se ejecuta correctamente
✅ php artisan test sigue pasando sin errores críticos
✅ README global actualizado
✅ Cambios subidos a GitHub
```

## Próximo paso

**MVP2-07 — Crear prueba TDD para creación de ticket**

## Responsable

Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack
