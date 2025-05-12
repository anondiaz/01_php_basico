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

$usuario = htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
$password2 = htmlspecialchars($password2, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$telefono = htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8');

echo $usuario;

if ($password !== $password2) {
     $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();    
}

$select = "SELECT * FROM usuarios WHERE usuario = :usuario";
$stmt = $pdo->prepare($select);
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->execute();
$usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuarioExistente) {
    $_SESSION['error_repe'] = true;
    header('Location: crear_cuenta.php');
    exit(); 
} // else {
 // echo "El usuario no existe<br>";
// }

$hash = password_hash($password, PASSWORD_DEFAULT);



echo "De momento todo Ok <br>";