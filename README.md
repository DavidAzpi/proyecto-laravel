# Phantom Cars

Este proyecto consiste en una plataforma de gestión para un concesionario de vehículos de lujo desarrollada en Laravel. El sistema permite la administración de inventario, gestión de marcas y procesamiento de pedidos (simulados).

## Equipo de desarrollo

*   **Bruno Cavichia**
*   **David Azpilicueta**

## Distribución de tareas

El trabajo se ha repartido de forma equitativa de la siguiente manera:

### Bruno Cavichia
*   **Base de datos**: Creación de migraciones, relaciones y seeders de datos.
*   **Modelos**: Coche, Marca, Especificacion.
*   **Controladores**: CocheController, MarcaController, EspecificacionController y AdminController.
*   **Aportes**: Gestion de autenticacion junto con roles de usuario.

### David Azpilicueta
*   **Modelos**: User, Pedido.
*   **Controladores**:UserController, PedidoController.
*   **Aportes**: Implementacion de busqueda de coche y sistema de pedidos.

## Instrucciones de instalación

### 1. Preparación
```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Base de datos
```bash
php artisan migrate:fresh --seed
php artisan storage:link
```
