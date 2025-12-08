<?php
include("../config.php");

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM menu WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Item deleted successfully!'); window.location='menu.php';</script>";
} else {
    echo "Delete failed.";
}
?>
