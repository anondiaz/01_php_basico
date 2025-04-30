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

// echo("--------------------"."<br>");

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
print_r($frutas);
echo "<br>";
echo("--------------------"."<br>");

// Para vender vender_fruta(nombre, cantidad)
vender_fruta( $frutas,"manzana", 3 );
vender_fruta($frutas, "cereza", 25);
vender_fruta($frutas, "melon", 30);
echo "<br>";
echo("--------------------"."<br>");
comprar_fruta($frutas, "pera", 30, 2);
print_r($frutas);
echo "<br>";
echo("--------------------"."<br>");
vender_fruta($frutas, "pera", 15);
vender_fruta($frutas, "cereza", 15);
echo "<br>";
echo("--------------------"."<br>");

function vender_fruta ( &$frutas, $nombre_fruta, $cantidad, ){
    // Definimos la disponibilidad en nula, es decir por defecto no la tenemos
    $no_disponibilidad = true;
    foreach ( $frutas as $clave => &$producto){ // Establecemos la referencia al nombre del $producto con el & y a partir de aquí trabajaremos con este como referencia al elemento
        // Primero vamos a ver si tenemos la fruta
        if ($producto['nombre'] == $nombre_fruta){ // Es decir si el valor de la clave 'nombre' es igual a 'nombre_fruta'
            // Si es cierto, miraremos si tenemos stock
            if ($producto['stock_kg'] >= $cantidad){ // Es decir si el valor de la clave 'stock_kg' es mayor o igual a 'cantidad'
                // Si tenemos suficiente entonces procederemos con la venta
                $stock_actualizado = $producto['stock_kg'] - $cantidad ; // Metemos en la variable 'stock_actualizado' la resta del stock del prodcuto menos la cantidad
                $producto['stock_kg'] = $stock_actualizado ; // Actualizamos el valor del stock
                // Y realizamos o indicamos la venta en mi caso actualizo la variable de la venta
                echo "<br>";
                echo "Venta realizada de '$nombre_fruta': $cantidad kg x "
                . $producto['precio'] 
                . "€ = "
                . ($cantidad * $producto['precio'] );
                echo "<br>";
                echo "<br>";
                echo "Ahora quedan $stock_actualizado de '$nombre_fruta'";
                echo "<br>";
            } // Si no hay suficiente cantidad de fruta
            else {
                echo "<br>";
                echo "Has pedido $cantidad pero sólo tenemos ".$producto['stock_kg']." kg de la fruta '$nombre_fruta'";
                echo "<br>";

            }
            // También pondremos que hay disponibilidad y saldremos de este if y del bucle
            $no_disponibilidad = false;
            break;
        }
    }
    if ($no_disponibilidad) {
        echo "<br>";
        echo "No tenemos la fruta '$nombre_fruta'";
        echo "<br>";

    }
    // Eliminamos las variables locales, eliminando las referencias
    unset ($frutas);
    unset ($producto);

}

// Para comprar comprar_frutas(fruta, cantidad, precio)
// Pero si la fruta no está la añadiremos

function comprar_fruta (&$frutas, $nombre_fruta, $cantidad, $precio) {
    // Definimos la disponibilidad en nula, es decir por defecto no la tenemos
    $no_tengo_la_fruta = true;
    foreach ($frutas as &$producto ) {  // Establecemos la referencia al sub-array con el & y a partir de aquí trabajaremos con este como referencia al elemento (sub-array) del array
        // Primero vamos a ver si tenemos la fruta
        if ($producto['nombre'] == $nombre_fruta) { // Es decir si el valor de la clave 'nombre' es igual a 'nombre_fruta'
            // Si es cierto, añadiremos la cantidad al stock
            $producto['stock_kg'] += $cantidad;
            // Y actualizaremos el precio
            $producto['precio'] = $precio;
            // Mostraremos el mensaje de que hemos actualizado los datos de la fruta
            echo "<br>";
            echo "Actualizada fruta '$nombre_fruta', con precio $precio € y cantidad "
            .$producto['stock_kg']
            . " kg" ;
            echo "<br>";
            // También pondremos que ya tenemos la fruta
            $no_tengo_la_fruta = false;
            // Y salimos del if y del bucle
            break;
        }
    }
    // Si no tenemos la fruta
    if ($no_tengo_la_fruta) { // Es decir si es verdadero
        echo "\$producto = ";
        print_r($producto);
        echo "<br>";
        echo "No podemos usar \$producto porque machacamos la fruta"."<br>";
        // Añadimos el  nuevo 'producto' al array, aquí es una variable independiente y componemos el sub-array
        $producto_nuevo = ['nombre' => $nombre_fruta, 'precio' => $precio, 'stock_kg' => $cantidad];
        // Añadimos al array principal $frutas el nuevo sub-array $producto
        $frutas[] = $producto_nuevo;
        // Mostraremos el mensaje de que hemos añadido la nueva fruta
        echo "<br>";
        echo "Añadida fruta '$nombre_fruta', con precio $precio € y cantidad $cantidad kg" ;
        echo "<br>";
    }
    // Eliminamos las variables locales, eliminando las referencias
    unset ($frutas);
    unset ($producto);
}

print_r($frutas);
echo "<br>";

echo("--------------------"."<br>");
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
    <h3><?php echo $informeVenta ?></h3>
    <h2>Ejercicio 5</h2>
    <h3><?php echo $resultadoCompra ?></h3>
</body>
</html>
