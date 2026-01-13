<?php
function dbConnect() {
  $host = 'localhost';
  $dbname = 'tienda';
  $user = 'root';
  $pass = '';
  $charset = 'utf8mb4';

  $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
  try {
    $pdo = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    return $pdo;
  } catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
  }
}
?>
