<?php
session_start();
require_once 'pdo_bind_connection.php';

$verificarUsuario = isset($_POST['usuario']) && $_POST['usuario']; // Validamos que llega por post y si llega por get falla
$verificarPassword = isset($_POST['password']) && $_POST['password'];
$verificarPassword2 = isset($_POST['password2']) && $_POST['password2'];

if (!$verificarUsuario || !$verificarPassword || !$verificarPassword2) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);
$password2 = trim($_POST['password2']);
$email = trim($_POST['email']);
$telefono = trim($_POST['telefono']);

if (empty($usuario) || empty($password) || empty($password2)){
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();    
}


echo "De momento todo Ok <br>";