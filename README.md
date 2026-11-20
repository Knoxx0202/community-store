# Volt Corner Gadgets

A locally hosted gadgets and electronics shop that displays products and accepts customer orders.
Built with HTML, CSS, JavaScript, PHP (PDO), MySQL and XAMPP.

## Setup
1. Install XAMPP; start Apache and MySQL.
2. Copy this folder to `C:\xampp\htdocs\community-store`.
3. Open http://localhost/phpmyadmin, go to the Import tab, and import `database.sql`
   (this creates the `community_store` database, tables and 6 sample products).
4. Visit http://localhost/community-store/
5. Admin page: http://localhost/community-store/admin.php

## Features
- Product grid with clickable pictures (opens a product detail page)
- "Order this item" button pre-selects the product in the order form
- Server-side validation and parameterized queries (PDO)
- Order confirmation page
- Admin order list (customer, product, quantity, date) with delete and confirmation prompt

## Files
- `index.php` - homepage, product grid, order form
- `product.php` - product detail page
- `place_order.php` - server-side validation and saving
- `confirmation.php` - order confirmation
- `admin.php` / `delete_order.php` - order list and delete action
- `db.php` - PDO connection
- `style.css` - responsive styles
- `images/` - product pictures (SVG; replace with your own photos if you like)
- `database.sql` - database export
- `docs/` - wireframe, ERD, architecture diagram, test screenshots

## Note
All customer data is fictional.
