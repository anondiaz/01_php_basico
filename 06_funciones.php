<?php

echo saludar ("Steve")."<br>";

echo "--------------------"."<br>";

$saludoMaria = saludar ("Maria");

echo $saludoMaria ."<br>";


function saludar ( $nombre) {
    return "Hola $nombre !";
}