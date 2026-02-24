<?php
require_once("../config/db.php");
require_once("../models/Usuario.php");

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {

    case 'POST':

        $data = json_decode(file_get_contents("php://input"), true);

        $email = $data['email'];
        $password = $data['password'];

        $result = Usuario::findByEmail($conn, $email);

        if ($result->num_rows === 0) {
            echo json_encode(["error" => "Usuario no encontrado"]);
            exit;
        }

        $user = $result->fetch_assoc();

        if (!password_verify($password, $user['password'])) {
            echo json_encode(["error" => "Contraseña incorrecta"]);
            exit;
        }

        // Login correcto
        echo json_encode([
            "mensaje" => "Login exitoso",
            "usuario" => [
                "id" => $user['id'],
                "nombre" => $user['nombre'],
                "rol" => $user['rol']
            ]
        ]);

    break;
}
?>