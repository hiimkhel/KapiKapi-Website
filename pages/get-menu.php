<?php
error_reporting(0);
header('Content-Type: application/json');
include("../config.php");

$menuItems = [];

$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $menuItems = $result->fetch_all(MYSQLI_ASSOC);
}

// Separate by category
$food = array_filter($menuItems, fn($item) => $item['category'] === 'food');
$merch = array_filter($menuItems, fn($item) => $item['category'] === 'merch');

echo json_encode([
    'food' => array_values($food),
    'merch' => array_values($merch)
]);
