<?php
function salarioConIRPF (int|float $salario) : float {
    $tramo1 = 12450 * 0.81;
    $tramo2 = (20200 - 12450) * 0.76;
    $tramo3 = (35200 - 20200) * 0.7;
    $tramo4 = (60000 - 35200) * 0.63;
    $tramo5 = (300000 - 60000) * 0.55;

    $salarioFinal = match(true) {
        $salario <= 12450 
            => $salario * 0.81,
        $salario > 12450 && $salario <= 20200 
            => $tramo1 + (($salario - 12450) * 0.76),
        $salario > 20200 && $salario <= 35200
            => $tramo1 + $tramo2 + ($salario - 20200) * 0.7,
        $salario > 35200 && $salario <= 60000 
            => $tramo1 + $tramo2 + $tramo3 + ($salario - 35200) * 0.63,
        $salario > 60000 && $salario <= 300000 
            => $tramo1 + $tramo2 + $tramo3 + $tramo4
                + ($salario - 60000) * 0.55,
        $salario > 300000
            => $tramo1 + $tramo2 + $tramo3 + $tramo4 + $tramo5
                + ($salario - 300000) * 0.53
    };
    return $salarioFinal;
}
?>
