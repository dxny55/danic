<?php
session_start();
$page = $_GET['page'] ?? 'home';

switch ($page) {
  case 'login': include '../controller/login.php'; break;
  case 'register': include '../controller/register.php'; break;
  case 'product': include '../controller/product.php'; break;
  case 'admin': include '../controller/admin.php'; break;
  case 'reset': include '../controller/reset.php'; break;
  default: include '../controller/product.php'; break;
}
?>
