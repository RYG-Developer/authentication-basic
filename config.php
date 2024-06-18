<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikumlogin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Buat tabel "tbl_users" jika belum ada
$sql = "CREATE TABLE IF NOT EXISTS tbl_users (
    id INT(18) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    password TEXT
)";

$conn->query($sql);
