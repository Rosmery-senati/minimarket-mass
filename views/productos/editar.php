<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require __DIR__ . '/../layout/navbar.php'; ?>
<div class="mass-contenedor">
    <?php require __DIR__ . '/../layout/sidebar.php'; ?>
    <main class="mass-main">
        <h1>Editar producto</h1>
        <?php if (!empty($error)): ?>
            <div class="alerta-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form action="index.php?accion=actualizar-producto" method="POST" class="mass-form">
            <label>Código de barras</label>
            <input type="text" value="<?= htmlspecialchars($producto->getCodigo()) ?>" readonly>
            <input type="hidden" name="codigo" value="<?= htmlspecialchars($producto->getCodigo()) ?>">
            <label>Nombre</label>
            <input type="text" name="nombre"
                   value="<?= htmlspecialchars($producto->getNombre()) ?>" required>
            <label>Precio (S/)</label>
            <input type="number" name="precio" step="0.01" min="0"
                   value="<?= htmlspecialchars($producto->getPrecio()) ?>" required>
            <label>Stock</label>
            <input type="number" name="stock" min="0"
                   value="<?= htmlspecialchars($producto->getStock()) ?>" required>
            <button type="submit">Guardar cambios</button>
            <a href="index.php">Cancelar</a>
        </form>
    </main>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>