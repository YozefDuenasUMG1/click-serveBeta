<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = "localhost";
$usuario = "root";
$contraseña = ""; // Contraseña vacía cuando no hay contraseña
$base_de_datos = "pedidos";

$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");

$conn = $conexion;
?>