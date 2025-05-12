<?php
session_start(); // Seguridad, Establecemos que se inicie una sesion
$_SESSION['session-token'] = bin2hex(random_bytes(32)); // Seguridad crearmos un numero aleatorio dificil de descifrar

// Formas de llamar a un fichero en PHP, "introduce" el codigo en el punto donde se halle
// include 'nombre_fichero.php'; // Usar el error como un warning, no detendremos el script
// require 'nombre_fichero.php'; // Usar el error como crítico y detiene el script
// include_once 'nombre_fichero.php';  // Usar el error como un warning, no detendremos el script, solo realiza la conexión una vez
// require_once 'nombre_fichero.php'; // Usar el error como crítico y detiene el script, solo realiza la conexión una vez

require_once 'connection.php';
// require_once 'connection2.php';
// require_once 'connection3.php';
require_once 'traduccion_colores.php';
// echo "Soy el index.php";
// echo "<br>"."-----------------"."<br>";
// foreach ($conn -> query('SELECT * FROM colores') as $fila) {
//     print_r($fila);
//     echo "<br>";
//     echo $fila['usuario'];
//     echo "<br>";
// }
// echo "<br>"."-----------------"."<br>";

// Definir la querie como string
$select = "SELECT * FROM colores";

// Preparación, '->' con espacios antes y después opcional
$preparacion = $conn->prepare($select);

//Ejecución, '->' con espacios antes y después opcional
$preparacion->execute();

//Obtener los valores seleccionados
$arrayFilas = $preparacion->fetchAll();

// print_r($arrayFilas);
// Declaramos un color de letra base
$color = "white";

if ($_GET) {
    // echo $_GET['id'];
    // echo $_GET['color'];
    foreach ($arrayColors as $esp => $eng)
        if ( $_GET['color'] == $eng )  {
            $_GET['color'] = $esp;
            break;
        }
}

// Cerramos la conexión
$conn = null;

// echo "<br>"."-----------------"."<br>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <header>
        <h1>Nuestros colores preferidos</h1>
    </header>
    <main>
        <section>
            <h2>Nuestros usuarios</h2>
            <?php foreach ($arrayFilas as $fila) : ?>

                <?php
                // Más sencillo de leer y gestionar
                $color = "white";
                $arrayLetrasOscuras = ["white", "yellow", "pink", "gray", "grey"];
                if (in_array($fila['color'], $arrayLetrasOscuras)) {
                    $color = "black";
                }
                
                // Forma  con if
                // if ( $fila['color'] == "white" || $fila['color'] == "yellow" || $fila['color'] == "pink" || $fila['color'] == "grey" )  {
                //     $color = "black";
                //  } else {
                //     $color = "white";
                //  }
                  ?>
                <div class="items" style="background-color:<?= $fila['color'] ?>; color: <?= $color?>">
                    <p>
                        <?= htmlspecialchars($fila['usuario'], ENT_QUOTES, 'UTF-8')  ?>  <!-- Convertimos lo que nos viene en string podemos revisarlo en w3schools-->
                    </p>
                    <span>
                        <a href="index.php?id=<?= $fila['id_color']?>&user= <?= str_replace(" ", "%20", $fila['usuario'])?>&color=<?= $fila['color']?>"><i class="fa-solid fa-user-pen"></i></a>
                        <a href="delete.php?id=<?= $fila['id_color']?>"><i class="fa-solid fa-trash"></i></a>
                    </span>
                    
                </div>
                
            <?php endforeach ?>
        </section>
        <section>

            <?php if ($_GET ) : ?>
                <h2>Modifica tus datos</h2>     
                <form action="update.php" method="post">
                    <fieldset>
                    <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden >
                        <div>
                            <label for="usuario">Tu nombre : </label>
                            <input type="text" name="usuario" id="usuario" value="<?= $_GET['user'] ?>" >
                        </div>
                            <div>
                                <label for="color">Tu color : </label>
                                <input type="text" name="color" id="color" value="<?= $_GET['color']?>" >
                            </div>
                            <div>
                                <button type="submit">Enviar datos</button>
                                <button type="reset">Limpiar formulario</button>
                            </div>

                        </fieldset>

                    </form>
                    <?php else : ?>

            

                 <h2>Dinos tu color preferido</h2>
                 <!-- <form action="insert.php" method="post"> -->
                 <form name="formInsert">   
                    <fieldset>
                         <!-- Token de sesión -->
                        <input type="hidden" name="session-token" value="<?= $_SESSION['session-token'] ?>"> <!-- Seguridad, añadimos un input oculto con la session para enviarlo al fichero -->
                        <!-- HoneyPot -->
                        <input type="text" name="web" style="display:none" > <!-- Seguridad, añadimos un input con estilo display:none, para que los humanos no los vean, pero si los robots -->


                        <div>
                            <label for="usuario">Tu nombre : </label>
                            <input type="text" name="usuario" id="usuario">
                            <p id="errorUsuario"></p>
                        </div>
                        <div>
                            <label for="color">Tu color : </label>
                            <input type="text" name="color" id="color">
                            <p id="errorColor"></p>
                        </div>
                        <div>
                            <button type="submit">Enviar datos</button>
                            <button type="reset">Limpiar formulario</button>                           
                        </div>

                    </fieldset>

                 </form>
<?php if ($_SESSION['error_session'] = false) : ?>
    <p></p>

 <?php endif ; ?>
                 <?php endif;  ?>
        </section>
    </main>
</body>
<script src="js/colores.js"></script>
</html>
<?php

$_SESSION['error_session'] = false;