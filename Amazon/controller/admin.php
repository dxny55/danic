<?php
session_start();
require_once 'model/product.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
  echo "<p>Acceso restringido</p>";
  exit;
}

$action = $_GET['action'] ?? 'dashboard';

switch ($action) {
  case 'new':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = $_POST;
      createProduct($data);
      header('Location: index.php?page=admin');
      exit;
    }
    include 'views/admin_product_new.php';
    break;

  case 'edit':
    $id = $_GET['id'] ?? null;
    if (!$id) exit("ID requerido");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      updateProduct($id, $_POST);
      header('Location: index.php?page=admin');
      exit;
    }
    $product = getProductById($id);
    include 'views/admin_product_edit.php';
    break;

  case 'delete':
    $id = $_GET['id'] ?? null;
    if ($id) deleteProduct($id);
    header('Location: index.php?page=admin');
    exit;

  default:
    $products = getAllProducts();
    include 'views/admin_dashboard.php';
}
?>
