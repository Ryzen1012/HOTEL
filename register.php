<?php
session_start();
include 'login_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        $_SESSION['register_error'] = "❌ Passwords do not match!";
        header("Location: index.php");
        exit();
    }

    $check_stmt = $conn->prepare("SELECT email FROM registration WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $_SESSION['register_error'] = "❌ Email already exists!";
        $check_stmt->close();
        $conn->close();
        header("Location: index.php");
        exit();
    }
    $check_stmt->close();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO registration (full_name, email, address, dob, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $email, $address, $dob, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['register_success'] = "✅ Registration successful!";
    } else {
        $_SESSION['register_error'] = "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}
?>
