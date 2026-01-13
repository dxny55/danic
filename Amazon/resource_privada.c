<?php
require_once 'model/product.php';
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
  echo json_encode(['error' => 'Acceso denegado']);
  exit;
}

$id = $_POST['id'] ?? null;
if ($id) {
  deleteProduct($id);
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['error' => 'ID no válido']);
}
