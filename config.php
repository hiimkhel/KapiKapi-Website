<?php
/**
 * KapiKapi Website — Configuration File
 * This file handles:
 *   - Database connection
 *   - Global settings
 *   - JSON response helper
 */

// =========================
// DATABASE CONFIGURATION
// =========================
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "KapiKapiDB");

// =========================
// DATABASE CONNECTION
// =========================
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// If connection fails, return JSON (fetch() friendly)
if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode([
        "status" => "error",
        "message" => "Database connection failed: " . $conn->connect_error
    ]));
}

// Force JSON output for all API responses
header("Content-Type: application/json; charset=UTF-8");

// =========================
// JSON RESPONSE HELPER
// =========================
function jsonResponse($status, $message, $data = null) {
    $resp = ["status" => $status, "message" => $message];
    if ($data !== null) $resp["data"] = $data;
    echo json_encode($resp);
    exit;
}
?>
