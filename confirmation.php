<?php require 'db.php';
$stmt = $pdo->prepare("SELECT o.order_id, c.name, p.name AS product, o.quantity, o.order_date
  FROM orders o JOIN customers c ON o.customer_id = c.customer_id
  JOIN products p ON o.product_id = p.product_id WHERE o.order_id = ?");
$stmt->execute([(int)($_GET['id'] ?? 0)]);
$o = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html><html><head><meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css"><title>Order Confirmed</title></head><body><main>
<?php if ($o): ?>
  <h2>Thank you, <?= htmlspecialchars($o['name']) ?>!</h2>
  <p>Order #<?= $o['order_id'] ?>: <?= $o['quantity'] ?> × <?= htmlspecialchars($o['product']) ?></p>
  <p>Placed on <?= $o['order_date'] ?></p>
<?php else: ?><p>Order not found.</p><?php endif; ?>
<a href="index.php">Back to store</a></main></body></html>
