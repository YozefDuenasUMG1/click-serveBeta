<?php
require_once __DIR__ . '/config.php';

header('Content-Type: application/json'); 
$sql = "SELECT id, mesa, pedido, detalle, estado FROM pedidos WHERE estado = 'pendiente'";
$result = $conexion->query($sql);

$pedidos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pedidos[] = $row;
    }
}

echo json_encode($pedidos);

$conexion->close();
?>
