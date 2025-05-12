<?php

session_start();
require_once 'pdo_bind_connection.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once 'etiquetas_meta.php'; ?>
    <title>Crear cuenta</title>
</head>
<body>
<!-- <h1>Prueba</h1> -->
<main>
    <form action="insert_user.php" method="post">
        <div>
            <label for="usuario">Nombre : </label>
            <input type="text" name="usuario" id="usuario">
        </div>
        <div>
            <label for="password">Pasword : </label>
            <input type="text" name="password" id="password">
        </div>
                <div>
            <label for="password2">Repita el password : </label>
            <input type="text" name="password2" id="password2">
        </div>
        <div>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="telefono">Telefono : </label>
            <input type="text" name="telefono" id="telefono">
        </div>
        <div>
            <button type="submit">Enviar datos</button>
        </div>

    </form>
</main>

    
</body>
</html>