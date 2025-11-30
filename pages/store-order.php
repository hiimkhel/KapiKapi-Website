<?php  
include "../config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Values Expected
    $product = $_POST["product"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $total = $_POST["total"];
    $street = $_POST["streetAddress"];
    $barangay = $_POST["barangay"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $zip = $_POST["zipCode"];
    $phone = $_POST["phoneNumber"];
    $notes = $_POST["deliveryNotes"];

    // Inject values to the orders table
    $sql = "INSERT INTO orders 
            (product, quantity, price, total, street, barangay, city, province, zip, phone, notes)
            VALUES 
            ('$product', '$quantity', '$price', '$total', '$street', '$barangay', '$city', '$province', '$zip', '$phone', '$notes')";

    // Create a response of the database injection status
    if ($conn->query($sql)) {
        echo "Order stored successfully!";
    } else {
        echo "Error saving order: " . $conn->error;
    }

    exit();
}
?>