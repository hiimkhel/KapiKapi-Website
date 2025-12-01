<?php
include("../config.php");
ob_clean();
session_start();
header('Content-Type: application/json');


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    // Check if username/email exists
    $check = $conn->prepare("SELECT id FROM users WHERE name = ? OR email = ?");
    $check->bind_param("ss", $name, $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo json_encode(["success" => false, "error" => "name or Email already exists!"]);
        exit();
    }

    // Insert new user
    $query = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $query->bind_param("sss", $name, $email, $hashedPass);

    if ($query->execute()) {
        $_SESSION["user_id"] = $query->insert_id;
        $_SESSION["name"] = $name;
        echo json_encode(["success" => true, "message" => "Registration successful!"]);
    } else {
        echo json_encode(["success" => false, "error" => "Error creating account."]);
    }

    $query->close();
    exit();
}
