<?php
// Incluir la conexión a la base de datos
include('PHP/db_connect.php');

// Obtener el comando desde el parámetro GET
$command = $_GET['command'];

// Dependiendo del comando, actualiza los estados en la base de datos
if ($command == 'W') {
    // Cambiar el estado del motor (si está en -1 pasa a 0, si está en 0 pasa a 1)
    $stmt = $pdo2->prepare("UPDATE devices SET status = IF(status = -1, 0, 1) WHERE name = 'motor'");
    $stmt->execute();
} elseif ($command == 'A') {
    // Cambiar el estado del servodirection (si está en 1 pasa a 0, si está en 0 pasa a -1)
    $stmt = $pdo2->prepare("UPDATE devices SET status = IF(status = 1, 0, -1) WHERE name = 'servodirection'");
    $stmt->execute();
} elseif ($command == 'S') {
    // Cambiar el estado del motor (si está en 1 pasa a 0, si está en 0 pasa a -1)
    $stmt = $pdo2->prepare("UPDATE devices SET status = IF(status = 1, 0, -1) WHERE name = 'motor'");
    $stmt->execute();
} elseif ($command == 'D') {
    // Cambiar el estado del servodirection (si está en -1 pasa a 0, si está en 0 pasa a 1)
    $stmt = $pdo2->prepare("UPDATE devices SET status = IF(status = -1, 0, 1) WHERE name = 'servodirection'");
    $stmt->execute();
} elseif ($command == 'left-axis') {
    // Disminuir el valor de servoaxis (hasta -6)
    $stmt = $pdo2->prepare("UPDATE devices SET status = GREATEST(status - 1, -6) WHERE name = 'servoaxis'");
    $stmt->execute();
} elseif ($command == 'right-axis') {
    // Aumentar el valor de servoaxis (hasta 6)
    $stmt = $pdo2->prepare("UPDATE devices SET status = LEAST(status + 1, 6) WHERE name = 'servoaxis'");
    $stmt->execute();
} elseif ($command == 'down-lift') {
    // Disminuir el valor de servolift (hasta -3)
    $stmt = $pdo2->prepare("UPDATE devices SET status = GREATEST(status - 1, -3) WHERE name = 'servolift'");
    $stmt->execute();
} elseif ($command == 'up-lift') {
    // Aumentar el valor de servolift (hasta 3)
    $stmt = $pdo2->prepare("UPDATE devices SET status = LEAST(status + 1, 3) WHERE name = 'servolift'");
    $stmt->execute();
} elseif ($command == 'close-grip') {
    // Disminuir el valor de servogrip (hasta -5)
    $stmt = $pdo2->prepare("UPDATE devices SET status = GREATEST(status - 1, -5) WHERE name = 'servogrip'");
    $stmt->execute();
} elseif ($command == 'open-grip') {
    // Aumentar el valor de servogrip (hasta 0)
    $stmt = $pdo2->prepare("UPDATE devices SET status = LEAST(status + 1, 0) WHERE name = 'servogrip'");
    $stmt->execute();
}

// Obtener el estado actualizado de los dispositivos para devolverlo como respuesta JSON
$result = $pdo2->query("SELECT name, status FROM devices")->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>