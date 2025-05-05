<?php

// echo saludar ("Steve")."<br>";

// echo "--------------------"."<br>";

// $saludoMaria = saludar ("Maria");

// echo $saludoMaria ."<br>";


// function saludar ( $nombre) {
//     return "Hola $nombre !";
// }

$nombre = "Son-Goku";

echo "La variable es $nombre";
echo "<br>";

// Las funciones son independientes y están en otro ambito
// Una función no tiene acceso a la variable externa
// Las funciones no son case sensitive, se pueden llamar en mayusculas o minusculas


function indicarNombre(){
    global $nombre; // Poniendo global podemos acceder a las variables globales
    return $nombre;
}

echo "La variable devuelta por la función es " . indicarNombre();

function mostrarAlumnos ( $nombre, $apellido) {
    // 1. nombre apellido
    static $posicion =1 ; // static nos permite recuperar el valor que tuviera en la anterior ejecución
    echo "<br>$posicion. $nombre $apellido " ;
    $posicion++; // La incrementamos para que vaya aumentando de valor

}

mostrarAlumnos("Son", "Goku");
mostrarAlumnos("Peter", "Parker");
mostrarAlumnos("Lois", "Lane");
mostrarAlumnos("Clark", "Kent");
mostrarAlumnos("Leia", "Skywalker");

$indice = 1;
function mostrarAlumnosGlobal ( $nombre, $apellido) {
    global $indice;
    echo "<br>$indice. $nombre $apellido " ;
    $indice++;
}

mostrarAlumnosGlobal("Son", "Goku");
mostrarAlumnosGlobal("Peter", "Parker");
mostrarAlumnosGlobal("Lois", "Lane");
mostrarAlumnosGlobal("Clark", "Kent");
MOSTRARAlumnosGlobal("Leia", "Skywalker");