# PHANTOM CARS 

Este proyecto es una aplicación web de gestión de inventario para un concesionario de vehículos de lujo, desarrollada con el framework **Laravel**. Permite la administración completa de marcas, modelos y especificaciones técnicas, además de ofrecer un sistema de simulación de pedidos para clientes registrados.

## Integrantes y Reparto de Tareas
El proyecto ha sido desarrollado por **Bruno Cavichia** y **David Azpilicueta**.

| Alumno | Responsabilidades Principales |
| :--- | :--- |
| **Bruno Cavichia** | Diseño de Base de Datos, Migraciones, Modelos Eloquent, Controladores (CRUD), Lógica de Roles y Soft Deletes. |
| **David Azpilicueta** | Diseño de Interfaz (CSS Premium), Plantilla Master, Controladores (CRUD), Vistas de Usuario. |

---

## Instalación y Configuración

### 1. Clonar y preparar el entorno
```bash
# Instalar dependencias
composer install

# Crear archivo de entorno
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 2. Configuración del Virtual Host (Punto 11)
Para que el proyecto funcione en `http://proyecto-laravel.local`, debes configurar tu servidor local (XAMPP/Laragon) apuntando la raíz a la carpeta `/public`.

### 3. Base de Datos y Seeders
Configura tus credenciales en el `.env` y ejecuta:
```bash
php artisan migrate:fresh --seed
# Es necesario crear el enlace simbólico para las imágenes
php artisan storage:link
```
