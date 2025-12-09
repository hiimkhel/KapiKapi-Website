<?php
session_start();
include("../config.php"); // Your DB connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login-register.php");
    exit;
}

// Get user inputs
$user_id = $_SESSION['user_id'];
$current_password = $_POST['current_password'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Basic validation
if ($new_password !== $confirm_password) {
    $_SESSION['error'] = "New password and confirm password do not match.";
    header("Location: update-password.php");
    exit;
}

// Fetch current password hash from database
$stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "User not found.";
    header("Location: update-password.php");
    exit;
}

$row = $result->fetch_assoc();
$hashed_password = $row['password'];

// Verify current password
if (!password_verify($current_password, $hashed_password)) {
    $_SESSION['error'] = "Current password is incorrect.";
    header("Location: update-password.php");
    exit;
}

// Hash new password
$new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Update password in DB
$update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
$update_stmt->bind_param("si", $new_hashed_password, $user_id);

if ($update_stmt->execute()) {
    $_SESSION['success'] = "Password updated successfully! 🐾";
    header("Location: profile.php");
    exit;
} else {
    $_SESSION['error'] = "Failed to update password. Please try again.";
}

header("Location: update-password.php");
exit;
?>
