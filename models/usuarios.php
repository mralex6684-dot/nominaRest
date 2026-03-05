<?php

require_once("../config/db.php");

class Usuario {

    public static function findByEmail($conn, $email) {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        return $stmt->get_result();
    }

    public static function create($conn, $data) {
        $passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, rol)
        VALUES (?, ?, ?, ?)");

        $stmt->bind_param(
            "ssss",
            $data['nombre'],
            $data['email'],
            $passwordHash,
            $data['rol']
        );

        return $stmt->execute();
    }
}
?>