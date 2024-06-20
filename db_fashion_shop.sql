-- Category Table
CREATE TABLE category (
    id_category INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(255)
);

-- User Table
CREATE TABLE user (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    role VARCHAR(50)
);

-- Product Table
CREATE TABLE product (
    id_product INT PRIMARY KEY AUTO_INCREMENT,
    id_category INT,
    product_name VARCHAR(255),
    photo VARCHAR(255),
    description TEXT,
    stock INT,
    price DECIMAL(10, 2),
    FOREIGN KEY (id_category) REFERENCES category(id_category)
);

-- Order Table
CREATE TABLE orders (
    id_order INT PRIMARY KEY AUTO_INCREMENT,
    id_product INT,
    id_user INT,
    order_date DATE,
    order_status VARCHAR(50),
    product_quantity INT,
    total_price DECIMAL(10, 2),
    payment VARCHAR(50),
    FOREIGN KEY (id_product) REFERENCES product(id_product),
    FOREIGN KEY (id_user) REFERENCES user(id_user)
);

-- Menambahkan data pada tabel kategori
INSERT INTO category (id_category, category_name) VALUES (1, 'Pakaian Pria'), (2, 'Pakaian Wanita'), (3, 'Aksesoris'), (4, 'Sepatu');

-- Menambahkan data pada tabel user
INSERT INTO user (id_user, user_name, email, password, role) VALUES (1, 'JohnDoe', 'john.doe@example.com', 'password123', 'owner'), (2, 'JaneSmith', 'jane.smith@example.com', 'password456', 'admin');

-- Menambahkan data ada tabel produk
INSERT INTO product (id_product, id_category, product_name, photo, description, stock, price) VALUES
(1, 1, 'Kemeja Pria Katun', 'kemeja_pria.jpg', 'Kemeja pria dengan bahan katun berkualitas', 50, 99.99),
(2, 2, 'Dress Musim Panas', 'dress_musim_panas.jpg', 'Dress yang cocok untuk musim panas', 30, 79.99),
(3, 3, 'Topi Bucket', 'topi_bucket.jpg', 'Topi bucket dengan desain trendy', 100, 29.99),
(4, 4, 'Sepatu Sneakers', 'sepatu_sneakers.jpg', 'Sepatu sneakers dengan bahan berkualitas', 25, 149.99),
(5, 1, 'Celana Jeans Pria', 'celana_jeans_pria.jpg', 'Celana jeans pria dengan desain modern', 75, 89.99),
(6, 1, 'Jaket Kulit Pria', 'jaket_kulit_pria.jpg', 'Jaket kulit pria dengan kualitas terbaik', 40, 199.99),
(7, 2, 'Blouse Wanita', 'blouse_wanita.jpg', 'Blouse wanita dengan motif bunga', 60, 59.99),
(8, 2, 'Rok Midi', 'rok_midi.jpg', 'Rok midi dengan gaya kasual', 35, 49.99),
(9, 3, 'Kalung Mutiara', 'kalung_mutiara.jpg', 'Kalung mutiara dengan desain elegan', 20, 79.99),
(10, 4, 'Sepatu Boots', 'sepatu_boots.jpg', 'Sepatu boots dengan bahan kulit berkualitas', 15, 129.99);

-- Menambahkan data ke tabel orders
INSERT INTO orders (id_order, id_product, id_user, order_date, order_status, product_quantity, total_price, payment) VALUES
(1, 1, 1, '2023-06-01', 'Selesai', 2, 199.98, 'Kartu Kredit'),
(2, 2, 2, '2023-06-03', 'Diproses', 1, 79.99, 'Transfer Bank'),
(3, 3, 1, '2023-06-05', 'Selesai', 3, 89.97, 'Kartu Debit'),
(4, 5, 2, '2023-06-07', 'Diproses', 1, 89.99, 'Kartu Kredit'),
(5, 6, 1, '2023-06-08', 'Selesai', 1, 199.99, 'Transfer Bank'),
(6, 7, 2, '2023-06-10', 'Diproses', 2, 119.98, 'Kartu Debit'),
(7, 8, 1, '2023-06-12', 'Selesai', 1, 49.99, 'Kartu Kredit'),
(8, 9, 2, '2023-06-14', 'Diproses', 2, 159.98, 'Transfer Bank'),
(9, 10, 1, '2023-06-16', 'Selesai', 1, 129.99, 'Kartu Debit');


