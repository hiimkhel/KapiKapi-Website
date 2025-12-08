<?php
include("../config.php");

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM menu WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$item = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu Item</title>
</head>
<body>

<h2>Edit Menu Item</h2>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $item['id'] ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?= $item['name'] ?>" required><br><br>

    <label>Description:</label>
    <textarea name="description" required><?= $item['description'] ?></textarea><br><br>

    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="<?= $item['price'] ?>" required><br><br>

    <label>Image URL:</label>
    <input type="text" name="image" value="<?= $item['image'] ?>" required><br><br>

    <label>Category:</label>
    <select name="category" required>
        <option value="food" <?= $item['category']=="food"?"selected":"" ?>>Food</option>
        <option value="merch" <?= $item['category']=="merch"?"selected":"" ?>>Merch</option>
    </select><br><br>

    <button type="submit">Update Item</button>
</form>

</body>
</html>
