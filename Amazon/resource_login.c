<?php
require_once 'model/user.php';
session_start();
header('Content-Type: application/json');

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$user = getUserByEmail($email);
if ($user && password_verify($password, $user['password_hash'])) {
  $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'role' => $user['role']];
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false, 'error' => 'Credenciales inválidas']);
}
