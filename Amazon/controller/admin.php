<?php
session_start(); 
require_once 'model/product.php';

// Verifica que el usuario esté autenticado y tenga rol de administrador
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
  echo "<p>Acceso restringido</p>";
  exit;
}

// Determina la acción solicitada, por defecto muestra el dashboard
$action = $_GET['action'] ?? 'dashboard';

switch ($action) {
  case 'new':
    // Si el formulario fue enviado, crea un nuevo producto y redirige
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = $_POST;
      createProduct($data);
      header('Location: index.php?page=admin');
      exit;
    }
    include 'views/admin_product_new.php'; // Muestra el formulario de creación
    break;

  case 'edit':
    $id = $_GET['id'] ?? null;
    if (!$id) exit("ID requerido"); // Evita continuar sin un ID válido

    // Si se envía el formulario, actualiza el producto
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      updateProduct($id, $_POST);
      header('Location: index.php?page=admin');
      exit;
    }

    $product = getProductById($id); // Obtiene los datos del producto a editar
    include 'views/admin_product_edit.php';
    break;

  case 'delete':
    // Elimina el producto si se recibe un ID válido
    $id = $_GET['id'] ?? null;
    if ($id) deleteProduct($id);
    header('Location: index.php?page=admin');
    exit;

  default:
    // Carga todos los productos y muestra el panel principal del admin
    $products = getAllProducts();
    include 'views/admin_dashboard.php';
}
?>

