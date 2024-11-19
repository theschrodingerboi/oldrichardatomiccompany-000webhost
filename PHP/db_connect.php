<?php
// Datos de conexión a la base de datos
$host1 = "localhost"; // Servidor de la primera base de datos
$dbname1 = "id22114529_dht22database"; // Nombre de la primera base de datos
$user1 = "id22114529_richardatomiccompany"; // Usuario
$pass1 = "KLMklm4805!"; // Contraseña

$host2 = "localhost"; // Servidor de la segunda base de datos
$dbname2 = "id22114529_for_grip"; // Nombre de la segunda base de datos
$user2 = "id22114529_thegripisrolling"; // Usuario
$pass2 = "KLMklm4805!"; // Contraseña

// Conexión a la base de datos dht22
try {
    $pdo1 = new PDO("mysql:host=$host1;dbname=$dbname1", $user1, $pass1);
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión a la base de datos DHT22: " . $e->getMessage();
    die();
}

// Conexión a la base de datos control_status
try {
    $pdo2 = new PDO("mysql:host=$host2;dbname=$dbname2", $user2, $pass2);
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión a la base de datos Control Status: " . $e->getMessage();
    die();
}
?>