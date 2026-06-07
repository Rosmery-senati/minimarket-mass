<?php
declare(strict_types=1);

function requiereLogin(): void {
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?accion=login');
        exit;
    }
}

function usuarioActual(): ?array {
    return $_SESSION['usuario'] ?? null;
}

function requiereRol(string $rol): void {
    requiereLogin();
    if (usuarioActual()['rol'] !== $rol) {
        http_response_code(403);
        die('
        <!DOCTYPE html>
        <html lang="es">
        <head>
        <meta charset="UTF-8">
        <title>Acceso denegado</title>
        <style>
          *{box-sizing:border-box;font-family:"Segoe UI",Arial,sans-serif;margin:0;padding:0}
          body{background:#f4f6f9;min-height:100vh;display:flex;align-items:center;justify-content:center}
          .card{background:#fff;border-radius:14px;padding:40px 36px;text-align:center;box-shadow:0 8px 25px rgba(0,0,0,.1);max-width:420px}
          .icon{font-size:52px;margin-bottom:16px}
          h1{color:#dc2626;font-size:22px;margin-bottom:10px}
          p{color:#5b6677;font-size:15px;margin-bottom:24px}
          a{display:inline-block;padding:10px 24px;background:#0066B3;color:#fff;border-radius:8px;text-decoration:none;font-weight:700;font-size:14px}
        </style>
        </head>
        <body>
          <div class="card">
            <div class="icon">🚫</div>
            <h1>Acceso denegado</h1>
            <p>No tienes permiso para ver esta página.</p>
            <a href="index.php?accion=catalogo">← Volver al catálogo</a>
          </div>
        </body>
        </html>
        ');
    }
}