<?php

// Formas de llamar a un fichero en PHP
// include 'nombre_fichero.php'; // Usar el error como un warning, no detendremos el script
// require 'nombre_fichero.php'; // Usar el error como crítico y detiene el script
// include_once 'nombre_fichero.php';  // Usar el error como un warning, no detendremos el script, solo realiza la conexión una vez
// require_once 'nombre_fichero.php'; // Usar el error como crítico y detiene el script, solo realiza la conexión una vez

require_once 'connection.php';
echo "Soy el index.php";
echo "<br>"."-----------------"."<br>";
foreach ($conn -> query('SELECT * FROM colores') as $fila) {
    print_r($fila);
    echo "<br>";
    echo $fila['usuario'];
}


echo "<br>"."-----------------"."<br>";