<?php
include("../config.php");
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Get logged-in user ID if available
    $userId = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;

    // Sanitize user input
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName  = $conn->real_escape_string($_POST['lastName']);
    $email     = $conn->real_escape_string($_POST['email']);
    $subject   = $conn->real_escape_string($_POST['subject']);
    $message   = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO feedback (user_id, first_name, last_name, email, subject, message)
            VALUES ('$userId', '$firstName', '$lastName', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
    }

    $conn->close();
}
?>
