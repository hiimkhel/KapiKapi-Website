<?php
include("../config.php");
ob_clean();
session_start();
header('Content-Type: application/json');


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo json_encode(["success" => false, "error" => "Invalid name or password."]);
        exit();
    }

    $stmt->bind_result($id, $hashedPass);
    $stmt->fetch();

    if (password_verify($password, (string)$hashedPass)) {
        $_SESSION["user_id"] = $id;
        $_SESSION["name"] = $name;
        echo json_encode(["success" => true, "message" => "Login successful!"]);
    } else {
        echo json_encode(["success" => false, "error" => "Invalid name or password."]);
    }

    exit();
}
