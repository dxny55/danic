<?php
// Este es un ejemplo si decides añadir categorías
require_once 'model/db.php';
header('Content-Type: application/json');

$pdo = dbConnect();
$stmt = $pdo->query("SELECT DISTINCT category FROM products");
echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
