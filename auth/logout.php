<?php
// Iniciamos la sesión
session_start();

// Guardamos el nombre de usuario para el mensaje de despedida
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';

// Destruimos todas las variables de sesión
$_SESSION = array();

// Si se usa un cookie de sesión, eliminarlo también
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión
session_destroy();

// Redirigir a la página de login
header("Location: ../login.html");
exit();