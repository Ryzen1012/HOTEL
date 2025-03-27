<?php
header("Content-Type: application/json");

// Connect to Database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "Hotel";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "All fields are required!"]);
        exit;
    }

    $sql = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Your message has been sent successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }

    $conn->close();
}
?>
