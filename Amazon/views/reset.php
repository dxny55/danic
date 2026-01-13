<div class="container">
  <h2>Restablecer contraseña</h2>

  <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
  <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>

  <form method="post">
    <label>Email:
      <input type="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
    </label>

    <?php if (!empty($question)): ?>
      <p><strong>Pregunta de seguridad:</strong> <?= htmlspecialchars($question) ?></p>
      <label>Respuesta:
        <input type="text" name="security_answer" required>
      </label>
      <label>Nueva contraseña:
        <input type="password" name="new_password" required minlength="8">
      </label>
    <?php else: ?>
      <p>Introduce tu email y pulsa enviar para mostrar la pregunta de seguridad.</p>
    <?php endif; ?>

    <button type="submit">Restablecer</button>
  </form>
</div>
