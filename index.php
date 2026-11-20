<?php require 'db.php';
$products = $pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
$error = $_GET['error'] ?? '';
$selected = (int)($_GET['product'] ?? 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Volt Corner Gadgets</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Volt Corner <span>Gadgets</span></h1>
    <nav><a href="index.php">Shop</a><a href="admin.php">Admin</a></nav>
  </header>

  <section class="hero">
    <h2>Chargers, speakers and everyday electronics</h2>
    <p>Tap a product to see details, then place your order below.</p>
  </section>

  <main>
    <h2>Available products</h2>
    <div class="grid">
      <?php foreach ($products as $p): ?>
        <a class="card" href="product.php?id=<?= $p['product_id'] ?>">
          <img src="images/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
          <div class="card-body">
            <h3><?= htmlspecialchars($p['name']) ?></h3>
            <strong>₱<?= number_format($p['price'], 2) ?></strong>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <h2 id="order">Place an order</h2>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <form action="place_order.php" method="POST">
      <label>Name <input type="text" name="name" required></label>
      <label>Contact (phone or email) <input type="text" name="contact" required></label>
      <label>Product
        <select name="product_id" required>
          <?php foreach ($products as $p): ?>
            <option value="<?= $p['product_id'] ?>" <?= $p['product_id'] == $selected ? 'selected' : '' ?>>
              <?= htmlspecialchars($p['name']) ?> - ₱<?= number_format($p['price'], 2) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>
      <label>Quantity <input type="number" name="quantity" required></label>
      <button type="submit">Submit order</button>
    </form>
  </main>
</body>
</html>
