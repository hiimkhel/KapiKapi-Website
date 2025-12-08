<?php
include("../config.php");

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_POST['image'];
$category = $_POST['category'];

$stmt = $conn->prepare("UPDATE menu SET name=?, description=?, price=?, image=?, category=? WHERE id=?");
$stmt->bind_param("ssdssi", $name, $description, $price, $image, $category, $id);

if ($stmt->execute()) {
    echo "<script>alert('Item updated successfully!'); window.location='menu.php';</script>";
} else {
    echo "Update failed.";
}
?>
