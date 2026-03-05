<?php
require_once("../config/db.php");
require_once("../models/Empleado.php");

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {

    case 'GET':
        $result = Empleado::getAll($conn);

        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);

        if (Empleado::create($conn, $data)) {
            echo json_encode(["mensaje" => "Empleado creado"]);
        } else {
            echo json_encode(["error" => "Error"]);
        }
    break;
}
?>