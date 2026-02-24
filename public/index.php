<?php

$request = $_GET['url'] ?? '';

switch($request) {

    case 'empleados':
        require_once("../routes/empleados.routes.php");
    break;

    case 'horas':
        require_once("../routes/horas.routes.php");
    break;

    case 'nomina':
        require_once("../routes/nomina.routes.php");
    break;

    default:
        echo json_encode(["mensaje" => "Ruta no encontrada"]);
    break;
}

case 'login':
    require_once("../routes/auth.routes.php");
break;