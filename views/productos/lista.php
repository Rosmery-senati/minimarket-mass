<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require __DIR__ . '/../layout/navbar.php'; ?>

<!-- Modal eliminar -->
<div id="modal-eliminar" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:999;align-items:center;justify-content:center;">
  <div style="background:#fff;border-radius:14px;padding:32px 28px;max-width:380px;width:90%;box-shadow:0 16px 40px rgba(0,0,0,.2);text-align:center;">
    <div style="font-size:40px;margin-bottom:12px;">🗑️</div>
    <h2 style="color:#1a2230;font-size:18px;margin-bottom:8px;">¿Eliminar producto?</h2>
    <p id="modal-nombre" style="color:#5b6677;font-size:14px;margin-bottom:24px;"></p>
    <div style="display:flex;gap:12px;justify-content:center;">
      <button onclick="cerrarModal()" style="padding:10px 24px;border:1px solid #dce6f0;border-radius:8px;background:#fff;color:#1a2230;font-weight:600;font-size:14px;cursor:pointer;">Cancelar</button>
      <a id="modal-btn-eliminar" href="#" style="padding:10px 24px;border-radius:8px;background:#dc2626;color:#fff;font-weight:700;font-size:14px;text-decoration:none;">Eliminar</a>
    </div>
  </div>
</div>

<div class="mass-contenedor">
  <?php require __DIR__ . '/../layout/sidebar.php'; ?>
  <main class="mass-main">
    <h1>Catálogo del Minimarket Mass</h1>

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
            <a href="index.php?accion=editar-producto&codigo=<?= urlencode($p->getCodigo()) ?>"
               style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#EBF4FF;color:#0066B3;border-radius:7px;font-size:13px;font-weight:600;text-decoration:none;">
              ✏️ Editar
            </a>
            <button onclick="abrirModal('<?= urlencode($p->getCodigo()) ?>', '<?= htmlspecialchars($p->getNombre(), ENT_QUOTES) ?>')"
               style="display:inline-flex;align-items:center;gap:4px;padding:6px 12px;background:#FEF2F2;color:#dc2626;border:none;border-radius:7px;font-size:13px;font-weight:600;cursor:pointer;">
              🗑️ Eliminar
            </button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>

<script>
function abrirModal(codigo, nombre) {
  document.getElementById('modal-nombre').textContent = nombre;
  document.getElementById('modal-btn-eliminar').href = 'index.php?accion=eliminar-producto&codigo=' + codigo;
  const modal = document.getElementById('modal-eliminar');
  modal.style.display = 'flex';
}
function cerrarModal() {
  document.getElementById('modal-eliminar').style.display = 'none';
}
</script>