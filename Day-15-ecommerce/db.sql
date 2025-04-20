CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(10, 2),
    image VARCHAR(255)
);

INSERT INTO products (name, description, price, image) VALUES
('Red T-Shirt', 'Comfortable cotton shirt', 19.99, 'shirt.jpg'),
('Blue Jeans', 'Classic fit blue jeans', 39.99, 'jeans.jpg'),
('Sneakers', 'Sporty sneakers for everyday wear', 49.99, 'shoes.jpg');
