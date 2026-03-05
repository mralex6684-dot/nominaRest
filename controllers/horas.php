<?php
require_once("../config/db.php");
require_once("horas.php");

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

        if (Horas::registrar($conn, $data)) {
            echo json_encode(["mensaje" => "Horas registradas"]);
        }
    break;

    case 'GET':
        $id = $_GET['id_empleado'];

        $result = Horas::getByEmpleado($conn, $id);

        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    break;
}