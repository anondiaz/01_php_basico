<?php
session_start();
require_once 'pdo_bind_connection.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once 'etiquetas_meta.php'; ?>
    <title>Colores</title>
</head>
<body>
    <header>
        <nav class="index-nav">
            <ul>
                <li><a href="crear_cuenta.php">crear_cuenta</a></li>
                <li><a href="login.php">login</a></li>
            </ul>
        </nav>
    </header>
    <main class="index-main">

    </main>
    <dialog id="login" open closedby="true">
        <form action="login.php" method="post">
            <fieldset>
                <h2>Iniciar sesión</h2>
                <div>
                    <label for="usuario">Nombre : </label>
                    <input type="text" name="usuario" id="usuario">
                </div>
                <div>
                    <label for="password">Contraseña: </label>
                    <input type="text" name="password" id="password">
                </div>
            </fieldset>
        </form>
    </dialog>

</body>
</html>