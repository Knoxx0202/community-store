<?php require 'db.php';
$orders = $pdo->query("SELECT o.order_id, c.name AS customer, p.name AS product, o.quantity, o.order_date
  FROM orders o JOIN customers c ON o.customer_id = c.customer_id
  JOIN products p ON o.product_id = p.product_id ORDER BY o.order_date DESC")
  ->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html><html><head><meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css"><title>Admin Orders</title></head><body>
<header><h1>Order List</h1><a href="index.php">Store</a></header>
<main><div class="table-wrap"><table>
  <tr><th>ID</th><th>Customer</th><th>Product</th><th>Qty</th><th>Date</th><th>Action</th></tr>
  <?php foreach ($orders as $o): ?>
  <tr>
    <td><?= $o['order_id'] ?></td>
    <td><?= htmlspecialchars($o['customer']) ?></td>
    <td><?= htmlspecialchars($o['product']) ?></td>
    <td><?= $o['quantity'] ?></td>
    <td><?= $o['order_date'] ?></td>
    <td>
      <form action="delete_order.php" method="POST"
            onsubmit="return confirm('Delete order #<?= $o['order_id'] ?>?');">
        <input type="hidden" name="order_id" value="<?= $o['order_id'] ?>">
        <button type="submit" class="danger">Delete</button>
      </form>
    </td>
  </tr>
  <?php endforeach; ?>
</table></div></main></body></html>
