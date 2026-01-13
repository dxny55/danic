<div class="container">
  <h2><?= htmlspecialchars($product['name']) ?></h2>
  <img src="<?= htmlspecialchars($product['image_path'] ?? 'public/assets/img/placeholder.png') ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="max-width:300px; margin-bottom:20px;">
  <p><strong>Descripción:</strong></p>
  <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
  <p><strong>Precio:</strong> <?= number_format($product['price'], 2) ?> €</p>
  <p><strong>Stock disponible:</strong> <?= (int)$product['stock'] ?></p>
  <button disabled>🛒 Agregar al carrito (opcional)</button>
</div>
