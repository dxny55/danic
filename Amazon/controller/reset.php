<?php
require_once 'model/user.php';
include 'views/reset.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $answer = trim($_POST['security_answer'] ?? '');
  $newPass = $_POST['new_password'] ?? '';

  $user = getUserByEmail($email);
  if (!$user || !$user['security_question']) {
    $error = "Usuario no encontrado o sin pregunta registrada";
  } elseif (!password_verify($answer, $user['security_answer_hash'])) {
    $error = "Respuesta incorrecta";
    $question = $user['security_question'];
  } elseif (strlen($newPass) < 8) {
    $error = "Contraseña demasiado corta";
    $question = $user['security_question'];
  } else {
    updateUserPassword($user['id'], $newPass);
    $success = "Contraseña actualizada. Ya puedes iniciar sesión.";
  }
}
?>
