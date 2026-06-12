<?php include __DIR__ . '/../layout/header.php'; ?>

<?php $u = usuarioActual(); ?>
<nav class="navbar">
  <div class="navbar-brand">🛒 MASS · Sistema de Caja</div>
  <div class="navbar-user">
    👤 <?= htmlspecialchars($u['nombre'] ?? 'Usuario') ?>
    · <?= htmlspecialchars(ucfirst($u['rol'] ?? '')) ?>
    <a href="index.php?accion=logout" class="btn-salir">Salir</a>
  </div>
</nav>

<div class="contenedor">
  <aside class="sidebar">
    <a href="index.php?accion=catalogo" class="sidebar-link">🛍 Catálogo</a>
    <a href="index.php?accion=nuevo-producto" class="sidebar-link activo">+ Nuevo producto</a>
    <a href="index.php?accion=editar" class="sidebar-link">✏️ Editar</a>
    <a href="index.php?accion=reporte-pdf" class="sidebar-link">📄 Reporte PDF</a>
  </aside>

  <main style="display:flex; align-items:flex-start; justify-content:center; padding:40px 32px;">
    <div style="
      background:#fff;
      border-radius:12px;
      padding:30px 32px;
      box-shadow:0 8px 25px rgba(0,0,0,.09);
      width:100%;
      max-width:460px;
    ">
      <h1 style="color:#0066B3; font-size:21px; border-bottom:3px solid #FFB81C; padding-bottom:10px; margin-bottom:20px;">
        Registrar nuevo producto
      </h1>

      <?php if (!empty($error)): ?>
        <div style="background:#fef2f2;border:1px solid #f3c2c2;color:#dc2626;padding:12px 16px;border-radius:8px;font-size:14px;margin-bottom:12px;">
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="index.php?accion=guardar-producto" style="display:flex;flex-direction:column;gap:10px;">

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Código de barras</label>
        <input type="text" name="codigo" style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;">

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Nombre</label>
        <input type="text" name="nombre" style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;">

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Marca</label>
        <input type="text" name="marca" style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;">

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Categoría</label>
        <select name="categoria" style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;">
          <option value="1">Abarrotes</option>
          <option value="2">Bebidas</option>
          <option value="3">Lácteos</option>
          <option value="4">Limpieza</option>
          <option value="5">Aseo Personal</option>
          <option value="6">Panadería</option>
          <option value="7">Frutas y Verduras</option>
        </select>

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Precio (S/)</label>
        <input type="number" step="0.10" name="precio" style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;">

        <label style="font-weight:600;font-size:13px;color:#1a2230;">Stock</label>
        <input type="number" name="stock" style="padding:10px 12px;border:1px solid #dce6f0;border-radius:8px;font-size:14px;width:100%;">

        <button type="submit" style="margin-top:8px;padding:11px;background:#0066B3;color:#fff;border:none;border-radius:8px;font-weight:700;font-size:15px;cursor:pointer;">
          Guardar producto
        </button>

        <a href="index.php?accion=catalogo" style="text-align:center;color:#0066B3;font-size:13px;text-decoration:none;margin-top:4px;">
          ← Volver al catálogo
        </a>
      </form>
    </div>
  </main>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>