<?php
include 'conn.php';

$sql = "CREATE TABLE cart (
    id INT(100) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    price INT(100) NOT NULL,
    quantity INT(100) NOT NULL,
    image VARCHAR(100) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'cart' created successfully<br>";
} else {
    echo "Error creating table 'cart': " . mysqli_error($conn) . "<br>";
}


$sql = "CREATE TABLE message (
    id INT(100) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    number VARCHAR(12) NOT NULL,
    message VARCHAR(500) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'message' created successfully<br>";
} else {
    echo "Error creating table 'message': " . mysqli_error($conn) . "<br>";
}

$sql = "CREATE TABLE orders (
    id INT(100) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    number VARCHAR(12) NOT NULL,
    email VARCHAR(40) NOT NULL,
    method VARCHAR(50) NOT NULL,
    address VARCHAR(500) NOT NULL,
    total_products VARCHAR(1000) NOT NULL,
    total_price INT(100) NOT NULL,
    placed_on VARCHAR(50) NOT NULL,
    payment_status VARCHAR(20) NOT NULL DEFAULT 'pending'
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'orders' created successfully<br>";
} else {
    echo "Error creating table 'orders': " . mysqli_error($conn) . "<br>";
}

$sql = "CREATE TABLE products (
    id INT(100) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price INT(100) NOT NULL,
    image VARCHAR(100) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'products' created successfully<br>";
} else {
    echo "Error creating table 'products': " . mysqli_error($conn) . "<br>";
}

$sql = "CREATE TABLE users (
    id INT(100) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    user_type VARCHAR(20) NOT NULL DEFAULT 'user'
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'users' created successfully<br>";
} else {
    echo "Error creating table 'users': " . mysqli_error($conn) . "<br>";
}

$sql = "CREATE TABLE login_history (
    id INT(100) AUTO_INCREMENT PRIMARY KEY,
    admin_id INT(100) NOT NULL,
    ip_address VARCHAR(100) NOT NULL,
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'login_history' created successfully<br>";
} else {
    echo "Error creating table 'login_history': " . mysqli_error($conn) . "<br>";
}

$sql = "CREATE TABLE courier (
  id INT(100) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  contact_number VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL,
  address VARCHAR(500) NOT NULL,
  status VARCHAR(20) NOT NULL
)";


if (mysqli_query($conn, $sql)) {
  echo "Table courier created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);


?>
