<?php
require_once 'db.php';

function getUserByEmail($email) {
  $pdo = dbConnect();
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  return $stmt->fetch();
}

function createUser($name, $email, $password, $question, $answer) {
  $pdo = dbConnect();
  $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash, role, security_question, security_answer_hash)
    VALUES (?, ?, ?, 'user', ?, ?)");
  $stmt->execute([
    $name,
    $email,
    password_hash($password, PASSWORD_DEFAULT),
    $question,
    password_hash($answer, PASSWORD_DEFAULT)
  ]);
}
?>
