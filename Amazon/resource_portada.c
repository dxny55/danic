<?php
require_once 'model/product.php';
header('Content-Type: application/json');

$products = getAllProducts();
echo json_encode($products);
