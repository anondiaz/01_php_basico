<?php

// Llamamos a la sesion
session_start();
// print_r($_SESSION);
// echo "<br>"."----------"."<br>";
// Borramos la sesion
session_unset();
// print_r($_SESSION);
// echo "<br>"."----------"."<br>";
// Destruimops la sesion
session_destroy();
// print_r($_SESSION);
// echo "<br>"."----------"."<br>";
// echo "Sesión finalizada";
// Reenviamos a otra página
header('location:index.php');