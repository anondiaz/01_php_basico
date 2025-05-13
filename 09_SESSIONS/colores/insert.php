<?php

require_once 'connection.php';
// require_once 'connection2.php';
// require_once 'connection3.php';
require_once 'traduccion_colores.php';

// try {


// } catch (Exception $e) {

// }

//Token de sesión
session_start();
if ( !hash_equals($_SESSION['session-token'], $_POST['session-token'])) {
    // die("Token inválido"); // Se usa para desarrollo
    $_SESSION['error_sesion'] = true;
    header('location:index.php');
}
// HoneyPot
if ( !empty($_POST['web'])){
    die("bot detectado");
}



// echo "Soy insert.php";

// print_r($_POST); // No muestra los datos en la barra de navegacion
// print_r($_GET); // Muestra los datos en la barra de navegacion
// echo $_POST['usuario'];
// echo "<br>";
// echo $_POST['color'];
// echo "<br>";
// echo $_POST['id_usuario'];
$user = trim($_POST['usuario']); // Seguridad, conviene eliminar los espacios en blanco delante y detrás
$color = trim($_POST['color']);

if(empty($user) || empty($color)){ // Seguridad, comprobamos si esta vacio
    header('location:index.php'); // Y si está vacio reenviamos al inicio
    exit();                        // Y salimos del if
}

// Definir la querie como string
$insert = "INSERT INTO colores(color, usuario, id_usuario) VALUES (?, ?, ?)";

// Preparación, '->' con espacios antes y después opcional
$insertPreparacion = $pdo -> prepare($insert);

//Ejecución, '->' con espacios antes y después opcional
$insertPreparacion -> execute([$arrayColors[$color], $user, $_POST['id_usuario']]);

// Limpiamos el insert
$insertPreparacion = null;

// Cerramos la conexión
$pdo = null;

// Recargamos la pagina index.php
header('location:index.php');