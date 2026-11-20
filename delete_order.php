<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("DELETE FROM orders WHERE order_id = ?");
  $stmt->execute([(int)($_POST['order_id'] ?? 0)]);
}
header('Location: admin.php');
