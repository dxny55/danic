<div class="container">
  <h2>Productos disponibles</h2>
  <div class="grid">
    <?php foreach ($products as $p): ?>
      <div class="card">
        <img src="<?= htmlspecialchars($p['image_path'] ?? 'public/assets/img/placeholder.png') ?>" alt="<?= htmlspecialchars($p['name']) ?>">
        <h3><?= htmlspecialchars($p['name']) ?></h3>
        <p><?= htmlspecialchars($p['short_desc']) ?></p>
        <strong><?= number_format($p['price'], 2) ?> €</strong>
        <a href="index.php?page=product&slug=<?= urlencode($p['slug']) ?>">Ver más</a>
      </div>
    <?php endforeach; ?>
  </div>
</div>
