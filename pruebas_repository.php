<?php
declare(strict_types=1);
require_once __DIR__ . '/models/ProductoRepository.php';

$repo = new ProductoRepository();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pruebas Repository — Minimarket Mass</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; color: #1a2230; }

  header {
    background: linear-gradient(135deg, #0066B3, #004F8C);
    color: #fff;
    padding: 24px 40px;
    display: flex;
    align-items: center;
    gap: 16px;
  }
  header h1 { font-size: 22px; font-weight: 700; }
  header p  { font-size: 13px; opacity: .8; margin-top: 4px; }

  main { max-width: 860px; margin: 32px auto; padding: 0 20px 60px; }

  .card {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #dce6f0;
    margin-bottom: 24px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,102,179,.07);
  }
  .card-header {
    background: #0066B3;
    color: #fff;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .card-header .num {
    background: #FFB81C;
    color: #003366;
    font-weight: 800;
    font-size: 13px;
    border-radius: 6px;
    padding: 2px 10px;
  }
  .card-header h2 { font-size: 15px; font-weight: 600; }
  .card-body { padding: 16px 20px; }

  table { width: 100%; border-collapse: collapse; font-size: 14px; }
  th {
    background: #eef4fb;
    color: #0066B3;
    font-weight: 700;
    padding: 10px 12px;
    text-align: left;
    border-bottom: 2px solid #c8dff2;
  }
  td { padding: 10px 12px; border-bottom: 1px solid #e8f0f8; }
  tr:last-child td { border-bottom: none; }
  tr:hover td { background: #f5f9ff; }

  .badge-stock {
    display: inline-block;
    background: #e8f4ff;
    color: #0066B3;
    border-radius: 6px;
    padding: 2px 10px;
    font-weight: 600;
    font-size: 13px;
  }
  .badge-stock.low { background: #fff0e8; color: #c0440a; }

  .total-box {
    background: linear-gradient(135deg, #0066B3, #004F8C);
    color: #fff;
    border-radius: 10px;
    padding: 20px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .total-box .label { font-size: 15px; opacity: .85; }
  .total-box .value { font-size: 36px; font-weight: 800; }

  .bonus .card-header { background: #004F8C; }
  .price { font-weight: 700; color: #0066B3; }

  footer {
    text-align: center;
    font-size: 12px;
    color: #8a9bb0;
    margin-top: 8px;
  }
</style>
</head>
<body>

<header>
  <div>
    <h1>🛒 Minimarket Mass — Pruebas Repository</h1>
    <p>HT-03 · Conexión PDO · Backend Developer Web · SENATI Arequipa 2026</p>
  </div>
</header>

<main>

  <!-- 1. buscarPorNombre -->
  <div class="card">
    <div class="card-header">
      <span class="num">1</span>
      <h2>buscarPorNombre('Inca')</h2>
    </div>
    <div class="card-body">
      <table>
        <thead><tr><th>Nombre</th><th>Precio</th></tr></thead>
        <tbody>
          <?php foreach ($repo->buscarPorNombre('Inca') as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p->getNombre()) ?></td>
            <td class="price">S/ <?= number_format($p->getPrecio(), 2) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- 2. obtenerPorCategoria -->
  <div class="card">
    <div class="card-header">
      <span class="num">2</span>
      <h2>obtenerPorCategoria(2) — Bebidas</h2>
    </div>
    <div class="card-body">
      <table>
        <thead><tr><th>Nombre</th><th>Stock</th></tr></thead>
        <tbody>
          <?php foreach ($repo->obtenerPorCategoria(2) as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p->getNombre()) ?></td>
            <td><span class="badge-stock"><?= $p->getStock() ?> uds</span></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- 3. obtenerBajoStock -->
  <div class="card">
    <div class="card-header">
      <span class="num">3</span>
      <h2>obtenerBajoStock(100)</h2>
    </div>
    <div class="card-body">
      <table>
        <thead><tr><th>Nombre</th><th>Stock</th></tr></thead>
        <tbody>
          <?php foreach ($repo->obtenerBajoStock(100) as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p->getNombre()) ?></td>
            <td><span class="badge-stock low"><?= $p->getStock() ?> uds</span></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- 4. contarTotalProductos -->
  <div class="card">
    <div class="card-header">
      <span class="num">4</span>
      <h2>contarTotalProductos()</h2>
    </div>
    <div class="card-body">
      <div class="total-box">
        <span class="label">Total de productos en la BD</span>
        <span class="value"><?= $repo->contarTotalProductos() ?></span>
      </div>
    </div>
  </div>

  <!-- BONUS -->
  <div class="card bonus">
    <div class="card-header">
      <span class="num">★</span>
      <h2>BONUS — obtenerMasCaros(5)</h2>
    </div>
    <div class="card-body">
      <table>
        <thead><tr><th>Nombre</th><th>Precio</th></tr></thead>
        <tbody>
          <?php foreach ($repo->obtenerMasCaros(5) as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p->getNombre()) ?></td>
            <td class="price">S/ <?= number_format($p->getPrecio(), 2) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</main>

<footer>Minimarket Mass · Sistema desarrollado en clase SENATI 2026</footer>

</body>
</html>