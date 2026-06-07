<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/../helpers/sesion.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/ProductoController.php';

$accion = $_GET['accion'] ?? 'catalogo';
$auth   = new AuthController();

switch ($accion) {

    case 'login':
        $auth->mostrarLogin();
        break;

    case 'procesar-login':
        $auth->procesarLogin();
        break;

    case 'logout':
        $auth->logout();
        break;

    case 'panel-admin':
        requiereRol('admin');
        $u = usuarioActual();
        require __DIR__ . '/../views/auth/barra_usuario.php';
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
        <meta charset="UTF-8">
        <title>Panel Admin · Mass</title>
        <style>
          *{box-sizing:border-box;font-family:'Segoe UI',Arial,sans-serif;margin:0;padding:0}
          body{background:#f4f6f9;min-height:100vh}
          .wrap{max-width:900px;margin:40px auto;padding:0 20px}
          .hero{background:linear-gradient(135deg,#0066B3,#004F8C);color:#fff;border-radius:14px;padding:36px 32px;margin-bottom:24px}
          .hero h1{font-size:28px;font-weight:800;margin-bottom:8px}
          .hero p{opacity:.85;font-size:15px}
          .cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px}
          .card{background:#fff;border-radius:12px;padding:24px;box-shadow:0 4px 15px rgba(0,0,0,.07);border-left:4px solid #0066B3}
          .card .num{font-size:32px;font-weight:800;color:#0066B3}
          .card .lbl{font-size:13px;color:#5b6677;margin-top:4px}
          .back{display:inline-block;margin-top:24px;color:#0066B3;text-decoration:none;font-weight:600;font-size:14px}
        </style>
        </head>
        <body>
        <div class="wrap">
          <div class="hero">
            <h1>Panel de administración</h1>
            <p>Bienvenido, <?= htmlspecialchars($u['nombre']) ?> · <?= htmlspecialchars($u['tienda']) ?></p>
          </div>
          <div class="cards">
            <div class="card"><div class="num">25</div><div class="lbl">Productos registrados</div></div>
            <div class="card"><div class="num">3</div><div class="lbl">Usuarios activos</div></div>
            <div class="card"><div class="num">7</div><div class="lbl">Categorías</div></div>
          </div>
          <a class="back" href="index.php?accion=catalogo">← Volver al catálogo</a>
        </div>
        </body>
        </html>
        <?php
        break;

    case 'nuevo-producto':
        requiereLogin();
        (new ProductoController())->nuevo();
        break;

    case 'guardar-producto':
        requiereLogin();
        (new ProductoController())->guardar();
        break;

    case 'catalogo':
    default:
        requiereLogin();
        (new ProductoController())->listar();
        break;
}