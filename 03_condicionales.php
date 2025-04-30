<?php

$num = 0;

// if
if ($num > 0) {
    echo "$num es mayor que 0";
} elseif ($num < 0) {
    echo "$num es menor que 0";
} else {
    echo 'La variable $num es 0';
}
echo "<br>";

echo "--------------------"."<br>";

echo "OPERADORES LOGICOS"."<br>";
echo "and (y) -> &&"."<br>";
echo "or (o) -> ||"."<br>";
echo "not (no) -> != !=="."<br>";

$num1 = 20 ;
$num2 = 30 ;

if ($num1 == 10 && $num2 == 20) {
    echo "Se cumplen las dos condiciones"."<br>";
}elseif ($num1 == 10 || $num2 == 20) {
    echo "Se cumple una de las dos condiciones"."<br>";
}else {
    echo " No se cumple ninguna de las dos condiciones"."<br>";
}

echo "--------------------"."<br>";

echo (0 > 0);
echo "<br>";

//switch
switch ($num) {
    case $num > 0:
        echo "$num es mayor que 0";
        break;
    case $num < 0:
        echo "$num es menor que 0";
        break;
    default:
        echo 'La variable $num es 0';
}

// Valores que se asimilan a falso:
// 0, null, , '', ""

// echo (bool)0;
// echo "<br>";


echo "<br>";