<?php require __DIR__ . '/../layout/header.php'; ?>
<?php require __DIR__ . '/../layout/navbar.php'; ?>

<div class="mass-contenedor">
  <?php require __DIR__ . '/../layout/sidebar.php'; ?>

  <main style="display:flex;align-items:flex-start;justify-content:center;padding:40px 32px;">
    <div style="background:#fff;border-radius:12px;padding:30px 32px;box-shadow:0 8px 25px rgba(0,0,0,.09);width:100%;max-width:460px;">

      <h1 style="color:#0066B3;font-size:21px;border-bottom:3px solid #FFB81C;padding-bottom:10px;margin-bottom:20px;">
        Editar producto
      </h1>

      <?php if (!empty($error)): ?>
        <div style="background:#fef2f2;border:1px solid #f3c2c2;color:#dc2626;padding:12px 16px;border-radius:8px;font-size:14px;margin-bottom:12px;">
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form action="index.php?accion=actualizar-producto" method="POST" style="display:flex;flex-direction:column;gap:10px;">

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Código de barras</label>
        <input type="text" value="<?= htmlspecialchars($producto->getCodigo()) ?>" readonly
               style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;background:#f4f6f9;color:#888;">
        <input type="hidden" name="codigo" value="<?= htmlspecialchars($producto->getCodigo()) ?>">

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Nombre</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($producto->getNombre()) ?>" required
               style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;">

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Precio (S/)</label>
        <input type="number" name="precio" step="0.01" min="0" value="<?= htmlspecialchars($producto->getPrecio()) ?>" required
               style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;">

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Stock</label>
        <input type="number" name="stock" min="0" value="<?= htmlspecialchars($producto->getStock()) ?>" required
               style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;">

        <button type="submit" style="margin-top:8px;padding:11px;background:#0066B3;color:#fff;border:none;border-radius:8px;font-weight:700;font-size:15px;cursor:pointer;">
          Guardar cambios
        </button>

        <a href="index.php" style="text-align:center;color:#0066B3;font-size:13px;text-decoration:none;margin-top:4px;">
          Cancelar
        </a>
      </form>
    </div>
  </main>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>