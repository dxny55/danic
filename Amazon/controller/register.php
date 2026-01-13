<?php
require_once 'model/user.php';
include 'views/register.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $question = trim($_POST['security_question'] ?? '');
  $answer = trim($_POST['security_answer'] ?? '');

  $errors = [];

  if (strlen($name) < 2) $errors[] = "Nombre demasiado corto";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email inválido";
  if (getUserByEmail($email)) $errors[] = "Email ya registrado";
  if (strlen($password) < 8) $errors[] = "Contraseña mínima de 8 caracteres";
  if (!$question || !$answer) $errors[] = "Pregunta y respuesta obligatorias";

  if (empty($errors)) {
    createUser($name, $email, $password, $question, $answer);
    header('Location: index.php?page=login');
    exit;
  }
}
?>
