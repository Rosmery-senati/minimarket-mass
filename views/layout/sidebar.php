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
    <a href="index.php?accion=editar-producto"
       class="sidebar-link <?= $accionActual === 'editar-producto' ? 'activo' : '' ?>">
        ✏️ Editar
    </a>
    <a href="index.php?accion=reportes"
       class="sidebar-link <?= $accionActual === 'reportes' ? 'activo' : '' ?>">
        📊 Reportes
    </a>
</aside>