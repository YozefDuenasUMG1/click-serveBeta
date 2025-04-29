<?php
require_once __DIR__ . '/config.php';

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "UPDATE pedidos SET estado = 'listo' WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Pedido marcado como listo"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al actualizar el pedido: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "ID de pedido no proporcionado."]);
}

$conexion->close();
?>
