<?php
$rol    = $_SESSION['usuario']['rol']    ?? '';
$nombre = $_SESSION['usuario']['nombre'] ?? '';
$tienda = $_SESSION['usuario']['tienda'] ?? '';
$modo   = $rol === 'admin' ? 'Modo administrador' : 'Caja';
?>
<div style="background:#2c3e50; color:white; padding:10px 20px; display:flex; justify-content:space-between; align-items:center;">
    <span>
        👤 <strong><?= htmlspecialchars($nombre) ?></strong> |
        🏪 <?= htmlspecialchars($tienda) ?> |
        🔑 <?= $modo ?>
    </span>
    <a href="index.php?accion=logout" style="color:#e74c3c; text-decoration:none; font-weight:bold;">Salir</a>
</div>