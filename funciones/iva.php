<?php
define("GENERAL", 21);
define("REDUCIDO", 10);
define("SUPERREDUCIDO", 4);

function precioConIVA (float|int $precio, string $iva) : float {
    $precioConIVA = match($iva) {
        "GENERAL" => $precio + $precio * GENERAL/100,
        "REDUCIDO" => $precio + $precio * REDUCIDO/100,
        "SUPERREDUCIDO" => $precio + $precio * SUPERREDUCIDO/100,
        "SIN IVA" => $precio
    };
    return $precioConIVA;
}

function precioSinIVA (float|int $precio, string $iva) : float {
    $precioSinIVA = match($iva) {
        "GENERAL" => $precio - $precio * GENERAL/100,
        "REDUCIDO" => $precio - $precio * REDUCIDO/100,
        "SUPERREDUCIDO" => $precio - $precio * SUPERREDUCIDO/100,
        "SIN IVA" => $precio
    };
    return $precioSinIVA;
}
?>
