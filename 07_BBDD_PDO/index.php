<?php

// Formas de llamar a un fichero en PHP, "introduce" el codigo en el punto donde se halle
// include 'nombre_fichero.php'; // Usar el error como un warning, no detendremos el script
// require 'nombre_fichero.php'; // Usar el error como crítico y detiene el script
// include_once 'nombre_fichero.php';  // Usar el error como un warning, no detendremos el script, solo realiza la conexión una vez
// require_once 'nombre_fichero.php'; // Usar el error como crítico y detiene el script, solo realiza la conexión una vez

require_once 'connection.php';
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

// Cerramos la conexión
$conn = null;

// echo "<br>"."-----------------"."<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
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

                <?php if ( $fila['color'] == "white" || $fila['color'] == "yellow" || $fila['color'] == "pink" || $fila['color'] == "grey" )  {
                    $color = "black";
                 } else {
                    $color = "white";
                 }
                  ?>
                <div style="background-color:<?= $fila['color'] ?>; color: <?= $color?>">
                    <p>
                        <?= $fila['usuario'] ?>
                    </p>
                </div>
                
            <?php endforeach ?>
        </section>
        <section>
                 <h2>Dinos tu color preferido</h2>
                 <form action="insert.php" method="post">
                    <fieldset>

                        <div>
                            <label for="usuario">Tu nombre : </label>
                            <input type="text" name="usuario" id="usuario">
                        </div>
                        <div>
                            <label for="color">Tu color : </label>
                            <input type="text" name="color" id="color">
                        </div>
                        <div>
                            <button type="submit">Enviar datos</button>
                            <button type="reset">Limpiar formulario</button>
                        </div>

                    </fieldset>

                 </form>
        </section>
    </main>
</body>
</html>