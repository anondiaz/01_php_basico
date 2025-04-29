<?php

$num = 1;

// if
if ($num > 0) {
    echo "$num es mayor que 0";
} elseif ($num < 0) {
    echo "$num es menor que 0";
} else {
    echo 'La variable $num es 0';
}
echo "<br>";

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