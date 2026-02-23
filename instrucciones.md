# 🏎️ Proyecto Laravel: Coches Deportivos de Alta Gama (DWES)

Este documento es una guía completa para el desarrollo del proyecto académico sobre gestión de coches deportivos. Sigue estos pasos para cumplir con todos los requisitos del módulo.

---

## 1. 📊 Diseño de la Base de Datos

### Estructura de Tablas
1.  **`marcas`**: Entidad principal para los fabricantes.
    *   `id`, `nombre`, `pais`, `logo`, `timestamps`.
2.  **`coches`**: Entidad para los modelos específicos.
    *   `id`, `modelo`, `precio`, `imagen`, `marca_id` (FK), `timestamps`.
3.  **`especificaciones`**: Características técnicas generales (ej. "Fibra de carbono", "Tracción total").
    *   `id`, `nombre`, `descripcion`, `timestamps`.
4.  **`especificacion_coche`**: Tabla pivote para la relación N:N.
    *   `coche_id` (FK), `especificacion_id` (FK).

### 📐 Diagrama de Relaciones
```text
  [ MARCAS ] (1) <------- (N) [ COCHES ]
                                  (N)
                                   |
                          [ ESPECIFICACION_COCHE ] (Pivote)
                                   |
                                  (N)
                          [ ESPECIFICACIONES ] (N)
```

---

## 2. ⚙️ Configuración Inicial

### A. Creación del Proyecto
```bash
composer create-project laravel/laravel coches-deportivos
```

### B. Base de Datos
Configura el archivo `.env`:
```env
DB_DATABASE=db_coches_deportivos
DB_USERNAME=root
DB_PASSWORD=
```

### C. Virtual Host
Sugerencia: `http://coches-deportivos.local`
*   Añadir a `C:\Windows\System32\drivers\etc\hosts`: `127.0.0.1 coches-deportivos.local`

---

## 3. 🏗️ Migraciones

Crea las migraciones en orden para evitar problemas con las claves foráneas:

1.  **Marcas**: `php artisan make:migration create_marcas_table`
2.  **Coches**: `php artisan make:migration create_coches_table`
    *   Usa `$table->foreignId('marca_id')->constrained()->onDelete('cascade');`
3.  **Especificaciones**: `php artisan make:migration create_especificaciones_table`
4.  **Tabla Pivote**: `php artisan make:migration create_especificacion_coche_table`

**Comando para ejecutar:** `php artisan migrate`

---

## 4. 🌱 Seeders

Crea datos realistas para al menos 10 registros.
```bash
php artisan make:seeder DatabaseSeeder
```
En el archivo `DatabaseSeeder.php`, añade marcas como "Ferrari", "Porsche" y sus respectivos modelos.

**Ejecución:** `php artisan migrate:fresh --seed`

---

## 5. 🔗 Modelos y Relaciones Eloquent

### Modelo `Marca`
```php
public function coches() {
    return $this->hasMany(Coche::class);
}
```

### Modelo `Coche`
```php
public function marca() {
    return $this->belongsTo(Marca::class);
}

public function especificaciones() {
    return $this->belongsToMany(Especificacion::class)->withPivot('valor');
}
```

---

## 6. 🎮 Controladores (CRUD)

Crea controladores de recursos:
`php artisan make:controller CocheController --resource`

**Métodos obligatorios:**
*   `index()`: Listado con `paginate()`.
*   `create()` / `store()`: Formulario y guardado.
*   `edit($id)` / `update()`: Edición y actualización.
*   `destroy($id)`: Eliminación.

---

## 7. 🖼️ Gestión de Imágenes

1.  **Entidad**: Los `coches` tendrán un campo `imagen`.
2.  **Carpeta**: `/storage/app/public/coches`.
3.  **Enlace**: Ejecutar `php artisan storage:link`.
4.  **Subida**:
    ```php
    $path = $request->file('imagen')->store('coches', 'public');
    $coche->imagen = $path;
    ```
5.  **Vista**: `<img src="{{ asset('storage/' . $coche->imagen) }}">`

---

## 8. 🎨 Diseño y Vistas

### Layout Principal (`resources/views/layouts/master.blade.php`)
*   Sección `<head>` con carga de CSS (Bootstrap sugerido).
*   Navbar con enlaces a "Listado de Coches", "Añadir Coche", etc.
*   Main content usando `@yield('content')`.
*   Footer corporativo.

### Estructura de Vistas
*   `views/coches/index.blade.php`
*   `views/coches/create.blade.php`
*   `views/coches/edit.blade.php`

---

## 9. 🛣️ Rutas
En `routes/web.php`:
```php
Route::resource('coches', CocheController::class);
Route::resource('marcas', MarcaController::class);
```

---

## 10. ✅ Checklist de Validación Final

- [ ] ¿La DB tiene 3 tablas + 1 tabla pivote?
- [ ] ¿Relaciones 1:N y N:N implementadas en Eloquent?
- [ ] ¿CRUD de coches funcional y sin errores?
- [ ] ¿Registro de al menos 10 coches/marcas mediante Seeders?
- [ ] ¿Las imágenes se suben y se muestran correctamente?
- [ ] ¿Uso de `paginate()` en el listado principal?
- [ ] ¿Validación de formularios implementada?
- [ ] ¿Uso de plantilla Master y Blade components?

---
🔧 **Nota Crítica**: Asegúrate de que el servidor web tenga permisos de escritura en la carpeta `storage` y `bootstrap/cache`.
