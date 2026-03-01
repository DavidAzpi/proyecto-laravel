

CREATE DATABASE IF NOT EXISTS `proyecto_laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `proyecto_laravel`;

-- ------------------------------------------------------
-- Estructura de tabla para `users`
-- ------------------------------------------------------

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','cliente') NOT NULL DEFAULT 'cliente',
  `remember_token` varchar(100) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos iniciales para `users`
INSERT INTO `users` (`name`, `email`, `password`, `rol`, `created_at`, `updated_at`) VALUES
('Administrador', 'admin@phantom.com', '$2y$12$clYk.fG/Vw3Y.wB3Y.B3Y.B3Y.B3Y.B3Y.B3Y.B3Y.B3Y.B3Y.', 'admin', NOW(), NOW()),
('Cliente Test', 'cliente@phantom.com', '$2y$12$clYk.fG/Vw3Y.wB3Y.B3Y.B3Y.B3Y.B3Y.B3Y.B3Y.B3Y.B3Y.', 'cliente', NOW(), NOW());

-- ------------------------------------------------------
-- Estructura de tabla para `marcas`
-- ------------------------------------------------------

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `logo` varchar(255) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos iniciales para `marcas`
INSERT INTO `marcas` (`id`, `nombre`, `pais`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', 'Japón', NOW(), NOW()),
(2, 'BMW', 'Alemania', NOW(), NOW()),
(3, 'Ford', 'EEUU', NOW(), NOW());

-- ------------------------------------------------------
-- Estructura de tabla para `coches`
-- ------------------------------------------------------

CREATE TABLE `coches` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modelo` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NULL DEFAULT NULL,
  `marca_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `coches_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos iniciales para `coches`
INSERT INTO `coches` (`modelo`, `precio`, `marca_id`, `created_at`, `updated_at`) VALUES
('Corolla', 25000.00, 1, NOW(), NOW()),
('Yaris', 18000.00, 1, NOW(), NOW()),
('M3', 90000.00, 2, NOW(), NOW()),
('X5', 75000.00, 2, NOW(), NOW()),
('Mustang', 55000.00, 3, NOW(), NOW()),
('Focus', 22000.00, 3, NOW(), NOW());

-- ------------------------------------------------------
-- Estructura de tabla para `especificacions`
-- ------------------------------------------------------

CREATE TABLE `especificacions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos iniciales para `especificacions`
INSERT INTO `especificacions` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Potencia (CV)', NOW(), NOW()),
(2, 'Combustible', NOW(), NOW()),
(3, 'Transmisión', NOW(), NOW());

-- ------------------------------------------------------
-- Estructura de tabla para `especificacion_coche`
-- ------------------------------------------------------

CREATE TABLE `especificacion_coche` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `coche_id` bigint(20) UNSIGNED NOT NULL,
  `especificacion_id` bigint(20) UNSIGNED NOT NULL,
  `valor` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `espec_coche_coche_id_foreign` FOREIGN KEY (`coche_id`) REFERENCES `coches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `espec_coche_espec_id_foreign` FOREIGN KEY (`especificacion_id`) REFERENCES `especificacions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Relaciones iniciales
INSERT INTO `especificacion_coche` (`coche_id`, `especificacion_id`, `valor`) VALUES
(1, 1, '122 CV'), (1, 2, 'Híbrido'),
(3, 1, '480 CV'), (3, 2, 'Gasolina'),
(5, 1, '450 CV'), (5, 2, 'Gasolina');
