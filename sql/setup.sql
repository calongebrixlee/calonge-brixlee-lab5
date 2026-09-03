-- ============================================================
-- Laboratory Exercise No. 4 - Working with Database and MVC
-- Part A, B, C: Database, Table, and Sample Records
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

-- Part C: Insert sample records (at least 5)
INSERT INTO users (firstname, lastname, email, username) VALUES
('Juan', 'Dela Cruz', 'juan@example.com', 'juandelacruz'),
('Maria', 'Santos', 'maria@example.com', 'mariasantos'),
('Pedro', 'Garcia', 'pedro@example.com', 'pedrogarcia'),
('Ana', 'Reyes', 'ana@example.com', 'anareyes'),
('Jose', 'Mendoza', 'jose@example.com', 'josemendoza');

-- Verify
SELECT * FROM users;
