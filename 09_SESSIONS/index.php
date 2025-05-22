<?php

// Para evitar que aparezcan los Warnings en el navegador
// error_reporting(0);

// Inicimos una session
session_start();
// Llamamos al fichero de conexión
require_once 'pdo_bind_connection.php';

// Generamos un número aleatorio entre 0 y 4 para mostrar una imagen aleatoria
$num_random = random_int(0, 4);

// Añadimos un array con las imágenes que vamos a mostrar en la página
$imagenes = [
    [
        'src' => 'img/cubos.jpg',
        'alt' => 'cubos de colores'
    ],
    [
        'src' => 'img/explosion.jpg',
        'alt' => 'nube de colores'
    ],
    [
        'src' => 'img/marca.jpg',
        'alt' => 'marca de colores'
    ],
    [
        'src' => 'img/manos.webp',
        'alt' => 'manos pintadas de colores'
    ],
    [
        'src' => 'img/cara.jpg',
        'alt' => 'cara pintada con colores vivos'
    ]
];

// Llamamos alfichero de idioma
include_once 'modulos/idioma.php';
// echo $idioma;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Las etiquetas meta y enlaces a ficheros las llamamos con php -->
    <?php include_once 'modulos/etiquetas_meta.php'; ?>
    <!-- Salvo el fichero de estilos que lo llamamos directamente -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Colores</title>
</head>

<body>
    <!-- Llamamos al header con el menú de navegación -->
    <?php include_once 'modulos/header.php' ?>
    <main class="index-main">
        <section>
            <!-- Cargamos la imagen aleatoria -->
            <img src="<?= $imagenes[$num_random]['src'] ?>" alt="<?= $imagenes[$num_random]['alt'] ?>" class="img-colores">
        </section>
        <section>
            <!-- Cargamos el formulario según la opción elegida
        Si no se ha elegido ninguna opción, cargamos el formulario de login -->
            <?php
            $formulario = $_GET['formulario'] ?? 'login';
            switch ($formulario) {
                case 'login':
                    include_once 'modulos/form_login.php';
                    break;
                case 'crear-cuenta':
                    include_once 'modulos/form_crear_cuenta.php';
                    break;
                case 'reset':
                    include_once 'modulos/form_reset.php';
                    break;
                case 'revisar-correo':
                    include_once 'modulos/revisar_cuenta_correo.php';
                    break;
                default:
                    include_once 'modulos/form_login.php';
                    break;
            }
            ?>
        </section>
    </main>
</body>
<!-- Cargamos el fichero javascript del index -->
<script src="js/index.js"></script>
</html>
