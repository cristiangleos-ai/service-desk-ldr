# Service Desk LDR — Frontend React

Frontend del sistema **Service Desk LDR**, desarrollado con **React + Vite**.

Este frontend consume la API del backend Laravel para validar comunicación, consultar servicios y posteriormente gestionar tickets, usuarios, dashboards, SLA, notificaciones y reportes.

---

## Stack frontend

| Herramienta | Uso |
|---|---|
| React | Construcción de interfaz de usuario |
| Vite | Entorno de desarrollo rápido |
| JavaScript | Lenguaje del frontend |
| Axios | Cliente HTTP para consumir Laravel API |
| npm | Gestión de dependencias |

---

## Ruta dentro del repositorio

```txt
service-desk-ldr/
└── frontend/
    └── service-desk-web/
```

---

## Estructura sugerida

```txt
frontend/service-desk-web/
├── public/
├── src/
│   ├── assets/
│   ├── components/
│   ├── context/
│   ├── hooks/
│   ├── pages/
│   │   └── HealthCheck.jsx
│   ├── routes/
│   ├── services/
│   │   └── api.js
│   ├── styles/
│   └── utils/
├── .env.example
├── index.html
├── package.json
└── vite.config.js
```

---

## Instalación

Entrar al frontend:

```bash
cd frontend/service-desk-web
```

Instalar dependencias:

```bash
npm install
```

---

## Ejecutar en desarrollo

```bash
npm run dev
```

URL local esperada:

```txt
http://localhost:5173
```

---

## Variables de entorno

Archivo real local:

```txt
.env
```

Archivo plantilla:

```txt
.env.example
```

Variable requerida:

```env
VITE_API_URL=http://127.0.0.1:8000/api
```

---

## Cliente Axios

Archivo:

```txt
src/services/api.js
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

## Validación React + Laravel API

La primera integración valida el endpoint:

```txt
GET /api/health
```

Desde React se consume como:

```js
api.get("/health");
```

Respuesta esperada del backend:

```json
{
  "status": "ok",
  "message": "Service Desk API is running",
  "service": "service-desk-ldr",
  "version": "1.0.0"
}
```

Pantalla sugerida:

```txt
Service Desk LDR
Validación React + Laravel API

Status: ok
Message: Service Desk API is running
Service: service-desk-ldr
Version: 1.0.0
```

---

## Validaciones para cerrar MVP1-11 / MVP1-12

```txt
✅ React levanta en http://localhost:5173
✅ Axios está instalado
✅ VITE_API_URL está configurado
✅ src/services/api.js existe
✅ HealthCheck.jsx consume /api/health
✅ No hay errores CORS en consola
✅ No hay errores críticos en consola del navegador
```

---

## Comandos útiles

```bash
npm install
npm run dev
npm run build
```

---

## Responsable

Cristian Leos  
Ing. de Aplicaciones y Desarrollo / Full Stack
