<?php
require_once("../config/db.php");
require_once("horas.php");
require_once("nomina.php");
require_once("nomina.service.php");

$id = $_GET['id_empleado'];


$emp = $conn->query("SELECT * FROM empleados WHERE id = $id")->fetch_assoc();


$res = Horas::getByEmpleado($conn, $id);
$horas = [];

while($row = $res->fetch_assoc()) {
    $horas[] = $row;
}


$calc = calcularNomina($emp, $horas);


$stmt = $conn->prepare("INSERT INTO nominas 
(id_empleado, fecha_inicio, fecha_fin, total_devengado, total_deducciones, total_pagar)
VALUES (?, NOW(), NOW(), ?, ?, ?)");

$stmt->bind_param("iddd", $id, $calc['devengado'], $calc['deducciones'], $calc['total']);
$stmt->execute();

echo json_encode($calc);