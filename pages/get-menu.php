<?php
include("../config.php");
header('Content-Type: application/json');

$foodResult = $conn->query("SELECT * FROM menu WHERE category='food' ORDER BY id DESC");
$merchResult = $conn->query("SELECT * FROM menu WHERE category='merch' ORDER BY id DESC");

$menu = [
    'food' => [],
    'merch' => []
];

while ($row = $foodResult->fetch_assoc()) {
    $menu['food'][] = $row;
}
while ($row = $merchResult->fetch_assoc()) {
    $menu['merch'][] = $row;
}

echo json_encode($menu);
