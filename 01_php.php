<?php
// Los comentarios en php se ponen así
# Esta también aunque no es recomendado
/*
Comentario multilinea
*/

// Variables

$variable1 = "minúsculas";
$VARIABLE1 = "MAYÚSCULAS";

echo $variable1." ".$VARIABLE1;
echo "<br>";
echo $variable1, " ", $VARIABLE1;
// print $variable1, $VARIABLE1; # Esto no funciona


$yo = "Andres";
echo "<br>";
$string1 = "Hola ".$yo;
echo $string1;
echo "<br>";
$string2 = "<h1>Hola $yo</h1>";
echo $string2;
echo "<br>";
$string3 = 'Hola $yo';
echo $string3;
echo "<br>";

// Constantes

const PI_1 = "3.1416"; # const => variable local
// PI_1 = 3.28; # Es una constante!!!!
define("PI_2", 3.14159); # define => variable global
echo PI_1;
echo "<br>";
echo PI_2;
echo "<br>";

$num1 = 100;
echo gettype($num1);
echo "<br>";
$num2 ="100";
echo gettype($num2);
echo "<br>";

$unEntero = 2;
$unDecimal = 2.0;
$unString = "soy un string";
$unBooleano = true; // false
$PI = 3.1416; // Las constante suele tener el nombre en mayúsculas
$PI = 6.28; // Pero en este caso no lo hemos declarado como constante


//
// Funciona igual que javascript 
if ($num1 !== $num2) {
    echo "Cierto";
} else {
    echo "Falso";
}
echo "<br>";
var_dump($num1);
echo "<br>";

$miArray = ['cerezas', "fresas", "nisperos"];
var_dump($miArray);
echo "<br>";
print_r($miArray);
echo "<br>";
print_r($num1);
echo "<br>";

echo "<br>";

?>
