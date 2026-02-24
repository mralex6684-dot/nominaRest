<?php

function calcularNomina($empleado, $horas) {

    $salario = $empleado['salario_base'];
    $valorHora = $salario / 240;

    $horasTotales = 0;
    $extras = 0;

    foreach ($horas as $h) {
        $horasTotales += $h['horas'];
        $extras += $h['horas_extra'];
    }

    $devengado = ($horasTotales * $valorHora) + ($extras * $valorHora * 1.25);

    $salud = $devengado * 0.04;
    $pension = $devengado * 0.04;

    $deducciones = $salud + $pension;

    return [
        "devengado" => $devengado,
        "deducciones" => $deducciones,
        "total" => $devengado - $deducciones
    ];
}