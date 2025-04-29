<?php

$num = 10;

while ($num < 5 ) {

    echo $num,"<br>";
    $num++;

}

echo "**************"."<br>";

do {
    echo $num,"<br>";
    $num++;
} while( $num < 5 );

echo "**************"."<br>";

$miArray = ['cerezas', "fresas", "nisperos"];

$miArray[] = "ciruela";

// $miArray[] = []; no se puede meter un array dentro de otro vacio

for ($i = 0; $i < count($miArray); $i++) {

    echo "$i. $miArray[$i]"."<br>";

}
echo "**************"."<br>";

// Array asociativo
$arrayAsociativo = ["nombre" => "pepe", "edad" => 25];
var_dump($arrayAsociativo);
echo "**************"."<br>";
print_r($arrayAsociativo);
echo "**************"."<br>";

$array1 = []; // Esto es lo mismo
$array1 = array(); // Que esto 
$array1[] = "rojo";
$array1[] = "verde";
$array1[] = "azul";

var_dump($array1);

echo "**************"."<br>";
$arrayAsociativo2 = array("nombre" => "pepe", "edad" => 25);

echo "**************"."<br>";