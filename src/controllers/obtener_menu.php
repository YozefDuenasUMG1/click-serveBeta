<?php
require_once __DIR__ . '/../../config.php';

header('Content-Type: application/json');

try {
    $sql = "SELECT id, nombre, descripcion, precio FROM menu WHERE disponible = 1";
    $result = $conn->query($sql);

    $menu = [];
    while ($row = $result->fetch_assoc()) {
        $menu[] = $row;
    }

    echo json_encode(["success" => true, "menu" => $menu]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
?>