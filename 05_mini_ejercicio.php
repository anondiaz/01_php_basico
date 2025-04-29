<?php

// Vamos a tener una variable llamada edad
// Otra con el nombre de la persona
// Hay que mostrar un mensaje que diga
// > 18 "Fulanito eres mayor de edad desde hace X años"
// = 18 "Fulanito ya tienes 18 años"
// < 18 "Fulanito, te faltan X años para ser mayor de edad"

// [["cereza", 9.50],["naranja", 2.5]["platano", 4.35],["kiwi", 5.60], ["manzana", 2.25]]
// "La fruta más cara es ..."
// "El promedio de los precios es ..."

echo "**************"."<h1>Ejercicio 1</h1>";
$mayoriaEdad = 18;
$edad = 19;
$nombre = "Fulanito";

if ($edad > $mayoriaEdad) {
    $difEdad = $edad - $mayoriaEdad;
    echo "$nombre eres mayor de edad desde hace $difEdad años";
}elseif ($edad < $mayoriaEdad) {
    $difEdad = $mayoriaEdad - $edad ;
    echo "$nombre, te faltan $difEdad años para ser mayor de edad";
}else
    echo "$nombre ya tienes 18 años";
    echo "**************"."<h1>Ejercicio 2</h1>";
