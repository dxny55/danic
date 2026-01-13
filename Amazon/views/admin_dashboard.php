<div class="container">
  <h2>Panel de Administración</h2>
  <p><a href="index.php?page=admin&action=new">➕ Añadir nuevo producto</a></p>

  <table border="1" cellpadding="8" cellspacing="0" style="width:100%; margin-top:20px;">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $p): ?>
        <tr>
          <td><?= htmlspecialchars($p['name']) ?></td>
          <td><?= number_format($p['price'], 2) ?> €</td>
          <td><?= (int)$p['stock'] ?></td>
          <td>
            <a href="index.php?page=admin&action=edit&id=<?= $p['id'] ?>">✏️ Editar</a> |
            <a href="index.php?page=admin&action=delete&id=<?= $p['id'] ?>" onclick="return confirm('¿Eliminar este producto?')">🗑️ Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
