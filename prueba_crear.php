<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config/conexion.php';
require_once __DIR__ . '/models/Producto.php';
require_once __DIR__ . '/models/ProductoRepository.php';

$pdo = getConexion();
$stmt = $pdo->prepare(
    "INSERT INTO productos (codigo_barras, nombre, marca, categoria_id, precio, stock)
     VALUES (:codigo, :nombre, :marca, :categoria, :precio, :stock)"
);
try {
    $stmt->execute([
        ':codigo'    => '7750999000047',
        ':nombre'    => 'Chocolate Sublime',
        ':marca'     => 'Nestle',
        ':categoria' => 1,
        ':precio'    => 1.80,
        ':stock'     => 120,
    ]);
    echo "✅ Producto agregado";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}