# Service Desk LDR — README Global MVP2-04

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

---

## MVP cerrado

**MVP 1 — Base funcional** quedó cerrado.

Incluye:

```txt
✅ Laravel API
✅ React
✅ MySQL
✅ Endpoint GET /api/health
✅ Prueba TDD de /api/health
✅ CORS
✅ Primera conexión React + Laravel
✅ READMEs
✅ GitHub + tablero
```

---

## MVP actual

**MVP 2 — Gestión de tickets**

Objetivo:

> Permitir que un usuario pueda crear un ticket desde React, clasificarlo por área/categoría/subcategoría, guardar la información en MySQL mediante Laravel API y consultar sus tickets creados.

---

## Requerimiento futuro agregado

Se agrega como requerimiento futuro una **Base de conocimiento / BD de aprendizaje** para registrar soluciones técnicas aplicadas por técnicos al resolver tickets.

Objetivo:

> Reutilizar conocimiento cuando se repita un problema similar, evitando capturas duplicadas por tipo de aprendizaje o solución.

Ubicación principal:

```txt
MVP 3 — Operación TI
```

---

## Issues MVP 2

| Issue | Actividad | Estado |
|---|---|---|
| MVP2-01 | Definir alcance técnico del MVP 2 | Finalizado / validar cierre |
| MVP2-02 | Crear migración y modelo Area | Finalizado / validar cierre |
| MVP2-03 | Crear migración y modelo Category | Finalizado / validar cierre |
| MVP2-04 | Crear migración y modelo Subcategory | Issue actual |
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

## MVP2-04 — Crear migración y modelo Subcategory

Objetivo:

> Crear la entidad `Subcategory` como catálogo dependiente de `Category`, para que cada categoría tenga sus propias subcategorías específicas de atención.

Ejemplos iniciales para TI:

```txt
Programas / Software:
- Office 365
- Correo
- Instalación de programas
- Soporte de aplicaciones

Equipo de cómputo:
- Laptop
- PC de escritorio
- Impresora
- Celular
- Periféricos

Internet:
- Red WiFi
- Desbloqueo de sitio web
- Red cableada

Intranet:
- Comunicados institucionales
- Demos
- Flotilla
- Inventario de Unidades
- Posventa
- Training Center
- Tracking Released Units
- Viáticos
```

Modelo esperado:

```txt
app/Models/Subcategory.php
```

Migración esperada:

```txt
database/migrations/xxxx_xx_xx_xxxxxx_create_subcategories_table.php
```

Tabla esperada:

```txt
subcategories
```

Campos sugeridos:

```txt
id
category_id
name
slug
description
is_active
created_at
updated_at
```

Relaciones esperadas:

```txt
Category hasMany Subcategory
Subcategory belongsTo Category
```

Validaciones esperadas:

```bash
php artisan make:model Subcategory -m
php artisan migrate
php artisan test
```

---

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
Commit en GitHub
↓
Done
```

---

## Criterios para cerrar MVP2-04

Puedes mover el issue **MVP2-04 - Crear migración y modelo Subcategory** a **Done** cuando tengas validado:

```txt
✅ Se creó el modelo app/Models/Subcategory.php
✅ Se creó la migración create_subcategories_table
✅ La tabla subcategories incluye id
✅ La tabla subcategories incluye category_id
✅ category_id está definido como foreign key hacia categories
✅ La tabla subcategories incluye name
✅ La tabla subcategories incluye slug
✅ La tabla subcategories incluye description nullable
✅ La tabla subcategories incluye is_active con valor default true
✅ La tabla subcategories incluye timestamps
✅ El modelo Subcategory tiene fillable configurado
✅ El modelo Subcategory tiene relación category()
✅ El modelo Category tiene relación subcategories()
✅ php artisan migrate se ejecuta correctamente
✅ php artisan test sigue pasando sin errores críticos
✅ README global actualizado
✅ Cambios subidos a GitHub
```

---

## Commit recomendado

```bash
git status
git add .
git commit -m "feat: create subcategory model and migration"
git push origin main
```

---

## Próximo paso

**MVP2-05 — Crear seeders de áreas, categorías y subcategorías**

---

## Responsable

Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack
