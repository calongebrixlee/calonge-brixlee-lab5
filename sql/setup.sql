-- ============================================================
-- Laboratory Exercise No. 5 - Authenticated Product CRUD
-- ============================================================

-- Part A: Create the database
CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

-- Part B: Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    username VARCHAR(100) NOT NULL
);

-- Part C: Create the product table used by ProductModel
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    quantity INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Part D: Insert sample user records (at least 5)
INSERT INTO users (firstname, lastname, email, username) VALUES
('Juan', 'Dela Cruz', 'juan@example.com', 'juandelacruz'),
('Maria', 'Santos', 'maria@example.com', 'mariasantos'),
('Pedro', 'Garcia', 'pedro@example.com', 'pedrogarcia'),
('Ana', 'Reyes', 'ana@example.com', 'anareyes'),
('Jose', 'Mendoza', 'jose@example.com', 'josemendoza');

-- Optional product sample records
INSERT INTO products (product_name, description, price, quantity) VALUES
('Laptop', 'Development laptop', 25000.00, 5),
('Keyboard', 'Mechanical keyboard', 2500.00, 10);

-- Verify
SELECT * FROM products;
