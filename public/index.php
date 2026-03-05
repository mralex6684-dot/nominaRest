<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");
header("Content-Type: application/json");

$request = isset($_GET['url']) ? $_GET['url'] : '';

switch ($request) {

    case 'empleados':
        require_once("../routes/empleados.routes.php");
        break;

    case 'horas':
        require_once("../routes/horas.routes.php");
        break;

    case 'nomina':
        require_once("../routes/nomina.routes.php");
        break;

    case 'login':
        require_once("../routes/auth.routes.php");
        break;

    default:
        echo json_encode([
            "error" => "Ruta no encontrada"
        ]);
        break;
}

?>