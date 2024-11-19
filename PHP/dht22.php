<?php
include('db_connect.php');

$query = $pdo1->query("SELECT temperature, humidity FROM dht22_readings ORDER BY timestamp DESC LIMIT 1");
$data = $query->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);
?>