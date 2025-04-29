<?php
require_once __DIR__ . '/../config/config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "UPDATE pedidos SET estado = 'listo' WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Pedido marcado como listo";
    } else {
        echo "Error al actualizar el pedido: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de pedido no proporcionado.";
}

$conexion->close();
?>
