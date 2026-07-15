CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    fullname VARCHAR(100)
);

CREATE TABLE phone (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    brand VARCHAR(50),
    price INT
);

INSERT INTO users (username, password, fullname)
VALUES
('admin', 'admin12@3', 'Administrator'),
('alice', 'alice123', 'Alice'),
('bob', 'bob123', 'Bob');

INSERT INTO phone (name, brand, price)
VALUES
('Galaxy S24 Ultra','Samsung',29990000),
('Galaxy A55','Samsung',9990000),
('iPhone 16 Pro','Apple',31990000),
('iPhone 15','Apple',22990000),
('Xiaomi 14','Xiaomi',16990000),
('Redmi Note 13 ','Xiaomi',6990000),
('ROG Phone 8','ASUS',24990000),
('Zenfone 11','ASUS',18990000);
