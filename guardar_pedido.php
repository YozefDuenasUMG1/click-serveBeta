<?php
require_once __DIR__ . '/config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['mesa']) && isset($_POST['pedido']) && isset($_POST['detalle'])) {
    $mesa = trim($_POST['mesa']);
    $pedido = trim($_POST['pedido']); // Elementos seleccionados
    $detalle = trim($_POST['detalle']); // Texto adicional

    if (empty($mesa) || empty($pedido)) {
        echo "Error: Los campos 'mesa' y 'pedido' no pueden estar vacíos.";
        exit;
    }

    $sql = "INSERT INTO pedidos (mesa, pedido, detalle, estado) VALUES (?, ?, ?, 'pendiente')";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $mesa, $pedido, $detalle); // Guardar elementos seleccionados en `pedido` y texto adicional en `detalle`

    if ($stmt->execute()) {
        echo "Pedido guardado correctamente";
    } else {
        echo "Error al guardar el pedido: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Faltan datos ('mesa', 'pedido' o 'detalle')";
}

$conexion->close();
?>
