<?php

class Empleado {

    public static function getAll($conn) {
        return $conn->query("SELECT * FROM empleados");
    }

    public static function getById($conn, $id) {
        return $conn->query("SELECT * FROM empleados WHERE id = $id");
    }

    public static function create($conn, $data) {
        $stmt = $conn->prepare("INSERT INTO empleados 
        (nombre, documento, correo, telefono, id_rol, salario_base, fecha_ingreso) 
        VALUES (?, ?, ?, ?, ?, ?, NOW())");

        $stmt->bind_param(
            "ssssii",
            $data['nombre'],
            $data['documento'],
            $data['correo'],
            $data['telefono'],
            $data['id_rol'],
            $data['salario_base']
        );

        return $stmt->execute();
    }
}
?>