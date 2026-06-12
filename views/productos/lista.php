<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require __DIR__ . '/../layout/navbar.php'; ?>
<div class="mass-contenedor">
  <?php require __DIR__ . '/../layout/sidebar.php'; ?>
  <main class="mass-main">
    <h1>Catálogo del Minimarket Mass</h1>

    <!-- BUSCADOR -->
    <form method="GET" action="index.php" style="margin-bottom:20px;display:flex;gap:10px;">
      <input type="hidden" name="accion" value="catalogo">
      <input type="text" name="buscar" placeholder="Buscar producto..."
             value="<?= htmlspecialchars($_GET['buscar'] ?? '') ?>"
             style="padding:9px 14px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:300px;">
      <button type="submit" style="background:#0066B3;color:#fff;padding:9px 18px;border:none;border-radius:8px;font-weight:700;cursor:pointer;">Buscar</button>
      <?php if (!empty($_GET['buscar'])): ?>
        <a href="index.php?accion=catalogo" style="padding:9px 14px;color:#0066B3;font-weight:600;text-decoration:none;font-size:14px;">✕ Limpiar</a>
      <?php endif; ?>
    </form>

    <p style="margin-bottom:16px;color:#5b6677;">Total de productos: <strong><?= count($productos) ?></strong></p>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Precio con IGV</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p->getCodigo()) ?></td>
                <td><?= htmlspecialchars($p->getNombre()) ?></td>
                <td class="precio">S/ <?= number_format($p->getPrecio(), 2) ?></td>
                <td class="precio">S/ <?= number_format($p->precioConIGV(), 2) ?></td>
                <td <?= $p->getStock() === 0 ? 'class="sin-stock"' : '' ?>>
                    <?= $p->getStock() ?> unidades
                </td>
                <td style="display:flex;gap:8px;">
                  <a href="index.php?accion=editar-producto&codigo=<?= urlencode($p->getCodigo()) ?>">✏️ Editar</a>
                  <a href="index.php?accion=eliminar-producto&codigo=<?= urlencode($p->getCodigo()) ?>"
                     onclick="return confirm('¿Eliminar <?= htmlspecialchars($p->getNombre()) ?>?')"
                     style="color:#dc2626;">🗑️ Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </main>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>