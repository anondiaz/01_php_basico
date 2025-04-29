<?php

// Vamos a tener una variable llamada edad
// Otra con el nombre de la persona
// Hay que mostrar un mensaje que diga
// > 18 "Fulanito eres mayor de edad desde hace X años"
// = 18 "Fulanito ya tienes 18 años"
// < 18 "Fulanito, te faltan X años para ser mayor de edad"

// [["cereza", 9.50],["naranja", 2.5],["platano", 4.35],["kiwi", 5.60],["manzana", 2.25]]
// "La fruta más cara es ..."
// "El promedio de los precios es ..."

// --------------------
$mayoriaEdad = 18;
$edad = 24;
$nombre = "Menganito";

if ($edad > $mayoriaEdad) {
    $difEdad = $edad - $mayoriaEdad;
    $mas18 = "$nombre eres mayor de edad desde hace $difEdad años";
}elseif ($edad < $mayoriaEdad) {
    $difEdad = $mayoriaEdad - $edad ;
    $mas18 = "$nombre, te faltan $difEdad años para ser mayor de edad";
}else
    $mas18 = "$nombre ya tienes 18 años";

// --------------------

$miArray = [["cereza", 9.50], ["naranja", 2.5], ["platano", 4.35], ["kiwi", 5.60], ["manzana", 2.25]];

// print_r($miArray[0][1]."<br>");

// echo("**********"."<br>");

// $miArray[] = []; no se puede meter un array dentro de otro vacio

$precioFruta = 0 ;
$fruta = "";

for ($i = 0; $i < count($miArray); $i++) {
    // print_r($miArray[$i][1]."<br>");
    // print_r($miArray[$i][0]."<br>");
    if ($precioFruta < $miArray[$i][1]) {
        $precioFruta = $miArray[$i][1];
        $fruta = $miArray[$i][0];
    }
}
$frutaMasCara = "La fruta más cara es $fruta y cuesta: $precioFruta €" ;

$sumaFruta = 0 ;

for ($i = 0; $i < count($miArray); $i++) {
    // print_r($miArray[$i][1]."<br>");
    // print_r($miArray[$i][0]."<br>");
    $sumaFruta += $miArray[$i][1];
}

// echo($sumaFruta);

$promedioFruta = $sumaFruta / count($miArray);

$promedioFruta = "El precio promedio de la fruta es de $promedioFruta" ;

// echo($promedioFruta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soy un PHP</title>
</head>
<body>
    <h1>Calculamos tu edad y te damos datos de la fruta</h1>
    <h2>Ejercicio 1</h2>
    <!-- <form action="">
        <input type="text" name="edad" id="edad">
        <input type="button" value="resultado">
    </form> -->
    <h3><?php echo $mas18 ?></h3>
    <h2>Ejercicio 2</h2>
    <h3><?php echo $frutaMasCara ?></h3>
    <h2>Ejercicio 3</h2>
    <h3><?php echo $promedioFruta ?></h3>
</body>
</html>
