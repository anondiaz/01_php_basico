<?php

session_start();
print_r($_GET['token']);
echo "<br>" . "----------" . "<br>";
require_once 'pdo_bind_connection.php';

$ahora = new DateTime();
$ahora = $ahora->format('Y-m-d H:i:s');

$delete = "DELETE FROM temporal WHERE token_caducidad < :token";
$prep = $pdo->prepare($delete);
$prep->bindParam(':token', $ahora, PDO::PARAM_STR);
$prep->execute();

if(!$_GET['token']){
    header("Location: ../index.php?formulario=token-caducado");
    exit ();
}

$select = "SELECT * FROM temporal WHERE token_registro = :token";
$prep = $pdo->prepare($select);
$prep->bindParam(':token', $_GET['token'], PDO::PARAM_STR);
$prep->execute();

$usuario = $prep->fetch(PDO::FETCH_ASSOC);

print_r($usuario);
echo "<br>" . "----------" . "<br>";
if(!$usuario){
    header("Location: ../index.php");
    exit ();
}


if($usuario['token_caducidad'] < $ahora){
    header("Location: ../index.php?formulario=token-caducado");
    exit ();
}

$insert = "INSERT INTO usuarios (usuario, email, ,telefono, password)
VALUES (:usuario, :email, :telefono, :password)";
$prep = $pdo->prepare($insert);
$prep->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);
$prep->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
$prep->bindParam(':telefono', $usuario['telefono'], PDO::PARAM_STR);
$prep->bindParam(':password', $usuario['password'], PDO::PARAM_STR);
$prep->execute();

// Eliminamos el registro de la tabla temporal
$delete = "DELETE FROM temporal WHERE token_registro = :token";
$prep = $pdo->prepare($delete);
$prep->bindParam(':token', $_GET['token'], PDO::PARAM_STR);
$prep->execute();

$_SESSION['nombre-usuario'] = $usuario['usuario'];
header("Location: ../index.php?formulario=login&mensaje=registro_ok");

$prep = null;  
