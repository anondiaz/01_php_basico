<?php
// Establecemos el idioma por defecto si no hay ninguno elegido
$idioma = $_POST['idioma'] ?? 'es';
$_POST['idioma'] = $idioma;