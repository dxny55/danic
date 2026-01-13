<?php
require_once 'model/user.php';
include 'views/login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $user = getUserByEmail($email);

  if ($user && password_verify($password, $user['password_hash'])) {
    session_start();
    $_SESSION['user'] = [
      'id' => $user['id'],
      'name' => $user['name'],
      'role' => $user['role']
    ];
    header('Location: index.php');
    exit;
  } else {
    $error = "Credenciales incorrectas";
  }
}
?>
