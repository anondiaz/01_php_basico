<?php

$num = 0;

// Evalua y ejecuta
while ($num < 5 ) {

    echo $num."<br>";
    $num++;

}

echo "--------------------"."<br>";
// Ejecuta y evalua
do {
    echo $num,"<br>";
    $num++;
} while( $num < 5 );


echo "--------------------"."<br>";

// Array indexado
$miArray = ['cerezas', "fresas", "nisperos"];

$miArray[] = "ciruela";

print_r($miArray);
echo "<br>";

// $miArray[] = []; no se puede meter un array dentro de otro vacio

echo "--------------------"."<br>";

// bucle for tradicional
for ($i = 0; $i < count($miArray); $i++) {

    echo "$i. $miArray[$i]"."<br>";

}

echo "--------------------"."<br>";
// foreach ( array as variable_temporal)
foreach ($miArray as $fruta) {
    echo $fruta; // 'cerezas', "fresas", "nísperos"
    echo "<br>";
}

// Array multidimensional (array que contiene otros arrays)
$miArray = [
    ["cereza", 9.50], ["naranja", 2.5], ["platano", 4.35], ["kiwi", 5.60], ["manzana", 2.25]
];
echo "--------------------"."<br>";

// Array asociativo forma 1
$arrayAsociativo = ["nombre" => "pepe", "edad" => 25];
echo "Con var_dump volcado completo con información y definición"."<br>";
var_dump($arrayAsociativo);
echo "<br>"."Con print_r formato más humano"."<br>";
print_r($arrayAsociativo);
echo "<br>";
echo "--------------------"."<br>";
// Array asociativo forma 2
$arrayAsociativo2 = array("nombre" => "pepe", "edad" => 25);
print_r($arrayAsociativo);
echo "<br>";
echo "--------------------"."<br>";
// foreach ( $array as $clave => $valor )
echo "Recorrinedolo con un foreach:"."<br>";
foreach ($arrayAsociativo as $clave => $valor) {
    echo "$valor -> $clave"."<br>";
}

echo "--------------------"."<br>";
$array1 = []; // Esto es lo mismo
$array1 = array(); // Que esto 
$array1[] = "rojo"; // Y esto
$array1[] = "verde";
$array1[] = "azul";
array_push($array1, "amarillo"); // Lo mismo que esto

print_r($array1);
echo "<br>";
echo "--------------------"."<br>";
