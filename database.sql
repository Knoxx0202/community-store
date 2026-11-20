CREATE DATABASE IF NOT EXISTS community_store;
USE community_store;

CREATE TABLE products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description VARCHAR(255),
  price DECIMAL(8,2) NOT NULL,
  image VARCHAR(100) NOT NULL
);

CREATE TABLE customers (
  customer_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  contact VARCHAR(100) NOT NULL
);

CREATE TABLE orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  customer_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
  FOREIGN KEY (product_id) REFERENCES products(product_id)
);

INSERT INTO products (name, description, price, image) VALUES
('Wireless Earbuds', 'Bluetooth 5.3 earbuds with charging case and up to 20 hours of playtime.', 1299.00, 'earbuds.svg'),
('Power Bank 20000mAh', 'Two USB ports and one USB-C port. Charges a phone about five times.', 1499.00, 'powerbank.svg'),
('LED Desk Lamp', 'Adjustable arm, three brightness levels, low-heat LED bulb.', 799.00, 'lamp.svg'),
('Bluetooth Speaker', 'Portable speaker with deep bass and a splash-resistant body.', 1899.00, 'speaker.svg'),
('Smart Watch', 'Tracks steps and heart rate, shows phone notifications, week-long battery.', 2499.00, 'smartwatch.svg'),
('65W USB-C Charger', 'Fast charger for phones, tablets and laptops.', 999.00, 'charger.svg');
