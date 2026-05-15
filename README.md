# Service Desk LDR — README Global MVP2-05

Sistema interno tipo **Service Desk / Helpdesk** para la gestión de incidentes, requerimientos y solicitudes de soporte tecnológico dentro de LDR Solutions.

---

## Arquitectura oficial

El proyecto trabaja con arquitectura **monorepo full stack**:

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
| MVP2-04 | Crear migración y modelo Subcategory | Finalizado / validar cierre |
| MVP2-05 | Crear seeders de áreas, categorías y subcategorías | Issue actual |
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

## MVP2-05 — Crear seeders de áreas, categorías y subcategorías

Objetivo:

> Cargar el catálogo base de áreas, categorías y subcategorías en MySQL para que el usuario pueda clasificar correctamente su ticket desde React.

---

## Catálogo base

### Áreas iniciales

```txt
Tecnologías de la Información
Servicios Generales
Recursos Humanos
Jurídico
```

### Categorías TI

```txt
Programas / Software
Equipo de cómputo
Internet
Intranet / Plataformas de la empresa
```

### Subcategorías TI

```txt
Programas / Software:
- Office 365 (Word, Excel, PowerPoint)
- Correo
- Instalación de programas
- Soporte de aplicaciones

Equipo de cómputo:
- Laptop
- PC de escritorio
- Impresora
- Celular
- Periféricos (otros dispositivos)

Internet:
- Red WiFi
- Desbloqueo de sitio web
- Red cableada

Intranet / Plataformas de la empresa:
- Comunicados institucionales
- Demos
- Flotilla
- Inventario de Unidades
- Posventa
- Training Center
- Tracking Released Units
- Viáticos
```

---

## Archivos esperados

```txt
database/seeders/ServiceDeskCatalogSeeder.php
database/seeders/DatabaseSeeder.php
tests/Feature/ServiceDeskCatalogSeederTest.php
```

---

## Validaciones esperadas

```bash
php artisan db:seed --class=ServiceDeskCatalogSeeder
php artisan test --filter=ServiceDeskCatalogSeederTest
php artisan test
```

---

## Criterios para cerrar MVP2-05

Puedes mover el issue **MVP2-05 - Crear seeders de áreas, categorías y subcategorías** a **Done** cuando tengas validado:

```txt
✅ Se creó ServiceDeskCatalogSeeder
✅ Se registraron las áreas base
✅ Se registraron las categorías TI
✅ Se registraron las subcategorías TI
✅ El seeder usa firstOrCreate o updateOrCreate para evitar duplicados
✅ El seeder puede ejecutarse más de una vez sin duplicar registros
✅ DatabaseSeeder llama a ServiceDeskCatalogSeeder
✅ Se creó prueba para validar el catálogo base
✅ php artisan db:seed --class=ServiceDeskCatalogSeeder se ejecuta correctamente
✅ php artisan test --filter=ServiceDeskCatalogSeederTest pasa correctamente
✅ php artisan test sigue pasando sin errores críticos
✅ README global actualizado
✅ Cambios subidos a GitHub
```

---

## Commit recomendado

```bash
git status
git add .
git commit -m "feat: seed service desk base catalogs"
git push origin main
```

---

## Próximo paso

**MVP2-06 — Crear migración y modelo Ticket**

---

## Responsable

Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack
