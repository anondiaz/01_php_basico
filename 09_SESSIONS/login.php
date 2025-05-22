<?php

session_start();
require_once 'pdo_bind_connection.php';

// Verificar lo que llega a insert_user.php, si esta establecido y no está ¿vacio?
// Verificar lo que llega a login.php
$verificarUsuario = isset($_POST['usuario']) && $_POST['usuario'];
$verificarpassword = isset($_POST['password']) && $_POST['password'];

// Verificamos que no esten vacios los datos
if (!$verificarUsuario || !$verificarpassword ) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
} 
// Quitar espacios en blanco con trim para limpiar el string
// Quitar espacios en blanco
$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);

// Verificar que no se envien datos vacíos
// Verificar que no se envien datos vacíos
if (empty($usuario) || empty($password) ) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

// Parseamos con el entities para evitar inyección de código
$usuario = htmlentities($usuario, ENT_QUOTES, 'UTF-8');
$password = htmlentities($password, ENT_QUOTES, 'UTF-8');

// Verificar si el usuario existe
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario"); 
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->execute();
$usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

// Si no existe salimos a index.php otra vez
if (!$usuarioExistente) {
    $_SESSION['user_inexistente'] = true;
    header('Location: index.php');
    exit();
}

// Verificamos la contraseña, si no es valida salimos a index.php otra vez
if (!password_verify($password, $usuarioExistente['password'])) {
    $_SESSION['user_inexistente'] = true;
    header('Location: index.php');
    exit();
}

// Si es ok, mostramos un mensaje
echo "Todo OK";
// sintaxis basica de setcookie
// que, dato, tiempo, ruta de validez
setcookie('usuario', $usuarioExistente['$usuario'], time() + 60, '/'); // Guardamos el usuario en una cookie por 1 minuto


// setcookie(
//     'usuario',
//      $usuarioExistente['$usuario'], [
//         'expires' => time() + 60, // 1 minuto
//         'path' => '/', // Ruta de validez, la cookie es accesible desde cualquie ruta del proyecto
//         // 'domain' => $_SERVER['HTTP_HOST'], // Dominio
//         'secure' => true, // Solo por https ojo con xampp o localhost
//         'httponly' => true, // Solo por http solo par el servidor
//         'samesite' => 'Strict', // Solo para el mismo sitio, enlaces desde la barra de direcciones del navegador
//         // 'samesite' => 'Lax', // Solo para el mismo sitio, enlaces desde otros lugares, por ejemplo un enlace en un correo
// ]);


// O redirigimos a otra página
$_SESSION['usuario'] = $usuarioExistente['$usuario'];
$_SESSION['id_usuario'] = $usuarioExistente['id_usuario'];
header('Location: colores/index.php');
