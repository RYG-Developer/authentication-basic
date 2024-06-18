<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Jika password dan confirm_password tidak sama
    if ($password != $confirmPassword) {
        $_SESSION['alert'] = 'Incorrect password confirmation.';
        $_SESSION['failed'] = true;

        return header("location: index.php");
    }

    $sqlSearchDuplicate = "SELECT * FROM tbl_users WHERE email = '$email'";
    $user = $conn->query($sqlSearchDuplicate);

    // Jika email telah dipakai user lain
    if ($user->num_rows != 0) {
        $_SESSION['alert'] = 'User with the same email already exist.';
        $_SESSION['failed'] = true;

        return header("location: index.php");
    }

    $sqlInsertUser = "INSERT INTO tbl_users (email, password) VALUES ('$email', '$password')";
    if ($conn->query($sqlInsertUser)) {
        $_SESSION['alert'] = 'Registration success. You may log-in.';

        return header("location: index.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
