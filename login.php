<?php
session_start();
include('login_connect.php');

$email = "";
$password = "";
$row = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM registration WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_email'] = $email;
            $_SESSION['login_success'] = "Login successful!";
            header("Location: rooms.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Invalid login. Please check your email and password.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Invalid login. Please check your email and password.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>
