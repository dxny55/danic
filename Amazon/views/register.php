<h2>Registro</h2>
<?php if (!empty($errors)) foreach ($errors as $e) echo "<p style='color:red;'>$e</p>"; ?>
<form method="post" id="registerForm">
  <label>Nombre: <input name="name" required></label><br>
  <label>Email: <input type="email" name="email" id="email" required></label>
  <span id="emailFeedback"></span><br>
  <label>Contraseña: <input type="password" name="password" required></label><br>
  <label>Pregunta de seguridad: <input name="security_question" required></label><br>
  <label>Respuesta: <input name="security_answer" required></label><br>
  <button type="submit">Registrarse</button>
</form>
