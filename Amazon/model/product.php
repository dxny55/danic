<?php
require_once 'db.php';

function getAllProducts() {
  $pdo = dbConnect();
  $stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
  return $stmt->fetchAll();
}

function getProductBySlug($slug) {
  $pdo = dbConnect();
  $stmt = $pdo->prepare("SELECT * FROM products WHERE slug = ?");
  $stmt->execute([$slug]);
  return $stmt->fetch();
}

function getProductById($id) {
  $pdo = dbConnect();
  $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}

function createProduct($data) {
  $pdo = dbConnect();
  $stmt = $pdo->prepare("INSERT INTO products (name, slug, short_desc, description, price, image_path, stock)
    VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->execute([
    $data['name'],
    slugify($data['name']),
    $data['short_desc'],
    $data['description'],
    $data['price'],
    $data['image_path'],
    $data['stock']
  ]);
}

function updateProduct($id, $data) {
  $pdo = dbConnect();
  $stmt = $pdo->prepare("UPDATE products SET name = ?, slug = ?, short_desc = ?, description = ?, price = ?, image_path = ?, stock = ? WHERE id = ?");
  $stmt->execute([
    $data['name'],
    slugify($data['name']),
    $data['short_desc'],
    $data['description'],
    $data['price'],
    $data['image_path'],
    $data['stock'],
    $id
  ]);
}

function deleteProduct($id) {
  $pdo = dbConnect();
  $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
  $stmt->execute([$id]);
}

function slugify($text) {
  $text = strtolower(trim($text));
  $text = preg_replace('/[^a-z0-9]+/', '-', $text);
  return trim($text, '-');
}
?>
