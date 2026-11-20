<?php require 'db.php';
$stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
$stmt->execute([(int)($_GET['id'] ?? 0)]);
$p = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $p ? htmlspecialchars($p['name']) : 'Product not found' ?> - Volt Corner Gadgets</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Volt Corner <span>Gadgets</span></h1>
    <nav><a href="index.php">Shop</a><a href="admin.php">Admin</a></nav>
  </header>
  <main>
    <?php if ($p): ?>
      <div class="detail">
        <img src="images/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
        <div>
          <h2><?= htmlspecialchars($p['name']) ?></h2>
          <p class="price">₱<?= number_format($p['price'], 2) ?></p>
          <p><?= htmlspecialchars($p['description']) ?></p>
          <a class="btn" href="index.php?product=<?= $p['product_id'] ?>#order">Order this item</a>
          <p><a href="index.php">Back to all products</a></p>
        </div>
      </div>
    <?php else: ?>
      <p>Product not found.</p><a href="index.php">Back to all products</a>
    <?php endif; ?>
  </main>
</body>
</html>
