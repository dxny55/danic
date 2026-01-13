<?php
require_once 'model/user.php';

header('Content-Type: application/json');
$email = $_GET['email'] ?? '';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo json_encode(['valid' => false]);
  exit;
}
$user = getUserByEmail($email);
echo json_encode(['valid' => true, 'in_use' => $user !== false]);
?>
