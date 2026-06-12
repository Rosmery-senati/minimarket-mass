<?php $accionActual = $_GET['accion'] ?? 'catalogo'; ?>
<aside class="sidebar">
    <a href="index.php?accion=catalogo"
       class="sidebar-link <?= $accionActual === 'catalogo' ? 'activo' : '' ?>">
        📦 Catálogo
    </a>
    <a href="index.php?accion=nuevo-producto"
       class="sidebar-link <?= $accionActual === 'nuevo-producto' ? 'activo' : '' ?>">
        ➕ Nuevo producto
    </a>
    <a href="#" class="sidebar-link">✏️ Editar</a>
    <a href="#" class="sidebar-link">📊 Reportes</a>
</aside>