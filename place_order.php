<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }

$name       = trim($_POST['name'] ?? '');
$contact    = trim($_POST['contact'] ?? '');
$product_id = filter_var($_POST['product_id'] ?? '', FILTER_VALIDATE_INT);
$quantity   = filter_var($_POST['quantity'] ?? '', FILTER_VALIDATE_INT);

function fail($msg) { header('Location: index.php?error=' . urlencode($msg)); exit; }

if ($name === '' || $contact === '')      fail('Name and contact are required.');
if (!$product_id)                         fail('Please choose a product.');
if ($quantity === false || $quantity < 1 || $quantity > 100)
                                          fail('Quantity must be a whole number from 1 to 100.');

$check = $pdo->prepare("SELECT 1 FROM products WHERE product_id = ?");
$check->execute([$product_id]);
if (!$check->fetch())                     fail('Invalid product.');

$pdo->beginTransaction();
$stmt = $pdo->prepare("INSERT INTO customers (name, contact) VALUES (?, ?)");
$stmt->execute([$name, $contact]);
$customer_id = $pdo->lastInsertId();

$stmt = $pdo->prepare("INSERT INTO orders (customer_id, product_id, quantity) VALUES (?, ?, ?)");
$stmt->execute([$customer_id, $product_id, $quantity]);
$order_id = $pdo->lastInsertId();
$pdo->commit();

header("Location: confirmation.php?id=" . $order_id);
