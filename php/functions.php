<?php

function suma($a, $b) {
    // Código de la función
    $resultado = $a + $b;
    return $resultado;
}

$suma = function($a, $b) {
    return $a + $b;
};

$suma(1,2);
$suma(2,3);
