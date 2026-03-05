<?php
require_once("../config/db.php");

class Horas {

    public static function registrar($conn, $data) {
        $stmt = $conn->prepare("INSERT INTO horas_trabajadas 
        (id_empleado, fecha, horas, horas_extra) 
        VALUES (?, ?, ?, ?)");

        $stmt->bind_param(
            "isii",
            $data['id_empleado'],
            $data['fecha'],
            $data['horas'],
            $data['horas_extra']
        );

        return $stmt->execute();
    }

    public static function getByEmpleado($conn, $id) {
        return $conn->query("SELECT * FROM horas_trabajadas WHERE id_empleado = $id");
    }
}
?>