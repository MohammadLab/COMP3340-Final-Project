CREATE DATABASE moes_pc_parts;

USE moes_pc_parts;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(255),
    role VARCHAR(20) DEFAULT 'customer',
    status VARCHAR(20) NOT NULL DEFAULT 'active'
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100),
    category VARCHAR(50),
    brand VARCHAR(50),
    option_one VARCHAR(100),
    option_two VARCHAR(100),
    price DECIMAL(10, 2),
    image VARCHAR(255),
    description TEXT
);

CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_date DATETIME,
    total DECIMAL(10, 2)
);

CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(10, 2)
);

INSERT INTO products (product_name, category, brand, option_one, option_two, price, image, description)
VALUES
('AMD Ryzen 5 7600', 'CPU', 'AMD', 'AM5 socket', '6 cores', 249.99, 'ryzen7600.jpg', 'A reliable processor for gaming and daily computer use.'),
('AMD Ryzen 7 7800X3D', 'CPU', 'AMD', 'AM5 socket', '8 cores', 479.99, 'ryzen7800x3d.jpg', 'A strong gaming processor with extra cache for high performance.'),
('Intel Core i5-14600K', 'CPU', 'Intel', 'LGA1700 socket', '14 cores', 399.99, 'i514600k.jpg', 'A fast processor for gaming, school work, and multitasking.'),
('Intel Core i7-14700K', 'CPU', 'Intel', 'LGA1700 socket', '20 cores', 549.99, 'i714700k.jpg', 'A powerful processor for gaming and heavier computer tasks.'),
('NVIDIA GeForce RTX 4060', 'GPU', 'MSI', '8GB memory', 'Black', 399.99, 'rtx4060.jpg', 'A good graphics card for 1080p gaming.'),
('NVIDIA GeForce RTX 4070 Super', 'GPU', 'ASUS', '12GB memory', 'Black', 849.99, 'rtx4070super.jpg', 'A strong graphics card for smooth 1440p gaming.'),
('AMD Radeon RX 7800 XT', 'GPU', 'Sapphire', '16GB memory', 'Black', 699.99, 'rx7800xt.jpg', 'A powerful graphics card with plenty of video memory.'),
('NVIDIA GeForce RTX 4080 Super', 'GPU', 'Gigabyte', '16GB memory', 'Black', 1399.99, 'rtx4080super.jpg', 'A high-end graphics card for demanding games and creative work.'),
('Corsair Vengeance 32GB DDR5', 'RAM', 'Corsair', '32GB capacity', '6000MHz', 169.99, 'corsairvengeance32gb.jpg', 'A fast memory kit for modern desktop computers.'),
('Kingston Fury Beast 16GB DDR4', 'RAM', 'Kingston', '16GB capacity', '3200MHz', 59.99, 'kingstonfury16gb.jpg', 'A simple memory upgrade for older DDR4 systems.'),
('G.Skill Ripjaws S5 32GB DDR5', 'RAM', 'G.Skill', '32GB capacity', '6000MHz', 159.99, 'gskillripjaws32gb.jpg', 'A dependable DDR5 memory kit for gaming computers.'),
('Samsung 990 Pro 1TB NVMe SSD', 'SSD', 'Samsung', '1TB capacity', 'M.2 NVMe', 149.99, 'samsung990pro1tb.jpg', 'A very fast SSD for Windows, games, and programs.'),
('WD Black SN850X 2TB NVMe SSD', 'SSD', 'Western Digital', '2TB capacity', 'M.2 NVMe', 229.99, 'wdsn850x2tb.jpg', 'A large and fast SSD for storing games and files.'),
('Crucial P3 Plus 1TB NVMe SSD', 'SSD', 'Crucial', '1TB capacity', 'M.2 NVMe', 89.99, 'crucialp3plus1tb.jpg', 'An affordable SSD for a simple computer build.'),
('MSI B650 Gaming Plus WiFi', 'Motherboard', 'MSI', 'AM5 socket', 'ATX', 239.99, 'msib650gamingplus.jpg', 'A modern motherboard for AMD Ryzen desktop builds.'),
('ASUS Prime B760-PLUS', 'Motherboard', 'ASUS', 'LGA1700 socket', 'ATX', 199.99, 'asusb760plus.jpg', 'A simple Intel motherboard for current desktop computers.'),
('Corsair RM850e 850W', 'Power Supply', 'Corsair', '850W wattage', 'Black', 169.99, 'corsairrm850e.jpg', 'A reliable power supply for mid-range and high-end builds.'),
('EVGA 600 BR 600W', 'Power Supply', 'EVGA', '600W wattage', 'Black', 84.99, 'evga600br.jpg', 'A basic power supply for budget desktop computers.'),
('NZXT H5 Flow', 'PC Case', 'NZXT', 'Mid tower', 'White', 129.99, 'nzxth5flow.jpg', 'A clean computer case with good airflow.'),
('Cooler Master Hyper 212 Black', 'CPU Cooler', 'Cooler Master', 'Air cooler', 'Black', 49.99, 'hyper212black.jpg', 'A simple CPU cooler for keeping temperatures under control.');
