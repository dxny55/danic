<h2>Login</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post">
  <label>Email: <input type="email" name="email" required></label><br>
  <label>Contraseña: <input type="password" name="password" required></label><br>
  <button type="submit">Entrar</button>
</form>
