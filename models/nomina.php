<?php

function calcularNomina($salario, $horas, $horas_extra) {

    $valorHora = $salario / 240;

    $pagoHoras = $horas * $valorHora;
    $pagoExtra = $horas_extra * ($valorHora * 1.25);

    $devengado = $pagoHoras + $pagoExtra;

    $salud = $devengado * 0.04;
    $pension = $devengado * 0.04;

    $deducciones = $salud + $pension;

    $total = $devengado - $deducciones;

    return [
        "devengado" => $devengado,
        "deducciones" => $deducciones,
        "total" => $total
    ];
}
?>