<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;

        return header("location: welcome.php");
    } else {
        $_SESSION['alert'] = 'Login failed. Please try again.';
        $_SESSION['failed'] = true;

        return header("location: index.php");
    }
}
?>
