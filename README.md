# Service Desk LDR — README Global MVP2-07

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
| MVP2-06 | Crear migración y modelo Ticket | Finalizado / validar cierre |
| MVP2-07 | Crear prueba TDD para creación de ticket | Issue actual |
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

## MVP2-07 — Crear prueba TDD para creación de ticket

Objetivo:

> Crear la primera prueba TDD que defina el comportamiento esperado para registrar un ticket desde la API.

Esta prueba representa la fase **RED** de TDD: al inicio puede fallar porque el endpoint `POST /api/tickets` todavía no existe. El objetivo es dejar definido qué debe cumplir la implementación de los próximos issues.

## Archivo esperado

```txt
tests/Feature/TicketCreationTest.php
```

## Comportamiento esperado por la prueba

```txt
POST /api/tickets
```

Debe permitir crear un ticket con:

```txt
area_id
category_id
subcategory_id
title
description
```

Y debe responder con:

```txt
HTTP 201
data.title
data.status = new
data.priority = medium
```

También debe validar que el registro exista en la tabla:

```txt
tickets
```

## Validaciones esperadas

```bash
php artisan make:test TicketCreationTest
php artisan test tests/Feature/TicketCreationTest.php
php artisan test 
```

Resultado esperado en esta fase:

```txt
La prueba TicketCreationTest puede quedar en RED porque el endpoint POST /api/tickets todavía no está implementado.
Las pruebas anteriores deben seguir pasando al excluir el grupo ticket-creation.
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

## Criterios para cerrar MVP2-07

Crear prueba TDD para creación de ticket:

```txt
✅ Se creó tests/Feature/TicketCreationTest.php
✅ La prueba usa RefreshDatabase
✅ La prueba ejecuta ServiceDeskCatalogSeeder
✅ La prueba obtiene Area, Category y Subcategory existentes
✅ La prueba define payload válido para crear ticket
✅ La prueba consume POST /api/tickets
✅ La prueba espera HTTP 201
✅ La prueba valida respuesta JSON esperada
✅ La prueba valida status inicial new
✅ La prueba valida priority inicial medium
✅ La prueba valida registro en tabla tickets
✅ Se documentó que esta prueba puede iniciar en RED hasta implementar MVP2-08
✅ Las pruebas anteriores siguen pasando 
✅ README global actualizado
✅ Cambios subidos a GitHub
```

## Próximo paso

**MVP2-08 — Crear endpoint para registrar ticket**

## Responsable

Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack
