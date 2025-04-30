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

// Tenemos una fruteria y vamos a vender y comprar frutas.
// Necesitamos una función para vender frutas y otra para comprar frutas

$frutas = [
["nombre" => "cereza", "precio" => 9.5, "stock_kg" => 20],
["nombre" => "naranja", "precio" => 2.5, "stock_kg" => 40],
["nombre" => "platano", "precio" => 4.35, "stock_kg" => 35],
["nombre" => "kiwi", "precio" => 5.60, "stock_kg" => 10],
["nombre" => "manzana", "precio" => 2.25, "stock_kg" => 25]
];

// Para vender la fruta vender_fruta(fruta, cantidad)
// Venta de cerezas 5.0 Kg x 9.5 = 47.5€
// debe actualizar el array $frutas

function vender_fruta ( $frutaV, $cantidadV, &$frutas){
// $frutaV = "manzana" ;
// $cantidadV = 3.5;
    for ($i = 0; $i < count($frutas); $i++) {
        // echo $frutas[$i]["stock_kg"]."<br>" ;
        // print_r ($i. $frutas[$i])."<br>";
        foreach ($frutas[$i] as $clave => $valor) {
            // echo "$clave -> $valor"."<br>";
            // echo $i;
            if ( $valor == $frutaV ){
                // echo "Hola";
                $cantidadVendida = $cantidadV ;
                // echo $cantidadVendida;
                // echo $valor;
                $precioF = $frutas[$i]["precio"];
                // echo $precioF;
                $importeVenta = $cantidadVendida * $precioF;
                // echo $importeCompra;
                $importeVenta = "Venta de $valor $cantidadVendida Kg x $precioF = $importeVenta €";
                $frutaRestante = $frutas[$i]["stock_kg"] - $cantidadVendida;
                $frutas[$i]["stock_kg"] = $frutaRestante ;
                // echo $frutas[$i]["stock_kg"]."<br>" ;
            }        
            // echo $frutas[$i]["stock_kg"]."<br>" ;
            // echo "$clave -> $valor"."<br>";
        }
    }
    return $importeVenta;
}

$resultadoVenta = vender_fruta("manzana", 3, $frutas );

for ($i = 0; $i < count($frutas); $i++) {
    echo $frutas[$i]["stock_kg"]."<br>" ;
}
echo("----------"."<br>");

// Para comprar comprar_frutas(fruta, cantidad, precio)
// Pero si la fruta no está la añadiremos

    $frutaC = "pera" ;
    $cantidadC = 20 ;
    $precioC = 5.5 ;

    for ($i = 0; $i < count($frutas); $i++) {
        if ($frutas[$i]["nombre"] != $frutaC) {
            // echo $frutas[$i]["nombre"]."<br>";
            $frutas[] = 
            ["nombre" => $frutaC, "precio" => $precioC, "stock_kg" => $cantidadC];
            break;
        } else {
            
            echo "Existe";
        }

    }

    // for ($i = 0; $i < count($frutas); $i++) {
    //     echo $frutas[$i]["nombre"]."<br>" ;
    //     echo $frutas[$i]["precio"]."<br>" ;
    //     echo $frutas[$i]["stock_kg"]."<br>" ;
    // }

    print_r($frutas);

echo("----------"."<br>");
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
    <h2>Ejercicio 4</h2>
    <h3><?php echo $resultadoVenta ?></h3>
    <h2>Ejercicio 5</h2>
    <h3><?php echo $resultadoCompra ?></h3>
</body>
</html>
