<?php

session_start();
require_once 'pdo_bind_connection.php';

// Verificar lo que llega a insert_user.php, si esta establecido y que la variable exista
$verificarUsuario = isset($_POST['usuario']) && $_POST['usuario'];
$verificarpassword = isset($_POST['password']) && $_POST['password'];
$verificarpassword2 = isset($_POST['password2']) && $_POST['password2'];

// Verificamos que no esten vacios los datos
if (!$verificarUsuario || !$verificarpassword || !$verificarpassword2) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
} 
// Quitar espacios en blanco con trim para limpiar el string
$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);
$password2 = trim($_POST['password2']);
$email = trim($_POST['email']);
$telefono = trim($_POST['telefono']);

// Verificar que no se envien datos vacíos
if (empty($usuario) || empty($password) || empty($password2)) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

// Parseamos con el entities para evitar inyección de código
$usuario = htmlentities($usuario, ENT_QUOTES, 'UTF-8');
$password = htmlentities($password, ENT_QUOTES, 'UTF-8');
$password2 = htmlentities($password2, ENT_QUOTES, 'UTF-8');
$email = htmlentities($email, ENT_QUOTES, 'UTF-8');
$telefono = htmlentities($telefono, ENT_QUOTES, 'UTF-8');

// Validamos que las contraseñas coincidan
if ($password !== $password2) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

// Verificar si el usuario existe o no, para que no se puedan crear 2 usuarios iguales
// Para ello primero lanzamos una querie
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario"); 
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->execute();
$usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

// Y después validamos con un if
if ($usuarioExistente) {
    $_SESSION['user_repe'] = true;
    header('Location: crear_cuenta.php');
    exit();
} 

// Ciframos la contraseña con bcrypt
$hash = password_hash($password, PASSWORD_DEFAULT);
// echo $hash . "<br>";

//token de validación de 128 bits
$token_val = bin2hex(random_bytes(64));

// Establecemos la fecha de caducidad del token
$token_cad = new DateTime();
$token_cad -> add(new DateInterval('PT2H')); // caducidad + 2 horas
$token_cad = $token_cad -> format('Y-m-d H:i:s');

// Finalmente realizamos el insert del usuario, esta es otra forma
$insert = "INSERT INTO temporal (usuario, password, email, telefono, token_registro, token_caducidad)";
$insert .= " VALUES (:usuario, :password, :email, :telefono, :token_val, :token_cad)";

$stmt = $pdo->prepare($insert);
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->bindParam(':password', $hash, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
$stmt->bindParam(':token_val', $token_val, PDO::PARAM_STR);
$stmt->bindParam(':token_cad', $token_cad, PDO::PARAM_STR);
$stmt->execute();

// Mostramos mensaje de inserción correcta
echo "Usuario insertado correctamente<br>";

$body = "<p>Hola $usuario,</p><br>";
$body .= "<p>Gracias por registrarte en nuestra aplicación. Para completar el proceso de registro, por favor haz clic en el siguiente enlace:</p><br>";
$body .= "<p><a href='http://localhost/09_SESSIONS/registro.php?token=$token_val' >HAZ CLICK PARA VALIDAR TU CUENTA</a></p><br>";
$body .= "<p>Si no te has registrado en nuestra aplicación, por favor ignora este mensaje.</p><br>";
$body .= "<p>Saludos,<br>El equipo de sotorpe</p><br>";

include 'email_validacion.php'; // incluimos fichero con el password

