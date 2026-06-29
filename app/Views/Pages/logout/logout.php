<?php
session_start();
$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cerrando sesión</title>
    <meta http-equiv="refresh" content="2;url=<?= BASE_URL ?>">
</head>
<body style="display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0;font-family:system-ui,sans-serif;background:#f0f0f5;">
    <div style="text-align:center;">
        <i class="fas fa-spinner fa-spin" style="font-size:48px;color:#9141ac;margin-bottom:16px;"></i>
        <p style="font-size:18px;color:#333;">Cerrando sesión...</p>
    </div>
</body>
</html>