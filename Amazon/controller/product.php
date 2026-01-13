<?php

require_once __DIR__ . '/../model/product.php';

if (isset($_GET['slug'])) {
  $slug = $_GET['slug'];
  $product = getProductBySlug($slug);
  if ($product) {
    include 'views/product_detail.php';
  } else {
    echo "<p>Producto no encontrado</p>";
  }
} else {
  $products = getAllProducts();
  include 'views/home.php';
}
?>
