<?php

require_once 'connection.php';
// echo "Soy insert.php";

// print_r($_POST); // No muestra los datos en la barra de navegacion
// print_r($_GET); // Muestra los datos en la barra de navegacion
// echo $_POST['usuario'];
// echo "<br>";
// echo $_POST['color'];

// Definir la querie como string
$insert = "INSERT INTO colores(usuario, color) VALUES (?, ?)";

// Preparación, '->' con espacios antes y después opcional
$insertPreparacion = $conn -> prepare($insert);

//Ejecución, '->' con espacios antes y después opcional
$insertPreparacion -> execute([$_POST['usuario'],$_POST['color']]);

// Limpiamos el insert
$insertPreparacion = null;

// Cerramos la conexión
$conn = null;

header('location:index.php');