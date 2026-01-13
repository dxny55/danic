<?php
require_once 'model/product.php';
header('Content-Type: application/json');

$q = $_GET['q'] ?? '';
$pdo = dbConnect();
$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->execute(['%' . $q . '%']);
echo json_encode($stmt->fetchAll());
