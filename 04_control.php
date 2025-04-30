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

// Array indexado
$miArray = ['cerezas', "fresas", "nisperos"];

$miArray[] = "ciruela";

echo "**************"."<br>";

foreach ($miArray as $fruta) {
    echo $fruta; //
}

// $miArray[] = []; no se puede meter un array dentro de otro vacio

echo "--------------------"."<br>";
// Array asociativo
$miArray = [["cereza", 9.50], ["naranja", 2.5], ["platano", 4.35], ["kiwi", 5.60], ["manzana", 2.25]];

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

// foreach ( $array as $clave => $valor )
foreach ($arrayAsociativo as $clave => $valor) {
    echo "$valor -> $clave"."<br>";
}
echo "**************"."<br>";

echo "**************"."<br>";
$array1 = []; // Esto es lo mismo
$array1 = array(); // Que esto 
$array1[] = "rojo";
$array1[] = "verde";
$array1[] = "azul";
array_push($array, "amarillo");

var_dump($array1);

echo "**************"."<br>";
$arrayAsociativo2 = array("nombre" => "pepe", "edad" => 25);

echo "**************"."<br>";